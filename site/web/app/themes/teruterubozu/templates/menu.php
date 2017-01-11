<nav class="main-menu pushy pushy-right">
  <h3 class="menu-title"> <?php echo __('MENU', 'teruterubozu') ?> </h3>
  <a href="#" class="menu-close pushy-link">
    <span hidden>Close</span>
  </a>

  <?php
  if (has_nav_menu('primary_navigation')) :
    wp_nav_menu(['theme_location' => 'primary_navigation', 'menu_class' => 'nav']);
  endif;
  ?>

  <a href="<?php bloginfo('atom_url'); ?>" class="subscribe-button"><?php echo __('Subscribe', 'teruterubozu') ?></a>

</nav>
