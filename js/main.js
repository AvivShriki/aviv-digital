// אביב דיגיטל — עמוד הבית: תפריט מובייל + חשיפה בגלילה

document.addEventListener('DOMContentLoaded', () => {
  initNavToggle();
  initScrollReveal();
  initWorkRail();
});

function initNavToggle() {
  const toggle = document.querySelector('.nav-toggle');
  const nav = document.querySelector('.main-nav');
  if (!toggle || !nav) return;

  toggle.addEventListener('click', () => {
    const isOpen = nav.classList.toggle('is-open');
    toggle.setAttribute('aria-expanded', String(isOpen));
  });

  nav.querySelectorAll('a').forEach((link) => {
    link.addEventListener('click', () => {
      nav.classList.remove('is-open');
      toggle.setAttribute('aria-expanded', 'false');
    });
  });
}

function initScrollReveal() {
  const items = document.querySelectorAll('.reveal, .reveal-section');
  if (items.length === 0) return;

  const revealAll = () => items.forEach((el) => el.classList.add('is-visible'));

  const reduceMotion = window.matchMedia('(prefers-reduced-motion: reduce)').matches;
  if (reduceMotion) {
    revealAll();
    return;
  }

  const observer = new IntersectionObserver((entries) => {
    entries.forEach((entry) => {
      if (entry.isIntersecting) {
        entry.target.classList.add('is-visible');
        observer.unobserve(entry.target);
      }
    });
  }, { threshold: 0.15 });

  items.forEach((el) => observer.observe(el));

  // ניווט ישיר לעוגן (למשל קישור בתפריט) יכול "לדלג" מעל סקשן בלי
  // שהוא אי-פעם ייכנס לתצוגה — במקרה כזה חושפים הכל מיד.
  document.querySelectorAll('a[href*="#"]').forEach((link) => {
    link.addEventListener('click', revealAll);
  });
  window.addEventListener('hashchange', revealAll);
}

// רכבת תיק העבודות: חיצים, מד התקדמות וגרירה בעכבר.
// במגע לא נוגעים בכלום — הגלילה הטבעית של הדפדפן טובה יותר מכל חיקוי שלה.
function initWorkRail() {
  const rail = document.getElementById('work-rail');
  if (!rail) return;

  const wrap = rail.closest('.work-rail-wrap');
  const prev = document.querySelector('[data-rail="prev"]');
  const next = document.querySelector('[data-rail="next"]');
  const fill = document.querySelector('.rail-progress > span');
  const isRtl = getComputedStyle(rail).direction === 'rtl';
  const reduceMotion = window.matchMedia('(prefers-reduced-motion: reduce)').matches;

  // ב-RTL ערך הגלילה שלילי, ולכן כל החישובים כאן על הערך המוחלט.
  const maxScroll = () => rail.scrollWidth - rail.clientWidth;
  const atScroll = () => Math.abs(rail.scrollLeft);

  function update() {
    const max = maxScroll();
    const ratio = max > 1 ? atScroll() / max : 1;
    const atStart = atScroll() <= 2;
    const atEnd = atScroll() >= max - 2;

    if (fill) fill.style.width = Math.max(8, Math.min(100, ratio * 100)).toFixed(1) + '%';
    if (prev) prev.disabled = atStart;
    if (next) next.disabled = atEnd;
    if (wrap) {
      wrap.classList.toggle('has-prev', !atStart);
      wrap.classList.toggle('has-next', !atEnd);
    }
  }

  function step(direction) {
    const track = rail.querySelector('.work-track');
    const card = rail.querySelector('.work-track > li');
    const gap = track ? parseFloat(getComputedStyle(track).columnGap) || 20 : 20;
    const distance = card ? card.offsetWidth + gap : rail.clientWidth * 0.8;
    rail.scrollBy({
      left: distance * direction * (isRtl ? -1 : 1),
      behavior: reduceMotion ? 'auto' : 'smooth',
    });
  }

  if (next) next.addEventListener('click', () => step(1));
  if (prev) prev.addEventListener('click', () => step(-1));
  rail.addEventListener('scroll', update, { passive: true });
  window.addEventListener('resize', update);

  // גרירה בעכבר בלבד. אצבע על מסך מקבלת את הגלילה הרגילה עם התנופה שלה.
  let dragging = false;
  let startX = 0;
  let startScroll = 0;
  let travelled = 0;

  rail.addEventListener('pointerdown', (event) => {
    if (event.pointerType !== 'mouse' || event.button !== 0) return;
    dragging = true;
    travelled = 0;
    startX = event.clientX;
    startScroll = rail.scrollLeft;
    rail.setPointerCapture(event.pointerId);
  });

  rail.addEventListener('pointermove', (event) => {
    if (!dragging) return;
    const delta = event.clientX - startX;
    if (Math.abs(delta) > 4) rail.classList.add('is-dragging');
    if (rail.classList.contains('is-dragging')) {
      travelled = delta;
      rail.scrollLeft = startScroll - delta;
    }
  });

  function endDrag(event) {
    if (!dragging) return;
    dragging = false;
    if (rail.hasPointerCapture(event.pointerId)) rail.releasePointerCapture(event.pointerId);
    requestAnimationFrame(() => rail.classList.remove('is-dragging'));
  }

  rail.addEventListener('pointerup', endDrag);
  rail.addEventListener('pointercancel', endDrag);

  // גרירה לא אמורה להיגמר בפתיחת פרויקט.
  rail.addEventListener('click', (event) => {
    if (Math.abs(travelled) > 6) {
      event.preventDefault();
      event.stopPropagation();
    }
    travelled = 0;
  }, true);

  update();
}
