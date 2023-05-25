<section class="hero" style="background-image: url('<?= carbon_get_post_meta(get_the_ID(), 'hero__bg'); ?>');">
  <div class="container">
    <h1 class="hero__title">
      <?= carbon_get_post_meta(get_the_ID(), 'hero__title'); ?>
    </h1>
    <div class="hero__bage">
      <?php foreach (carbon_get_post_meta(get_the_ID(), 'hero-bage') as $item) { ?>
        <div class="hero__bage-item">
          <img class="hero__bage-icon" src="<?= $item['hero-bage_icon']; ?>" alt="bage icon">
          <div class="hero__bage-text">
            <?= $item['hero-bage_text']; ?>
          </div>
        </div>
      <?php } ?>
    </div>
    <div class="hero__from-box">
      <?php get_template_part('template-parts/blocks/litle-form'); ?>
    </div>
  </div>
</section>