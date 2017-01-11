<article <?php post_class("entry-resume"); ?>>
  <header>
    <h2 class="entry-title"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
  </header>

  <div class="entry-summary">
    <?php the_excerpt(); ?>
  </div>

  <?php get_template_part('templates/entry-meta'); ?>

</article>

<hr class="decorative-line">
