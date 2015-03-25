<?php

/**
 * [emphasis][/emphasis]
 */
add_shortcode('emphasis', function($atts, $content = '')
{
    return do_shortcode("<em>$content</em>");
});
