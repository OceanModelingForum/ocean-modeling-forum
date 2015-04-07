<?php

/**
 * News article excerpt.
 */

?>

<article class="Card">

    <div class="Card-header">

        <h3 class="Card-title"><a href="<?php the_permalink() ?>"><?php the_title(); ?></a></h3>

        <div class="Card-meta">
            <time datetime="<?php get_the_date('c'); ?>"><?php echo get_the_date('M d, Y'); ?></time>
        </div>


    </div>

    <div class="Card-content">

        <?php the_content(); ?>

    </div>

</article>
