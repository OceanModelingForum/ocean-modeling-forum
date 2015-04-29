<?php

/**
 * Display a working group within the working groups block.
 */

$code = get_field('group_code');
$lede = get_field('lede');
$image = get_field('image');

$banner_styles = array(
    'background-position: center;',
);

if ($image) $banner_styles[] = 'background-image: url(' . $image['sizes']['large'] . ');';

?>

<article class="Card Card--hover-shadow Card--rounded">

    <a class="Card-link" href="<?php the_permalink(); ?>">

        <div class="Card-content" style="<?php echo implode(' ', $banner_styles); ?>">

            <div class="Card-content-inner u-align--bottom">

                <?php if ($code) : ?>

                    <p class="Card-title"><?php echo apply_filters('the_title', do_shortcode($code)); ?></p>

                <?php endif; ?>

                <h1 class="Card-headline"><?php the_title(); ?></h1>

                <?php if ($lede) : ?>

                    <p class="Card-lede"><?php echo apply_filters('the_title', $lede); ?></p>

                <?php endif; ?>

            </div>

        </div>

    </a>

</article>
