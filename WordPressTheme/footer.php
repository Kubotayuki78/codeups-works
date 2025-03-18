<!-- トップへ戻るボタン -->
<?php get_template_part('parts/to-top') ?>

<footer class="footer<?php
                      if (!is_404() && !is_page(array('thanks', 'contact'))) {
                        echo ' top-footer';
                      } elseif (is_page(array('thanks', 'contact'))) {
                        echo ' layout-page-contact-footer';
                      }
                      ?>">
  <div class="footer__inner inner">
    <div class="footer__links">
      <div class="footer__logo">
        <a href="<?php echo esc_url(home_url('/')); ?>">
          <img src="<?php echo esc_url(get_template_directory_uri()); ?>/assets/images/common/logo.png"
            alt="トップページ"
            height="38"
            width="102" />
        </a>
      </div>
      <div class="footer__sns">
        <a
          href="https://facebook.com/"
          target="_blank"
          rel="noopener noreferrer"><img
            src="<?php echo get_template_directory_uri() ?>/assets/images/common/facebook.png"
            alt="facebook"
            height="19"
            width="19" /></a>
        <a
          href="https://instagram.com/"
          target="_blank"
          rel="noopener noreferrer"><img
            src="<?php echo get_template_directory_uri() ?>/assets/images/common/instagram.png"
            alt="instagram"
            height="19"
            width="19" /></a>
      </div>
    </div>
    <nav class="footer__nav footer-nav" aria-label="Footer Navigation">
      <div class="footer-nav__items">

        <!-- キャンペーンセクション -->
        <div class="footer-nav__item footer-nav__item--1">
          <p class="footer-nav__heading">
            <a href="<?php echo home_url('/campaign/'); ?>">キャンペーン</a>
          </p>
          <ul class="footer-nav__body">
            <?php
            $campaign_terms = get_terms(array(
              'taxonomy'   => 'campaign-category',
              'hide_empty' => true,
            ));

            if (!empty($campaign_terms) && !is_wp_error($campaign_terms)) :
              foreach ($campaign_terms as $term) :
            ?>
                <li><a href="<?php echo esc_url(get_term_link($term)); ?>">
                    <?php echo esc_html($term->name); ?>
                  </a></li>
            <?php
              endforeach;
            endif;
            ?>
          </ul>
          <div>
            <p class="footer-nav__heading">
              <a href="<?php echo home_url('/about/'); ?>">私たちについて</a>
            </p>
          </div>
        </div>

        <!-- ダイビング情報 & ブログ -->
        <div class="footer-nav__item footer-nav__item--2">

          <p class="footer-nav__heading">
            <a href="<?php echo esc_url(home_url('/info/')); ?>">ダイビング情報</a>
          </p>
          <ul class="footer-nav__body">
            <li><a href="<?php echo esc_url(home_url('/info/?tab=license')); ?>">ライセンス講習</a></li>
            <li><a href="<?php echo esc_url(home_url('/info/?tab=experience')); ?>">体験ダイビング</a></li>
            <li><a href="<?php echo esc_url(home_url('/info/?tab=fun')); ?>">ファンダイビング</a></li>
          </ul>

          <p class="footer-nav__heading">
            <a href="<?php echo home_url('/blog/'); ?>">ブログ</a>
          </p>
        </div>

        <!-- お客様の声 & 料金一覧 -->
        <div class="footer-nav__item footer-nav__item--3">
          <p class="footer-nav__heading">
            <a href="<?php echo home_url('/voice/'); ?>">お客様の声</a>
          </p>
          <p class="footer-nav__heading">
            <a href="<?php echo home_url('/price/'); ?>">料金一覧</a>
          </p>
          <ul class="footer-nav__body">
            <li><a href="<?php echo home_url('/price/#price-1'); ?>">ライセンス講習</a></li>
            <li><a href="<?php echo home_url('/price/#price-2'); ?>">体験ダイビング</a></li>
            <li><a href="<?php echo home_url('/price/#price-3'); ?>">ファンダイビング</a></li>
          </ul>
        </div>

        <!-- FAQ・ポリシー・利用規約・お問い合わせ -->
        <div class="footer-nav__item footer-nav__item--4">
          <p class="footer-nav__heading">
            <a href="<?php echo home_url('/faq/'); ?>">よくある質問</a>
          </p>
          <p class="footer-nav__heading">
            <a href="<?php echo home_url('/privacy/'); ?>">プライバシー<br class="u-mobile" />ポリシー</a>
          </p>
          <p class="footer-nav__heading">
            <a href="<?php echo home_url('/terms/'); ?>">利用規約</a>
          </p>
          <p class="footer-nav__heading">
            <a href="<?php echo home_url('/contact/'); ?>">お問い合わせ</a>
          </p>
          <p class="footer-nav__heading">
            <a href="<?php echo home_url('/sitemap/'); ?>">サイトマップ</a>
          </p>
        </div>

      </div>
    </nav>
    <div class="footer__copyright">
      <small>Copyright © 2021 - 2023 CodeUps LLC. All Rights Reserved.</small>
    </div>
  </div>
</footer>
<?php wp_footer(); ?>
</body>

</html>