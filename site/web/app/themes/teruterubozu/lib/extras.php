<?php

namespace Teruterubozu\Extras;

use Teruterubozu\Setup;

/**
 * Add <body> classes
 */
function body_class($classes) {
  // Add page slug if it doesn't exist
  if (is_single() || is_page() && !is_front_page()) {
    if (!in_array(basename(get_permalink()), $classes)) {
      $classes[] = basename(get_permalink());
    }
  }

  // Add class if sidebar is active
  if (Setup\display_sidebar()) {
    $classes[] = 'sidebar-primary';
  }

  // Add class if post thumbnail is missing
  if ( isset ( $post->ID ) && !get_the_post_thumbnail($post->ID)) {
    $classes[] = 'no-featured-image';
  }

  return $classes;
}
add_filter('body_class', __NAMESPACE__ . '\\body_class');

/**
 * Clean up the_excerpt()
 */
function excerpt_more() {
  return ' <a class="excerpt-more" href="' . get_permalink() . '">&raquo;</a>';
}
add_filter('excerpt_more', __NAMESPACE__ . '\\excerpt_more');

/**
* Change excerpt lenght
* https://codex.wordpress.org/Plugin_API/Filter_Reference/excerpt_length
*/
function custom_excerpt_length( $length ) {
  return 26;
}
add_filter( 'excerpt_length',  __NAMESPACE__ . '\\custom_excerpt_length', 999 );

/**
 * Create numeric pagination
 * http://www.hudku.com/blog/add-numbered-page-navigation-wordpress-plugin/
 * http://codex.wordpress.org/Function_Reference/paginate_links
 */
function posts_pagination() {
  global $wp_query;
  $big = 12345678;
  $page_format = paginate_links( array(
    'base' => str_replace( $big, '%#%', esc_url( get_pagenum_link( $big ) ) ),
    'format' => '?paged=%#%',
    'current' => max( 1, get_query_var('paged') ),
    'total' => $wp_query->max_num_pages,
    'type'  => 'array',
    'prev_next' => false
  ) );
  if (is_array($page_format) ) {
  $paged = ( get_query_var('paged') == 0 ) ? 1 : get_query_var('paged');
    // echo '<div><ul>';
    echo '<span>' . __('Page', 'teruterubozu') . ' ' . $paged . ' ' . __('of', 'teruterubozu') . ' ' . $wp_query->max_num_pages .'</span>';
    // foreach ( $page_format as $page ) {
    //         echo "<li>$page</li>";
    // }
    // echo '</ul></div>';
  }
}

/**
 * Responsive embed with Bootstrap on 16by9 aspect radio
 * https://lorut.no/responsive-youtube-vimeo-embed-bootstrap-roots-io-wordpress/
 */
function bootstrap_wrap_oembed( $html ){
  $html = preg_replace( '/(width|height)="\d*"\s/', "", $html ); // Strip width and height #1
  return'<div class="embed-responsive embed-responsive-16by9">'.$html.'</div>'; // Wrap in div element and return #3 and #4
}
add_filter( 'embed_oembed_html', __NAMESPACE__ . '\\bootstrap_wrap_oembed',10,1);

/**
 * Getting rid of archive 'label'
 * https://developer.wordpress.org/reference/functions/get_the_archive_title/
 */
 function getting_rid_archive_label( $title ) {
    if ( is_category() ) {
        $title = single_cat_title( '', false );
    } elseif ( is_tag() ) {
        $title = single_tag_title( '', false );
    } elseif ( is_author() ) {
        $title = '<span class="vcard">' . get_the_author() . '</span>';
    } elseif ( is_post_type_archive() ) {
        $title = post_type_archive_title( '', false );
    } elseif ( is_tax() ) {
        $title = single_term_title( '', false );
    }

    return $title;
}

add_filter( 'get_the_archive_title', __NAMESPACE__ . '\\getting_rid_archive_label' );
