<nav class="page-navigation">
  <div class="nav-page-link nav-previous">
    <?php previous_posts_link( __('Newer Posts', 'teruterubozu') )  ?>
  </div>
  <div class="navigation-pages">
    <?php Roots\Sage\Extras\posts_pagination(); ?>
  </div>
  <div class="nav-page-link nav-next">
    <?php next_posts_link( __('Older Posts', 'teruterubozu') )  ?>
  </div>
</nav>
