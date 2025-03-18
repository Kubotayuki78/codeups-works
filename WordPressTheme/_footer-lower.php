        </main>

        <!-- トップへ戻るボタン -->
        <?php get_template_part('parts/to-top') ?>

        <footer class="footer top-footer">
          <div class="footer__inner inner">
            <div class="footer__links">
              <div class="footer__logo">
                <a href="index.html"><img
                    src="<?php echo get_template_directory_uri() ?>/assets/images/common/logo.png"
                    alt="CodeUps"
                    height="38"
                    width="102" /></a>
              </div>
              <div class="footer__sns">
                <a href="https://facebook.com"><img
                    src="<?php echo get_template_directory_uri() ?>/assets/images/common/facebook.png"
                    alt="facebook"
                    height="19"
                    width="19" /></a>
                <a href="https://instagram.com"><img
                    src="<?php echo get_template_directory_uri() ?>/assets/images/common/instagram.png"
                    alt="instagram"
                    height="19"
                    width="19" /></a>
              </div>
            </div>
            <nav class="footer__nav footer-nav" aria-label="Footer Navigation">
              <div class="footer-nav__items">
                <div class="footer-nav__item footer-nav__item--1">
                  <p class="footer-nav__heading">
                    <a href="<?php echo home_url('/campaign/'); ?>">キャンペーン</a>
                  </p>
                  <ul class="footer-nav__body">
                    <?php
                    // カスタムタクソノミー（campaign-category）のタームを取得
                    $terms = get_terms(array(
                      'taxonomy'   => 'campaign-category', // カスタムタクソノミーのスラッグ
                      'hide_empty' => true, // 投稿がないカテゴリーは非表示
                    ));
                    // 取得したターム（カテゴリー）がある場合
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
                  <div>
                    <p class="footer-nav__heading">
                      <a href="page-about-us.html">私たちについて</a>
                    </p>
                  </div>
                </div>
                <div class="footer-nav__item footer-nav__item--2">
                  <p class="footer-nav__heading">
                    <a href="page-info.html">ダイビング情報</a>
                  </p>
                  <ul class="footer-nav__body">
                    <li><a href="page-info.html">ライセンス講習</a></li>
                    <li><a href="page-info.html">体験ダイビング</a></li>
                    <li><a href="page-info.html">ファンダイビング</a></li>
                  </ul>
                  <p class="footer-nav__heading">
                    <a href="page-blog.html">ブログ</a>
                  </p>
                </div>
                <div class="footer-nav__item footer-nav__item--3">
                  <p class="footer-nav__heading">
                    <a href="page-voice.html">お客様の声</a>
                  </p>
                  <p class="footer-nav__heading">
                    <a href="page-price.html">料金一覧</a>
                  </p>
                  <ul class="footer-nav__body">
                    <li><a href="page-info.html">ライセンス講習</a></li>
                    <li><a href="page-info.html">体験ダイビング</a></li>
                    <li><a href="page-info.html">ファンダイビング</a></li>
                  </ul>
                </div>
                <div class="footer-nav__item footer-nav__item--4">
                  <p class="footer-nav__heading">
                    <a href="page-faq.html">よくある質問</a>
                  </p>
                  <p class="footer-nav__heading">
                    <a href="page-privacy.html">プライバシー<br class="u-mobile" />ポリシー</a>
                  </p>
                  <p class="footer-nav__heading">
                    <a href="page-terms.html">利用規約</a>
                  </p>
                  <p class="footer-nav__heading">
                    <a href="page-contact.html">お問い合わせ</a>
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