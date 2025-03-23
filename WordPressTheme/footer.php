<?php
// 非表示にしたいページ判定
if (
  !is_page('contact') &&
  !is_page('contact-thanks') &&
  !is_404()
) :
?>
  <section class="contact <?php echo is_front_page() ? 'top-contact' : 'page-footer-contact'; ?>">
    <div class="contact__inner inner">
      <div class="contact__wrapper">
        <div class="contact__left">
          <h3 class="contact__logo">
            <img src="<?php echo get_template_directory_uri(); ?>/assets/images/common/logo-blue.png" alt="トップページ" />
          </h3>
          <div class="contact__body">
            <address class="contact__body-address">
              <p>沖縄県那覇市1-1</p>
              <p>TEL:0120-000-0000</p>
              <p>営業時間:8:30-19:00</p>
              <p>定休日:毎週火曜日</p>
            </address>
            <div class="contact__body-map">
              <iframe
                src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3575.7606915130673!2d127.8028896098996!3d26.33424747690068!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x34e5120bd0d05b55%3A0x8a19806436e233b3!2z5rKW57iE5biC5b255omA!5e0!3m2!1sja!2sjp!4v1735902344642!5m2!1sja!2sjp"
                width="600"
                height="450"
                style="border: 0"
                allowfullscreen=""
                loading="lazy"
                referrerpolicy="no-referrer-when-downgrade"></iframe>
            </div>
          </div>
        </div>
        <div class="contact__right">
          <div class="contact__heading heading">
            <p class="heading__title-en heading__title-en--large">contact</p>
            <h2 class="heading__title-ja heading__title-ja--large">お問合せ</h2>
          </div>
          <p class="contact__text">ご予約・お問い合わせはコチラ</p>
          <div class="contact__button">
            <a href="<?php echo esc_url(get_permalink(get_page_by_path('contact'))); ?>" class="btn">
              <span>Contact us</span>
            </a>
          </div>
        </div>
      </div>
    </div>
  </section>
<?php endif; ?>
</main>

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