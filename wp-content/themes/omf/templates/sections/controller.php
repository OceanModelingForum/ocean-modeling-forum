<?php
/**
 * Controls which section to output
 */

if (have_rows('sections'))
{
    while (have_rows('sections'))
    {
        the_row();

        get_template_part('templates/sections/' . get_row_layout());
    }
}
