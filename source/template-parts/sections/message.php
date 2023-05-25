<section class="message section">
  <div class="message__wrapper">
    <?php get_template_part('template-parts/blocks/big-form') ?>
    <img class="message__img" src="<?= carbon_get_post_meta(get_the_ID(), 'message_img'); ?>" alt="message image">
  </div> 
</section>