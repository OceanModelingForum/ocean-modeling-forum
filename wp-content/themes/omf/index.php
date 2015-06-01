<?php

/**
 * News page
 */

get_header();

?>

<?php get_template_part('templates/posts/banner'); ?>

<div class="Page" role="main">

    <div class="u-container">

        <div class="Grid Grid--padded Grid--collapsable">

            <div class="Grid-cell u-size-8of12">

                <?php if (have_posts()) : ?>

                    <?php while (have_posts()) : the_post(); ?>

                        <?php get_template_part('templates/posts/article'); ?>

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
