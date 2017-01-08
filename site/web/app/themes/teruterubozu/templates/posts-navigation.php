<!-- Molecule: Pagination -->
<nav class="page-navigation">
  <!-- Atom: Button -->
  <div class="nav-page-link nav-previous">
    <?php previous_posts_link( __('Newer Posts', 'teruterubozu') )  ?>
  </div>
  <!-- Atom: Navigation pages -->
  <div class="navigation-pages">
    <?php Roots\Sage\Extras\posts_pagination(); ?>
  </div>
  <!-- Atom: Button -->
  <div class="nav-page-link nav-next">
    <?php next_posts_link( __('Older Posts', 'teruterubozu') )  ?>
  </div>
</nav>
