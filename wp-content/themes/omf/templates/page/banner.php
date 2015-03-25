<?php
/**
 * Display a page banner
 */

$id = get_queried_object()->ID;

$type       = get_field('type', $id);
$image      = get_field('image', $id);
$supertitle = apply_filters('the_title', do_shortcode(get_field('supertitle', $id)));
$title      = apply_filters('the_title', do_shortcode(get_field('title', $id)));
$text       = apply_filters('the_title', do_shortcode(get_field('text', $id)));

?>
<section class="Banner Banner--<?php echo $type; ?>" style="background-image: url(<?php echo $image['sizes']['medium'] ?>);">

    <header class="Banner-header">

        <div class="Banner-header-content">

            <div class="u-container">

                <?php if ($type == 'normal') : ?>

                    <?php if ($supertitle) : ?>

                        <p class="Banner-supertitle"><?php echo $supertitle; ?></p>

                    <?php endif; ?>

                    <?php if ($title) : ?>

                        <p class="Banner-title"><?php echo $title; ?></p>

                    <?php endif; ?>

                    <?php if ($text) : ?>

                        <p class="Banner-lede"><?php echo $text; ?></p>

                    <?php endif; ?>

                <?php elseif ($type == 'centered') : ?>

                    <?php if ($text) : ?>

                        <p class="Banner-superlede"><?php echo $text; ?></p>

                    <?php endif; ?>

                <?php endif; ?>

            </div>

        </div>

    </header>

    <div class="Banner-footer">

        <a class="Banner-arrow" href="#summary">
            <!--<div class="Banner-arrow-title">Making Models Matter</div>-->
            <div class="Banner-arrow-icon">
                <svg><use xlink:href="#icon-expand-more"></use></svg>
            </div>
        </a>

    </div>

</section>
