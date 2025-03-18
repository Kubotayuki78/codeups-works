<?php get_header(); ?>

<main>
  <section class="page-fv">
    <div class="page-fv__image">
      <picture>
        <source
          media="(min-width: 768px)"
          srcset="<?php echo get_template_directory_uri() ?>/assets/images/contact-page/contact-fv-pc.jpg" />
        <img
          src="<?php echo get_template_directory_uri() ?>/assets/images/contact-page/contact-fv-sp.jpg"
          alt="コンタクト"
          decoding="async" />
      </picture>
    </div>
    <div class="page-fv__heading">
      <h1>Contact</h1>
    </div>
  </section>


  <!-- パンくずリスト -->
  <?php get_template_part('parts/breadcrumb'); ?>

  <div class="page-contact layout-page-contact">
    <div class="page-contact__inner inner">
      <?php echo do_shortcode('[contact-form-7 id="ead0847" title="お問い合わせ"]'); ?>
    </div>
  </div>

</main>

<?php get_footer(); ?>