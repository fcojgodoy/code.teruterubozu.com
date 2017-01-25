## Instructions
#### Show the data in the frontend

````
<?php if (get_the_author_meta('city')) : ?>
  <em class="author-location icon-location"><?php echo get_the_author_meta( 'city' ); ?></em>
<?php endif ; ?>
````
