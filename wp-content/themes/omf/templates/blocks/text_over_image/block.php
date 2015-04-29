<?php

/**
 * Display a text over image block.
 */

$id = sanitize_title(get_sub_field('title'));

/**
* Collect dynamic element classes.
*/
$block_classes = array(
    'Block',
);

$block_styles = array();

$grid_classes = array(
    'Grid',
    'Grid--collapsable',
);

/**
 * Block height
 */
$block_height = get_sub_field('height');
if ($block_height) $block_classes[] = 'Block--height-' . $block_height;

/**
 * Vertical text placement–applied to Grid container.
 */
$text_placement_vertical = get_sub_field('text_placement_vertical');

/**
 * Text width.
 */
$text_width = get_sub_field('text_width');

/**
 * Horizontal text placement.
 */
$text_placement_horizontal = get_sub_field('text_placement_horizontal');

/**
 * Background image
 */
$image = get_sub_field('image');
if ($image) $block_styles[] = 'background-image: url(' . $image['sizes']['large'] . ');';

/**
 * Image positioning
 */
$image_bias = get_sub_field('image_bias');

if ($image_bias)
{
    $block_styles[] = 'background-position: ' . str_replace('-', ' ', $image_bias) . ';';
}

/**
 * Image size
 */
$image_size = get_sub_field('image_size');
if ($image_size) $block_styles[] = 'background-size: ' . $image_size . ';';

/**
 * Text color.
 */
$text_color = get_sub_field('text_color');
if ($text_color !== 'custom') $block_classes[] = 'Block--text-' . $text_color;

/**
 * Background color.
 */
$background_color = get_sub_field('background_color');
if ($background_color !== 'custom') $block_classes[] = 'Block--background-' . $background_color;

?>

<section class="<?php echo implode(' ', $block_classes); ?>" style="<?php echo implode(' ', $block_styles); ?>" id="<?php echo $id; ?>">

    <div class="Block-header"></div>

    <div class="Block-content">

        <div class="Block-content-inner u-align--<?php echo $text_placement_vertical; ?>">

            <div class="<?php echo implode(' ', $grid_classes); ?>">

                <?php if ($text_width == 'half') : ?>

                    <?php if ($text_placement_horizontal == 'center') : ?>

                        <div class="Grid-cell u-size-3of12"></div>

                    <?php elseif ($text_placement_horizontal == 'right') : ?>

                        <div class="Grid-cell u-size-6of12"></div>

                    <?php endif; ?>

                    <div class="Grid-cell u-size-6of12">

                        <?php get_template_part('templates/blocks/shared/content'); ?>

                    </div>

                <?php else : ?>

                    <div class="Grid-cell">

                        <div class="u-container">

                            <?php get_template_part('templates/blocks/shared/content'); ?>

                        </div>

                    </div>

                <?php endif; ?>

            </div>

        </div>

    </div>

    <div class="Block-footer">

        <div class="Block-footer-inner">

            <?php if (isset($next_values[$id])) : ?>

                <div class="u-align--center">

                    <a class="Button Button--dark Button--arrow Button--arrow-down" href="#<?php echo $next_values[$id]['id']; ?>">

                        <div class="Button-title"><?php echo $next_values[$id]['title']; ?></div>

                        <svg class="Button-icon"><use xlink:href="#icon-chevron-down"></use></svg>

                    </a>

                </div>

            <?php endif; ?>

        </div>

    </div>

</section>
