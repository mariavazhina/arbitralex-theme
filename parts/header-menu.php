<header class="header <?php echo is_front_page() ? 'header-home' : 'header-inner'; ?>">
  <div class="header-inside container">
    <nav class="nav-primary nav-left" aria-label="Primary menu">
      <?php
      wp_nav_menu([
        'theme_location' => 'header_left',
        'container' => false,
        'menu_class' => 'menu menu-primary',
        'fallback_cb' => false,
      ]);
      ?>
    </nav>

    <a class="header-logo" href="<?php echo esc_url(home_url('/')); ?>" aria-label="Home">
      <?php echo svg_icon('Arbitralex-logo-main'); ?>
    </a>

    <nav class="nav-primary nav-right" aria-label="Primary menu">
      <?php
      wp_nav_menu([
        'theme_location' => 'header_right',
        'container' => false,
        'menu_class' => 'menu menu-primary',
        'fallback_cb' => false,
      ]);
      ?>

      <a class="btn btn-beige" href="<?php echo esc_url(home_url('/contact/')); ?>" title="Book Consultation">Book Consultation</a>
    </nav>
    
  </div>
</header>