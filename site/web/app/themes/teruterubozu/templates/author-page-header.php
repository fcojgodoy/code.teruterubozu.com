<div class="author-page-header">

  <div class="author-profile">
    <?php echo get_avatar( get_the_author_meta('ID'), 114, null, null, array ( 'class' => array ( 'author-avatar', 'border-simple') ) ); ?>

    <?php use Teruterubozu\Titles; ?>
    <h1 class="author-title"><?php echo Titles\title(); ?></h1>
    <h2 class="author-bio author-bio--lg">
      <?php echo get_the_author_meta( 'description' ); ?>
    </h2>

    <div class="author-meta">
      <?php if (get_the_author_meta( 'location' ) ) : ?>
        <em class="author-location icon-location"><?php echo get_the_author_meta( 'location' ); ?></em>
      <?php endif ; ?>

      <?php if (get_the_author_meta( 'url' )) : ?>
        <em class="author-web icon-link">
          <a href="<?php echo get_the_author_meta( 'url' ); ?>"><?php echo get_the_author_meta( 'url' ); ?></a>
        </em>
      <?php endif; ?>

      <?php if (get_the_author_posts()) : ?>
        <em class="author-stats icon-stats"><?php echo get_the_author_posts() . " " . __( 'posts', 'teruterubozu' ); ?> </em>
      <?php endif; ?>

    </div>
  </div>

  <hr class="decorative-line">

</div>
