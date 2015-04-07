<?php

use OMF\Block;

$blog_id = get_option('page_for_posts');

$image = get_field('image', $blog_id);

/**
 * Banner block
 */
$args = array(
    'type' => 'normal',
    'image' => $image['sizes']['large'],
    'image_placement' => 'background',
    'text_placement_vertical' => 'bottom',
    'text_placement_horizontal' => 'left',
    'text_width' => 'contain',
    'image_caption' => $image['caption'],
    'headline' => get_the_title($blog_id),
);

$attributes = array(
    'height' => 'half',
    'text' => 'light',
    'background' => 'dark'
);

$banner = new Block($args, $attributes);

$banner->show();
