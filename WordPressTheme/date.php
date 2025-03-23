<?php get_header(); ?>

<section class="page-fv">
  <div class="page-fv__image">
    <picture>
      <source
        media="(min-width: 768px)"
        srcset="<?php echo get_template_directory_uri() ?>/assets//images/blog-page/blog-page-fv-pc.jpg" />
      <img
        src="<?php echo get_template_directory_uri() ?>/assets//images/blog-page/blog-page-fv-sp.jpg"
        alt="日付アーカイブ"
        decoding="async" />
    </picture>
  </div>
  <div class="page-fv__heading">
    <h1><?php the_archive_title(); ?></h1>
  </div>
</section>

<!-- パンくずリスト -->
<?php get_template_part('parts/breadcrumb'); ?>

<div class="page-blog layout-page-blog">
  <div class="page-blog__inner inner">
    <div class="page-blog__main blog-main">
      <div class="blog-main__inner">
        <div class="blog-cards blog-cards--2col">
          <?php if (have_posts()) : ?>
            <?php while (have_posts()) : ?>
              <?php the_post(); ?>
              <div class="blog-cards__card">
                <a href="<?php the_permalink(); ?>" class="blog-card">
                  <div class="blog-card__image">
                    <?php if (has_post_thumbnail()) : ?>
                      <img src="<?php the_post_thumbnail_url('medium'); ?>" alt="<?php the_title_attribute(); ?>" />
                    <?php else : ?>
                      <img src="<?php echo get_template_directory_uri(); ?>/assets/images/common/noimage.jpg" alt="No Image" />
                    <?php endif; ?>
                  </div>
                  <div class="blog-card__body">
                    <time class="blog-card__body-time" datetime="<?php the_time('c'); ?>"><?php the_time('Y.m/d'); ?></time>
                    <h3 class="blog-card__body-title"><?php the_title(); ?></h3>
                    <p class="blog-card__body-text">
                      <?php the_excerpt(); ?></p>
                  </div>
                </a>
              </div>
            <?php endwhile; ?>
          <?php else : ?>
            <p class="no-posts">投稿はありません。</p>
          <?php endif; ?>
        </div>

        <div class="blog-main__pagination wp-pagenavi">
          <?php wp_pagenavi(); ?>
        </div>
      </div>
    </div>

    <div class="page-blog__side">
      <?php get_sidebar(); ?>
    </div>

  </div>
</div>

<?php get_footer(); ?>