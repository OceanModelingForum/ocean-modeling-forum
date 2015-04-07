<?php

use OMF\Block;

$page = get_queried_object();

$image = get_field('image', $page->ID);

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
    'headline' => get_the_title($page->ID),
);

$attributes = array(
    'height' => 'half',
    'text' => 'light',
    'background' => 'dark'
);

$banner = new Block($args, $attributes);

$banner->show();
