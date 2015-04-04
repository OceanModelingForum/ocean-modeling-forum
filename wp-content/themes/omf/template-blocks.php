<?php

/**
 * Template name: Blocks
 *
 * Lay out content using ACF block type.
 */

use OMF\Block;

get_header();

if (have_rows('blocks'))
{
    while (have_rows('blocks'))
    {
        the_row();

        $styles = array();

        if (get_sub_field('background_color') === 'custom') $styles['background-color'] = get_sub_field('background_color_custom');
        if (get_sub_field('text_color') === 'custom') $styles['color'] = get_sub_field('text_color_custom');

        $args = array(
            'type'              => get_sub_field('type'),
            'title'             => apply_filters('the_title', do_shortcode(get_sub_field('title'))),
            'headline'          => apply_filters('the_title', get_sub_field('headline')),
            'lede'              => apply_filters('the_title', get_sub_field('lede')),
            'text'              => apply_filters('the_content', get_sub_field('text')),
            'styles'            => $styles,
        );

        $attributes = array(
            'height'            => get_sub_field('height'),
            'background'        => get_sub_field('backround_color'),
            'text'              => get_sub_field('text_color'),
        );

        $block = new Block($args, $attributes);


        $block->show();
    }
}

get_footer();
