</main>
<footer class="footer">
  <div class="footer__top">
    <div class="container">
      <div class="footer__items">
        <div class="footer__item">
          <div class="footer__logo-box">
            <img class="footer__logo-img" src="<?= carbon_get_post_meta(get_the_ID(), 'footer_logo'); ?>" alt="footer logotype">
            <a class="footer__logo-link go-to" data-goto=".hero" href="#"></a>
          </div>
          <div class="footer__text">
            <p>Wir arbeiten in 5 Ländern: Deutschland, USA, Frankreich, Italien und Spanien.</p>
          </div>
          <div class="footer__lang-box">
            <img class="footer__lang-img" src="<?= URI; ?>/assets/images/lang/lang-1.jpg" alt="flag">
            <img class="footer__lang-img" src="<?= URI; ?>/assets/images/lang/lang-6.jpg" alt="flag">
            <!-- <img class="footer__lang-img" src="<?= URI; ?>/assets/images/lang/lang-2.jpg" alt="flag"> -->
            <img class="footer__lang-img" src="<?= URI; ?>/assets/images/lang/lang-3.jpg" alt="flag">
            <img class="footer__lang-img" src="<?= URI; ?>/assets/images/lang/lang-5.jpg" alt="flag">
            <img class="footer__lang-img" src="<?= URI; ?>/assets/images/lang/lang-4.jpg" alt="flag">
          </div>
          <div class="footer__text">
            <?= apply_filters('the_content', carbon_get_post_meta(get_the_ID(), 'footer_text')); ?>
          </div>
          <h4 class="footer__title">
            Social media:
          </h4>
          <div class="footer__soc-box">
            <?php foreach (carbon_get_post_meta(get_the_ID(), 'footer_soc') as $item) { ?>
              <a class="footer__soc-link" href="<?= $item['footer_link-soc']; ?>">
                <img class="footer__soc-img" src="<?= $item['footer_icon-soc']; ?>" alt="social icon">
              </a>
            <?php } ?>
          </div>
        </div>
        <div class="footer__item">
          <h4 class="footer__title">
            Mit uns verbinden:
          </h4>
          <div class="footer__contact">
            <a class="footer__phone" href="tel:<?= preg_replace('/[^,.0-9]/', '', carbon_get_post_meta(get_the_ID(), 'header_phone')); ?>">
              <?= carbon_get_post_meta(get_the_ID(), 'header_phone'); ?>
            </a>
            <a class="footer__btn popup-link" href="#popup-form">
              Um Rückruf bitten
            </a>
          </div>
          <a class="footer__mail" href="mailto:<?= carbon_get_post_meta(get_the_ID(), 'header_mail'); ?>">
            <?= carbon_get_post_meta(get_the_ID(), 'header_mail'); ?>
          </a>
          <p class="footer__adress">
            <?= carbon_get_post_meta(get_the_ID(), 'footer_adress'); ?>
          </p>
          <h4 class="footer__title">
            Unsere Bürozeiten:
          </h4>
          <div class="footer__time">
            <?= carbon_get_post_meta(get_the_ID(), 'header_time'); ?>
          </div>
        </div>
        <div class="footer__item">
          <h4 class="footer__title footer__title-plag">
            PLAGIATSSOFTWARE
          </h4>
          <div class="footer__plag-inner">
            <div class="footer__plag-box">
              <img class="footer__plag-img" src="<?= URI; ?>/assets/images/icons/plag.png" alt="palg">
            </div>
            <div class="footer__plag-box">
              <img class="footer__plag-img" src="<?= URI; ?>/assets/images/icons/turnitin.png" alt="palg">
            </div>
            <div class="footer__plag-box">
              <img class="footer__plag-img" src="<?= URI; ?>/assets/images/icons/unicheck.png" alt="palg">
            </div>
          </div>
          <h4 class="footer__title footer__title-rev">
            Bewertungen
          </h4>
          <div class="footer__rev-inner">
            <a class="footer__rev-box" href="https://g.page/r/CdJfZ9AsoxPEEAI/review" target="_blank">
              <img class="footer__rev-img" src="<?= URI; ?>/assets/images/icons/google.svg" alt="reviews">
              <div class="rev-rating">
                <?php
                $rating = floatval(carbon_get_theme_option('rating-google')) * 2;
                $star = intdiv($rating, 2);
                for ($i = 0; $i < $star; $i++) {
                  echo '<span class="rev-rating__star rev-rating__star-fill"></span>';
                }
                if ($rating % 2 != 0) {
                  echo '<span class="rev-rating__star rev-rating__star-half"></span>';
                }
                echo '<span class="rev-rating__num">' . $rating / 2 . ' / 5</span>';
                ?>
              </div>
            </a>
            <a class="footer__rev-box" href="https://www.provenexpert.com/ug-gwc/" target="_blank">
              <img class="footer__rev-img" src="<?= URI; ?>/assets/images/icons/provenexpert-logo.svg" alt="reviews">
              <div class="rev-rating">
                <?php
                $rating = floatval(carbon_get_theme_option('rating-praven')) * 2;
                $star = intdiv($rating, 2);
                for ($i = 0; $i < $star; $i++) {
                  echo '<span class="rev-rating__star rev-rating__star-fill"></span>';
                }
                if ($rating % 2 != 0) {
                  echo '<span class="rev-rating__star rev-rating__star-half"></span>';
                }
                echo '<span class="rev-rating__num">' . $rating / 2 . ' / 5</span>';
                ?>
              </div>
            </a>
            <a class="footer__rev-box" href="https://www.trustami.com/erfahrung/ug-gwc-de-bewertung" target="_blank">
              <img class="footer__rev-img" src="<?= URI; ?>/assets/images/icons/bewer-3.jpg" alt="reviews">
              <div class="rev-rating">
                <?php
                $rating = floatval(carbon_get_theme_option('rating-trustami')) * 2;
                $star = intdiv($rating, 2);
                for ($i = 0; $i < $star; $i++) {
                  echo '<span class="rev-rating__star rev-rating__star-fill"></span>';
                }
                if ($rating % 2 != 0) {
                  echo '<span class="rev-rating__star rev-rating__star-half"></span>';
                }
                echo '<span class="rev-rating__num">' . $rating / 2 . ' / 5</span>';
                ?>
              </div>
            </a>
          </div>
        </div>
      </div>
    </div>
  </div>
  <div class="footer__bottom">
    <div class="container">
      <?= carbon_get_post_meta(get_the_ID(), 'footer_copy'); ?>
    </div>
  </div>
</footer>
</div>
<div class="floating-btn floating-top lock-padding">
  <a class="floating-btn__top go-to" data-goto=".hero" href="#">
    <svg width="10" height="16" fill="none" xmlns="http://www.w3.org/2000/svg">
      <path d="M5 0 .67 7.5h8.66L5 0Zm.75 16V6.75h-1.5V16h1.5Z" fill="#151116" />
    </svg>
  </a>
</div>
<?php wp_footer(); ?>
</body>

</html>