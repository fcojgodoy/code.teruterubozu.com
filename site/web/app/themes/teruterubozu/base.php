<?php
use Teruterubozu\Setup;
use Teruterubozu\Wrapper;
?>

<!doctype html>
<html <?php language_attributes(); ?>>
  <?php get_template_part('templates/head'); ?>
  <body <?php body_class(); ?>>

    <?php
      do_action('get_nav');
      get_template_part('templates/menu');
    ?>

    <div class="site-overlay"></div><!-- Site Overlay (Pushy) -->

    <div class="site-wrapper" id="container"><!-- Container for (Pushy) -->

      <?php
        do_action('get_header');
        get_template_part('templates/header');
      ?>

      <div class="container" id="js-scrollto" role="document">
        <div class="content row">
          <main class="main">
            <?php include Wrapper\template_path(); ?>
          </main><!-- /.main -->
          <?php if (Setup\display_sidebar()) : ?>
            <aside class="sidebar">
              <?php include Wrapper\sidebar_path(); ?>
            </aside><!-- /.sidebar -->
          <?php endif; ?>
        </div><!-- /.content -->
      </div><!-- /.wrap -->

      <?php
        do_action('get_footer');
        get_template_part('templates/footer');
      ?>

    </div><!-- /.site-wrapper -->

    <?php wp_footer(); ?>

  </body>
</html>
