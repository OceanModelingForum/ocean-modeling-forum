<?php

/**
 * Template Name: Home Page
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
    $first_block_id = sanitize_title($first_block_title);

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
$text = get_field('text');

?>

<section class="<?php echo implode(' ', $banner_classes); ?>" style="<?php echo implode(' ', $banner_styles); ?>">

    <div class="Block-header"></div>

    <div class="Block-content">

        <div class="Block-content-inner u-align--middle">

            <div class="u-container">

                <div class="Block-container u-align--center">

                    <?php if ($text) : ?>

                        <p class="Block-lede Block-lede--extra"><?php echo apply_filters('the_title', do_shortcode($text)); ?></p>

                    <?php endif; ?>

                </div>

            </div>


        </div>

    </div>

    <div class="Block-footer">

        <div class="Block-footer-inner">

            <?php if (isset($next_block)) : ?>

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
