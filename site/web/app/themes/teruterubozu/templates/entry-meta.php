<div class="entry-meta">
  <?php if (!is_single() ) : ?>

    <?php echo get_avatar( get_the_author_meta('ID'), 24, null, null, array('class' => 'author-avatar') ); ?>
    <a class="author-link" rel="author" href="<?php echo get_author_posts_url(get_the_author_meta('ID')); ?>"><?php echo get_the_author(); ?></a>
    <div class="tags"><?php the_tags( '<span class="tags-on">' . __('on ', 'teruterubozu') . '</span>' ); ?></div>
    <time class="entry-date" datetime="<?php the_time('c');?>"><?php the_date('j F Y');?></time>

  <?php else: ?>
    <time class="entry-date" datetime="<?php the_time('c');?>"><?php the_date('j F Y');?></time>
    <div class="tags"><?php the_tags( __('on ', 'teruterubozu') ); ?></div>

  <?php endif; ?>
</div>
