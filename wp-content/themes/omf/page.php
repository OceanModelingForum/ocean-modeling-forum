<?php

/**
 * The standard page template.
 */

get_header();

get_template_part('templates/pages/banner');

?>

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
