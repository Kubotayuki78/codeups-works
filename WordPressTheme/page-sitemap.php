<?php get_header(); ?>

<section class="page-fv">
  <div class="page-fv__image">
    <picture>
      <source
        media="(min-width: 768px)"
        srcset="<?php echo get_template_directory_uri() ?>/assets/images/sitemap-page/sitemap-page-pc.jpg" />
      <img
        src="<?php echo get_template_directory_uri() ?>/assets/images/sitemap-page/sitemap-page-sp.jpg"
        alt="サイトマップ"
        decoding="async" />
    </picture>
  </div>
  <div class="page-fv__heading">
    <h1>Site MAP</h1>
  </div>
</section>


<!-- パンくずリスト -->
<?php get_template_part('parts/breadcrumb'); ?>

<div class="page-sitemap layout-page-sitemap">
  <div class="page-sitemap__inner inner">
    <nav class="page-sitemap__nav page-sitemap-nav" aria-label="Sitemap Navigation">
      <div class="page-sitemap-nav__content">

        <!-- キャンペーン -->
        <ul class="page-sitemap-nav__items page-sitemap-nav__item--1">
          <li class="page-sitemap-nav__item page-sitemap-nav__item--head">
            <a href="<?php echo home_url('/campaign/'); ?>">キャンペーン</a>
          </li>
          <?php
          $campaign_terms = get_terms(array(
            'taxonomy'   => 'campaign-category',
            'hide_empty' => true,
          ));

          if (!empty($campaign_terms) && !is_wp_error($campaign_terms)) :
            foreach ($campaign_terms as $term) :
          ?>
              <li class="page-sitemap-nav__item">
                <a href="<?php echo esc_url(get_term_link($term)); ?>">
                  <?php echo esc_html($term->name); ?>
                </a>
              </li>
          <?php
            endforeach;
          endif;
          ?>
          <li class="page-sitemap-nav__item page-sitemap-nav__item--head">
            <a href="<?php echo home_url('/about/'); ?>">私たちについて</a>
          </li>
        </ul>

        <!-- ダイビング情報 & ブログ -->
        <ul class="page-sitemap-nav__items page-sitemap-nav__item--2">
          <li class="page-sitemap-nav__item page-sitemap-nav__item--head">
            <a href="<?php echo home_url('/info/'); ?>">ダイビング情報</a>
          </li>
          <li class="page-sitemap-nav__item"><a href="<?php echo home_url('/info#license'); ?>">ライセンス講習</a></li>
          <li class="page-sitemap-nav__item"><a href="<?php echo home_url('/info#experience'); ?>">体験ダイビング</a></li>
          <li class="page-sitemap-nav__item"><a href="<?php echo home_url('/info#fun'); ?>">ファンダイビング</a></li>
          <li class="page-sitemap-nav__item page-sitemap-nav__item--head">
            <a href="<?php echo home_url('/blog/'); ?>">ブログ</a>
          </li>
        </ul>

        <!-- お客様の声 & 料金一覧 -->
        <ul class="page-sitemap-nav__items page-sitemap-nav__item--3">
          <li class="page-sitemap-nav__item page-sitemap-nav__item--head">
            <a href="<?php echo home_url('/voice/'); ?>">お客様の声</a>
          </li>
          <li class="page-sitemap-nav__item page-sitemap-nav__item--head">
            <a href="<?php echo home_url('/price/'); ?>">料金一覧</a>
          </li>
          <li class="page-sitemap-nav__item"><a href="<?php echo home_url('/info#license'); ?>">ライセンス講習</a></li>
          <li class="page-sitemap-nav__item"><a href="<?php echo home_url('/info#experience'); ?>">体験ダイビング</a></li>
          <li class="page-sitemap-nav__item"><a href="<?php echo home_url('/info#fun'); ?>">ファンダイビング</a></li>
        </ul>

        <!-- FAQ・ポリシー・利用規約・お問い合わせ -->
        <ul class="page-sitemap-nav__items page-sitemap-nav__item--4">
          <li class="page-sitemap-nav__item page-sitemap-nav__item--head">
            <a href="<?php echo home_url('/faq/'); ?>">よくある質問</a>
          </li>
          <li class="page-sitemap-nav__item page-sitemap-nav__item--head page-sitemap-nav__item--head--lh">
            <a href="<?php echo home_url('/privacy/'); ?>">プライバシー<br class="u-mobile" />ポリシー</a>
          </li>
          <li class="page-sitemap-nav__item page-sitemap-nav__item--head">
            <a href="<?php echo home_url('/terms/'); ?>">利用規約</a>
          </li>
          <li class="page-sitemap-nav__item page-sitemap-nav__item--head">
            <a href="<?php echo home_url('/contact/'); ?>">お問い合わせ</a>
          </li>
          <li class="page-sitemap-nav__item page-sitemap-nav__item--head">
            <a href="<?php echo home_url('/sitemap/'); ?>">サイトマップ</a>
          </li>
        </ul>

      </div>
    </nav>
  </div>
</div>

<?php get_footer(); ?>