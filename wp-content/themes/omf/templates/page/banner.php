<?php

/**
 * Display a page banner
 */

use OMF\Block;

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

$banner = new Block(array());

?>

<?php $banner->show(); ?>
