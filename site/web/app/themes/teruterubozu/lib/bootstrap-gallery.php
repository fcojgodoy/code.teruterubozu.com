<?php

namespace Teruterubozu\BootstrapGallery;

add_filter( 'post_gallery', __NAMESPACE__ . '\\bootstrap_gallery', 10, 3 );

function bootstrap_gallery( $output = '', $atts, $instance )
{
    $atts = array_merge(array('columns' => 3), $atts);

    $columns = $atts['columns'];
    $images = explode(',', $atts['ids']);

    if ($columns == 1) { $col_class = 'col-md-12';}
    else if ($columns == 2) { $col_class = 'col-md-6'; }
    else if ($columns == 3) { $col_class = 'col-md-4'; }
    else if ($columns == 4) { $col_class = 'col-md-3'; }
    else if ($columns == 6) { $col_class = 'col-md-2'; }
    // other column counts

    $return = '<div class="row gallery">';

    $i = 0;

    foreach ($images as $key => $value) {

        if ($i%$columns == 0 && $i > 0) {
            $return .= '</div><div class="row gallery">';
        }

        $image_attributes = wp_get_attachment_image_src($value, 'full');

        $return .= '
            <div class="'.$col_class.'">
                <a data-gallery="gallery" href="'.$image_attributes[0].'">
                    <img src="'.$image_attributes[0].'" alt="" class="img-responsive">
                </a>
            </div>';

        $i++;
    }

    $return .= '</div>';

    return $return;
}