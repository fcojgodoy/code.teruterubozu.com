<div class="content-page">
  <?php the_content(); ?>
</div>

<?php wp_link_pages(['before' => '<nav class="page-nav"><p>' . __('Pages:', 'teruterubozu'), 'after' => '</p></nav>']); ?>

<?php comments_template('/templates/comments.php'); ?>
