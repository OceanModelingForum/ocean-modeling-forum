<?php

/**
 * Display a logo within the logos block.
 */

$image = $logo['image']['sizes']['small'];
$link = isset($logo['link']) ? $logo['link'] : false;

?>

<article class="Bucket">

    <?php if ($link) : ?>

        <a class="Bucket-link" href="<?php echo apply_filters('the_title', $link); ?>">

    <?php else : ?>

        <div class="Bucket-link">

    <?php endif; ?>

            <img class="Bucket-icon" src="<?php echo $image ?>" alt="" />

    <?php if ($link) : ?>

        </a>

    <?php else : ?>

        </div>

    <?php endif; ?>

</article>
