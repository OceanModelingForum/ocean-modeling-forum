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

        <section class="Banner" style="<?php echo implode(' ', $banner_styles); ?>">

            <header class="Banner-header">

                <div class="Banner-header-content">

                    <div class="u-container">

                        <?php if ($code) : ?>

                            <p class="Banner-supertitle"><?php echo apply_filters('the_title', $code); ?></p>

                        <?php endif; ?>

                        <h1 class="Banner-title"><?php the_title(); ?></h1>

                        <?php if ($lede) : ?>

                            <p class="Banner-lede"><?php echo apply_filters('the_title', $lede); ?></p>

                        <?php endif; ?>

                    </div>

                </div>

            </header>

        </section>

    </a>

</article>
