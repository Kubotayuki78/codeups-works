<?php get_header(); ?>

<section class="page-fv">
  <div class="page-fv__image">
    <picture>
      <source
        media="(min-width: 768px)"
        srcset="<?php echo get_template_directory_uri() ?>/assets/images/price-page/price-fv-pc.jpg" />
      <img
        src="<?php echo get_template_directory_uri() ?>/assets/images/price-page/price-fv-sp.jpg"
        decoding="async"
        alt="料金一覧" />
    </picture>
  </div>
  <div class="page-fv__heading">
    <h1>Price</h1>
  </div>
</section>

<!-- パンくずリスト -->
<?php get_template_part('parts/breadcrumb') ?>

<div class="page-price layout-page-price">
  <div class="page-price__inner inner">
    <div class="page-price__lists page-price-lists">
      <?php
      // 4つのカテゴリをループで処理
      for ($i = 1; $i <= 4; $i++) :
        // SCFからカテゴリ名（price_title）を取得
        $price_title = SCF::get('price_title' . $i);
        // SCFから繰り返しフィールド「price-items」を取得
        $price_items = SCF::get('price-items' . $i);

        // カテゴリ名が空ならスキップ
        if (empty($price_title) || empty($price_items)) continue;
      ?>
        <div class="price-table" id="price-<?php echo $i; ?>">
          <div class="price-table__title">
            <?php echo esc_html($price_title); ?>
          </div>
          <!-- メニュー表 -->
          <table class="price-table__table">
            <?php
            foreach ($price_items as $item) :
              $menu_name = !empty($item['price_course' . $i]) ? esc_html($item['price_course' . $i]) : '';
              $menu_price = !empty($item['price_number' . $i]) ? esc_html($item['price_number' . $i]) : '';

              // メニュー名が空ならスキップ
              if (empty($menu_name) || empty($menu_price)) continue;

              // スマホ時だけ改行を入れる
              $menu_name = str_replace("\n", '<span class="u-mobile"><br></span>', $menu_name);
            ?>
              <tr>
                <td class="price-table__menu"><?php echo $menu_name; ?></td>
                <td class="price-table__price"><?php echo $menu_price; ?></td>
              </tr>
            <?php endforeach; ?>
          </table>
        </div>
      <?php endfor; ?>
    </div>
  </div>
</div>

<?php get_footer(); ?>