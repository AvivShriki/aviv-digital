<?php
/**
 * עמוד הבית של אביב דיגיטל.
 * התוכן זהה לזה שאושר באתר הקודם — רק השפה החזותית התחלפה (כיוון "כהה ופרימיום").
 */

get_header();

$wa            = 'https://wa.me/' . avivdigital_contact( 'whatsapp' );
$questionnaire = avivdigital_contact( 'questionnaire' );
?>

<section class="hero">
  <div class="container hero-inner">
    <p class="eyebrow">סטודיו בוטיק לבניית דפי נחיתה ואתרים</p>
    <h1>בונים לך נוכחות דיגיטלית<br>שאפשר <span class="accent">לסמוך עליה</span>.</h1>
    <p class="hero-lead">מדף נחיתה ועד אתר מלא — תהליך מסודר, מהשאלון הראשון ועד שהתוצאה מדויקת בשבילך.</p>

    <div class="hero-actions">
      <a class="btn btn-primary" href="<?php echo esc_url( $questionnaire ); ?>">בואו נתחיל — למילוי השאלון</a>
      <a class="btn btn-ghost" href="<?php echo esc_url( $wa ); ?>" target="_blank" rel="noopener">
        <?php echo avivdigital_whatsapp_icon(); ?>לשיחה בוואטסאפ
      </a>
    </div>

    <div class="hero-stats">
      <div class="hero-stat"><strong>2</strong><span>היקפי עבודה</span></div>
      <div class="hero-stat"><strong>6</strong><span>שלבים בתהליך</span></div>
      <div class="hero-stat"><strong>10 דק׳</strong><span>וזה מתחיל</span></div>
    </div>
  </div>
</section>

<section class="statement">
  <div class="container">
    <p class="eyebrow">איך אנחנו עובדים</p>
    <p class="statement-quote">לא עוד סטודיו שמעלה עמוד ונעלם. כל פרויקט מתחיל בשאלון מפורט, וממשיך עד שהתוצאה מדויקת בשבילך.</p>
    <p class="statement-note">זו לא סיסמה — זה תהליך שאפשר לבדוק בעצמכם. השאלון שאנחנו שולחים לכל לקוח חדש הוא הצעד הראשון בכל פרויקט, לא תוספת.</p>
  </div>
</section>

<section class="section" id="services">
  <div class="container">
    <div class="section-head">
      <p class="eyebrow">מה אנחנו בונים</p>
      <h2>משירות ממוקד ועד אתר שלם</h2>
      <p>שני היקפים, אותו תהליך קפדני מאחוריהם.</p>
    </div>

    <div class="services-grid">
      <div class="service-card">
        <h3>דף נחיתה</h3>
        <p>עמוד אחד, פעולה אחת ברורה. מתאים לבעל מקצוע עצמאי שרוצה נוכחות שבונה אמון מהר.</p>
        <ul class="service-list">
          <li>עיצוב מותאם אישית לפי המיתוג שלך</li>
          <li>ניסוח תוכן מקצועי, לא תבנית גנרית</li>
          <li>מותאם מלא למובייל</li>
          <li>כפתור יצירת קשר ישיר — וואטסאפ או טופס</li>
        </ul>
      </div>

      <div class="service-card">
        <h3>אתר עסקי מלא</h3>
        <p>כמה עמודים — בית, שירותים, אודות, צור קשר — לעסק עם היצע רחב יותר.</p>
        <ul class="service-list">
          <li>ארכיטקטורת ניווט מותאמת לעסק שלך</li>
          <li>זהות ויזואלית עקבית בכל עמוד</li>
          <li>מהירות טעינה ונגישות כחלק מהבנייה</li>
          <li>מבנה מוכן לגדילה — עמודים חדשים בהמשך</li>
        </ul>
      </div>
    </div>
  </div>
</section>

