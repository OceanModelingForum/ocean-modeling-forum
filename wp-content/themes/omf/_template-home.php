<?php

/**
 * Template name: Home page
 *
 * Lay out content using ACF block type.
 */

use OMF\Block;

get_header();

/**
 * Get the title and id of the first repeater, for use with next arrow
 */
$count = 0;

$blocks = get_field('blocks');

if ($blocks)
{
    $first_block = $blocks[0];



    $first_block_title = apply_filters('the_title', $first_block['title']);
    $first_block_id = sanitize_title($first_block_title);

    $next_block = array(
        'title' => $first_block_title,
        'id' => $first_block_id
    );
}

/**
 * Handle banner
 */

$image = get_field('image');

$args = array(
    'type' => 'normal',
    'image' => $image['sizes']['large'],
    'image_placement' => 'background',
    'text_placement_vertical' => 'middle',
    'text_placement_horizontal' => 'center',
    'text_width' => 'contain',
    'text_alignment' => 'center',
    'extra' => apply_filters('the_title', do_shortcode(get_field('text'))),
    'show_next_arrow' => true,
    'next_block' => isset($next_block) ? $next_block : false,
    'image_caption' => $image['caption'],
);

$attributes = array(
    'height' => 'full',
    'text' => 'light',
);

$banner = new Block($args, $attributes);

$banner->show();

get_template_part('templates/blocks/repeater');

get_footer();
