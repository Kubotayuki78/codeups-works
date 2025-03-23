<?php get_header(); ?>

<section class="page-fv">
  <div class="page-fv__image">
    <picture>
      <source
        media="(min-width: 768px)"
        srcset="<?php echo get_template_directory_uri() ?>/assets/images/FAQ-page/faq-fv-pc.jpg" />
      <img
        src="<?php echo get_template_directory_uri() ?>/assets/images/FAQ-page/faq-fv-sp.jpg"
        decoding="async"
        alt="よくある質問" />
    </picture>
  </div>
  <div class="page-fv__heading">
    <h1>FAQ</h1>
  </div>
</section>


<!-- パンくずリスト -->
<?php get_template_part('parts/breadcrumb'); ?>

<div class="page-faq layout-page-faq">
  <div class="page-faq__inner inner">
    <div class="page-faq__accordion">
      <div class="faq-accordion__container faq-accordion-lists">
        <?php
        // SCFの繰り返しフィールド「faq_group」を取得
        $faq_items = SCF::get('faq_group');

        if (!empty($faq_items)) :
          foreach ($faq_items as $faq) :
            $question = !empty($faq['question']) ? esc_html($faq['question']) : '';
            $answer = !empty($faq['answer']) ? esc_html($faq['answer']) : '';

            // 質問または回答がない場合はスキップ
            if (empty($question) || empty($answer)) continue;
        ?>
            <div class="faq-accordion-lists__list faq-accordion">
              <h3 class="faq-accordion__title js-accordion-title">
                <?php echo $question; ?>
              </h3>
              <div class="faq-accordion__content">
                <p><?php echo nl2br($answer); ?></p>
              </div>
            </div>
        <?php
          endforeach;
        endif;
        ?>
      </div>
    </div>
  </div>
</div>

<?php get_footer(); ?>