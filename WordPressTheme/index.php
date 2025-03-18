<?php get_header(); ?>

<main>
  <section class="mv">
    <div class="mv__inner">
      <div class="swiper js-fvSwiper">
        <div class="swiper-wrapper">
          <div class="swiper-slide">
            <div class="mv__image">
              <picture>
                <source
                  media="(min-width: 768px)"
                  srcset="<?php echo get_template_directory_uri() ?>/assets/images/common/fv-1-pc.jpg" />
                <img
                  src="<?php echo get_template_directory_uri() ?>/assets/images/common/fv-1-sp.jpg"
                  alt=""
                  decoding="async" />
              </picture>
            </div>
          </div>
          <div class="swiper-slide">
            <div class="mv__image">
              <picture>
                <source
                  media="(min-width: 768px)"
                  srcset="<?php echo get_template_directory_uri() ?>/assets/images/common/fv-2-pc.jpg" />
                <img
                  src="<?php echo get_template_directory_uri() ?>/assets/images/common/fv-2-sp.jpg"
                  alt=""
                  decoding="async" />
              </picture>
            </div>
          </div>
          <div class="swiper-slide">
            <div class="mv__image">
              <picture>
                <source
                  media="(min-width: 768px)"
                  srcset="<?php echo get_template_directory_uri() ?>/assets/images/common/fv-3-pc.jpg" />
                <img
                  src="<?php echo get_template_directory_uri() ?>/assets/images/common/fv-3-sp.jpg"
                  alt=""
                  decoding="async" />
              </picture>
            </div>
          </div>
          <div class="swiper-slide">
            <div class="mv__image">
              <picture>
                <source
                  media="(min-width: 768px)"
                  srcset="<?php echo get_template_directory_uri() ?>/assets/images/common/fv-4-pc.jpg" />
                <img
                  src="<?php echo get_template_directory_uri() ?>/assets/images/common/fv-4-sp.jpg"
                  alt=""
                  decoding="async" />
              </picture>
            </div>
          </div>
        </div>
      </div>

      <div class="mv__heading">
        <h2 class="mv__title">DIVING</h2>
        <p class="mv__subtitle">into the ocean</p>
      </div>
    </div>
  </section>

  <section class="campaign top-campaign">
    <div class="campaign__heading heading">
      <p class="heading__title-en">campaign</p>
      <h2 class="heading__title-ja">キャンペーン</h2>
    </div>
    <div class="campaign__inner inner">
      <!-- 前後の矢印 -->
      <div class="campaign-swiper-arrow">
        <div class="swiper-button-prev campaign-swiper-arrow__prev"></div>
        <div class="swiper-button-next campaign-swiper-arrow__next"></div>
      </div>
      <div class="campaign__cards">
        <div class="swiper campaign-cards js-cardSwiper">
          <div class="swiper-wrapper">
            <div class="swiper-slide campaign-cards__card">
              <div class="campaign-card">
                <figure class="campaign-card__image">
                  <img
                    src="<?php echo get_template_directory_uri() ?>/assets/images/common/campaign1.jpg"
                    alt="サンゴ礁の魚たちの画像"
                    width="400"
                    height="396" />
                </figure>
                <div class="campaign-card__body">
                  <span class="campaign-card__tag">ライセンス講習</span>
                  <h3 class="campaign-card__title">ライセンス取得</h3>
                </div>
                <div class="campaign-card__foot">
                  <p class="campaign-card__text">全部コミコミ(お一人様)</p>
                  <div class="campaign-card__price">
                    <p class="campaign-card__price-before">¥56,000</p>
                    <p class="campaign-card__price-after">¥46,000</p>
                  </div>
                </div>
              </div>
            </div>
            <div class="swiper-slide campaign-cards__card">
              <div class="campaign-card">
                <figure class="campaign-card__image">
                  <img
                    src="<?php echo get_template_directory_uri() ?>/assets/images/common/campaign2.jpg"
                    alt="島と船の画像"
                    width="400"
                    height="396" />
                </figure>
                <div class="campaign-card__body">
                  <span class="campaign-card__tag">体験ダイビング</span>
                  <h3 class="campaign-card__title">貸切体験ダイビング</h3>
                </div>
                <div class="campaign-card__foot">
                  <p class="campaign-card__text">全部コミコミ(お一人様)</p>
                  <div class="campaign-card__price">
                    <p class="campaign-card__price-before">¥24,000</p>
                    <p class="campaign-card__price-after">¥18,000</p>
                  </div>
                </div>
              </div>
            </div>
            <div class="swiper-slide campaign-cards__card">
              <div class="campaign-card">
                <figure class="campaign-card__image">
                  <img
                    src="<?php echo get_template_directory_uri() ?>/assets/images/common/campaign3.jpg"
                    alt="クラゲの画像"
                    width="400"
                    height="396" />
                </figure>
                <div class="campaign-card__body">
                  <span class="campaign-card__tag">体験ダイビング</span>
                  <h3 class="campaign-card__title">ナイトダイビング</h3>
                </div>
                <div class="campaign-card__foot">
                  <p class="campaign-card__text">全部コミコミ(お一人様)</p>
                  <div class="campaign-card__price">
                    <p class="campaign-card__price-before">¥10,000</p>
                    <p class="campaign-card__price-after">¥8,000</p>
                  </div>
                </div>
              </div>
            </div>
            <div class="swiper-slide campaign-cards__card">
              <div class="campaign-card">
                <figure class="campaign-card__image">
                  <img
                    src="<?php echo get_template_directory_uri() ?>/assets/images/common/campaign4.jpg"
                    alt="ダイビングの画像"
                    width="400"
                    height="396" />
                </figure>
                <div class="campaign-card__body">
                  <span class="campaign-card__tag">体験ダイビング</span>
                  <h3 class="campaign-card__title">ナイトダイビング</h3>
                </div>
                <div class="campaign-card__foot">
                  <p class="campaign-card__text">全部コミコミ(お一人様)</p>
                  <div class="campaign-card__price">
                    <p class="campaign-card__price-before">¥10,000</p>
                    <p class="campaign-card__price-after">¥8,000</p>
                  </div>
                </div>
              </div>
            </div>
            <div class="swiper-slide campaign-cards__card">
              <div class="campaign-card">
                <figure class="campaign-card__image">
                  <img
                    src="<?php echo get_template_directory_uri() ?>/assets/images/common/campaign4.jpg"
                    alt="ダイビングの画像"
                    width="400"
                    height="396" />
                </figure>
                <div class="campaign-card__body">
                  <span class="campaign-card__tag">体験ダイビング</span>
                  <h3 class="campaign-card__title">ナイトダイビング</h3>
                </div>
                <div class="campaign-card__foot">
                  <p class="campaign-card__text">全部コミコミ(お一人様)</p>
                  <div class="campaign-card__price">
                    <p class="campaign-card__price-before">¥10,000</p>
                    <p class="campaign-card__price-after">¥8,000</p>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <div class="campaign__button">
      <a href="" class="btn"><span>View more</span></a>
    </div>
  </section>

  <section class="about top-about">
    <div class="about__inner inner">
      <div class="about__heading heading">
        <p class="heading__title-en">about us</p>
        <h2 class="heading__title-ja">私たちについて</h2>
      </div>
      <div class="about__images">
        <div class="about__image1">
          <img
            src="<?php echo get_template_directory_uri() ?>/assets/images/common/aboutus-1.jpg"
            alt="海の中の黄色い魚の画像" />
        </div>
        <div class="about__image2">
          <img
            src="<?php echo get_template_directory_uri() ?>/assets/images/common/aboutus-2.jpg"
            alt="瓦屋根とシーサーの画像" />
        </div>
      </div>

      <div class="about__content">
        <h3 class="about__title">
          Dive into<br />
          the Ocean
        </h3>
        <div class="about__body">
          <div class="about__text">
            <p>
              ここにテキストが入ります。ここにテキストが入ります。ここにテキストが入ります。ここにテキストが入ります。<br />ここにテキストが入ります。ここにテキストが入ります。ここにテキストが入ります。ここにテキストが入ります。ここにテキスト<span
                class="about__text-br">が入ります。</span>
            </p>
          </div>
          <div class="about__button">
            <a href="" class="btn"><span>View more</span></a>
          </div>
        </div>
      </div>
    </div>
  </section>

  <section class="info top-info">
    <div class="info__inner inner">
      <div class="info__heading heading">
        <p class="heading__title-en">information</p>
        <h2 class="heading__title-ja">ダイビング情報</h2>
      </div>
      <div class="info__content">
        <div class="info__image colorbox js-colorbox">
          <img
            src="<?php echo get_template_directory_uri() ?>/assets/images/common/info.jpg"
            alt="サンゴ礁の黄色い魚の画像" />
        </div>
        <div class="info__body">
          <h3 class="info__body-title">ライセンス講習</h3>
          <p class="info__body-text">
            当店はダイビングライセンス（Cカード）世界最大の教育機関PADIの「正規店」として店舗登録されています。<br />正規登録店として、安心安全に初めての方でも安心安全にライセンス取得をサポート致します。
          </p>
          <div class="info__button">
            <a href="" class="btn"><span>View more</span></a>
          </div>
        </div>
      </div>
    </div>
  </section>

  <section class="blog top-blog">
    <div class="blog__inner inner">
      <div class="blog__heading heading heading--white">
        <p class="heading__title-en heading__title-en--white">blog</p>
        <h2 class="heading__title-ja heading__title-ja--white">ブログ</h2>
      </div>
      <div class="blog__cards blog-cards">
        <div class="blog-cards__card">
          <a href="single.html" class="blog-card">
            <div class="blog-card__image">
              <img
                src="<?php echo get_template_directory_uri() ?>/assets/images/common/blog-1.jpg"
                alt="ピンクの珊瑚の画像" />
            </div>
            <div class="blog-card__body">
              <time class="blog-card__body-time" datetime="2023-11-17">2023.11/17</time>
              <h3 class="blog-card__body-title">ライセンス取得</h3>
              <p class="blog-card__body-text">
                ここにテキストが入ります。ここにテキストが入ります。ここにテキストが入ります。ここにテキストが入ります。<br />ここにテキストが入ります。ここにテキストが入ります。ここにテキスト
              </p>
            </div>
          </a>
        </div>
        <div class="blog-cards__card">
          <a href="single.html" class="blog-card">
            <div class="blog-card__image">
              <img
                src="<?php echo get_template_directory_uri() ?>/assets/images/common/blog-2.jpg"
                alt="泳ぐウミガメの画像" />
            </div>
            <div class="blog-card__body">
              <time class="blog-card__body-time" datetime="2023-11-17">2023.11/17</time>
              <h3 class="blog-card__body-title">ウミガメと泳ぐ</h3>
              <p class="blog-card__body-text">
                ここにテキストが入ります。ここにテキストが入ります。ここにテキストが入ります。ここにテキストが入ります。<br />ここにテキストが入ります。ここにテキストが入ります。ここにテキスト
              </p>
            </div>
          </a>
        </div>
        <div class="blog-cards__card">
          <a href="single.html" class="blog-card">
            <div class="blog-card__image">
              <img
                src="<?php echo get_template_directory_uri() ?>/assets/images/common/blog-3.jpg"
                alt="カクレクマノミの画像" />
            </div>
            <div class="blog-card__body">
              <time class="blog-card__body-time" datetime="2023-11-17">2023.11/17</time>
              <h3 class="blog-card__body-title">カクレクマノミ</h3>
              <p class="blog-card__body-text">
                ここにテキストが入ります。ここにテキストが入ります。ここにテキストが入ります。ここにテキストが入ります。<br />ここにテキストが入ります。ここにテキストが入ります。ここにテキスト
              </p>
            </div>
          </a>
        </div>
      </div>
      <div class="blog__button">
        <a href="" class="btn"><span>View more</span></a>
      </div>
    </div>
  </section>

  <section class="voice top-voice">
    <div class="voice__inner inner">
      <div class="voice__heading heading">
        <p class="heading__title-en">voice</p>
        <h2 class="heading__title-ja">お客様の声</h2>
      </div>
      <div class="voice__cards voice-cards">
        <div class="voice-cards__card voice-card">
          <div class="voice-card__head">
            <div class="voice-card__head-body">
              <div class="voice-card__head-meta">
                <p class="voice-card__head-body-age">20代(女性)</p>
                <span class="voice-card__head-body-tag">ライセンス講習</span>
              </div>
              <h3 class="voice-card__head-body-title">
                ここにタイトルが入ります。ここにタイトル
              </h3>
            </div>
            <div class="voice-card__head-image colorbox js-colorbox">
              <img
                src="<?php echo get_template_directory_uri() ?>/assets/images/common/voice-1.jpg"
                alt="お客様の顔写真" />
            </div>
          </div>
          <div class="voice-card__body">
            <p>
              ここにテキストが入ります。ここにテキストが入ります。ここにテキストが入ります。ここにテキストが入ります。<br />ここにテキストが入ります。ここにテキストが入ります。ここにテキストが入ります。ここにテキストが入ります。ここにテキストが入ります。ここにテキストが入ります。ここにテキストが入ります。<br />ここにテキストが入ります。ここにテキストが入ります。
            </p>
          </div>
        </div>
        <div class="voice-cards__card voice-card">
          <div class="voice-card__head">
            <div class="voice-card__head-body">
              <div class="voice-card__head-meta">
                <p class="voice-card__head-body-age">20代(男性)</p>
                <span class="voice-card__head-body-tag">ファンダイビング</span>
              </div>
              <h3 class="voice-card__head-body-title">
                ここにタイトルが入ります。ここにタイトル
              </h3>
            </div>
            <div class="voice-card__head-image colorbox js-colorbox">
              <img
                src="<?php echo get_template_directory_uri() ?>/assets/images/common/voice-2.jpg"
                alt="お客様の顔写真" />
            </div>
          </div>
          <div class="voice-card__body">
            <p>
              ここにテキストが入ります。ここにテキストが入ります。ここにテキストが入ります。ここにテキストが入ります。<br />ここにテキストが入ります。ここにテキストが入ります。ここにテキストが入ります。ここにテキストが入ります。ここにテキストが入ります。ここにテキストが入ります。ここにテキストが入ります。<br />ここにテキストが入ります。ここにテキストが入ります。
            </p>
          </div>
        </div>
      </div>
      <div class="voice__button">
        <a href="" class="btn"><span>View more</span></a>
      </div>
    </div>
  </section>

  <section class="price top-price">
    <div class="price__inner inner">
      <div class="price__heading heading">
        <p class="heading__title-en">price</p>
        <h2 class="heading__title-ja">料金一覧</h2>
      </div>
      <div class="price__content">
        <div class="price__head-image">
          <img
            src="<?php echo get_template_directory_uri() ?>/assets/images/common/price-sp.jpg"
            alt="泳ぐウミガメの画像" />
        </div>
        <div class="price__lists price-lists">
          <div class="price-lists__list price-list">
            <h3 class="price-list__title">ライセンス講習</h3>
            <ul class="price-list__content">
              <li>オープンウォーターダイバーコース<span>¥50,000</span></li>
              <li>
                アドバンスドオープンウォーターコース<span>¥60,000</span>
              </li>
              <li>レスキュー＋EFRコース<span>¥70,000</span></li>
            </ul>
          </div>
          <div class="price-lists__list price-list">
            <h3 class="price-list__title">体験ダイビング</h3>
            <ul class="price-list__content">
              <li>ビーチ体験ダイビング(半日)<span>¥7,000</span></li>
              <li>ビーチ体験ダイビング(1日)<span>¥14,000</span></li>
              <li>ボート体験ダイビング(半日)<span>¥10,000</span></li>
              <li>ボート体験ダイビング(1日)<span>¥18,000</span></li>
            </ul>
          </div>
          <div class="price-lists__list price-list">
            <h3 class="price-list__title">ファンダイビング</h3>
            <ul class="price-list__content">
              <li>ビーチダイビング(2ダイブ)<span>¥14,000</span></li>
              <li>ボートダイビング(2ダイブ)<span>¥18,000</span></li>
              <li>スペシャルダイビング(2ダイブ)<span>¥24,000</span></li>
              <li>ナイトダイビング(1ダイブ)<span>¥10,000</span></li>
            </ul>
          </div>
          <div class="price-lists__list price-list">
            <h3 class="price-list__title">スペシャルダイビング</h3>
            <ul class="price-list__content">
              <li>貸切ダイビング(2ダイブ)<span>¥24,000</span></li>
              <li>1日ダイビング(3ダイブ)<span>¥32,000</span></li>
            </ul>
          </div>
        </div>
        <div class="price__pc-image colorbox">
          <img
            src="<?php echo get_template_directory_uri() ?>/assets/images/common/price-pc.jpg"
            alt="サンゴ礁の赤い魚の画像" />
        </div>
      </div>
      <div class="price__button">
        <a href="" class="btn"><span>View more</span></a>
      </div>
    </div>
  </section>

  <?php get_footer(); ?>