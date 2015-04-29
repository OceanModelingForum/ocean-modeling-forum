<?php

/**
 * Display the image portion of an image/text block.
 */

$cell_classes = array(
    'Grid-cell',
    'u-size-' . $image_cell_size,
);

$cell_styles = array();

$image_classes = array(
    'Image',
    'Image--bleed'
);

$image_styles = array();

/**
 * Set up image.
 */
$image = get_sub_field('image');

if (isset($image['sizes']))
{
    $image_padding = ($image['sizes']['large-height'] / $image['sizes']['large-width']) * 100;

    $image_styles[] = 'background-image: url(' . $image['sizes']['large'] . ');';
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

        <img src="<?php echo $image['sizes']['large'] ?>" alt="<?php echo $image['caption']; ?>" />

    </div>

</div>
