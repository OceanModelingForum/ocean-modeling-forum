<?php

/**
 * Working group excerpt
 */

$image = get_field('image', get_the_ID());

?>

<article class="Card Card--hover-shadow Card--rounded">

    <a class="Card-link" href="<?php the_permalink(); ?>">

        <section class="Banner" style="background-image: url(<?php echo $image['sizes']['medium'] ?>);">

            <header class="Banner-header">

                <div class="Banner-header-content">

                    <div class="u-container">

                        <p class="Banner-supertitle"><?php the_field('group_code') ?></p>

                        <h3 class="Banner-title"><?php the_title(); ?></h3>

                        <p class="Banner-lede"><?php the_field('lede') ?></p>

                    </div>

                </div>

            </header>

        </section>

    </a>

</article>
