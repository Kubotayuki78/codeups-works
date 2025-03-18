<div class="page-breadcrumb layout-breadcrumb <?php echo is_404() ? 'layout-breadcrumb-404' : ''; ?>">
  <div class="page-breadcrumb__inner inner">
    <nav class="page-breadcrumb__list">
      <ul class="page-breadcrumb__items">
        <?php
        if (function_exists('bcn_display')) {
          bcn_display();
        }
        ?>
      </ul>
    </nav>
  </div>
</div>