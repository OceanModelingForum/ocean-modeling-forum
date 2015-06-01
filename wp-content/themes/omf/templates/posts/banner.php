<?php

/**
 * Display the news banner.
 */

$blog_id = get_option('page_for_posts');

$banner_classes = array(
    'Block',
    'Block--height-half',
    'Block--text-light'
);

$banner_styles = array();

/**
 * Banner image.
 */
$image = get_field('image', $blog_id);
if ($image) $banner_styles[] = 'background-image: url(' . $image['sizes']['large'] . ');';

/**
 * Title.
 */
$title = get_the_title($blog_id);

?>

<section class="<?php echo implode(' ', $banner_classes); ?>" style="<?php echo implode(' ', $banner_styles); ?>">

    <div class="Block-header"></div>

    <div class="Block-content">

        <div class="Block-content-inner u-align--bottom">

            <div class="u-container">

                <div class="Block-container u-align--left">

                    <h1 class="Block-headline"><?php echo apply_filters('the_title', $title); ?></h1>

                </div>

            </div>


        </div>

    </div>

</section>
