<?php
/**
 * Display an image | text section
 */
$type = get_sub_field('type');
$image = get_sub_field('image');
$imagePosition = get_sub_field('image_position');
$title = apply_filters('the_title', get_sub_field('title'));
$supertitle = apply_filters('the_title', get_sub_field('supertitle'));
$text = apply_filters('the_content', get_sub_field('text'));
$backgroundColor = get_sub_field('background_color');
$customBackgroundColor = get_sub_field('custom_background_color');
$textColor = get_sub_field('text_color');
$customTextColor = get_sub_field('custom_text_color');
$id = sanitize_title($supertitle);

$classes = array();
$classes[] = 'Section Section--' . $type;
$classes[] = 'Section--image-' . $imagePosition;
$classes[] = 'Section--text-' . $textColor;
$classes[] = 'Section--' . $backgroundColor;

$styles = array();

if ($backgroundColor == 'custom') $styles[] = 'background-color: ' . $customBackgroundColor . ';';
if ($textColor == 'custom') $styles[] = 'color: ' . $customTextColor . ';';

?>

<section class="<?php echo implode(' ', $classes); ?>" style="<?php echo implode(' ', $styles); ?>" id="<?php echo $id; ?>">

    <div class="Grid Grid--collapsable Grid--align-<?php echo $imagePosition; ?><?php if ($imagePosition == 'bleed') echo ' Grid--table'; ?>">

        <?php if ($type == 'text-image') : ?>

            <?php include locate_template('templates/sections/image-text/text.php'); ?>

            <?php include locate_template('templates/sections/image-text/image.php'); ?>

        <?php elseif ($type == 'image-text') : ?>

            <?php include locate_template('templates/sections/image-text/image.php'); ?>

            <?php include locate_template('templates/sections/image-text/text.php'); ?>

        <?php endif; ?>

    </div>

</section>
