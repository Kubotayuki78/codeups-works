<?php get_header(); ?>

<main>
  <div class="page-404">

    <!-- breadcrumb -->
    <?php get_template_part('parts/breadcrumb'); ?>

    <div class="page-404__inner inner">
      <div class="page-404__contents">
        <h1 class="page-404__title">404</h1>
        <div class="page-404__text">
          <p>申し訳ありません。<br />お探しのページが見つかりません。</p>
        </div>
        <div class="page-404__button">
          <a href="<?php echo esc_url(home_url('/')); ?>" class="btn btn--white">
            <span>Page TOP</span>
          </a>
        </div>
      </div>
    </div>
  </div>
</main>

<?php get_footer(); ?>