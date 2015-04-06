<div class="Block-container u-align--<?php echo $text_alignment; ?>">

    <?php if (isset($title)) : ?>

        <h2 class="Block-title"><?php echo $title; ?></h2>

    <?php endif; ?>

    <?php if (isset($headline)) : ?>

        <p class="Block-headline"><?php echo $headline; ?></p>

    <?php endif; ?>

    <?php if (isset($extra)) : ?>

        <p class="Block-lede Block-lede--extra"><?php echo $extra; ?></p>

    <?php endif; ?>

    <?php if (isset($lede)) : ?>

        <p class="Block-lede"><?php echo $lede; ?></p>

    <?php endif; ?>

    <?php if (isset($text)) : ?>

        <div class="Entry">

            <?php echo $text; ?>

        </div>

    <?php endif; ?>


</div>
