<?php get_header(); ?>
<main>
  <section class="page-fv">
    <div class="page-fv__image">
      <picture>
        <source
          media="(min-width: 768px)"
          srcset="<?php echo get_template_directory_uri() ?>/assets/images/campaign-page/campaign-fv-pc.jpg" />
        <img
          src="<?php echo get_template_directory_uri() ?>/assets/images/campaign-page/campaign-fv-sp.jpg"
          alt="キャンペーン"
          decoding="async" />
      </picture>
    </div>
    <div class="page-fv__heading">
      <h1>Campaign</h1>
    </div>
  </section>

  <!-- パンくずリスト -->
  <?php get_template_part('parts/breadcrumb') ?>

  <div class="page-campaign layout-page-campaign">




    <div class="page-campaign layout-page-campaign">
      <div class="page-campaign__inner inner">

        <!-- カテゴリーフィルター -->
        <div class="page-campaign__tags page-tags">
          <!-- ALL タグ（すべての投稿を表示するリンク） -->
          <a class="page-tags__tag page-tag <?php if (!is_tax()) echo 'tag-active'; ?>" href="<?php echo get_post_type_archive_link('campaign'); ?>">ALL</a>

          <?php
          // カスタムタクソノミー（スラッグ: campaign-category）のタームを取得
          $terms = get_terms(array(
            'taxonomy'   => 'campaign-category', // スラッグを変更
            'hide_empty' => false, // 投稿がないカテゴリーも表示
          ));

          // 取得したターム（カテゴリー）がある場合
          if (!empty($terms) && !is_wp_error($terms)) :
            foreach ($terms as $term) :
          ?>
              <a href="<?php echo esc_url(get_term_link($term, 'campaign-category')); ?>" class="page-tags__tag page-tag <?php if (is_tax('campaign-category', $term->slug)) echo 'tag-active'; ?>">
                <?php echo esc_html($term->name); ?>
              </a>
          <?php endforeach;
          endif; ?>
        </div>

        <!-- キャンペーン一覧 -->
        <div class="page-campaign__cards">
          <div class="page-campaign-cards">
            <?php if (have_posts()) : ?>
              <?php while (have_posts()) : the_post(); ?>
                <div class="page-campaign-cards__card campaign-card">
                  <figure class="campaign-card__image campaign-card__image--page">
                    <?php if (has_post_thumbnail()) : ?>
                      <img src="<?php the_post_thumbnail_url('full'); ?>" alt="<?php the_title_attribute(); ?>" width="400" height="396" />
                    <?php else : ?>
                      <img src="<?php echo get_template_directory_uri(); ?>/assets/images/common/noimage.jpg" alt="No Image" width="400" height="396" />
                    <?php endif; ?>
                  </figure>
                  <div class="campaign-card__body campaign-card__padding24">
                    <?php
                    // カスタムタクソノミー（campaign-category）の最初のタームを取得
                    $terms = get_the_terms(get_the_ID(), 'campaign-category');
                    if (!empty($terms) && !is_wp_error($terms)) :
                      $term = array_shift($terms); // 最初のカテゴリーを取得
                    ?>
                      <span class="campaign-card__tag"><?php echo esc_html($term->name); ?></span>
                    <?php endif; ?>
                    <h3 class="campaign-card__title campaign-card__title--large">
                      <?php the_title(); ?>
                    </h3>
                  </div>
                  <div class="campaign-card__foot campaign-card__foot--page campaign-card__padding24">
                    <p class="campaign-card__text campaign-card__text--page">
                      全部コミコミ(お一人様)
                    </p>
                    <div class="campaign-card__price campaign-card__price--page">
                      <p class="campaign-card__price-before">¥<?php the_field('before'); ?></p>
                      <p class="campaign-card__price-after">¥<?php the_field('after'); ?></p>
                    </div>
                    <div class="campaign-card__page-block u-desktop">
                      <p class="campaign-card__page-description">
                        <?php the_content(); ?></p>
                      <p class="campaign-card__page-span"><?php the_field('date'); ?></p>
                      <p class="campaign-card__page-text">
                        ご予約・お問い合わせはコチラ
                      </p>
                      <div class="campaign-card__button">
                        <a href="<?php echo home_url('/contact/'); ?>" class="btn">
                          <span>Contact us</span>
                        </a>
                      </div>
                    </div>
                  </div>
                </div>
              <?php endwhile; ?>
            <?php endif; ?>
          </div>
        </div>

        <div class="page-campaign__pagination wp-pagenavi">
          <?php wp_pagenavi(); ?>
        </div>
      </div>
    </div>

    <?php get_footer(); ?>