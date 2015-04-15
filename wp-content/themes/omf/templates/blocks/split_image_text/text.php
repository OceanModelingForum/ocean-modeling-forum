<?php

/**
 * Display the text portion of an image/text block.
 */

/**
 * When text cell is on left, float to the left.
 */

$classes = array(
    'Grid-cell',
    'u-size-' . $text_cell_size,
);

$styles = array();

/**
 * Custom text color override.
 */
$text_color_custom = get_sub_field('text_color_custom');
if ($text_color == 'custom') $styles[] = 'color: ' . $text_color_custom . ';';

/**
 * Custom background color override.
 */
$background_color_custom = get_sub_field('background_color_custom');
if ($background_color == 'custom') $styles[] = 'background-color: ' . $background_color_custom . ';';

/**
 * Text alignment.
 */
$text_alignment = get_sub_field('text_alignment');
if ($text_alignment) $classes[] = 'u-align--' . $text_alignment;

?>

<div class="<?php echo implode(' ', $classes); ?>" style="<?php echo implode(' ', $styles); ?>">

    <?php include locate_template('templates/blocks/shared/content.php'); ?>

</div>
