<?php get_header(); ?>
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
  <div class="page-campaign__inner inner">
    <div class="page-campaign__tags page-tags">
      <!-- ALL タグ（すべての投稿を表示するリンク） -->
      <a class="page-tags__tag page-tag tag-active" href="<?php echo get_post_type_archive_link('campaign'); ?>">ALL</a>

      <?php
      // カスタムタクソノミー（スラッグ: campaign-category）のタームを取得
      $terms = get_terms(array(
        'taxonomy'   => 'campaign-category', // スラッグを変更
        'hide_empty' => false, // 投稿がないカテゴリーは非表示
      ));

      // 取得したターム（カテゴリー）がある場合
      if (!empty($terms) && !is_wp_error($terms)) :
        foreach ($terms as $term) :
      ?>
          <a href="<?php echo esc_url(get_term_link($term, 'campaign-category')); ?>" class="page-tags__tag page-tag">
            <?php echo esc_html($term->name); ?>
          </a>
      <?php
        endforeach;
      endif;
      ?>
    </div>

    <div class="page-campaign__cards">
      <div class="page-campaign-cards">
        <?php if (have_posts()) : ?>
          <?php while (have_posts()) : ?>
            <?php the_post(); ?>
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
              <div
                class="campaign-card__foot campaign-card__foot--page campaign-card__padding24">
                <p class="campaign-card__text campaign-card__text--page">
                  全部コミコミ(お一人様)
                </p>
                <?php
                $campaign_price = get_field('campaign_price');
                $before = $campaign_price['before'] ?? null;
                $after = $campaign_price['after'] ?? null;
                ?>

                <?php if ($before || $after) : ?>
                  <div class="campaign-card__price">
                    <?php if ($before) : ?>
                      <p class="campaign-card__price-before">
                        ¥<?php echo number_format($before); ?>
                      </p>
                    <?php endif; ?>
                    <?php if ($after) : ?>
                      <p class="campaign-card__price-after">
                        ¥<?php echo number_format($after); ?>
                      </p>
                    <?php endif; ?>
                  </div>
                <?php endif; ?>
                <div class="campaign-card__page-block u-desktop">
                  <p class="campaign-card__page-description">
                    <?php the_content(); ?></p>
                  <?php
                  $campaign_period = get_field('campaign_period');
                  $start = $campaign_period['period_start'] ?? null;
                  $end = $campaign_period['period_end'] ?? null;

                  if ($start && $end) :
                    // 開始日：年/月/日
                    $start_date = date('Y/n/j', strtotime($start));
                    // 終了日：月/日（年は省略）
                    $end_date = date('n/j', strtotime($end));
                  ?>
                    <p class="campaign-card__page-span">
                      <?php echo esc_html($start_date . '‐' . $end_date); ?>
                    </p>
                  <?php endif; ?>
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