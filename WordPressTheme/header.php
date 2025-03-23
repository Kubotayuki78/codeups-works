<!DOCTYPE html>
<html lang="ja">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width,initial-scale=1.0" />
  <meta name="format-detection" content="telephone=no" />
  <meta name="robots" content="noindex" />

  <?php wp_head(); ?>
</head>

<body>
  <?php wp_body_open(); ?>
  <header class="header">
    <div class="header__inner">
      <h1 class="header__logo">
        <a href="<?php echo home_url('/'); ?>
"><img
            src="<?php echo get_template_directory_uri() ?>/assets/images/common/logo.png"
            alt="CodeUps"
            height="38"
            width="102" /></a>
      </h1>
      <div class="header__drawer drawer-icon js-drawer">
        <span></span>
        <span></span>
        <span></span>
      </div>
      <nav class="header__pc-nav pc-nav" aria-label="Primary Navigation">
        <ul class="pc-nav__items">
          <?php
          $menu_items = array(
            array('slug' => 'campaign', 'en' => 'Campaign', 'jp' => 'キャンペーン'),
            array('slug' => 'about', 'en' => 'About us', 'jp' => '私たちについて'),
            array('slug' => 'info', 'en' => 'Information', 'jp' => 'ダイビング情報'),
            array('slug' => 'blog', 'en' => 'Blog', 'jp' => 'ブログ'),
            array('slug' => 'voice', 'en' => 'Voice', 'jp' => 'お客様の声'),
            array('slug' => 'price', 'en' => 'Price', 'jp' => '料金一覧'),
            array('slug' => 'faq', 'en' => 'FAQ', 'jp' => 'よくある質問'),
            array('slug' => 'contact', 'en' => 'Contact', 'jp' => 'お問い合わせ'),
          );

          foreach ($menu_items as $item) :
          ?>
            <li class="pc-nav__item">
              <a href="<?php echo esc_url(home_url('/' . $item['slug'] . '/')); ?>">
                <?php echo esc_html($item['en']); ?><span><?php echo esc_html($item['jp']); ?></span>
              </a>
            </li>
          <?php endforeach; ?>
        </ul>
      </nav>

      <nav class="header__sp-nav sp-nav js-sp-nav" aria-label="Secondary Navigation">
        <div class="sp-nav__section">
          <?php
          // 各メニューのリンク設定
          $menu_items = array(
            array('slug' => 'campaign', 'label' => 'キャンペーン', 'taxonomy' => 'campaign-category'),
            array('slug' => 'about', 'label' => '私たちについて'),
            array('slug' => 'info', 'label' => 'ダイビング情報', 'sub' => array(
              array('slug' => 'info/?tab=license', 'label' => 'ライセンス講習'),
              array('slug' => 'info/?tab=experience', 'label' => '体験ダイビング'),
              array('slug' => 'info/?tab=fun', 'label' => 'ファンダイビング'),
            )),
            array('slug' => 'blog', 'label' => 'ブログ'),
            array('slug' => 'voice', 'label' => 'お客様の声'),
            array('slug' => 'price', 'label' => '料金一覧', 'sub' => array(
              array('slug' => 'info/?tab=license', 'label' => 'ライセンス講習'),
              array('slug' => 'info/?tab=experience', 'label' => '体験ダイビング'),
              array('slug' => 'info/?tab=fun', 'label' => 'ファンダイビング'),
            )),
            array('slug' => 'faq', 'label' => 'よくある質問'),
            array('slug' => 'privacy', 'label' => 'プライバシーポリシー'),
            array('slug' => 'terms', 'label' => '利用規約'),
            array('slug' => 'contact', 'label' => 'お問い合わせ'),
            array('slug' => 'sitemap', 'label' => 'サイトマップ')
          );

          // メニューをループで出力
          foreach ($menu_items as $item) :
          ?>
            <div class="sp-nav__item">
              <p class="sp-nav__heading">
                <a href="<?php echo esc_url(home_url('/' . $item['slug'] . '/')); ?>">
                  <?php echo esc_html($item['label']); ?>
                </a>
              </p>

              <?php if (!empty($item['taxonomy'])) : ?>
                <ul class="sp-nav__body">
                  <?php
                  // カスタムタクソノミー（例えば 'campaign-category'）の取得
                  $terms = get_terms(array(
                    'taxonomy'   => $item['taxonomy'],
                    'hide_empty' => true,
                  ));
                  if (!empty($terms) && !is_wp_error($terms)) :
                    foreach ($terms as $term) :
                  ?>
                      <li>
                        <a href="<?php echo esc_url(get_term_link($term)); ?>">
                          <?php echo esc_html($term->name); ?>
                        </a>
                      </li>
                  <?php
                    endforeach;
                  endif;
                  ?>
                </ul>

              <?php elseif (!empty($item['sub'])) : ?>
                <ul class="sp-nav__body">
                  <?php foreach ($item['sub'] as $sub_item) : ?>
                    <li>
                      <a href="<?php echo esc_url(home_url('/' . $sub_item['slug'])); ?>">
                        <?php echo esc_html($sub_item['label']); ?>
                      </a>
                    </li>
                  <?php endforeach; ?>
                </ul>
              <?php endif; ?>
            </div>
          <?php endforeach; ?>
        </div>
      </nav>
    </div>
  </header>

  <main>