// אביב דיגיטל — עמוד הבית: תפריט מובייל + חשיפה בגלילה

document.addEventListener('DOMContentLoaded', () => {
  initNavToggle();
  initScrollReveal();
  initPortfolio();
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

/* ==========================================================================
   תיק העבודות — גלגל תלת-ממדי אחד, בדסקטופ ובטלפון

   עקרון הביצועים: הטבעת היא מה שמסתובב. האריחים מקובעים עליה בבנייה
   ולא נוגעים בהם שוב, ולכן יש כתיבת טרנספורם אחת לפריים במקום אחת
   לכל אריח. הכתיבה היא ל-transform ישירות ולא למשתנה CSS, כי משתנה
   יורש ומאלץ חישוב מחדש גם על כל הצאצאים.
   ========================================================================== */

function initPortfolio() {
  const stage = document.getElementById('pf-stage');
  const ring = document.getElementById('pf-ring');
  const playBtn = document.getElementById('pf-play');
  const now = document.getElementById('pf-now');
  const dotList = document.getElementById('pf-dots');
  if (!stage || !ring || !playBtn || !now || !dotList) return;

  const originals = Array.from(ring.children);
  const PROJECTS = originals.length;
  const CYCLES = 3;   // 4 פרויקטים × 3 = 12 אריחים כל 30°. בגליל רואים רק
                      // את הקשת הקדמית, והחצי האחורי מוסתר ב-backface.
  const STEP = 360 / (PROJECTS * CYCLES);
  const FRONT = 0;            // בגליל החזית היא פשוט rotateY(0) מול הצופה
  const IDLE_DPS = 6;         // סיבוב חופשי, מעלות לשנייה. ב-9 (כמו ברפרנס)
                              // שורת הזהות מתחלפת כל 1.67 שניות — מהר מדי לקריאה.
  const FRICTION = 0.94;      // דעיכת האינרציה לפריים
  const STOP = 0.015;         // מתחת לזה האינרציה נחשבת גמורה
  const SNAP_LERP = 0.14;
  const DEG_PER_PX = 0.17;
  const TAP_PX = 8;
  const TAP_MS = 450;
  const SUPPRESS_MS = 350;    // חלון שבו לחיצה אחרי גרירה מבוטלת
  const HOLD_MS = 4200;       // שקט אחרי שהמשתמש הניח. צריך להספיק כדי להסתכל
                              // על הפרויקט שהוא כיוון אליו וללחוץ עליו.

  const calm = window.matchMedia('(prefers-reduced-motion: reduce)');

  let slots = [];
  let dots = [];
  let spin = 0;
  let vel = 0;
  let snapTo = null;
  let drag = null;
  let dirty = true;
  let lastT = 0;
  let rafId = 0;
  let onScreen = false;
  let hovering = false;
  let focused = false;
  let wanted = !calm.matches;
  let holdUntil = 0;
  let suppressUntil = 0;
  let frontIdx = -1;
  let live = false;   // will-change נדלק רק בזמן תנועה אמיתית

  const PLAY = '<svg viewBox="0 0 16 16" fill="currentColor" aria-hidden="true" focusable="false"><path d="M4.5 2.4v11.2a.6.6 0 0 0 .92.5l8.6-5.6a.6.6 0 0 0 0-1l-8.6-5.6a.6.6 0 0 0-.92.5Z"/></svg>';
  const PAUSE = '<svg viewBox="0 0 16 16" fill="currentColor" aria-hidden="true" focusable="false"><rect x="3" y="2" width="3.5" height="12" rx="1.2"/><rect x="9.5" y="2" width="3.5" height="12" rx="1.2"/></svg>';

  /* ---------- בנייה ---------- */

  function build() {
    for (let cycle = 1; cycle < CYCLES; cycle += 1) {
      originals.forEach((item) => {
        const copy = item.cloneNode(true);
        copy.setAttribute('aria-hidden', 'true');
        copy.querySelectorAll('a').forEach((a) => a.setAttribute('tabindex', '-1'));
        ring.appendChild(copy);
      });
    }
    slots = Array.from(ring.children);
    slots.forEach((slot, i) => slot.style.setProperty('--i', String(i)));

    stage.style.setProperty('--pf-step', STEP + 'deg');
    stage.classList.add('is-ring');
    const section = stage.closest('.section');
    if (section) section.classList.add('has-ring');

    dots = Array.from(dotList.querySelectorAll('.pf-dot'));
    dots.forEach((dot, i) => dot.addEventListener('click', () => goToProject(i)));

    syncPlay();
    write();
    updateFront(true);
  }

  /* ---------- כתיבה ---------- */

  function write() {
    ring.style.transform = 'rotateY(' + spin.toFixed(3) + 'deg)';
  }

  // מי בחזית — חשבון ישיר מהזווית, בלי לקרוא מהפריסה
  function frontIndex() {
    return Math.round((((FRONT - spin) % 360) + 360) % 360 / STEP) % slots.length;
  }

  function updateFront(force) {
    const next = frontIndex();
    if (next === frontIdx && !force) return;
    if (slots[frontIdx]) slots[frontIdx].classList.remove('is-front');
    frontIdx = next;
    const slot = slots[frontIdx];
    if (!slot) return;
    slot.classList.add('is-front');

    const project = frontIdx % PROJECTS;
    dots.forEach((dot, i) => dot.setAttribute('aria-current', String(i === project)));

    const name = slot.querySelector('.pf-name').textContent.trim();
    const kind = slot.querySelector('.pf-kind').textContent.trim();
    if (now.dataset.name === name) return;
    now.dataset.name = name;
    now.classList.add('is-changing');
    window.setTimeout(() => {
      now.querySelector('.pf-now-name').textContent = name;
      now.querySelector('.pf-now-kind').textContent = kind;
      now.classList.remove('is-changing');
    }, calm.matches ? 0 : 170);
  }

  /* ---------- הלולאה ---------- */

  function frame(t) {
    rafId = requestAnimationFrame(frame);
    if (!onScreen || document.hidden) { lastT = 0; return; }

    const dt = lastT ? Math.min((t - lastT) / 1000, 0.05) : 0;
    lastT = t;

    if (drag) {
      // הזווית נקבעת ישירות ב-pointermove
    } else if (Math.abs(vel) > STOP) {
      spin += vel;
      vel *= FRICTION;
      dirty = true;
      if (Math.abs(vel) <= STOP) armSnap();
    } else if (snapTo !== null) {
      const diff = snapTo - spin;
      if (Math.abs(diff) < 0.04 || calm.matches) {
        spin = snapTo;
        snapTo = null;
      } else {
        spin += diff * SNAP_LERP;
      }
      dirty = true;
    } else if (wanted && !hovering && !focused && t > holdUntil) {
      spin += IDLE_DPS * dt;
      dirty = true;
    }

    if (!dirty) {
      if (live) { live = false; stage.classList.remove('is-live'); }
      return;
    }
    if (!live) { live = true; stage.classList.add('is-live'); }
    dirty = false;
    write();
    updateFront(false);
  }

  // אחרי שהמשתמש הניח — הטבעת נחה על פרויקט, לא באמצע שום מקום
  function armSnap() {
    vel = 0;
    const k = Math.round((FRONT - spin) / STEP);
    snapTo = FRONT - k * STEP;
    holdUntil = performance.now() + HOLD_MS;
  }

  function goToProject(index) {
    let best = null;
    for (let i = 0; i < slots.length; i += 1) {
      if (i % PROJECTS !== index) continue;
      const target = FRONT - i * STEP;
      const d = ((((target - spin) % 360) + 540) % 360) - 180;
      if (!best || Math.abs(d) < Math.abs(best.d)) best = { d: d };
    }
    if (!best) return;
    vel = 0;
    snapTo = spin + best.d;
    holdUntil = performance.now() + HOLD_MS;
    dirty = true;
  }

  function nudge(dir) {
    vel = 0;
    snapTo = (snapTo === null ? spin : snapTo) + dir * STEP;
    holdUntil = performance.now() + HOLD_MS;
    dirty = true;
  }

  /* ---------- גרירה ---------- */

  stage.addEventListener('pointerdown', (e) => {
    if (e.button) return;
    drag = {
      id: e.pointerId, x: e.clientX,
      sx: e.clientX, sy: e.clientY,
      t: performance.now(), moved: 0,
      scrollY: window.scrollY,
      touch: e.pointerType !== 'mouse',
      axis: null,
    };
    vel = 0;
    snapTo = null;
    if (!drag.touch) {
      stage.setPointerCapture(e.pointerId);
      e.preventDefault();
    }
  });

  stage.addEventListener('pointermove', (e) => {
    if (!drag || e.pointerId !== drag.id) return;
    const totalX = e.clientX - drag.sx;
    const totalY = e.clientY - drag.sy;
    drag.moved = Math.max(drag.moved, Math.hypot(totalX, totalY));

    // באצבע: עד שברור שהתנועה אופקית, לא נוגעים — הדף ימשיך לגלול
    if (drag.touch && drag.axis === null && drag.moved > 10) {
      drag.axis = Math.abs(totalX) > Math.abs(totalY) ? 'x' : 'y';
    }
    if (drag.axis === 'y') return;

    const d = (e.clientX - drag.x) * DEG_PER_PX;
    drag.x = e.clientX;
    spin += d;
    vel = vel * 0.55 + d * 0.45;
    dirty = true;
    if (drag.moved > 4) stage.classList.add('is-dragging');
  });

  function endDrag(e) {
    if (!drag || e.pointerId !== drag.id) return;
    const d = drag;
    drag = null;
    stage.classList.remove('is-dragging');
    if (stage.hasPointerCapture(d.id)) stage.releasePointerCapture(d.id);

    // לחיצה אמיתית: האצבע הורמה, היא בקושי זזה, זה היה קצר, והדף לא גלל
    const tap = e.type === 'pointerup'
      && d.moved < TAP_PX
      && performance.now() - d.t < TAP_MS
      && Math.abs(window.scrollY - d.scrollY) < 3;

    if (!tap) suppressUntil = performance.now() + SUPPRESS_MS;
    if (Math.abs(vel) <= STOP) armSnap();
    else holdUntil = performance.now() + HOLD_MS;
  }

  stage.addEventListener('pointerup', endDrag);
  stage.addEventListener('pointercancel', endDrag);

  // גרירה לא אמורה להיגמר בפתיחת פרויקט
  stage.addEventListener('click', (e) => {
    if (performance.now() < suppressUntil) {
      e.preventDefault();
      e.stopPropagation();
    }
  }, true);

  /* ---------- עצירות ---------- */

  stage.addEventListener('pointerenter', (e) => { if (e.pointerType === 'mouse') hovering = true; });
  stage.addEventListener('pointerleave', () => { hovering = false; });
  // מטרה נעה היא מטרה שאי אפשר ללחוץ עליה במקלדת
  ring.addEventListener('focusin', () => { focused = true; });
  ring.addEventListener('focusout', () => { focused = false; });
  document.addEventListener('visibilitychange', () => { lastT = 0; });

  ring.addEventListener('keydown', (e) => {
    if (e.key === 'ArrowRight') nudge(-1);
    else if (e.key === 'ArrowLeft') nudge(1);
    else return;
    e.preventDefault();
  });

  playBtn.addEventListener('click', () => {
    wanted = !wanted;
    if (wanted) { snapTo = null; holdUntil = 0; }
    syncPlay();
  });

  function syncPlay() {
    playBtn.innerHTML = (wanted ? PAUSE : PLAY) + '<span>' + (wanted ? 'עצירה' : 'הפעלה') + '</span>';
    playBtn.setAttribute('aria-label', wanted ? 'עצירת הגלגל' : 'הפעלת הגלגל');
    playBtn.setAttribute('aria-pressed', String(!wanted));
  }

  /* ---------- הפעלה ---------- */

  build();

  let entered = false;
  new IntersectionObserver((entries) => {
    onScreen = entries[0].isIntersecting;
    if (onScreen && !entered) {
      entered = true;
      // כניסה: דחיפה קלה שהחיכוך מרגיע. אותה כתיבה, בלי מנגנון נוסף.
      if (!calm.matches) { vel = 1.15; dirty = true; }
    }
  }, { threshold: 0.08 }).observe(stage);

  window.addEventListener('resize', () => { dirty = true; });

  rafId = requestAnimationFrame(frame);
}
