<?php
/**
 * עמוד הבית. המבנה והעיצוב קבועים; כל הטקסטים נשלפים מפאנל העריכה
 * (מראה > התאמה אישית > תוכן עמוד הבית) עם נפילה לברירות המחדל.
 */

get_header();

$wa      = 'https://wa.me/' . avivdigital_text( 'wa_number' );
$quest   = avivdigital_text( 'quest_url' );
$wa_icon = avivdigital_whatsapp_icon();
?>

  <!-- 1. הירו — מנטה -->
  <section class="hero">
    <div class="container">
      <div class="hero-copy">
        <span class="eyebrow"><?php echo esc_html( avivdigital_text( 'hero_eyebrow' ) ); ?></span>
        <h1><?php avivdigital_rich( 'hero_title' ); ?></h1>
        <p class="hero-sub"><?php echo esc_html( avivdigital_text( 'hero_sub' ) ); ?></p>
        <div class="hero-actions">
          <a class="btn btn-primary btn-lg" href="#contact"><?php echo esc_html( avivdigital_text( 'hero_btn1' ) ); ?></a>
          <a class="btn btn-whatsapp btn-lg" href="<?php echo esc_url( $wa ); ?>" target="_blank" rel="noopener">
            <?php echo $wa_icon; ?>
            <?php echo esc_html( avivdigital_text( 'hero_btn2' ) ); ?>
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
      <span class="eyebrow"><?php echo esc_html( avivdigital_text( 'stmt_eyebrow' ) ); ?></span>
      <h2><?php avivdigital_rich( 'stmt_title' ); ?></h2>
      <p><?php echo esc_html( avivdigital_text( 'stmt_text' ) ); ?></p>
    </div>
  </section>

  <!-- 3. שירותים — לבן -->
  <section class="section" id="services">
    <div class="container">
      <div class="section-head reveal">
        <span class="eyebrow"><?php echo esc_html( avivdigital_text( 'srv_eyebrow' ) ); ?></span>
        <h2><?php echo esc_html( avivdigital_text( 'srv_title' ) ); ?></h2>
        <p class="section-sub"><?php echo esc_html( avivdigital_text( 'srv_sub' ) ); ?></p>
      </div>

      <div class="services-grid reveal">
        <div class="service-card">
          <span class="service-icon" aria-hidden="true">
            <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round"><rect x="4" y="3" width="16" height="18" rx="2"/><path d="M8 8h8M8 12h8M8 16h4"/></svg>
          </span>
          <h3><?php echo esc_html( avivdigital_text( 'srv1_title' ) ); ?></h3>
          <p class="service-sub"><?php echo esc_html( avivdigital_text( 'srv1_sub' ) ); ?></p>
          <ul class="service-list">
            <?php foreach ( avivdigital_lines( 'srv1_list' ) as $item ) : ?>
              <li><?php echo esc_html( $item ); ?></li>
            <?php endforeach; ?>
          </ul>
        </div>
        <div class="service-card">
          <span class="service-icon" aria-hidden="true">
            <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round"><rect x="3" y="4" width="18" height="16" rx="2"/><path d="M3 9h18M8 4v5"/></svg>
          </span>
          <h3><?php echo esc_html( avivdigital_text( 'srv2_title' ) ); ?></h3>
          <p class="service-sub"><?php echo esc_html( avivdigital_text( 'srv2_sub' ) ); ?></p>
          <ul class="service-list">
            <?php foreach ( avivdigital_lines( 'srv2_list' ) as $item ) : ?>
              <li><?php echo esc_html( $item ); ?></li>
            <?php endforeach; ?>
          </ul>
        </div>
      </div>
    </div>
  </section>

  <!-- 4. תיק עבודות — שחור -->
  <section class="section on-black" id="work">
    <div class="container">
      <div class="section-head reveal">
        <span class="eyebrow"><?php echo esc_html( avivdigital_text( 'work_eyebrow' ) ); ?></span>
        <h2><?php echo esc_html( avivdigital_text( 'work_title' ) ); ?></h2>
        <p class="section-sub"><?php echo esc_html( avivdigital_text( 'work_sub' ) ); ?></p>
      </div>
      <div class="work-placeholders reveal">
        <a class="work-slot work-slot--filled" href="<?php echo esc_url( avivdigital_text( 'work1_url' ) ); ?>" target="_blank" rel="noopener">
          <img src="<?php echo esc_url( get_template_directory_uri() . '/assets/work/amit-farchan-doula.jpg' ); ?>" alt="<?php echo esc_attr( avivdigital_text( 'work1_caption' ) ); ?>" loading="lazy">
          <span class="work-caption"><?php echo esc_html( avivdigital_text( 'work1_caption' ) ); ?></span>
        </a>
        <?php for ( $i = 0; $i < 2; $i++ ) : ?>
          <div class="work-slot" aria-hidden="true">
            <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5"><rect x="3" y="5" width="18" height="14" rx="2"/><circle cx="9" cy="10" r="1.6"/><path d="M21 16l-5.5-5-4 4L9 13l-6 5"/></svg>
            <span><?php echo esc_html( avivdigital_text( 'work_soon' ) ); ?></span>
          </div>
        <?php endfor; ?>
      </div>
    </div>
  </section>

  <!-- 5. ההבטחה שלנו — קרם -->
  <section class="section on-cream" id="promise">
    <div class="container">
      <div class="section-head reveal">
        <span class="eyebrow"><?php echo esc_html( avivdigital_text( 'prom_eyebrow' ) ); ?></span>
        <h2><?php echo esc_html( avivdigital_text( 'prom_title' ) ); ?></h2>
      </div>
      <div class="pillars-row reveal">
        <div class="pillar-item">
          <span class="pillar-icon" aria-hidden="true">
            <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round"><circle cx="12" cy="12" r="9"/><path d="M14.5 9.5 L10.5 13.5 L9.5 14.5 L13.5 10.5 Z" fill="currentColor" stroke="none"/></svg>
          </span>
          <h3><?php echo esc_html( avivdigital_text( 'prom1_title' ) ); ?></h3>
          <p><?php echo esc_html( avivdigital_text( 'prom1_text' ) ); ?></p>
        </div>
        <div class="pillar-item">
          <span class="pillar-icon" aria-hidden="true">
            <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round"><path d="M12 3l7 3v6c0 4.5-3 7.5-7 9-4-1.5-7-4.5-7-9V6z"/><path d="M9 12l2 2 4-4"/></svg>
          </span>
          <h3><?php echo esc_html( avivdigital_text( 'prom2_title' ) ); ?></h3>
          <p><?php echo esc_html( avivdigital_text( 'prom2_text' ) ); ?></p>
        </div>
        <div class="pillar-item">
          <span class="pillar-icon" aria-hidden="true">
            <svg viewBox="0 0 24 24" fill="currentColor"><path d="M12 20s-7-4.4-9-9.2C1.5 7 3.5 4 7 4c2 0 3.6 1.2 5 3.6C13.4 5.2 15 4 17 4c3.5 0 5.5 3 5 6.8-2 4.8-9 9.2-10 9.2z"/></svg>
          </span>
          <h3><?php echo esc_html( avivdigital_text( 'prom3_title' ) ); ?></h3>
          <p><?php echo esc_html( avivdigital_text( 'prom3_text' ) ); ?></p>
        </div>
      </div>
    </div>
  </section>

  <!-- 6. התהליך שלנו — שחור -->
  <section class="section on-black">
    <div class="container">
      <div class="section-head reveal">
        <span class="eyebrow"><?php echo esc_html( avivdigital_text( 'proc_eyebrow' ) ); ?></span>
        <h2><?php echo esc_html( avivdigital_text( 'proc_title' ) ); ?></h2>
        <p class="section-sub"><?php echo esc_html( avivdigital_text( 'proc_sub' ) ); ?></p>
      </div>
      <div class="process-cards reveal">
        <?php for ( $i = 1; $i <= 6; $i++ ) : ?>
          <div class="process-card">
            <span class="process-num"><?php echo esc_html( $i ); ?></span>
            <h4><?php echo esc_html( avivdigital_text( 'proc' . $i . '_title' ) ); ?></h4>
            <p><?php echo esc_html( avivdigital_text( 'proc' . $i . '_text' ) ); ?></p>
          </div>
        <?php endfor; ?>
      </div>
    </div>
  </section>

  <!-- 7. צור קשר — לבן -->
  <section class="section contact" id="contact">
    <div class="container">
      <div class="reveal">
        <span class="eyebrow"><?php echo esc_html( avivdigital_text( 'cta_eyebrow' ) ); ?></span>
        <h2><?php echo esc_html( avivdigital_text( 'cta_title' ) ); ?></h2>
        <p class="contact-lead"><?php echo esc_html( avivdigital_text( 'cta_lead' ) ); ?></p>
        <div class="contact-actions">
          <a class="btn btn-primary btn-lg" href="<?php echo esc_url( $quest ); ?>"><?php echo esc_html( avivdigital_text( 'cta_btn1' ) ); ?></a>
          <a class="btn btn-whatsapp btn-lg" href="<?php echo esc_url( $wa ); ?>" target="_blank" rel="noopener">
            <?php echo $wa_icon; ?>
            <?php echo esc_html( avivdigital_text( 'cta_btn2' ) ); ?>
          </a>
        </div>
      </div>
      <dl class="contact-info reveal">
        <dt>וואטסאפ</dt>
        <dd><a href="<?php echo esc_url( $wa ); ?>" target="_blank" rel="noopener" dir="ltr"><?php echo esc_html( avivdigital_text( 'wa_label' ) ); ?></a></dd>
        <dt>שאלון אפיון</dt>
        <dd><a href="<?php echo esc_url( $quest ); ?>">מילוי אונליין, כ-10 דקות</a></dd>
      </dl>
    </div>
  </section>

<?php get_footer(); ?>
