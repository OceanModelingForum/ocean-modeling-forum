<?php

/**
 * The top of a block.
 */

?>

<section class="<?php echo $classes; ?>" style="<?php echo $styles; ?>" id="<?php echo $id; ?>">

    <?php if ($image_placement == 'background') : ?>

        <div class="Block-header"></div>

    <?php endif; ?>

    <div class="Block-content">

        <div class="Block-content-inner u-align--<?php echo $text_placement_vertical; ?>">

            <div class="Grid<?php if ($image_placement !== 'background') echo ' Grid--table'; ?> Grid--collapsable">
