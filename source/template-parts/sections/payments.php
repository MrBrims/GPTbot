<section class="payments">
  <div class="container">
    <h2 class="payments__title">
      <?= carbon_get_post_meta(get_the_ID(), 'payments_title'); ?>
    </h2>
    <p class="payments__text">
      <?= carbon_get_post_meta(get_the_ID(), 'payments_text'); ?>
    </p>
    <div class="payments__items">
      <?php foreach (carbon_get_post_meta(get_the_ID(), 'payments_box') as $item) { ?>
        <div class="payments__item">
          <img class="payments__img" src="<?= $item['payments_icons']; ?>" alt="payments images">
        </div>
      <?php } ?>
    </div>
  </div>
</section>