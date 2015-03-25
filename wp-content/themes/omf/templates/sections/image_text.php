<?php
/**
 * Display an image | text section
 */
$type = get_sub_field('type');
$image = get_sub_field('image');
$title = apply_filters('the_title', get_sub_field('title'));
$supertitle = apply_filters('the_title', get_sub_field('supertitle'));
$color = get_sub_field('color');
$textColor = get_sub_field('text_color');
?>

<section class="Section Section--<?php echo $type; ?> Section--text-<?php echo $textColor; ?>" style="background-color: <?php echo $color; ?>;">

    <div class="Grid Grid--collapsable">

        <div class="Grid-cell u-size-5of12">

            <figure class="Image">

                <img src="<?php echo $image['sizes']['medium'] ?>" alt="<?php echo $image['description'] ?>" />

            </figure>

        </div>

        <div class="Grid-cell u-size-6of12 u-pad">

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

                    <div class="u-container--text">

                        <div class="Entry">

                            <?php the_content(); ?>

                        </div>

                    </div>

                </div>

            <?php endif; ?>

        </div>

    </div>

</section>
