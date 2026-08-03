<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
<meta charset="<?php bloginfo( 'charset' ); ?>">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link rel="icon" href="data:image/svg+xml,<svg xmlns='http://www.w3.org/2000/svg' viewBox='0 0 26 34'><path d='M13 33 V11' stroke='%23000' stroke-width='3' fill='none' stroke-linecap='round'/><path d='M12 14 C6 13 3 7 4.5 3 C10 4.5 12.5 8 12.5 14 Z' fill='%23000'/><path d='M14 14 C20 13 23 7 21.5 3 C16 4.5 13.5 8 13.5 14 Z' fill='%23000'/><path d='M13 8.5 C10.5 6 10.5 3 13 1 C15.5 3 15.5 6 13 8.5 Z' fill='%23000'/></svg>">
<?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>
<?php wp_body_open(); ?>

<a href="#main" class="skip-link">דלגו לתוכן הראשי</a>

<header class="site-header">
  <div class="container nav-wrap">
    <a href="<?php echo esc_url( home_url( '/' ) ); ?>" class="brand">
      <span class="logo-mark">
        <?php echo avivdigital_logo_svg( '#000' ); ?>
        אביב דיגיטל
      </span>
    </a>

    <nav class="main-nav" id="main-nav" aria-label="ניווט ראשי">
      <ul>
        <li><a href="<?php echo esc_url( home_url( '/#services' ) ); ?>" class="nav-link">שירותים</a></li>
        <li><a href="<?php echo esc_url( home_url( '/#work' ) ); ?>" class="nav-link">תיק עבודות</a></li>
        <li><a href="<?php echo esc_url( home_url( '/#promise' ) ); ?>" class="nav-link">ההבטחה שלנו</a></li>
        <li><a href="<?php echo esc_url( home_url( '/#contact' ) ); ?>" class="nav-link">צור קשר</a></li>
      </ul>
      <a class="btn btn-primary btn-nav" href="<?php echo esc_url( home_url( '/#contact' ) ); ?>">בואו נתחיל</a>
    </nav>

    <button class="nav-toggle" aria-label="פתיחת תפריט ניווט" aria-expanded="false" aria-controls="main-nav"><span aria-hidden="true"></span></button>
  </div>
</header>

<main id="main">
