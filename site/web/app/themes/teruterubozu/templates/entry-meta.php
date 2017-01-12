<div class="entry-meta">
  <?php if (!is_single() ) : ?>

    <?php echo get_avatar( get_the_author_meta('ID'), 24, null, null, array('class' => 'author-avatar') ); ?>
    <a class="author-link" rel="author" href="<?= get_author_posts_url(get_the_author_meta('ID')); ?>"><?= get_the_author(); ?></a>
    <div class="tags"><?php the_tags( '<span class="tags-on">' . __('on ', 'teruterubozu') . '</span>' ); ?></div>
    <?php the_date('', '<time class="entry-date">', '</time>'); ?>

  <?php else: ?>

    <?php the_date('', '<time class="entry-date">', '</time>'); ?>
    <div class="tags"><?php the_tags( __('on ', 'teruterubozu') ); ?></div>

  <?php endif; ?>
</div>
