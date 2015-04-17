<?php

/**
 * Register sidebars.
 */
add_action('widgets_init', function()
{
    register_sidebar(array(
        'name'          => 'Page sidebar',
        'id'            => 'page_sidebar',
        'before_widget' => '<div class="Widget">',
        'after_widget'  => '</div>',
        'before_title'  => '<h2 class="Widget-title">',
        'after_title'   => '</h2>'
    ));
});
