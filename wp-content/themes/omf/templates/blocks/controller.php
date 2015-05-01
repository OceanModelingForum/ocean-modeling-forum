<?php

/**
 * Control which block layout to display.
 */

// Check for content blocks
if ( ! have_rows('content_blocks')) return;

/**
 * Collect block repeater fields for next arrows.
 */

$next_values = array();
$last_id = false;

while (have_rows('content_blocks'))
{
    the_row();

    $title = get_sub_field('title');
    $next_text = get_sub_field('next_arrow_text');

    $id = sanitize_title($title);

    $title = ! empty($next_text) ? apply_filters('the_title', $next_text) : apply_filters('the_title', $title);

    if ($last_id && get_sub_field('show_next_arrow')) $next_values[$last_id] = array(
        'title' => $title,
        'id' => $id
    );

    $last_id = $id;
}

while (have_rows('content_blocks'))
{
    the_row();

    // Each row layout should have a block.php file
    // within a folder named for the row layout.
    include locate_template('templates/blocks/' . get_row_layout() . '/block.php');
}
