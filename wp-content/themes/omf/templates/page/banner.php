<?php

/**
 * Display the page banner.
 */

$banner_classes = array(
    'Block',
    'Block--height-half',
    'Block--text-light'
);

$banner_styles = array();

/**
 * Banner image.
 */
$image = get_field('image');
if ($image) $banner_styles[] = 'background-image: url(' . $image['sizes']['large'] . ');';

/**
 * Title.
 */
$title = get_the_title();

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
