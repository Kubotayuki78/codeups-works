<?php get_header(); ?>

<section class="page-fv">
  <div class="page-fv__image">
    <picture>
      <source
        media="(min-width: 768px)"
        srcset="<?php echo get_template_directory_uri(); ?>/assets/images/common/page-pc.jpg" />
      <img
        src="<?php echo get_template_directory_uri(); ?>/assets/images/common/page-sp.jpg"
        alt="<?php the_title(); ?>"
        decoding="async" />
    </picture>
  </div>

  <div class="page-fv__heading">
    <h1>
      <?php
      if (is_page('privacypolicy')) {
        echo 'Privacy Policy';
      } elseif (is_page('terms-of-service')) {
        echo 'Terms of Service';
      } else {
        the_title();
      }
      ?>
    </h1>
  </div>
</section>

<!-- パンくずリスト（共通） -->
<?php get_template_part('parts/breadcrumb'); ?>

<?php
// 表示するコンテンツの変数を準備
$content = '';

// 条件によって取得するコンテンツを変える
if (is_page('privacypolicy')) {
  $privacy = get_page_by_path('privacypolicy');
  if ($privacy) {
    $content = apply_filters('the_content', $privacy->post_content);
  }
} elseif (is_page('terms-of-service')) {
  $terms = get_page_by_path('terms-of-service');
  if ($terms) {
    $content = apply_filters('the_content', $terms->post_content);
  }
} else {
  // 通常のページ
  ob_start();
  the_content();
  $content = ob_get_clean();
}
?>

<!-- 共通レイアウト -->
<div class="page-page layout-page-page">
  <div class="page-page__inner inner">
    <div class="page-page__content page-content">
      <?php echo $content; ?>
    </div>
  </div>
</div>

<?php get_footer(); ?>