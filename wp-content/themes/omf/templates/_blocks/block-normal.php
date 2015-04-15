<?php

/**
 * Show a layout block.
 *
 * Should be assigned attributes and rendered via \OMF\Block class.
 */

?>

<?php include locate_template('templates/blocks/header.php'); ?>

    <?php if ($image_placement == 'left' && isset($image)) : ?>

        <div class="Grid-cell u-size-6of12">

            <?php include locate_template('templates/blocks/image.php'); ?>

        </div>

    <?php endif; ?>

    <?php if ($text_placement_horizontal == 'center') : ?>

        <?php if ($text_width == 'contain') : ?>

            <div class="Grid-cell u-size-12of12">

                <div class="u-container">

        <?php else : ?>

            <div class="Grid-cell u-size-3of12"></div>

            <div class="Grid-cell u-size-6of12">

        <?php endif; ?>

    <?php elseif ($text_placement_horizontal == 'right') : ?>

        <div class="Grid-cell u-size-6of12 u-float--right">

    <?php else : ?>

        <?php if ($text_width == 'contain' && $image_placement == 'background') : ?>

            <div class="Grid-cell u-size-12of12">

                <div class="u-container">

        <?php else : ?>

            <div class="Grid-cell u-size-6of12">

        <?php endif; ?>

    <?php endif; ?>

        <?php include locate_template('templates/blocks/content.php'); ?>

        <?php if ($show_next_arrow && $image_placement !== 'background') : ?>

            <div class="u-align--center">

                <?php echo $next_arrow; ?>

                <br><br>

            </div>

        <?php endif; ?>

        <?php if ($text_width == 'contain' && $image_placement == 'background') : ?>

            </div>

        <?php endif; ?>

    </div><?php // end content grid cell // ?>

    <?php if ($image_placement == 'right' && isset($image)) : ?>

        <div class="Grid-cell u-size-6of12">

            <?php include locate_template('templates/blocks/image.php'); ?>

        </div>

    <?php endif; ?>

<?php include locate_template('templates/blocks/footer.php'); ?>
