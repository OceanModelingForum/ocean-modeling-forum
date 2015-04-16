<?php

/**
 * News page
 */

get_header();

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

<div class="Page" role="main">

    <div class="u-container">

        <div class="Grid Grid--padded Grid--collapsable">

            <div class="Grid-cell u-size-8of12">

                <?php if (have_posts()) : ?>

                    <?php while (have_posts()) : the_post(); ?>

                        <?php get_template_part('templates/news/article'); ?>

                    <?php endwhile; ?>

                <?php endif; ?>

            </div>

            <div class="Grid-cell u-size-4of12">

                <div class="Entry">

                    <h4>@oceanmodeling on Twitter</h4>

                    <br>

                </div>


                <a class="twitter-timeline" data-dnt="true" href="https://twitter.com/OceanModeling" data-widget-id="580799425318027264">Tweets by @OceanModeling</a>
                <script>!function(d,s,id){var js,fjs=d.getElementsByTagName(s)[0],p=/^http:/.test(d.location)?'http':'https';if(!d.getElementById(id)){js=d.createElement(s);js.id=id;js.src=p+"://platform.twitter.com/widgets.js";fjs.parentNode.insertBefore(js,fjs);}}(document,"script","twitter-wjs");</script>


            </div>

        </div>

    </div>

</div>

<?php get_footer(); ?>
