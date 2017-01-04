
  <?php if (is_front_page()) : ?>

    <?php if ( get_header_image() ) : ?>
      <!-- Organism: Main header -->
      <header class="main-header main-header_home aligner" style="background-image: url('<?php header_image(); ?>')">
    <?php else: ?>
      <header class="main-header main-header_home no-cover aligner">
    <?php endif; ?>

  <?php elseif (is_author()) : ?>

    <?php
      // Get author cover image url
      $author = get_user_by( 'slug', get_query_var( 'author_name' ) );
      $author_cover_image_url = get_user_meta($author->ID, 'author_cover_image', true);
    ?>

    <?php if ($author_cover_image_url) : ?>
      <!-- Organism: main-header_author -->
      <header class="main-header main-header_author" style="background-image: url(' <?php echo $author_cover_image_url ?> ')">
    <?php else: ?>
      <header class="main-header main-header_author no-cover">
    <?php endif; ?>


  <?php elseif (is_tag()) : ?>

    <?php
      // Get term cover image url
      $term_cover_image_url = get_term_meta( get_queried_object()->term_id, 'term_cover_image', true);
    ?>

    <?php if ($term_cover_image_url) : ?>
      <!-- Organism: main-header_tag -->
      <header class="main-header main-header_tag aligner" style="background-image: url(' <?php echo $term_cover_image_url ?> ')">
    <?php else: ?>
      <header class="main-header main-header_tag no-cover aligner">
    <?php endif; ?>

      <!-- Molecule: tag-page-hgroup -->
      <div class="vertical">
        <hgroup class="tag-page-hgroup">

          <h1 class="tag-title"> <?php single_tag_title(); ?> </h1>

          <!-- Atom: tag-description -->
          <h2 class="tag-description"> <?php echo term_description(); ?> </h2>

        </hgroup>
      </div>

  <?php else: ?>

    <?php if (has_post_thumbnail()) : ?>
      <!-- Organism: main-header_entry (size according to wp_is_mobile) -->
      <header class="main-header main-header_entry" style="background-image: url('<?php if (wp_is_mobile()) {the_post_thumbnail_url('medium');} else {the_post_thumbnail_url('');} ?>')">
    <?php else: ?>
      <header class="main-header main-header_entry no-cover">
    <?php endif; ?>

  <?php endif; ?>


  <!-- Molecule: Navbar -->
  <nav class="navbar">

    <!-- Atom: custom-logo-link -->
    <?php the_custom_logo() ?>
    <?php if (!has_custom_logo()) : ?>
    <!-- No Custom Logo, just display the site's name -->
    <a class="navbar-brand a2" href="<?= esc_url(home_url('/')); ?>"><?php bloginfo('name'); ?></a>
    <?php endif; ?>

    <!-- Atom: menu-button -->
    <a class="menu-btn icon-menu" href="#"> <span class="word">Menu</span> </a>

  </nav>

  <!-- If is_front_page -->
  <?php if (is_front_page()) : ?>

    <!-- Molecule: site-hgroup -->
    <div class="vertical">
      <hgroup class="site-hgroup">

        <h1 class="site-title"><?php bloginfo('name') ?></h1>

        <h2 class="site-description"><?php bloginfo('description') ?></h2>

      </hgroup>
    </div>

  <?php endif; ?>

  <!-- If is first page of pagination -->
  <?php if ( !is_paged() && get_header_image() ) : ?>

    <!-- Atom: scroll-down-arrow -->
    <a class="scroll-down-arrow icon-arrow-left js-scrolltoid radial-gradient" href="#js-scrollto" data-offset="45"><span hidden="true">Scroll Down</span></a>

  <?php endif; ?>

  <!-- </div> -->

</header>