<section class="contact <?php echo is_front_page() ? 'top-contact' : 'page-footer-contact'; ?>">
  <div class="contact__inner inner">
    <div class="contact__wrapper">
      <div class="contact__left">
        <h3 class="contact__logo">
          <img src="<?php echo get_template_directory_uri() ?>/assets/images/common/logo-blue.png" alt="トップページ" />
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
          <p class="heading__title-en heading__title-en--large">
            contact
          </p>
          <h2 class="heading__title-ja heading__title-ja--large">
            お問合せ
          </h2>
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
</main>