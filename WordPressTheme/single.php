<?php get_header(); ?>

<main>
  <section class="page-fv">
    <div class="page-fv__image">
      <picture>
        <source
          media="(min-width: 768px)"
          srcset="<?php echo get_template_directory_uri() ?>/assets/images/blog-page/blog-page-fv-pc.jpg" />
        <img
          src="<?php echo get_template_directory_uri() ?>/assets/images/blog-page/blog-page-fv-sp.jpg"
          decoding="async"
          alt="ブログ詳細" />
      </picture>
    </div>
    <div class="page-fv__heading">
      <p>Blog</p>
    </div>
  </section>

  <!-- パンくずリスト -->
  <?php get_template_part('parts/breadcrumb'); ?>

  <?php if (have_posts()) : ?>
    <?php while (have_posts()) : ?>
      <?php the_post(); ?>
      <div
        class="page-blog page-blog--single layout-page-blog layout-page-blog--single">
        <div class="page-blog__inner inner">
          <div class="page-blog__main">
            <div class="page-blog__single single-body">
              <div class="single-body__meta">
                <time class="blog-card__body-time" datetime="<?php the_time('c'); ?>"><?php the_time('Y.m/d'); ?></time>
              </div>
              <div class="single-body__title">
                <h1><?php the_title(); ?></h1>
              </div>

              <div class="single-body__image">
                <?php if (has_post_thumbnail()) : ?>
                  <img
                    src="<?php echo get_the_post_thumbnail_url(get_the_ID(), 'full'); ?>"
                    alt="<?php the_title_attribute(); ?>"
                    width="345"
                    height="231"
                    loading="lazy" />
                <?php else : ?>
                  <img
                    src="<?php echo get_template_directory_uri(); ?>/assets/images/common/noimage.jpg"
                    alt="No image"
                    width="345"
                    height="231"
                    loading="lazy" />
                <?php endif; ?>
              </div>

              <div class="single-body__content">
                <?php the_content(); ?>
              </div>
            </div>
            <?php
            $next_post = get_next_post();
            $prev_post = get_previous_post();
            ?>

            <div class="blog-main__link page-link layout-page-link">
              <?php if ($prev_post): ?>
                <div class="page-link__prev">
                  <a
                    rel="prev"
                    aria-label="前のページ"
                    href="<?php echo esc_url(get_permalink($prev_post->ID)); ?>">

                  </a>
                </div>
              <?php endif; ?>

              <?php if ($next_post): ?>
                <div class="page-link__next">
                  <a
                    rel="next"
                    aria-label="次のページ"
                    href="<?php echo esc_url(get_permalink($next_post->ID)); ?>"></a>
                </div>
              <?php endif; ?>
            </div>
          </div>

        <?php endwhile; ?>
      <?php endif; ?>

      <?php get_sidebar(); ?>

        </div>
      </div>

      <!-- contact -->
      <?php get_template_part('parts/contact'); ?>

      <?php get_footer(); ?>