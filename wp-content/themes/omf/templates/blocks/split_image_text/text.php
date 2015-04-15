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

/**
 * Content fields.
 */
$title = get_sub_field('title');
$headline = get_sub_field('headline');
$lede = get_sub_field('lede');
$text = get_sub_field('text');

?>

<div class="<?php echo implode(' ', $classes); ?>" style="<?php echo implode(' ', $styles); ?>">

    <div class="Block-container">

        <?php if ($title) : ?>

            <h2 class="Block-title"><?php echo apply_filters('the_title', $title); ?></h2>

        <?php endif; ?>

        <?php if ($headline) : ?>

            <p class="Block-headline"><?php echo apply_filters('the_title', $headline); ?></p>

        <?php endif; ?>

        <?php if ($lede) : ?>

            <p class="Block-lede"><?php echo apply_filters('the_title', $lede); ?></p>

        <?php endif; ?>

        <?php if ($text) : ?>

            <div class="Entry">

                <?php echo apply_filters('the_content', $text); ?>

            </div>

        <?php endif; ?>

    </div>

</div>