<section class="section section-alt" id="work">
  <div class="container">
    <div class="section-head">
      <p class="eyebrow">תיק עבודות</p>
      <h2>העבודות שלנו</h2>
      <p>הפרויקט הראשון שלנו כבר באוויר. השאר בדרך — כל עבודה שתופיע כאן תהיה אמיתית, לא הדמיה.</p>
    </div>

    <div class="work-grid">
      <a class="work-card" href="https://amitfarhandoula.com" target="_blank" rel="noopener">
        <?php
        // צילום המסך יוחלף בתמונה אמיתית לאחר אישור הלקוחה להצגת העבודה.
        $work_thumb = get_template_directory() . '/assets/work-amit.jpg';
        if ( file_exists( $work_thumb ) ) :
          ?>
          <div class="work-thumb">
            <img src="<?php echo esc_url( get_template_directory_uri() . '/assets/work-amit.jpg' ); ?>" alt="צילום מסך מאתר עמית פרחן" loading="lazy" width="800" height="500">
          </div>
        <?php else : ?>
          <div class="work-thumb work-thumb--placeholder"><span>amitfarhandoula.com</span></div>
        <?php endif; ?>
        <div class="work-body">
          <h3>עמית פרחן</h3>
          <p>דף נחיתה לדולה ומדריכת הנקה</p>
        </div>
      </a>

      <div class="work-card work-card--soon"><div class="work-soon-inner">בקרוב</div></div>
      <div class="work-card work-card--soon"><div class="work-soon-inner">בקרוב</div></div>
    </div>
  </div>
</section>

<section class="section" id="promise">
  <div class="container">
    <div class="section-head">
      <p class="eyebrow">ההבטחה שלנו</p>
      <h2>לא רק מבטיחים — מוכיחים</h2>
    </div>

    <div class="pillars">
      <div class="pillar">
        <span class="pillar-num">01</span>
        <h3>מקצועיות</h3>
        <p>תהליך מובנה ומתועד — השאלון שממלאים בהתחלה הוא הוכחה חיה, לא סיסמה.</p>
      </div>
      <div class="pillar">
        <span class="pillar-num">02</span>
        <h3>אחריות</h3>
        <p>מלווים אתכם עד שביעות רצון מלאה. לא נעלמים אחרי המסירה.</p>
      </div>
      <div class="pillar">
        <span class="pillar-num">03</span>
        <h3>אמון</h3>
        <p>כנות מוחלטת על מה שיש ומה שאין. תחילת דרך אומרת תשומת לב מלאה לכל לקוח.</p>
      </div>
    </div>
  </div>
</section>

<section class="section section-alt" id="process">
  <div class="container">
    <div class="section-head">
      <p class="eyebrow">איך זה עובד</p>
      <h2>שישה שלבים, בלי הפתעות</h2>
      <p>מהפנייה הראשונה ועד ההשקה — כדי שתדעו בדיוק למה לצפות.</p>
    </div>

    <div class="process-grid">
      <div class="process-step">
        <span class="process-num">שלב 01</span>
        <h3>שאלון אפיון</h3>
        <p>מכירים את העסק שלך לעומק, בלי ניחושים.</p>
      </div>
      <div class="process-step">
        <span class="process-num">שלב 02</span>
        <h3>טיוטת עיצוב</h3>
        <p>כיוון ויזואלי לאישור לפני שנכתבת שורת קוד אחת.</p>
      </div>
      <div class="process-step">
        <span class="process-num">שלב 03</span>
        <h3>פיתוח</h3>
        <p>בונים לפי הטיוטה שאושרה.</p>
      </div>
      <div class="process-step">
        <span class="process-num">שלב 04</span>
        <h3>סבבי תיקונים</h3>
        <p>לא עוצרים בסבב אחד אם עוד לא מדויק.</p>
      </div>
      <div class="process-step">
        <span class="process-num">שלב 05</span>
        <h3>בדיקות איכות</h3>
        <p>עובר בדיקה לפני שהוא עובר אליך.</p>
      </div>
      <div class="process-step">
        <span class="process-num">שלב 06</span>
        <h3>השקה</h3>
        <p>עולה לאוויר, ואתה יודע בדיוק מה קיבלת.</p>
      </div>
    </div>
  </div>
</section>

<section class="section" id="contact">
  <div class="container">
    <div class="cta">
      <p class="eyebrow" style="justify-content:center">מוכנים להתחיל?</p>
      <h2>בואו נתחיל</h2>
      <p>הצעד הראשון הוא שאלון אפיון קצר — כ־10 דקות, ואפשר לעצור ולחזור. הוא בדיוק מה שיעזור לנו להבין את העסק שלכם לעומק.</p>
      <div class="cta-actions">
        <a class="btn btn-primary" href="<?php echo esc_url( $questionnaire ); ?>">למילוי השאלון</a>
        <a class="btn btn-ghost" href="<?php echo esc_url( $wa ); ?>" target="_blank" rel="noopener">
          <?php echo avivdigital_whatsapp_icon(); ?>שיחה ישירה בוואטסאפ
        </a>
      </div>
    </div>
  </div>
</section>

<?php get_footer(); ?>
