<?php

/**
 * Show a layout block.
 *
 * Should be assigned attributes and rendered via \OMF\Block class.
 */

use OMF\WorkingGroups;

$wgs = WorkingGroups::getInstance();

if ($working_groups_selection == 'all')
{
    $groups = $wgs->all();
}

?>

<section class="<?php echo $classes; ?>" style="<?php echo $styles; ?>" id="<?php echo $id; ?>">

    <div class="Block-header">

        <div class="Block-header-inner">

            <div class="u-container">

                <h2 class="Block-title u-align--center">Working Groups</h2>

            </div>

        </div>

    </div>

    <div class="Block-content">

        <div class="Block-content-inner u-align--<?php echo $text_placement_vertical; ?>">

            <div class="u-container">

                <div class="Grid Grid--padded Grid--collapsable">

                    <?php if ($groups->have_posts()) : ?>

                        <?php while ($groups->have_posts()) : $groups->the_post(); ?>

                            <div class="Grid-cell u-size-6of12">

                                <?php get_template_part('templates/working-groups/excerpt'); ?>

                            </div>

                        <?php endwhile; ?>

                    <?php endif; wp_reset_postdata(); ?>

                </div>

            </div>

        </div>

    </div>

    <div class="Block-footer">

        <div class="Block-footer-inner">

            <br>

            <?php if ($show_next_arrow) : ?>

                <div class="u-align--center">

                    <?php echo $next_arrow; ?>

                </div>

            <?php endif; ?>

        </div>

    </div>

</section>
