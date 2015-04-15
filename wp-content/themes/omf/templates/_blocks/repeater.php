<?php

use OMF\Block;

/**
 * Collect block repeater fields for next arrow creation
 */
$next_values = array();
$last_id = false;

if (have_rows('blocks'))
{
    while (have_rows('blocks'))
    {
        the_row();

        $title = apply_filters('the_title', get_sub_field('title'));
        $id = sanitize_title($title);

        if ($last_id) $next_values[$last_id] = array(
            'title' => $title,
            'id' => $id
        );

        $last_id = $id;
    }
}

/**
 * Render content blocks
 */

if (have_rows('blocks'))
{
    while (have_rows('blocks'))
    {
        the_row();

        $styles = array();

        $image = get_sub_field('image');

        $image_placement = get_sub_field('image_placement');

        if (get_sub_field('background_color') === 'custom') $styles['background-color'] = get_sub_field('background_color_custom');
        if (get_sub_field('text_color') === 'custom') $styles['color'] = get_sub_field('text_color_custom');

        $args = array(
            'type'                      => get_sub_field('type'),
            'id'                        => sanitize_title(get_sub_field('title')),
            'title'                     => apply_filters('the_title', do_shortcode(get_sub_field('title'))),
            'headline'                  => apply_filters('the_title', get_sub_field('headline')),
            'lede'                      => apply_filters('the_title', get_sub_field('lede')),
            'text'                      => apply_filters('the_content', get_sub_field('text')),
            'description'               => apply_filters('the_content', get_sub_field('description')),
            'image_placement'           => $image_placement,
            'image_anchor'              => get_sub_field('image_anchor'),
            'text_placement_vertical'   => get_sub_field('text_placement_vertical'),
            'text_placement_horizontal' => get_sub_field('text_placement_horizontal'),
            'text_width'                => get_sub_field('text_width'),
            'text_alignment'            => get_sub_field('text_alignment'),
            'show_next_arrow'           => get_sub_field('show_next_arrow'),
            'working_groups_selection'  => get_sub_field('working_groups_selection'),
            'working_groups'            => get_sub_field('working_groups'),
            'styles'                    => $styles,
        );

        if (isset($next_values[$args['id']])) $args['next_block'] = $next_values[$args['id']];

        if (isset($image['sizes']))
        {
            if ($image_placement == 'background')
            {
                $args['image'] = $image['sizes']['large'];
                $args['image_padding'] = ($image['sizes']['large-height'] / $image['sizes']['large-width']) * 100 . '%';
            }
            else
            {
                $args['image'] = $image['sizes']['medium'];
                $args['image_padding'] = ($image['sizes']['medium-height'] / $image['sizes']['medium-width']) * 100 . '%';
            }

            $args['image_caption'] = $image['caption'];
        }

        $attributes = array(
            'height'            => get_sub_field('height'),
            'background'        => get_sub_field('background_color'),
            'text'              => get_sub_field('text_color'),
        );

        $block = new Block($args, $attributes);

        $block->show();
    }
}
