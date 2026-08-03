<?php
/**
 * עמוד הבית — שחזור מדויק של המבנה והעיצוב שאושרו:
 * שבעה מקטעים בקצב אור-כהה, פלטת מנטה/לבן/שחור/קרם.
 */

get_header();

$wa            = 'https://wa.me/' . avivdigital_contact( 'whatsapp' );
$questionnaire = avivdigital_contact( 'questionnaire' );
$wa_icon       = avivdigital_whatsapp_icon();
?>

  <!-- 1. הירו — מנטה -->
  <section class="hero">
    <div class="container">
      <div class="hero-copy">
        <span class="eyebrow">סטודיו בוטיק לבניית דפי נחיתה ואתרים</span>
        <h1>בונים לך נוכחות דיגיטלית<br>שאפשר <strong>לסמוך</strong> עליה.</h1>
        <p class="hero-sub">מדף נחיתה ועד אתר מלא — תהליך מסודר, מהשאלון הראשון ועד שהתוצאה מדויקת בשבילך.</p>
        <div class="hero-actions">
          <a class="btn btn-primary btn-lg" href="#contact">בואו נתחיל — למילוי השאלון</a>
          <a class="btn btn-whatsapp btn-lg" href="<?php echo esc_url( $wa ); ?>" target="_blank" rel="noopener">
            <?php echo $wa_icon; ?>
            לשיחה בוואטסאפ
          </a>
        </div>
      </div>

      <!-- איור, לא תצלום סטוק — אין לנו עדיין תמונות אמיתיות של אביב/הסטודיו -->
      <div class="hero-visual" aria-hidden="true">
        <div class="hero-blob"></div>
        <div class="hero-dot d1"></div>
        <div class="hero-dot d2"></div>
        <div class="hero-dot d3"></div>
        <svg class="hero-sprout-lg" viewBox="0 0 26 34">
          <path class="stem" d="M13 33 V11"/>
          <path d="M12 14 C6 13 3 7 4.5 3 C10 4.5 12.5 8 12.5 14 Z"/>
          <path d="M14 14 C20 13 23 7 21.5 3 C16 4.5 13.5 8 13.5 14 Z"/>
          <path d="M13 8.5 C10.5 6 10.5 3 13 1 C15.5 3 15.5 6 13 8.5 Z"/>
        </svg>
      </div>
    </div>
  </section>

  <!-- 2. הצהרה — שחור מלא -->
  <section class="stmt on-black reveal-section">
    <div class="container">
      <span class="eyebrow">איך אנחנו עובדים</span>
      <h2>לא עוד סטודיו שמעלה עמוד ונעלם.<br><strong>כל פרויקט מתחיל בשאלון מפורט, וממשיך עד שהתוצאה מדויקת בשבילך.</strong></h2>
      <p>זו לא סיסמה — זה תהליך שאפשר לבדוק בעצמכם. השאלון שאנחנו שולחים לכל לקוח חדש הוא הצעד הראשון בכל פרויקט, לא תוספת.</p>
    </div>
  </section>

  <!-- 3. שירותים — לבן -->
  <section class="section" id="services">
    <div class="container">
      <div class="section-head reveal">
        <span class="eyebrow">מה אנחנו בונים</span>
        <h2>משירות ממוקד ועד אתר שלם</h2>
        <p class="section-sub">שני היקפים, אותו תהליך קפדני מאחוריהם.</p>
      </div>

      <div class="services-grid reveal">
        <div class="service-card">
          <span class="service-icon" aria-hidden="true">
            <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round"><rect x="4" y="3" width="16" height="18" rx="2"/><path d="M8 8h8M8 12h8M8 16h4"/></svg>
          </span>
          <h3>דף נחיתה</h3>
          <p class="service-sub">עמוד אחד, פעולה אחת ברורה. מתאים לבעל מקצוע עצמאי שרוצה נוכחות שבונה אמון מהר.</p>
          <ul class="service-list">
            <li>עיצוב מותאם אישית לפי המיתוג שלך</li>
            <li>ניסוח תוכן מקצועי, לא תבנית גנרית</li>
            <li>מותאם מלא למובייל</li>
            <li>כפתור יצירת קשר ישיר — וואטסאפ או טופס</li>
          </ul>
        </div>
        <div class="service-card">
          <span class="service-icon" aria-hidden="true">
            <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round"><rect x="3" y="4" width="18" height="16" rx="2"/><path d="M3 9h18M8 4v5"/></svg>
          </span>
          <h3>אתר עסקי מלא</h3>
          <p class="service-sub">כמה עמודים — בית, שירותים, אודות, צור קשר — לעסק עם היצע רחב יותר.</p>
          <ul class="service-list">
            <li>ארכיטקטורת ניווט מותאמת לעסק שלך</li>
            <li>זהות ויזואלית עקבית בכל עמוד</li>
            <li>מהירות טעינה ונגישות כחלק מהבנייה, לא תוספת</li>
            <li>מבנה מוכן לגדילה — עמודים חדשים בהמשך</li>
          </ul>
        </div>
      </div>
    </div>
  </section>

  <!-- 4. תיק עבודות — שחור -->
  <section class="section on-black" id="work">
    <div class="container">
      <div class="section-head reveal">
        <span class="eyebrow">תיק עבודות</span>
        <h2>העבודות שלנו</h2>
        <p class="section-sub">הפרויקט הראשון שלנו כבר באוויר. השאר בדרך — כל עבודה שתופיע כאן תהיה אמיתית, לא הדמיה.</p>
      </div>
      <div class="work-placeholders reveal">
        <a class="work-slot work-slot--filled" href="<?php echo esc_url( avivdigital_contact( 'work_url' ) ); ?>" target="_blank" rel="noopener">
          <img src="<?php echo esc_url( get_template_directory_uri() . '/assets/work/amit-farchan-doula.jpg' ); ?>" alt="עמוד הבית של האתר שבנינו לעמית פרחן, דולה ומדריכת הנקה" loading="lazy">
          <span class="work-caption">עמית פרחן — דף נחיתה לדולה ומדריכת הנקה</span>
        </a>
        <div class="work-slot" aria-hidden="true">
          <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5"><rect x="3" y="5" width="18" height="14" rx="2"/><circle cx="9" cy="10" r="1.6"/><path d="M21 16l-5.5-5-4 4L9 13l-6 5"/></svg>
          <span>בקרוב</span>
        </div>
        <div class="work-slot" aria-hidden="true">
          <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5"><rect x="3" y="5" width="18" height="14" rx="2"/><circle cx="9" cy="10" r="1.6"/><path d="M21 16l-5.5-5-4 4L9 13l-6 5"/></svg>
          <span>בקרוב</span>
        </div>
      </div>
    </div>
  </section>

  <!-- 5. ההבטחה שלנו — קרם -->
  <section class="section on-cream" id="promise">
    <div class="container">
      <div class="section-head reveal">
        <span class="eyebrow">ההבטחה שלנו</span>
        <h2>לא רק מבטיחים — מוכיחים</h2>
      </div>
      <div class="pillars-row reveal">
        <div class="pillar-item">
          <span class="pillar-icon" aria-hidden="true">
            <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round"><circle cx="12" cy="12" r="9"/><path d="M14.5 9.5 L10.5 13.5 L9.5 14.5 L13.5 10.5 Z" fill="currentColor" stroke="none"/></svg>
          </span>
          <h3>מקצועיות</h3>
          <p>תהליך מובנה ומתועד — השאלון שממלאים בהתחלה הוא הוכחה חיה, לא סיסמה.</p>
        </div>
        <div class="pillar-item">
          <span class="pillar-icon" aria-hidden="true">
            <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round"><path d="M12 3l7 3v6c0 4.5-3 7.5-7 9-4-1.5-7-4.5-7-9V6z"/><path d="M9 12l2 2 4-4"/></svg>
          </span>
          <h3>אחריות</h3>
          <p>מלווים אתכם עד שביעות רצון מלאה. לא נעלמים אחרי המסירה.</p>
        </div>
        <div class="pillar-item">
          <span class="pillar-icon" aria-hidden="true">
            <svg viewBox="0 0 24 24" fill="currentColor"><path d="M12 20s-7-4.4-9-9.2C1.5 7 3.5 4 7 4c2 0 3.6 1.2 5 3.6C13.4 5.2 15 4 17 4c3.5 0 5.5 3 5 6.8-2 4.8-9 9.2-10 9.2z"/></svg>
          </span>
          <h3>אמון</h3>
          <p>כנות מוחלטת על מה שיש ומה שאין. תחילת דרך אומרת תשומת לב מלאה לכל לקוח.</p>
        </div>
      </div>
    </div>
  </section>

  <!-- 6. התהליך שלנו — שחור -->
  <section class="section on-black">
    <div class="container">
      <div class="section-head reveal">
        <span class="eyebrow">איך זה עובד</span>
        <h2>שישה שלבים, בלי הפתעות</h2>
        <p class="section-sub">מהפנייה הראשונה ועד ההשקה — כדי שתדעו בדיוק למה לצפות.</p>
      </div>
      <div class="process-cards reveal">
        <div class="process-card"><span class="process-num">1</span><h4>שאלון אפיון</h4><p>מכירים את העסק שלך לעומק, בלי ניחושים.</p></div>
        <div class="process-card"><span class="process-num">2</span><h4>טיוטת עיצוב</h4><p>כיוון ויזואלי לאישור לפני שנכתבת שורת קוד אחת.</p></div>
        <div class="process-card"><span class="process-num">3</span><h4>פיתוח</h4><p>בונים לפי הטיוטה שאושרה.</p></div>
        <div class="process-card"><span class="process-num">4</span><h4>תיקונים עד שביעות רצון</h4><p>לא עוצרים בסבב אחד אם עוד לא מדויק.</p></div>
        <div class="process-card"><span class="process-num">5</span><h4>בדיקות איכות</h4><p>עובר בדיקה לפני שהוא עובר אליך.</p></div>
        <div class="process-card"><span class="process-num">6</span><h4>השקה</h4><p>עולה לאוויר, ואתה יודע בדיוק מה קיבלת.</p></div>
      </div>
    </div>
  </section>

  <!-- 7. צור קשר — לבן -->
  <section class="section contact" id="contact">
    <div class="container">
      <div class="reveal">
        <span class="eyebrow">מוכנים להתחיל?</span>
        <h2>בואו נתחיל</h2>
        <p class="contact-lead">הצעד הראשון הוא שאלון אפיון קצר — כ־10 דקות, ואפשר לעצור ולחזור. הוא בדיוק מה שיעזור לנו להבין את העסק שלכם לעומק.</p>
        <div class="contact-actions">
          <a class="btn btn-primary btn-lg" href="<?php echo esc_url( $questionnaire ); ?>">למילוי השאלון ✦</a>
          <a class="btn btn-whatsapp btn-lg" href="<?php echo esc_url( $wa ); ?>" target="_blank" rel="noopener">
            <?php echo $wa_icon; ?>
            שיחה ישירה בוואטסאפ
          </a>
        </div>
      </div>
      <dl class="contact-info reveal">
        <dt>וואטסאפ</dt>
        <dd><a href="<?php echo esc_url( $wa ); ?>" target="_blank" rel="noopener" dir="ltr"><?php echo esc_html( avivdigital_contact( 'whatsapp_label' ) ); ?></a></dd>
        <dt>שאלון אפיון</dt>
        <dd><a href="<?php echo esc_url( $questionnaire ); ?>">מילוי אונליין, כ-10 דקות</a></dd>
      </dl>
    </div>
  </section>

<?php get_footer(); ?>
