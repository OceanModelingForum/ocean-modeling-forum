<?php

/**
 * Display a block that shows member profiles.
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
 * Profiles
 */
$profiles = get_sub_field('profiles');

/**
 * Content fields.
 */
$title = get_sub_field('title');
$text = get_sub_field('text');


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

                <div class="Grid Grid--collapsable">

                    <?php if ($profiles) : ?>

                        <?php foreach ($profiles as $profile) : ?>

                            <?php if (count($profiles) == 1) : ?>

                                <div class="Grid-cell u-size-4of12"></div>

                            <?php elseif(count($profiles) == 2) : ?>

                                <div class="Grid-cell u-size-1of12"></div>

                            <?php else : ?>

                            <?php endif; ?>

                            <div class="Grid-cell u-size-4of12">

                                <?php include locate_template('templates/blocks/profiles/profile.php'); ?>

                            </div>

                        <?php endforeach; ?>

                    <?php endif; ?>

                </div>

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
