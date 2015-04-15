<?php

/**
 * Display text content within block.
 */

/**
 * Content fields.
 */
$title = get_sub_field('title');
$headline = get_sub_field('headline');
$lede = get_sub_field('lede');
$text = get_sub_field('text');

/**
 * Text alignment
 */
$text_alignment = get_sub_field('text_alignment');

?>

<div class="Block-container u-align--<?php echo $text_alignment; ?>">

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
