<?php

/**
 * Control which block layout to display.
 */

// Check for content blocks
if ( ! have_rows('content_blocks')) return;

while (have_rows('content_blocks'))
{
    the_row();

    // Each row layout should have a block.php file
    // within a folder named for the row layout.
    get_template_part('templates/blocks/' . get_row_layout() . '/block');
}
