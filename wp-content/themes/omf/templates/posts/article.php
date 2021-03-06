<?php

/**
 * News article excerpt.
 */

?>

<article class="Article">

    <div class="Article-header">

        <h3 class="Article-title"><a href="<?php the_permalink() ?>"><?php the_title(); ?></a></h3>

        <div class="Article-meta">
            <time datetime="<?php get_the_date('c'); ?>"><?php echo get_the_date('M d, Y'); ?></time>
        </div>


    </div>

    <div class="Article-content">

        <div class="Entry">

            <?php the_content(); ?>

        </div>

    </div>

    <footer class="Article-footer">

        <?php comments_template() ?>

    </footer>

</article>
