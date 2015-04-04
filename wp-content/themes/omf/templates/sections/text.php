<?php
/**
 * Display a text section
 */
$layout = get_row_layout();
$title = apply_filters('the_title', get_sub_field('title'));
$supertitle = apply_filters('the_title', get_sub_field('supertitle'));
$text = apply_filters('the_content', get_sub_field('text'));
$backgroundColor = get_sub_field('background_color');
$customBackgroundColor = get_sub_field('custom_background_color');
$textColor = get_sub_field('text_color');
$customTextColor = get_sub_field('custom_text_color');
$id = sanitize_title($supertitle);

$classes = array();
$classes[] = 'Section Section--' . $layout;
$classes[] = 'Section--text-' . $textColor;
$classes[] = 'Section--' . $backgroundColor;

$styles = array();

if ($backgroundColor == 'custom') $styles[] = 'background-color: ' . $customBackgroundColor . ';';
if ($textColor == 'custom') $styles[] = 'color: ' . $customTextColor . ';';

?>

<section class="<?php echo implode(' ', $classes); ?>" style="<?php echo implode(' ', $styles); ?>" id="<?php echo $id; ?>">

    <div class="Grid Grid--collapsable">

        <div class="Grid-cell u-size-12of12 u-pad">

            <div class="u-container">

                <?php if ($title || $supertitle) : ?>

                    <header class="Section-header">

                        <?php if ($supertitle) : ?>

                            <p class="Section-supertitle"><?php echo $supertitle; ?></p>

                        <?php endif; ?>

                        <?php if ($title) : ?>

                            <h2 class="Section-title"><?php echo $title; ?></h2>

                        <?php endif; ?>

                    </header>

                <?php endif; ?>

                <?php if ($text) : ?>

                    <div class="Section-content">

                        <div class="Entry">

                            <?php echo $text; ?>

                        </div>

                    </div>

                <?php endif; ?>

            </div>

        </div>

    </div>

</section>
