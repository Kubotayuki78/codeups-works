<?php get_header(); ?>

<section class="page-fv">
  <div class="page-fv__image">
    <picture>
      <source
        media="(min-width: 768px)"
        srcset="<?php echo get_template_directory_uri() ?>/assets/images/voice-page/voice-page-pc.jpg" />
      <img
        src="<?php echo get_template_directory_uri() ?>/assets/images/voice-page/voice-page-sp.jpg"
        alt="お客様の声"
        decoding="async" />
    </picture>
  </div>
  <div class="page-fv__heading">
    <h1>Voice</h1>
  </div>
</section>

<!-- パンくずリスト -->
<?php get_template_part('parts/breadcrumb') ?>

<div class="page-voice layout-page-voice">
  <div class="page-voice__inner inner">
    <div class="page-voice__tags page-tags">
      <!-- ALL タグ（すべての投稿を表示するリンク） -->
      <a class="page-tags__tag page-tag tag-active" href="<?php echo get_post_type_archive_link('campaign'); ?>">ALL</a>

      <?php
      // カスタムタクソノミー（スラッグ: campaign-category）のタームを取得
      $terms = get_terms(array(
        'taxonomy'   => 'voice-category', // スラッグを変更
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

    <div class="page-voice__cards">
      <div class="voice-cards">
        <?php if (have_posts()) : ?>
          <?php while (have_posts()) : the_post(); ?>
            <div class="voice-cards__card voice-card">
              <div class="voice-card__head">
                <div class="voice-card__head-body">
                  <div class="voice-card__head-meta">
                    <?php
                    // ACFで作成したカスタムフィールド「age」と「gender」を取得
                    $age_group = trim(get_field('age')); // 年代
                    $gender = trim(get_field('gender')); // 性別

                    // 出力するテキストの準備
                    $output = '';
                    if ($age_group) {
                      $output .= esc_html($age_group); // 年代を追加
                    }
                    if ($gender) {
                      $output .= $age_group ? '(' . esc_html($gender) . ')' : esc_html($gender); // 年代がある場合は「（性別）」、ない場合は「性別」のみ
                    }
                    if ($output) :
                    ?>
                      <p class="voice-card__head-body-age"><?php echo $output; ?></p>
                    <?php endif; ?>

                    <?php
                    // カスタムタクソノミー「voice-category」の最初のカテゴリーを取得
                    $terms = get_the_terms(get_the_ID(), 'voice-category');
                    if (!empty($terms) && !is_wp_error($terms)) :
                      $term = array_shift($terms);
                    ?>
                      <span class="voice-card__head-body-tag"><?php echo esc_html($term->name); ?></span>
                    <?php endif; ?>
                  </div>
                  <h3 class="voice-card__head-body-title">
                    <?php the_title(); ?>
                  </h3>
                </div>
                <div class="voice-card__head-image colorbox js-colorbox">
                  <?php if (has_post_thumbnail()) : ?>
                    <img src="<?php the_post_thumbnail_url('medium'); ?>" alt="お客様の顔写真">
                  <?php else : ?>
                    <img src="<?php echo get_template_directory_uri(); ?>/assets/images/common/noimage.jpg" alt="No Image">
                  <?php endif; ?>
                </div>
              </div>

              <div class="voice-card__body">
                <p><?php the_content(); ?></p>
              </div>
            </div>
          <?php endwhile; ?>
        <?php else : ?>
          <p>現在、口コミはありません。</p>
        <?php endif; ?>

      </div>
    </div>

    <div class="page-voice__pagination wp-pagenavi">
      <?php wp_pagenavi(); ?>
    </div>
  </div>
</div>

<?php get_footer(); ?>