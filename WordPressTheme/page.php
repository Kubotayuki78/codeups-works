<?php get_header(); ?>
<main>
  <?php
  // プライバシーポリシーページ（スラッグ: privacypolicy）の場合
  if (is_page('privacypolicy')) : ?>
    <section class="page-fv">
      <div class="page-fv__image">
        <picture>
          <source
            media="(min-width: 768px)"
            srcset="<?php echo get_template_directory_uri() ?>/assets/images/privacy-page/privacy-page-pc.jpg" />
          <img
            src="<?php echo get_template_directory_uri() ?>/assets/images/privacy-page/privacy-page-sp.jpg"
            alt="プライバシーポリシー"
            decoding="async" />
        </picture>
      </div>
      <div class="page-fv__heading">
        <h1>Privacy Policy</h1>
      </div>
    </section>

    <!-- パンくずリスト -->
    <?php get_template_part('parts/breadcrumb'); ?>


    <div class="page-privacy layout-page-privacy">
      <div class="page-privacy__inner inner">
        <div class="page-privacy__contents">

          <?php
          $privacy_policy = get_page_by_path('privacypolicy'); // プライバシーポリシーの固定ページを取得
          if ($privacy_policy) {
            echo apply_filters('the_content', $privacy_policy->post_content);
          }
          ?>
        </div>
      </div>
    </div>

  <?php
  // 利用規約ページ（スラッグ: terms-of-service）の場合
  elseif (is_page('terms-of-service')) : ?>
    <section class="page-fv">
      <div class="page-fv__image">
        <picture>
          <source
            media="(min-width: 768px)"
            srcset="<?php echo get_template_directory_uri() ?>/assets/images/terms-page/terms-page-pc.jpg" />
          <img
            src="<?php echo get_template_directory_uri() ?>/assets/images/terms-page/terms-page-sp.jpg"
            alt="Terms of service"
            decoding="async" />
        </picture>
      </div>
      <div class="page-fv__heading">
        <h1>Terms of Service</h1>
      </div>
    </section>

    <!-- パンくずリスト -->
    <?php get_template_part('parts/breadcrumb'); ?>

    <div class="page-terms layout-page-terms">
      <div class="page-terms__inner inner">
        <div class="page-terms__content">
          <?php
          $terms_page = get_page_by_path('terms-of-service'); // 利用規約の固定ページを取得
          if ($terms_page) {
            echo apply_filters('the_content', $terms_page->post_content);
          }
          ?>
        </div>
      </div>
    </div>

  <?php else : ?>
    <!-- 通常の固定ページのコンテンツ -->
    <h1><?php the_title(); ?></h1>
    <div class="page-content">
      <?php the_content(); ?>
    </div>
  <?php endif; ?>


  <!-- contact -->
  <?php get_template_part('parts/contact'); ?>

  <?php get_footer(); ?>