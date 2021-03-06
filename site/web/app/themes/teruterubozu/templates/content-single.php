<?php while (have_posts()) : the_post(); ?>
  <article <?php post_class(); ?>>

    <header>
      <h1 class="entry-title"><?php the_title(); ?></h1>
      <?php get_template_part('templates/entry-meta'); ?>
    </header>

    <div class="entry-content">
      <?php the_content(); ?>
    </div>

    <footer class="entry-footer">

      <?php echo get_avatar( get_the_author_meta('ID'), 68, null, null, array ( 'class' => array('author-avatar', 'border-double') ) ); ?>

      <div class="author-wrap">

        <h4 class="author-link">
          <a href="<?php echo esc_url( get_author_posts_url( get_the_author_meta( 'ID' ) ) ); ?>" rel="author"><?php echo get_the_author(); ?></a>
        </h4>

        <p class="author-bio">
          <?php echo get_the_author_meta( 'description' ); ?>
        </p>

        <!--
        - Check if there is a 'location' author meta
        - Show 'location' author meta -->
        <?php if ( get_the_author_meta( 'location' ) ) : ?>
          <em class="author-location icon-location"><?php echo get_the_author_meta( 'location' ); ?></em>
        <?php endif ; ?>

        <?php if (get_the_author_meta( 'url' )) : ?>
          <em class="author-web icon-link">
            <a href="<?php echo get_the_author_meta( 'url' ); ?>"><?php echo get_the_author_meta( 'url' ); ?></a>
          </em>
        <?php endif; ?>

      </div>

      <div class="share">
        <h4 class="share-title"><?php _e( 'Share this post', 'teruterubozu' ) ?></h4>
        <!-- Add Twitter tweet button with Tweet Web Intent
              https://dev.twitter.com/web/tweet-button/web-intent
        -->
        <script type="text/javascript" async src="https://platform.twitter.com/widgets.js"></script>
        <a class="icon-twitter" title="<?php _e( 'Share on Twitter', 'teruterubozu' ) ?>" href="https://twitter.com/intent/tweet?text=<?php print(urlencode(the_title())); ?>&url=<?php print(urlencode(the_permalink())); ?>">
        </a>

        <!-- Add Facebook share button -->
        <a class="icon-facebook" title="<?php _e( 'Share on Facebook', 'teruterubozu' ) ?>" href="<?php print(urlencode(the_permalink())); ?>"
          onclick="
          window.open(
            'https://www.facebook.com/sharer/sharer.php?u='+encodeURIComponent(location.href),
            'facebook-share-dialog',
            'width=626,height=436');
            return false;">
        </a>

        <!-- Add Google Plus share button -->
        <a class="icon-google-plus" title="<?php _e( 'Share on Google Plus', 'teruterubozu' ) ?>" href="https://plus.google.com/share?url=http://bower.io"
          onclick="
          javascript:window.open(
          this.href,'','menubar=no,toolbar=no,resizable=yes,scrollbars=yes,height=600,width=600');
          return false;">
        </a>

      </div>

    <?php wp_link_pages(['before' => '<nav class="page-nav"><p>' . __('Pages:', 'teruterubozu'), 'after' => '</p></nav>']); ?>

    </footer>

    <?php comments_template('/templates/comments.php'); ?>

  </article>

  <div class="posts-navigation">

    <?php $nextPost = get_next_post(); if($nextPost): ?>
      <?php if (has_post_thumbnail( $nextPost->ID ) ): ?>
        <?php $nextthumbnail = wp_get_attachment_image_src( get_post_thumbnail_id($nextPost->ID), '' ); $nextthumbnail = $nextthumbnail[0]; ?>
      <?php else :
        $nextthumbnail = get_stylesheet_directory_uri() . '/images/default-featured.jpg'; ?>
      <?php endif; ?>

      <div class="nav-post-newer">
        <a class="nav-post-link" href="<?php echo get_permalink(get_adjacent_post( false, '', false)); ?>" style="background-image:url(<?php echo $nextthumbnail; ?>);">
          <div class="wrap">
            <span class="nav-post-button btn"><?php _e('Read this next', 'teruterubozu') ?></span>
            <h2 class="nav-post-title"><?php echo get_the_title( $nextPost->ID ) ?></h2>
          </div>
        </a>
      </div>

    <?php endif; ?>

    <?php $prevPost = get_previous_post(); if($prevPost): ?>
      <?php if (has_post_thumbnail( $prevPost->ID ) ): ?>
        <?php $prevthumbnail = wp_get_attachment_image_src( get_post_thumbnail_id($prevPost->ID), '' ); $prevthumbnail = $prevthumbnail[0]; ?>
      <?php else :
        $prevthumbnail = get_stylesheet_directory_uri() . '/images/default-featured.jpg'; ?>
      <?php endif; ?>

      <div class="nav-post-older">

        <a class="nav-post-link" href="<?php echo get_permalink(get_adjacent_post( false, '', true)); ?>" style="background-image:url(<?php echo $prevthumbnail; ?>);">
          <div class="wrap">
            <span class="nav-post-button btn"><?php _e('You might enjoy', 'teruterubozu') ?></span>
            <h2 class="nav-post-title"><?php echo get_the_title( $prevPost->ID ) ?></h2>
          </div>
        </a>

      </div>

    <?php endif; ?>


  </div>

<?php endwhile; ?>
