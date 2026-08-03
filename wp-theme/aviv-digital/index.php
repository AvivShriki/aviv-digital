<?php
/**
 * תבנית ברירת מחדל — משמשת עמודים ופוסטים רגילים.
 */

get_header();
?>

<section class="section">
  <div class="container" style="max-width:760px">
    <?php
    if ( have_posts() ) :
      while ( have_posts() ) :
        the_post();
        ?>
        <article <?php post_class(); ?>>
          <div class="section-head">
            <h2><?php the_title(); ?></h2>
          </div>
          <div class="entry-content">
            <?php the_content(); ?>
          </div>
        </article>
        <?php
      endwhile;
    else :
      ?>
      <div class="section-head">
        <h2>לא נמצא תוכן</h2>
        <p>הדף שחיפשתם לא קיים. <a class="accent" href="<?php echo esc_url( home_url( '/' ) ); ?>">חזרה לעמוד הבית</a>.</p>
      </div>
      <?php
    endif;
    ?>
  </div>
</section>

<?php get_footer(); ?>
