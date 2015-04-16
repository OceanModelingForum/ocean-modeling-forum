<?php

/**
 * The standard page template.
 */

get_header();

$banner_classes = array(
    'Block'
);

$banner_styles = array();

$image = get_field('image');

?>

<section class="<?php echo implode(' ', $banner_classes); ?>" style="<?php echo implode(' ', $banner_styles); ?>">

    <div class="Block-header"></div>

    <div class="Block-content">

        <div class="Block-content-inner u-align--bottom">

            <div class="u-container">

                <div class="Block-container u-align--center">

                Hi

                </div>

            </div>


        </div>

    </div>

    <div class="Block-footer">

        <div class="Block-footer-inner">

            <?php if (isset($next_block)) : ?>

                <div class="u-align--center">

                    <a class="Button Button--dark Button--arrow Button--arrow-down" href="#<?php echo $next_block['id']; ?>">

                        <div class="Button-title"><?php echo $next_block['title']; ?></div>

                        <svg class="Button-icon"><use xlink:href="#icon-chevron-down"></use></svg>

                    </a>

                </div>

            <?php endif; ?>

        </div>

    </div>

</section>

<div class="Page" role="main">

    <div class="u-container">

        <div class="Grid Grid--padded Grid--collapsable">

            <div class="Grid-cell u-size-8of12">

                <?php if (have_posts()) : ?>

                    <?php while (have_posts()) : the_post(); ?>

                        <?php the_content(); ?>

                    <?php endwhile; ?>

                <?php endif; ?>

            </div>

            <div class="Grid-cell u-size-4of12">

            </div>

        </div>

    </div>

</div>

<?php get_footer(); ?>
