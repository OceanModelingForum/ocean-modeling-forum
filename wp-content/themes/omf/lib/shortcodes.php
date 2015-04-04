<?php

use OMF\Image;

/**
 * [emphasis][/emphasis]
 */
add_shortcode('emphasis', function($atts, $content = '')
{
    return do_shortcode("<em>$content</em>");
});

/**
 * [working-group name=""]
 */
add_shortcode('working-group', function($atts)
{
    $image = new Image(array(
        'src'       => 'http://placehold.it/600x400',
        'url'       => 'http://example.com/',
        'classes'   => array(
            'u-ratio-5to2'
        ),
    ));

    return $image->get();
});
