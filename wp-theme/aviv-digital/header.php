<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
<meta charset="<?php bloginfo( 'charset' ); ?>">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>
<?php wp_body_open(); ?>

<a href="#main" class="skip-link">דילוג לתוכן הראשי</a>

<header class="site-header">
  <div class="container nav-wrap">
    <a href="<?php echo esc_url( home_url( '/' ) ); ?>" class="brand" aria-label="אביב דיגיטל — לעמוד הבית">
      <?php echo avivdigital_logo(); ?>
    </a>

    <nav class="main-nav" id="main-nav" aria-label="ניווט ראשי">
      <ul>
        <li><a href="#services">שירותים</a></li>
        <li><a href="#work">תיק עבודות</a></li>
        <li><a href="#promise">ההבטחה</a></li>
        <li><a href="#process">התהליך</a></li>
        <li><a href="#contact">צור קשר</a></li>
      </ul>
    </nav>

    <a class="btn btn-primary nav-cta" href="<?php echo esc_url( avivdigital_contact( 'questionnaire' ) ); ?>">בואו נתחיל</a>

    <button class="nav-toggle" type="button" aria-label="פתיחת תפריט" aria-expanded="false" aria-controls="main-nav">
      <svg viewBox="0 0 24 24" aria-hidden="true"><path d="M4 7h16M4 12h16M4 17h16" stroke-linecap="round"/></svg>
    </button>
  </div>
</header>

<main id="main">
