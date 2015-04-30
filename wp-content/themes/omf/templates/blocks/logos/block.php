<?php

/**
 * Display a sponsor logos block.
 */

$id = sanitize_title(get_sub_field('title'));

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
 * Logos
 */
$logos = get_sub_field('logos');

$logo_groups = array_chunk($logos, 3);


?>
<section class="<?php echo implode(' ', $block_classes); ?>" style="<?php echo implode(' ', $block_styles); ?>" id="<?php echo $id; ?>">

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

                <?php foreach ($logo_groups as $logo_group) : ?>

                    <div class="Grid Grid--table Grid--collapsable Grid--align-middle u-table-layout-fixed">

                        <?php foreach ($logo_group as $logo) : ?>

                            <div class="Grid-cell u-size-4of12 u-align--center">

                                <?php include locate_template('templates/blocks/logos/logo.php'); ?>

                            </div>

                        <?php endforeach; ?>

                    </div>

                <?php endforeach; ?>

            </div>

        </div>

    </div>

    <div class="Block-footer">

        <div class="Block-footer-inner">

            <br><br>

            <?php if (isset($next_values[$id])) : ?>

                <div class="u-align--center">

                    <a class="Button Button--dark Button--arrow Button--arrow-down" href="#<?php echo $next_values[$id]['id']; ?>">

                        <div class="Button-title"><?php echo $next_values[$id]['title']; ?></div>

                        <svg class="Button-icon"><use xlink:href="#icon-chevron-down"></use></svg>

                    </a>

                </div>

            <?php endif; ?>

        </div>

    </div>

</section>
