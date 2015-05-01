<?php

/**
 * Template Name: Home Page
 *
 * Lay out content using ACF block type.
 */

use OMF\Image;
use OMF\Modal;

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

    if (get_field('show_next_arrow'))
    {
        $next_block = array(
            'title' => $first_block_title,
            'id' => $first_block_id
        );
    }
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

// Create an image object for use in the modal
// $image = new Image($banner['sizes']['large'], array(
//     'caption' => $banner['caption'],
// ));

/**
 * Content fields.
 */
$text = get_field('text');

/**
 * Create image modal
 */
// new Modal('test-modal-image', 'templates/images/modal', array(
//     'image' => $image,
// ), array(
//     'container_class' => 'Modal Modal--zoom'
// ));

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

    <?php if (isset($banner['caption']) && ! empty($banner['caption'])) : ?>

        <div class="Image-caption">

            <button class="Image-caption-button">
                <svg class="Image-caption-button-icon Image-caption-button-icon--open"><use xlink:href="#icon-info"></use></svg>
                <svg class="Image-caption-button-icon Image-caption-button-icon--close"><use xlink:href="#icon-cancel-circle"></use></svg>
            </button>

            <div class="Image-caption-content">
                <?php echo $banner['caption']; ?>
            </div>

        </div>

    <?php endif; ?>

</section>

<?php get_template_part('templates/blocks/controller'); ?>

<?php get_footer(); ?>
