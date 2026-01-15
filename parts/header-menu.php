<header class="header <?php echo is_front_page() ? 'header-home' : 'header-inner'; ?>">
  <div class="header-inside container">

    <a class="header-logo" href="<?php echo esc_url(home_url('/')); ?>" aria-label="Home">
      <?php echo svg_icon('Arbitralex-logo-main'); ?>
    </a>

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
    
    <button class="nav-toggle nav-mobile" aria-controls="mobile-menu" aria-expanded="false">
      <?php echo svg_icon('menu-icon'); ?>
        <span class="sr-only">Open menu</span>
    </button>

    <a class="btn btn-beige nav-mobile" href="<?php echo esc_url(home_url('/contact/')); ?>" title="Book Consultation">Book Consultation</a>

    <div id="mobile-menu" class="mobile-menu nav-mobile" aria-hidden="true">
      <div class="mobile-menu-panel">

        <button class="mobile-menu-close" aria-label="Close menu">
          <?php echo svg_icon('close-icon'); ?>
        </button>

        <nav class="nav-mobile" aria-label="Mobile menu">
          <?php
          wp_nav_menu([
           'theme_location' => 'header_left',
           'container' => false,
            'menu_class' => 'menu',
           'fallback_cb' => false,
          ]);
          ?>
          <?php
          wp_nav_menu([
           'theme_location' => 'header_right',
           'container' => false,
            'menu_class' => 'menu',
           'fallback_cb' => false,
          ]);
          ?>

          <a href="<?php echo esc_url(home_url('/contact/')); ?>" title="Book Consultation">Book Consultation</a>
        </nav>
      </div>  
    </div>      
    
  </div>
</header>