<?php

add_filter('excerpt_more', function($more)
{
    global $post;

    return '<a class="Article-read-more-link" href="' . get_permalink($post) . '">' . $more . '</a>';
});
