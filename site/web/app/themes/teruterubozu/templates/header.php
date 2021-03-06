
  <?php if (is_front_page()) : ?>

    <?php if ( get_header_image() ) : ?>
      <header class="main-header main-header_home aligner" style="background-image: url('<?php header_image(); ?>')">
    <?php else: ?>
      <header class="main-header main-header_home no-cover aligner">
    <?php endif; ?>

  <?php elseif (is_author()) :
      // Get author cover image url
      $author = get_user_by( 'slug', get_query_var( 'author_name' ) );
      $author_cover_image_url = get_user_meta($author->ID, 'author_cover_image', true);
    ?>

    <?php if ($author_cover_image_url) : ?>
      <header class="main-header main-header_author" style="background-image: url(' <?php echo $author_cover_image_url ?> ')">
    <?php else: ?>
      <header class="main-header main-header_author no-cover">
    <?php endif; ?>

  <?php elseif (is_tag()) :
      // Get term cover image url
      $term_cover_image_url = get_term_meta( get_queried_object()->term_id, 'term_cover_image', true);
    ?>

    <?php if ($term_cover_image_url) : ?>
      <header class="main-header main-header_tag aligner" style="background-image: url(' <?php echo $term_cover_image_url ?> ')">
    <?php else: ?>
      <header class="main-header main-header_tag no-cover aligner">
    <?php endif; ?>

    <div class="vertical">
      <div class="label-page-hgroup">
        <h1 class="label-title"> <?php single_tag_title(); ?> </h1>
        <h2 class="label-description"> <?php echo term_description(); ?> </h2>
      </div>
    </div>

  <?php elseif (is_search()) : ?>
    <header class="main-header main-header_search no-cover aligner">
  <?php else: ?>

    <?php if (has_post_thumbnail()) : ?>
      <header class="main-header main-header_entry" style="background-image: url('<?php if (wp_is_mobile()) {the_post_thumbnail_url('medium');} else {the_post_thumbnail_url('');} ?>')">
      <?php else: ?>
        <header class="main-header main-header_entry no-cover">
    <?php endif; ?>

  <?php endif; ?>

  <nav class="navbar">

    <?php the_custom_logo() ?>

    <a class="menu-btn icon-menu" href="#"> <span class="word"><?php _e( 'Menu', 'teruterubozu' ) ?></span> </a>

  </nav>

  <?php if (is_front_page()) : ?>
    <div class="vertical">
      <div class="site-hgroup">
        <h1 class="site-title"><?php bloginfo('name') ?></h1>
        <h2 class="site-description"><?php bloginfo('description') ?></h2>
      </div>
    </div>
  <?php endif; ?>

  <?php if ( !is_paged() && get_header_image() ) : ?>
    <a class="scroll-down-arrow icon-arrow-left js-scrolltoid radial-gradient" href="#js-scrollto" data-offset="45"><span hidden><?php _e( 'Scroll Down', 'teruterubozu' ) ?></span></a>
  <?php endif; ?>

  </header>
