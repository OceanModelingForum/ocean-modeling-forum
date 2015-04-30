<?php

/**
 * Working Group
 *
 * Lay out content using ACF block type.
 */

get_header();

/**
 * Get the title and id of the next block, for the next arrow.
 */
$blocks = get_field('content_blocks');

if ($blocks)
{
    $first_block = $blocks[0];

    $first_block_title = apply_filters('the_title', $first_block['title']);
    $first_block_next_text = apply_filters('the_title', $first_block['next_arrow_text']);
    $first_block_id = sanitize_title($first_block_title);

    if ( ! empty($first_block_next_text)) $first_block_title = $first_block_next_text;

    $next_block = array(
        'title' => $first_block_title,
        'id' => $first_block_id
    );
}

/**
 * Build classes and styles.
 */
$banner_classes = array(
    'Block',
    'Block--height-full',
    'Block--text-light'
);

$banner_styles = array();

/**
 * Handle banner.
 */
$banner = get_field('image');

if (isset($banner['sizes'])) $banner_styles[] = 'background-image: url(' . $banner['sizes']['large'] . ');';

/**
 * Content fields.
 */
$code = get_field('group_code');
$lede = get_field('lede');

?>

<section class="<?php echo implode(' ', $banner_classes); ?>" style="<?php echo implode(' ', $banner_styles); ?>">

    <div class="Block-header"></div>

    <div class="Block-content">

        <div class="Block-content-inner u-align--bottom">

            <div class="u-container">

                <div class="Block-container u-align--center">

                    <?php if ($code) : ?>

                        <p class="Block-title"><?php echo apply_filters('the_title', do_shortcode($code)); ?></p>

                    <?php endif; ?>

                    <h1 class="Block-headline"><?php the_title(); ?></h1>

                    <?php if ($lede) : ?>

                        <p class="Block-lede"><?php echo apply_filters('the_title', $lede); ?></p>

                    <?php endif; ?>

                </div>

            </div>

        </div>

    </div>

    <div class="Block-footer">

        <div class="Block-footer-inner">

            <?php if (isset($next_block) && get_field('show_next_arrow')) : ?>

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

<?php get_template_part('templates/blocks/controller'); ?>

<?php get_footer(); ?>
