<aside class="page-blog__side blog-side">
  <div class="blog-side__inner">
    <div class="blog-side__items">
      <div class="blog-side__item side-popular<?php echo is_single() ? ' blog-side__item--single' : ''; ?>">
        <div class="side-popular__head side-item-heading">
          <h2>人気記事</h2>
        </div>
        <div class="side-popular__items">
          <?php
          $popular_posts = new WP_Query(array(
            'posts_per_page' => 3,
            'meta_key' => 'post_views_count',
            'orderby' => 'meta_value_num',
            'order' => 'DESC'
          ));

          if ($popular_posts->have_posts()) :
            while ($popular_posts->have_posts()) : $popular_posts->the_post();
          ?>
              <div class="side-popular__item">
                <a href="<?php the_permalink(); ?>" class="popular-card">
                  <div class="popular-card__image">
                    <?php if (has_post_thumbnail()) : ?>
                      <?php the_post_thumbnail('thumbnail', ['class' => 'popular-card__image']); ?>
                    <?php else : ?>
                      <img src="<?php echo get_template_directory_uri(); ?>/assets/images/common/noimage.jpg" alt="No Image">
                    <?php endif; ?>
                  </div>
                  <div class="popular-card__body">
                    <time class="popular-card__date" datetime="<?php echo get_the_date('Y-m-d'); ?>">
                      <?php echo get_the_date('Y.m/d'); ?>
                    </time>
                    <h4 class="popular-card__text"><?php the_title(); ?></h4>
                  </div>
                </a>
              </div>
          <?php
            endwhile;
            wp_reset_postdata();
          endif;
          ?>
        </div>
      </div>
      <div class="blog-side__item side-voice">
        <div class="side-voice__head side-item-heading">
          <h2>口コミ</h2>
        </div>
        <div class="side-voice__items">
          <?php
          $voice_query = new WP_Query(array(
            'post_type'      => 'voice',
            'posts_per_page' => 1, // 表示する口コミ数
            'orderby'        => 'date',
            'order'          => 'DESC'
          ));

          if ($voice_query->have_posts()) :
            while ($voice_query->have_posts()) : $voice_query->the_post();
              $age_group = trim(get_field('age')); // ACFで年齢を取得
              $gender = trim(get_field('gender')); // ACFで性別を取得

              // 年齢と性別をフォーマット
              $output = '';
              if ($age_group) {
                $output .= esc_html($age_group);
              }
              if ($gender) {
                $output .= $age_group ? '(' . esc_html($gender) . ')' : esc_html($gender);
              }
          ?>
              <div class="side-voice__item">
                <a href="<?php echo home_url('/voice/'); ?>" class="side-voice-link">

                  <div class="side-voice-link__image">
                    <?php if (has_post_thumbnail()) : ?>
                      <img src="<?php the_post_thumbnail_url('medium'); ?>" alt="<?php the_title_attribute(); ?>" class="side-voice-link__image">
                    <?php else : ?>
                      <img src="<?php echo get_template_directory_uri(); ?>/assets/images/common/noimage.jpg" alt="No Image">
                    <?php endif; ?>
                  </div>
                  <div class="side-voice-link__body">
                    <?php if ($output) : ?>
                      <p class="side-voice-link__age"><?php echo $output; ?></p>
                    <?php endif; ?>
                    <h4 class="side-voice-link__title"><?php the_title(); ?></h4>
                  </div>
                </a>
              </div>
            <?php
            endwhile;
            wp_reset_postdata();
          else :
            ?>
            <p class="no-voice">現在、口コミはありません。</p>
          <?php endif; ?>
        </div>
        <div class="side-voice__button">
          <a href="<?php echo get_post_type_archive_link('voice'); ?>" class="btn"><span>View more</span></a>
        </div>
      </div>
      <div class="blog-side__item side-campaign">
        <div class="side-campaign__head side-item-heading">
          <h2>キャンペーン</h2>
        </div>
        <div class="side-campaign__items page-campaign-cards__card page-campaign-cards__card--side">
          <?php
          $args = array(
            'post_type'      => 'campaign',
            'posts_per_page' => 2, // 表示する投稿数
            'orderby'        => 'date',
            'order'          => 'DESC'
          );
          $campaign_query = new WP_Query($args);
          if ($campaign_query->have_posts()) :
            while ($campaign_query->have_posts()) : $campaign_query->the_post();
          ?>
              <a href="<?php echo get_post_type_archive_link('campaign'); ?>" class="campaign-card">
                <figure class="campaign-card__image campaign-card__image--side">
                  <?php if (has_post_thumbnail()) : ?>
                    <img src="<?php the_post_thumbnail_url('medium'); ?>" alt="<?php the_title(); ?>" width="400" height="396" />
                  <?php else : ?>
                    <img src="<?php echo get_template_directory_uri(); ?>/assets/images/common/noimage.jpg" alt="No Image" width="400" height="396" />
                  <?php endif; ?>
                </figure>
                <div class="campaign-card__body campaign-card__padding24 campaign-card__body--side">
                  <h3 class="campaign-card__title campaign-card__title--center">
                    <?php the_title(); ?>
                  </h3>
                </div>
                <div class="campaign-card__foot campaign-card__padding24 campaign-card__foot--side">
                  <p class="campaign-card__text campaign-card__text--side">全部コミコミ(お一人様)</p>
                  <!-- ここが表示されない -->
                  <div class="campaign-card__price">
                    <p class="campaign-card__price-before campaign-card__price-before--side">
                      ¥<?php the_field('before'); ?>
                    </p>
                    <p class="campaign-card__price-after campaign-card__price-after--side">
                      ¥<?php the_field('after'); ?>
                    </p>
                  </div>
                  <!-- ここが表示されない -->
                </div>
              </a>
            <?php endwhile;
            wp_reset_postdata();
          else : ?>
            <p>現在、キャンペーンはありません。</p>
          <?php endif; ?>
        </div>
        <div class="side-campaign__button">
          <a href="<?php echo get_post_type_archive_link('campaign'); ?>" class="btn"><span>View more</span></a>
        </div>
      </div>
      <div class="blog-side__item side-archive">
        <div class="side-archive__head side-item-heading">
          <h2>アーカイブ</h2>
        </div>

        <ul class="side-archive__menu">
          <?php
          // 年ごとのアーカイブを取得
          global $wpdb;
          $years = $wpdb->get_results("
        SELECT DISTINCT YEAR(post_date) AS year 
        FROM $wpdb->posts 
        WHERE post_status = 'publish' AND post_type = 'post' 
        ORDER BY year DESC
    ");

          if ($years) :
            foreach ($years as $year) :
          ?>
              <li class="side-archive__lists">
                <span class="side-archive__year"><?php echo esc_html($year->year); ?></span>
                <ul class="side-archive__list">
                  <?php
                  // 特定の年の月ごとのアーカイブを取得
                  $months = $wpdb->get_results($wpdb->prepare("
                    SELECT DISTINCT MONTH(post_date) AS month 
                    FROM $wpdb->posts 
                    WHERE post_status = 'publish' AND post_type = 'post' 
                    AND YEAR(post_date) = %d 
                    ORDER BY month DESC
                ", $year->year));

                  foreach ($months as $month) :
                    $month_name = date("n月", mktime(0, 0, 0, $month->month, 1)); // "3月", "2月" など
                    $archive_link = get_month_link($year->year, $month->month);
                  ?>
                    <li class="side-archive__month">
                      <a href="<?php echo esc_url($archive_link); ?>"><?php echo esc_html($month_name); ?></a>
                    </li>
                  <?php endforeach; ?>
                </ul>
              </li>
            <?php
            endforeach;
          else :
            ?>
            <li class="side-archive__lists">アーカイブはありません。</li>
          <?php endif; ?>
        </ul>

      </div>
    </div>
  </div>
</aside>