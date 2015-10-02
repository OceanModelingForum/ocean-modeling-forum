<?php

/**
 * Page template.
 */

get_header();

?>

<?php get_template_part('templates/page/banner'); ?>

<div class="Page" role="main">

    <div class="u-container">

        <div class="Grid Grid--padded Grid--collapsable">

            <div class="Grid-cell u-size-10of12">

                <?php if (have_posts()) : ?>

                    <?php while (have_posts()) : the_post(); ?>

                        <div class="Entry">

                            <?php the_content(); ?>

                        </div>

                    <?php endwhile; ?>

                <?php endif; ?>

            </div>

            <div class="Grid-cell u-size-2of12">

                <?php get_sidebar(); ?>

            </div>

        </div>

    </div>

</div>

<?php get_footer(); ?>
