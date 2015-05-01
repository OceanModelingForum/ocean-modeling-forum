<?php

/**
 * Display the image portion of an image/text block.
 */

$cell_classes = array(
    'Grid-cell',
    'u-size-' . $image_cell_size,
);

$cell_styles = array();

/**
 * Set up image.
 */
$image_field = get_sub_field('image');

$image_classes = array(
    'Image',
    'Image--bleed'
);

$image_styles = array();

if (isset($image_field['sizes']))
{
    $image_padding = ($image_field['sizes']['large-height'] / $image_field['sizes']['large-width']) * 100;

    $image_styles[] = 'background-image: url(' . $image_field['sizes']['large'] . ');';
    $image_styles[] = 'padding-top: ' . $image_padding . '%;';
}

/**
 * Image positioning
 */
$image_bias = get_sub_field('image_bias');
if ($image_bias) $image_styles[] = 'background-position: ' . str_replace('-', ' ', $image_bias) . ';';

/**
 * Image sizing
 */
$image_size = get_sub_field('image_size');
if ($image_size) $image_styles[] = 'background-size: ' . $image_size . ';';

?>

<div class="<?php echo implode(' ', $cell_classes); ?>" style="<?php echo implode(' ', $cell_styles); ?>">

    <div class="<?php echo implode(' ', $image_classes); ?>" style="<?php echo implode(' ', $image_styles); ?>">

        <img src="<?php echo $image_field['sizes']['large'] ?>" alt="<?php echo $image_field['caption']; ?>" />

        <?php if (isset($image_field['caption']) && ! empty($image_field['caption'])) : ?>

            <div class="Image-caption">

                <button class="Image-caption-button">
                    <svg class="Image-caption-button-icon Image-caption-button-icon--open"><use xlink:href="#icon-info"></use></svg>
                    <svg class="Image-caption-button-icon Image-caption-button-icon--close"><use xlink:href="#icon-cancel-circle"></use></svg>
                </button>

                <div class="Image-caption-content">
                    <?php echo $image_field['caption']; ?>
                </div>

            </div>

        <?php endif; ?>

    </div>

</div>
