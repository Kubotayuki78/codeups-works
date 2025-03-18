<?php
/*
Template Name: お問い合わせ(送信完了)
*/
get_header(); ?>

<main>
  <section class="page-fv">
    <div class="page-fv__image">
      <picture>
        <source
          media="(min-width: 768px)"
          srcset="<?php echo get_template_directory_uri() ?>/assets/images/contact-page/contact-fv-pc.jpg" />
        <img
          src="<?php echo get_template_directory_uri() ?>/assets/images/contact-page/contact-fv-sp.jpg"
          alt="送信完了"
          decoding="async" />
      </picture>
    </div>
    <div class="page-fv__heading">
      <h1>Contact</h1>
    </div>
  </section>


  <!-- パンくずリスト -->
  <?php get_template_part('parts/breadcrumb'); ?>

  <div class="page-thanks layout-page-thanks">
    <div class="page-thanks__inner inner">
      <div class="page-thanks__content">
        <p class="page-thanks__text">
          お問い合わせ内容を送信完了しました。
        </p>
        <p class="page-thanks__text">
          このたびは、お問い合わせ頂き<br
            class="u-mobile" />誠にありがとうございます。<br />お送り頂きました内容を確認の上、<br
            class="u-mobile" />3営業日以内に折り返しご連絡させて頂きます。<br />また、ご記入頂いたメールアドレスへ、<br
            class="u-mobile" />自動返信の確認メールをお送りしております。
        </p>
      </div>
    </div>
  </div>
</main>

<?php get_footer(''); ?>