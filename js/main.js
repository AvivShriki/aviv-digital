// אביב דיגיטל — עמוד הבית: תפריט מובייל + חשיפה בגלילה

document.addEventListener('DOMContentLoaded', () => {
  initNavToggle();
  initScrollReveal();
  initWorkRail();
  initWorkWheel();
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
  if (reduceMotion || !('IntersectionObserver' in window)) {
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

  // רשת ביטחון: תוכן שמחכה ל-opacity מצופה-חיתוך הוא תוכן שעלול להישאר
  // בלתי נראה לנצח. אחרי שלוש שניות חושפים הכול, ויהי מה.
  window.setTimeout(revealAll, 3000);

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

// גלגל תיק העבודות — אותה גאומטריה של cinematic.co.il.
// הרכבת הנגללת שב-HTML היא הבסיס; במסך רחב היא משודרגת לגלגל, ובצר
// היא נשארת כמו שהיא. בלי JS, או עם העדפת תנועה מופחתת, אין גלגל בכלל.
function initWorkWheel() {
  const section = document.getElementById('work');
  const track = section && section.querySelector('.work-track');
  const controls = section && section.querySelector('.work-controls');
  if (!section || !track || !controls) return;

  const wide = window.matchMedia('(min-width: 900px)');
  const calm = window.matchMedia('(prefers-reduced-motion: reduce)');
  const originals = Array.from(track.children);

  const CYCLES = 6;        // ארבעה פרויקטים שש פעמים = עשרים וארבעה אריחים,
                           // כמו ברפרנס. עם רדיוס 545 המרווח בקשת הוא 143
                           // פיקסל על אריח ברוחב 178 — רוב כל מכשיר גלוי.
  const DEG_PER_SEC = 5;   // סיבוב מלא בשבעים ושתיים שניות
  const FRONT_DEG = 305;   // הזווית שבה אריח תופס את השטח הנראה הגדול ביותר — נמדד

  let tiles = [];
  let button = null;
  let angle = 0;
  let frameId = 0;
  let lastStamp = 0;
  let running = false;
  let wanted = true;       // הבחירה של המבקר — נשמרת גם כשהגלגל יוצא מהמסך
  let inView = false;
  let observer = null;
  let caption = null;
  let frontIndex = -1;
  let hovered = null;

  const PLAY_ICON = '<svg viewBox="0 0 16 16" fill="currentColor" aria-hidden="true" focusable="false"><path d="M4.5 2.4v11.2a.6.6 0 0 0 .92.5l8.6-5.6a.6.6 0 0 0 0-1l-8.6-5.6a.6.6 0 0 0-.92.5Z"/></svg>';
  const PAUSE_ICON = '<svg viewBox="0 0 16 16" fill="currentColor" aria-hidden="true" focusable="false"><rect x="3" y="2" width="3.5" height="12" rx="1.2"/><rect x="9.5" y="2" width="3.5" height="12" rx="1.2"/></svg>';

  function place() {
    const step = 360 / tiles.length;
    for (let i = 0; i < tiles.length; i += 1) {
      const deg = (angle + i * step).toFixed(3);
      tiles[i].style.transform = 'rotateZ(' + deg + 'deg) translateX(var(--wheel-r)) rotateX(var(--tilt))';
    }
    // איזה אריח נמצא עכשיו בחזית — חשבון ישיר, בלי לקרוא מהפריסה.
    const next = Math.round(((FRONT_DEG - angle) % 360 + 360) % 360 / step) % tiles.length;
    if (next !== frontIndex) {
      frontIndex = next;
      if (!hovered) showCaption(tiles[frontIndex]);
    }
  }

  function showCaption(tile) {
    if (!caption || !tile) return;
    const name = tile.querySelector('.work-name').textContent.trim();
    const kind = tile.querySelector('.work-kind').textContent.trim();
    if (caption.dataset.name === name) return;
    caption.dataset.name = name;
    caption.classList.add('is-changing');
    window.setTimeout(() => {
      caption.querySelector('.wheel-now-name').textContent = name;
      caption.querySelector('.wheel-now-kind').textContent = kind;
      caption.classList.remove('is-changing');
    }, 180);
  }

  function frame(stamp) {
    if (!lastStamp) lastStamp = stamp;
    angle = (angle + DEG_PER_SEC * ((stamp - lastStamp) / 1000)) % 360;
    lastStamp = stamp;
    place();
    frameId = requestAnimationFrame(frame);
  }

  function start() {
    if (running) return;
    running = true;
    lastStamp = 0;
    frameId = requestAnimationFrame(frame);
  }

  function stop() {
    if (!running) return;
    running = false;
    cancelAnimationFrame(frameId);
  }

  // הגלגל מסתובב רק כשהוא גם רצוי, גם על המסך וגם בלשונית פעילה.
  function sync() {
    if (wanted && inView && !document.hidden) start();
    else stop();
    if (!button) return;
    button.innerHTML = (wanted ? PAUSE_ICON : PLAY_ICON) + '<span>' + (wanted ? 'עצירה' : 'הפעלה') + '</span>';
    button.setAttribute('aria-label', wanted ? 'עצירת הגלגל' : 'הפעלת הגלגל');
    button.setAttribute('aria-pressed', String(!wanted));
  }

  function build() {
    for (let cycle = 1; cycle < CYCLES; cycle += 1) {
      originals.forEach((item) => {
        const copy = item.cloneNode(true);
        copy.setAttribute('aria-hidden', 'true');
        copy.querySelectorAll('a').forEach((link) => link.setAttribute('tabindex', '-1'));
        copy.querySelectorAll('img').forEach((img) => img.setAttribute('loading', 'eager'));
        track.appendChild(copy);
      });
    }
    tiles = Array.from(track.children);

    caption = document.createElement('p');
    caption.className = 'wheel-now';
    caption.innerHTML = '<span class="wheel-now-name"></span><span class="wheel-now-kind"></span>';
    controls.parentNode.insertBefore(caption, controls);

    // מי שמצביע על אריח מסוים רוצה לדעת מה הוא, לא מה בחזית.
    tiles.forEach((tile) => {
      tile.addEventListener('pointerenter', () => { hovered = tile; showCaption(tile); });
      tile.addEventListener('pointerleave', () => {
        if (hovered !== tile) return;
        hovered = null;
        showCaption(tiles[frontIndex]);
      });
    });

    button = document.createElement('button');
    button.type = 'button';
    button.className = 'wheel-btn';
    controls.insertBefore(button, controls.firstChild);
    button.addEventListener('click', () => { wanted = !wanted; sync(); });

    section.classList.add('is-wheel');
    place();

    observer = new IntersectionObserver((entries) => {
      inView = entries[0].isIntersecting;
      sync();
    }, { threshold: 0.1 });
    observer.observe(track.closest('.work-rail-wrap'));

    // מי שמנווט במקלדת צריך יעד שעומד במקום.
    track.addEventListener('focusin', () => { inView = false; sync(); });
    track.addEventListener('focusout', () => { inView = true; sync(); });

    sync();
  }

  function teardown() {
    stop();
    if (observer) { observer.disconnect(); observer = null; }
    if (button) { button.remove(); button = null; }
    if (caption) { caption.remove(); caption = null; }
    frontIndex = -1;
    hovered = null;
    track.querySelectorAll('[aria-hidden="true"]').forEach((node) => node.remove());
    originals.forEach((item) => { item.style.transform = ''; });
    section.classList.remove('is-wheel');
    tiles = [];
    angle = 0;
  }

  function evaluate() {
    const shouldSpin = wide.matches && !calm.matches;
    if (shouldSpin && !section.classList.contains('is-wheel')) build();
    else if (!shouldSpin && section.classList.contains('is-wheel')) teardown();
  }

  document.addEventListener('visibilitychange', sync);
  wide.addEventListener('change', evaluate);
  calm.addEventListener('change', evaluate);
  evaluate();
}
