<?php get_header(); ?>

<main>
  <section class="page-fv">
    <div class="page-fv__image">
      <picture>
        <source
          media="(min-width: 768px)"
          srcset="<?php echo get_template_directory_uri() ?>/assets/images/about-page/aboutus-fv-pc.jpg" />
        <img
          src="<?php echo get_template_directory_uri() ?>/assets/images/about-page/aboutus-fv-sp.jpg"
          alt="私たちについて"
          decoding="async" />
      </picture>
    </div>
    <div class="page-fv__heading">
      <h1>About us</h1>
    </div>
  </section>


  <!-- パンくずリスト -->
  <?php get_template_part('parts/breadcrumb'); ?>

  <section class="page-about layout-page-about">
    <div class="page-about__inner inner">
      <div class="page-about__images">
        <div class="page-about__image1">
          <img
            src="<?php echo get_template_directory_uri() ?>/assets/images/common/aboutus-1.jpg"
            alt="海の中の黄色い魚の画像" />
        </div>
        <div class="page-about__image2">
          <img
            src="<?php echo get_template_directory_uri() ?>/assets/images/common/aboutus-2.jpg"
            alt="瓦屋根とシーサーの画像" />
        </div>
        <h2 class="page-about__title page-about__title--absolute u-mobile">
          Dive into<br />
          the Ocean
        </h2>
      </div>
      <div class="page-about__content">
        <h3 class="page-about__title u-desktop">
          Dive into<br />
          the Ocean
        </h3>
        <div class="page-about__text">
          <p>
            ここにテキストが入ります。ここにテキストが入ります。ここにテキストが入ります。ここにテキストが入ります。<br />ここにテキストが入ります。ここにテキストが入ります。ここにテキストが入ります。ここにテキストが入ります。ここにテキストが入ります。
          </p>
        </div>
      </div>
    </div>
  </section>

  <div class="gallery layout-gallery">
    <div class="gallery__inner inner">
      <div class="gallery__heading heading">
        <p class="heading__title-en">gallery</p>
        <h2 class="heading__title-ja">フォト</h2>
      </div>


      <div class="gallery__items">
        <?php
        // SCFからギャラリー画像リストを取得
        $gallery_images = SCF::get('gallery_images', get_the_ID());

        // 画像があるかどうかチェック
        if (!empty($gallery_images)) :
          foreach ($gallery_images as $image) :
            // 各画像のPC用URLとSP用URLを取得
            $image_pc = wp_get_attachment_image_url($image['sp_img'], 'full');
            $image_sp = wp_get_attachment_image_url($image['pc_img'], 'full');

            // 画像がない場合はスキップ
            if (empty($image_pc) && empty($image_sp)) {
              continue;
            }
        ?>
            <div class="gallery__item js-modal-gallery">
              <picture>
                <source srcset="<?php echo esc_url($image_sp); ?>" media="(max-width:768px)" />
                <img src="<?php echo esc_url($image_pc); ?>" alt="ギャラリー画像" />
              </picture>
            </div>
        <?php
          endforeach;
        endif;
        ?>
      </div>

      <div class="modal">
        <!-- モーダル本体 -->
        <div class="modal__wrapper">
          <div class="modal__layer"></div>
          <div class="modal__container">
            <!-- モーダル内のコンテンツ -->
            <div class="modal__content"></div>
            <!-- / モーダル内のコンテンツ -->
          </div>
        </div>
        <!-- / モーダル本体 -->
      </div>
    </div>
  </div>

  <!-- contact -->
  <?php get_template_part('parts/contact'); ?>


  <?php get_footer(); ?>