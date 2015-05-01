<?php

use \OMF\WorkingGroups;
$wg = WorkingGroups::getInstance();

/**
 * Display a block that links to working groups.
 */

$block_id = sanitize_title(get_sub_field('title'));

/**
 * Collect dynamic element classes.
 */
$block_classes = array(
    'Block',
);

$block_styles = array();

/**
 * Text alignment.
 */
$text_alignment = get_sub_field('text_alignment');

/**
 * Text color.
 */
$text_color = get_sub_field('text_color');
if ($text_color !== 'custom') $block_classes[] = 'Block--text-' . $text_color;

/**
 * Background color.
 */
$background_color = get_sub_field('background_color');
if ($background_color !== 'custom') $block_classes[] = 'Block--background-' . $background_color;


/**
 * Content fields.
 */
$title = get_sub_field('title');
$text = get_sub_field('text');

/**
 * Show all or display select working groups.
 */
//$show_all = get_sub_field('show_all_working_groups');

$working_groups = $wg->all();


?>
<section class="<?php echo implode(' ', $block_classes); ?>" style="<?php echo implode(' ', $block_styles); ?>" id="<?php echo $block_id; ?>" name="<?php echo $block_id; ?>">

    <div class="Block-header">

        <div class="Block-header-inner u-align--<?php echo $text_alignment; ?>">

            <div class="u-container">

                <h2 class="Block-title u-align--center"><?php echo apply_filters('the_title', $title); ?></h2>

                <?php if ($text) : ?>

                    <p class="Block-lede"><?php echo apply_filters('the_title', $text); ?></p>

                <?php endif; ?>

            </div>

        </div>

    </div>

    <div class="Block-content">

        <div class="Block-content-inner u-align--<?php echo $text_placement_vertical; ?>">

            <div class="u-container">

                <div class="Grid Grid--collapsable Grid--padded Grid--padded-vertical">

                    <?php while ($working_groups->have_posts()) : $working_groups->the_post(); ?>

                        <div class="Grid-cell u-size-6of12">

                            <?php get_template_part('templates/blocks/working_groups/working-group'); ?>

                        </div>

                    <?php endwhile; wp_reset_postdata(); ?>

                </div>

            </div>

        </div>

    </div>

    <div class="Block-footer">

        <div class="Block-footer-inner">

            <br><br>

            <?php if (isset($next_values[$block_id])) : ?>

                <div class="u-align--center">

                    <a class="Button Button--dark Button--arrow Button--arrow-down" href="#<?php echo $next_values[$block_id]['id']; ?>">

                        <div class="Button-title"><?php echo $next_values[$block_id]['title']; ?></div>

                        <svg class="Button-icon"><use xlink:href="#icon-chevron-down"></use></svg>

                    </a>

                </div>

                <br>

            <?php endif; ?>

        </div>

    </div>

</section>
