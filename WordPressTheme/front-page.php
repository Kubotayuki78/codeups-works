<?php get_header(); ?>

<main>
  <section class="mv">
    <div class="mv__inner">
      <div class="swiper js-fvSwiper">
        <div class="swiper-wrapper">
          <?php
          // SCFの繰り返しフィールドから画像データを取得
          $mv_images = SCF::get('mv_images'); // フィールド名は管理画面の設定に合わせる

          if (!empty($mv_images)) :
            foreach ($mv_images as $image) :
              $pc_img = wp_get_attachment_url($image['pc_img']); // PC用画像
              $sp_img = wp_get_attachment_url($image['sp_img']); // スマホ用画像
              $image_alt = !empty($image['image_alt']) ? $image['image_alt'] : '画像の説明';
          ?>
              <div class="swiper-slide">
                <div class="mv__image">
                  <picture>
                    <source media="(min-width: 768px)" srcset="<?php echo esc_url($pc_img); ?>" />
                    <img src="<?php echo esc_url($sp_img); ?>" alt="<?php echo esc_attr($image_alt); ?>" decoding="async" />
                  </picture>
                </div>
              </div>
          <?php
            endforeach;
          endif;
          ?>
        </div>
      </div>

      <div class="mv__heading">
        <h2 class="mv__title">DIVING</h2>
        <p class="mv__subtitle">into the ocean</p>
      </div>
    </div>
  </section>

  <section class="campaign top-campaign">
    <div class="campaign__heading heading">
      <p class="heading__title-en">campaign</p>
      <h2 class="heading__title-ja">キャンペーン</h2>
    </div>
    <div class="campaign__inner inner">
      <!-- 前後の矢印 -->
      <div class="campaign-swiper-arrow">
        <div class="swiper-button-prev campaign-swiper-arrow__prev"></div>
        <div class="swiper-button-next campaign-swiper-arrow__next"></div>
      </div>
      <div class="campaign__cards">
        <div class="swiper campaign-cards js-cardSwiper">
          <div class="swiper-wrapper">
            <?php
            $args = array(
              'post_type'      => 'campaign', // カスタム投稿タイプ
              'posts_per_page' => 5, // 表示する投稿数
              'orderby'        => 'date', // 投稿の並び順
              'order'          => 'DESC' // 降順で表示
            );
            $campaign_query = new WP_Query($args);

            if ($campaign_query->have_posts()) :
              while ($campaign_query->have_posts()) : $campaign_query->the_post();
            ?>
                <div class="swiper-slide campaign-cards__card">
                  <div class="campaign-card">
                    <figure class="campaign-card__image">
                      <?php if (has_post_thumbnail()) : ?>
                        <img src="<?php the_post_thumbnail_url('full'); ?>" alt="<?php the_title_attribute(); ?>" width="400" height="396" />
                      <?php else : ?>
                        <img src="<?php echo get_template_directory_uri(); ?>/assets/images/common/noimage.jpg" alt="No Image" width="400" height="396" />
                      <?php endif; ?>
                    </figure>
                    <div class="campaign-card__body">
                      <?php
                      // タクソノミー「campaign-category」の最初のカテゴリーを取得
                      $terms = get_the_terms(get_the_ID(), 'campaign-category');
                      if (!empty($terms) && !is_wp_error($terms)) :
                        $term = array_shift($terms);
                      ?>
                        <span class="campaign-card__tag"><?php echo esc_html($term->name); ?></span>
                      <?php endif; ?>
                      <h3 class="campaign-card__title"><?php the_title(); ?></h3>
                    </div>
                    <div class="campaign-card__foot">
                      <p class="campaign-card__text">全部コミコミ(お一人様)</p>
                      <div class="campaign-card__price">
                        <p class="campaign-card__price-before">
                          <?php echo esc_html(get_field('before')); ?>円
                        </p>
                        <p class="campaign-card__price-after">
                          <?php echo esc_html(get_field('after')); ?>円
                        </p>
                      </div>
                    </div>
                  </div>
                </div>
            <?php
              endwhile;
              wp_reset_postdata();
            else :
              echo '<p>現在、キャンペーン情報はありません。</p>';
            endif;
            ?>
          </div>
        </div>
      </div>
    </div>
    <div class="campaign__button">
      <a href="<?php echo esc_url(get_post_type_archive_link('campaign')); ?>" class="btn">
        <span>View more</span>
      </a>
    </div>
  </section>

  <section class="about top-about">
    <div class="about__inner inner">
      <div class="about__heading heading">
        <p class="heading__title-en">about us</p>
        <h2 class="heading__title-ja">私たちについて</h2>
      </div>
      <div class="about__images">
        <div class="about__image1">
          <img
            src="<?php echo get_template_directory_uri() ?>/assets/images/common/aboutus-1.jpg"
            alt="海の中の黄色い魚の画像" />
        </div>
        <div class="about__image2">
          <img
            src="<?php echo get_template_directory_uri() ?>/assets/images/common/aboutus-2.jpg"
            alt="瓦屋根とシーサーの画像" />
        </div>
      </div>

      <div class="about__content">
        <h3 class="about__title">
          Dive into<br />
          the Ocean
        </h3>
        <div class="about__body">
          <div class="about__text">
            <p>
              ここにテキストが入ります。ここにテキストが入ります。ここにテキストが入ります。ここにテキストが入ります。<br />ここにテキストが入ります。ここにテキストが入ります。ここにテキストが入ります。ここにテキストが入ります。ここにテキスト<span
                class="about__text-br">が入ります。</span>
            </p>
          </div>
          <div class="about__button">
            <a href="<?php echo esc_url(get_permalink(get_page_by_path('about-us'))); ?>" class="btn">
              <span>View more</span>
            </a>
          </div>
        </div>
      </div>
    </div>
  </section>

  <section class="info top-info">
    <div class="info__inner inner">
      <div class="info__heading heading">
        <p class="heading__title-en">information</p>
        <h2 class="heading__title-ja">ダイビング情報</h2>
      </div>
      <div class="info__content">
        <div class="info__image colorbox js-colorbox">
          <img
            src="<?php echo get_template_directory_uri() ?>/assets/images/common/info.jpg"
            alt="サンゴ礁の黄色い魚の画像" />
        </div>
        <div class="info__body">
          <h3 class="info__body-title">ライセンス講習</h3>
          <p class="info__body-text">
            当店はダイビングライセンス（Cカード）世界最大の教育機関PADIの「正規店」として店舗登録されています。<br />正規登録店として、安心安全に初めての方でも安心安全にライセンス取得をサポート致します。
          </p>
          <div class="info__button">
            <a href="<?php echo esc_url(get_permalink(get_page_by_path('information'))); ?>" class="btn">
              <span>View more</span>
            </a>
          </div>
        </div>
      </div>
    </div>
  </section>

  <section class="blog top-blog">
    <div class="blog__inner inner">
      <div class="blog__heading heading heading--white">
        <p class="heading__title-en heading__title-en--white">blog</p>
        <h2 class="heading__title-ja heading__title-ja--white">ブログ</h2>
      </div>
      <div class="blog__cards blog-cards">
        <?php
        $args = array(
          'post_type'      => 'post', // 通常の投稿を取得
          'posts_per_page' => 3, // 最新3件を表示
          'orderby'        => 'date', // 投稿日順
          'order'          => 'DESC' // 新しい順
        );
        $blog_query = new WP_Query($args);

        if ($blog_query->have_posts()) :
          while ($blog_query->have_posts()) : $blog_query->the_post();
        ?>
            <div class="blog-cards__card">
              <a href="<?php the_permalink(); ?>" class="blog-card">
                <div class="blog-card__image">
                  <?php if (has_post_thumbnail()) : ?>
                    <img src="<?php the_post_thumbnail_url('full'); ?>" alt="<?php the_title_attribute(); ?>" />
                  <?php else : ?>
                    <img src="<?php echo get_template_directory_uri(); ?>/assets/images/common/noimage.jpg" alt="No Image" />
                  <?php endif; ?>
                </div>
                <div class="blog-card__body">
                  <time class="blog-card__body-time" datetime="<?php echo get_the_date('Y-m-d'); ?>">
                    <?php echo get_the_date('Y.m/d'); ?>
                  </time>
                  <h3 class="blog-card__body-title"><?php the_title(); ?></h3>
                  <p class="blog-card__body-text"><?php echo wp_trim_words(get_the_excerpt(), 86, ''); ?></p>
                </div>
              </a>
            </div>
        <?php
          endwhile;
          wp_reset_postdata();
        else :
          echo '<p>現在、ブログ記事はありません。</p>';
        endif;
        ?>
      </div>
      <div class="blog__button">
        <a href="<?php echo esc_url(get_post_type_archive_link('post')); ?>" class="btn">
          <span>View more</span>
        </a>
      </div>
    </div>
  </section>

  <section class="voice top-voice">
    <div class="voice__inner inner">
      <div class="voice__heading heading">
        <p class="heading__title-en">voice</p>
        <h2 class="heading__title-ja">お客様の声</h2>
      </div>
      <div class="voice__cards voice-cards">
        <?php
        $args = array(
          'post_type'      => 'voice', // カスタム投稿タイプ「voice」を取得
          'posts_per_page' => 2, // 最新2件を表示（必要に応じて変更可能）
          'orderby'        => 'date', // 投稿日順
          'order'          => 'DESC' // 新しい順
        );
        $voice_query = new WP_Query($args);

        if ($voice_query->have_posts()) :
          while ($voice_query->have_posts()) : $voice_query->the_post();
            $age_group = get_field('age'); // ACFで作成した「年齢層」フィールド
            $gender = get_field('gender'); // ACFで作成した「性別」フィールド
            $terms = get_the_terms(get_the_ID(), 'voice-category'); // カスタムタクソノミー「voice-category」を取得
            $category = !empty($terms) && !is_wp_error($terms) ? esc_html($terms[0]->name) : ''; // カテゴリー名
            $image = has_post_thumbnail() ? get_the_post_thumbnail_url(get_the_ID(), 'full') : get_template_directory_uri() . '/assets/images/common/noimage.jpg';
        ?>
            <div class="voice-cards__card voice-card">
              <div class="voice-card__head">
                <div class="voice-card__head-body">
                  <div class="voice-card__head-meta">
                    <p class="voice-card__head-body-age"><?php echo esc_html($age_group . '(' . $gender . ')'); ?></p>
                    <span class="voice-card__head-body-tag"><?php echo esc_html($category); ?></span>
                  </div>
                  <h3 class="voice-card__head-body-title"><?php the_title(); ?></h3>
                </div>
                <div class="voice-card__head-image colorbox js-colorbox">
                  <img src="<?php echo esc_url($image); ?>" alt="<?php the_title_attribute(); ?>" />
                </div>
              </div>
              <div class="voice-card__body">
                <p>
                  <?php
                  $excerpt = get_the_content();
                  if (empty($excerpt)) {
                    // 抜粋がない場合、本文から取得
                    $excerpt = wp_strip_all_tags(get_the_content());
                  }
                  echo wp_trim_words($excerpt, 180, '');
                  ?>
                </p>
              </div>
            </div>
        <?php
          endwhile;
          wp_reset_postdata();
        else :
          echo '<p>現在、口コミはありません。</p>';
        endif;
        ?>
      </div>
      <div class="voice__button">
        <a href="<?php echo esc_url(get_post_type_archive_link('voice')); ?>" class="btn">
          <span>View more</span>
        </a>
      </div>
    </div>
  </section>

  <section class="price top-price">
    <div class="price__inner inner">
      <div class="price__heading heading">
        <p class="heading__title-en">price</p>
        <h2 class="heading__title-ja">料金一覧</h2>
      </div>
      <div class="price__content">
        <div class="price__head-image">
          <img
            src="<?php echo get_template_directory_uri() ?>/assets/images/common/price-sp.jpg"
            alt="泳ぐウミガメの画像" />
        </div>
        <div class="price__lists price-lists">
          <?php
          // 価格情報を管理する固定ページのIDを取得
          $price_page = get_page_by_path('price'); // 固定ページのスラッグが'price'の場合
          $price_page_id = $price_page ? $price_page->ID : null;

          if ($price_page_id) {
            // カテゴリごとの価格情報を取得
            for ($i = 1; $i <= 4; $i++) {
              $price_title = SCF::get('price_title' . $i, $price_page_id); // カテゴリ名
              $price_items = SCF::get('price-items' . $i, $price_page_id); // 繰り返しフィールド

              if (!empty($price_title) && !empty($price_items)) {
                echo '<div class="price-lists__list price-list">';
                echo '<h3 class="price-list__title">' . esc_html($price_title) . '</h3>';
                echo '<ul class="price-list__content">';
                foreach ($price_items as $item) {
                  $course = !empty($item['price_course' . $i]) ? esc_html($item['price_course' . $i]) : '';
                  $number = !empty($item['price_number' . $i]) ? esc_html($item['price_number' . $i]) : '';
                  if ($course && $number) {
                    echo '<li>' . $course . '<span>' . $number . '</span></li>';
                  }
                }
                echo '</ul>';
                echo '</div>';
              }
            }
          } else {
            echo '<p>価格情報のページが見つかりません。</p>';
          }
          ?>
        </div>
        <div class="price__pc-image colorbox">
          <img
            src="<?php echo get_template_directory_uri() ?>/assets/images/common/price-pc.jpg"
            alt="サンゴ礁の赤い魚の画像" />
        </div>
      </div>
      <div class="price__button">
        <a href="<?php echo esc_url(get_permalink(get_page_by_path('price'))); ?>" class="btn">
          <span>View more</span>
        </a>
      </div>
    </div>
  </section>
  <!-- contact -->
  <?php get_template_part('parts/contact'); ?>

  <?php get_footer(); ?>