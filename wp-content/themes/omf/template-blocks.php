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

        // $id = get_queried_object()->ID;
        //
        // $type       = get_field('type', $id);
        // $image      = get_field('image', $id);
        // $supertitle = apply_filters('the_title', do_shortcode(get_field('supertitle', $id)));
        // $title      = apply_filters('the_title', do_shortcode(get_field('title', $id)));
        // $text       = apply_filters('the_title', do_shortcode(get_field('text', $id)));
        // $anchor     = str_replace('-', ' ', get_field('image_anchor', $id));
        //
        // $styles = array(
        //     'background-image: url(' . $image['sizes']['medium'] . ');',
        //     'background-position: ' . $anchor . ';',
        // );

        $args = array(
            'type'              => get_sub_field('type'),
            'title'             => apply_filters('the_title', do_shortcode(get_sub_field('title'))),
            'headline'          => apply_filters('the_title', get_sub_field('headline')),
            'lede'              => apply_filters('the_title', get_sub_field('lede')),
            'text'              => apply_filters('the_content', get_sub_field('text'))
        );

        $attributes = array(
            'height'            => get_sub_field('height'),
            'background'        => get_sub_field('background_color'),
            'text'              => get_sub_field('text_color'),
        );

        $block = new Block($args, $attributes);


        $block->show();
    }
}

get_footer();
