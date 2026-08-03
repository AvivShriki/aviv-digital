</main>

<footer class="site-footer">
  <div class="container">
    <div class="footer-grid">
      <div>
        <?php echo avivdigital_logo(); ?>
        <p class="footer-tagline">סטודיו בוטיק לבניית דפי נחיתה ואתרים לעסקים קטנים.</p>
      </div>

      <div class="footer-links">
        <div class="footer-col">
          <h4>ניווט</h4>
          <a href="#services">שירותים</a>
          <a href="#work">תיק עבודות</a>
          <a href="#process">התהליך</a>
        </div>
        <div class="footer-col">
          <h4>יצירת קשר</h4>
          <a href="https://wa.me/<?php echo esc_attr( avivdigital_contact( 'whatsapp' ) ); ?>" target="_blank" rel="noopener">וואטסאפ</a>
          <a href="tel:<?php echo esc_attr( avivdigital_contact( 'phone_tel' ) ); ?>" dir="ltr"><?php echo esc_html( avivdigital_contact( 'phone_display' ) ); ?></a>
          <a href="<?php echo esc_url( avivdigital_contact( 'questionnaire' ) ); ?>">שאלון אפיון</a>
        </div>
      </div>
    </div>

    <div class="footer-bottom">
      <span>© <?php echo esc_html( wp_date( 'Y' ) ); ?> אביב דיגיטל · כל הזכויות שמורות</span>
      <span>נבנה על ידינו, כמו שאנחנו בונים לכם.</span>
    </div>
  </div>
</footer>

<a class="wa-float" href="https://wa.me/<?php echo esc_attr( avivdigital_contact( 'whatsapp' ) ); ?>" target="_blank" rel="noopener" aria-label="שליחת הודעת וואטסאפ">
  <?php echo avivdigital_whatsapp_icon(); ?>
</a>

<?php wp_footer(); ?>
</body>
</html>
