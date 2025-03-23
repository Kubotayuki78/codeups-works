<?php get_header(); ?>

<section class="page-fv">
  <div class="page-fv__image">
    <picture>
      <source
        media="(min-width: 768px)"
        srcset="<?php echo get_template_directory_uri() ?>/assets/images/information-page/information-fv-pc.jpg" />
      <img
        src="<?php echo get_template_directory_uri() ?>/assets/images/information-page/information-fv-sp.jpg"
        decoding="async"
        alt="インフォメーション" />
    </picture>
  </div>
  <div class="page-fv__heading">
    <h1>Information</h1>
  </div>
</section>

<!-- パンくずリスト -->
<?php get_template_part('parts/breadcrumb'); ?>

<div class="page-info layout-page-info">
  <div class="page-info__inner inner">

    <div class="page-info__tags info-tags">
      <a
        href="#"
        class="info-tags__tag info-tag tag-active js-info-tag"
        data-tab="license">
        ライセンス<br class="u-mobile" />講習
      </a>
      <a
        href="#"
        class="info-tags__tag info-tag info-tag--type2 js-info-tag"
        data-tab="fun">
        ファン<br class="u-mobile" />ダイビング
      </a>
      <a
        href="#"
        class="info-tags__tag info-tag info-tag--type3 js-info-tag"
        data-tab="experience">
        体験<br class="u-mobile" />ダイビング
      </a>
    </div>

    <div class="page-info__cards info-cards" data-content="license">
      <div class="info-cards__card info-card">
        <div class="info-card__content">
          <h3 class="info-card__title">ライセンス講習</h3>
          <p class="info-card__text">
            泳げない人も、ちょっと水が苦手な人も、ダイビングを「安全に」楽しんでいただけるよう、スタッフがサポートいたします！
            スキューバダイビングを楽しむためには最低限の知識とスキルが要求されます。知識やスキルと言ってもそんなに難しい事ではなく、安全に楽しむ事を目的としたものです。
            プロダイバーの指導のもと知識とスキルを習得しCカードを取得して、ダイバーになろう！
          </p>
        </div>
        <div class="info-card__image">
          <img
            src="<?php echo get_template_directory_uri() ?>/assets/images/information-page/information-1.jpg"
            alt="ダイビングの画像" />
        </div>
      </div>
    </div>

    <div
      class="page-info__cards info-cards"
      data-content="fun"
      style="display: none">
      <div class="info-cards__card info-card">
        <div class="info-card__content">
          <h3 class="info-card__title">ファンダイビング</h3>
          <p class="info-card__text">
            ブランクダイバー、ライセンスを取り立ての方も安心！沖縄本島を代表する「青の洞窟」（真栄田岬）やケラマ諸島などメジャーなポイントはモチロンのこと、最北端「辺戸岬」や最南端の「大渡海岸」等もご用意！
          </p>
        </div>
        <div class="info-card__image">
          <img
            src="<?php echo get_template_directory_uri() ?>/assets/images/information-page/information-2.jpg"
            alt="魚の画像" />
        </div>
      </div>
    </div>

    <div
      class="page-info__cards info-cards"
      data-content="experience"
      style="display: none">
      <div class="info-cards__card info-card">
        <div class="info-card__content">
          <h3 class="info-card__title">体験ダイビング</h3>
          <p class="info-card__text">
            ブランクダイバー、ライセンスを取り立ての方も安心！沖縄本島を代表する「青の洞窟」（真栄田岬）やケラマ諸島などメジャーなポイントはモチロンのこと、最北端「辺戸岬」や最南端の「大渡海岸」等もご用意！
          </p>
        </div>
        <div class="info-card__image">
          <img
            src="<?php echo get_template_directory_uri() ?>/assets/images/information-page/information-3.jpg"
            alt="魚の画像" />
        </div>
      </div>
    </div>
  </div>
</div>

<?php get_footer(); ?>