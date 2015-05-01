<?php

/**
 * Display an event within a schedule block.
 */

?>

<article class="Event">

    <div class="Grid Grid--align-middle">

        <div class="Grid-cell u-size-8of12">

            <header class="Event-header">

                <h3 class="Event-title">

                    <?php if (isset($event['link']) && ! empty($event['link'])) : ?>

                        <a href="<?php echo get_permalink($event['link']); ?>">

                    <?php endif; ?>

                            <?php echo apply_filters('the_title', $event['title']); ?>

                    <?php if (isset($event['link']) && ! empty($event['link'])) : ?>

                            <svg><use xlink:href="#icon-chevron-right"></use></svg>

                        </a>

                    <?php endif; ?>

                </h3>

            </header>

        </div>

        <div class="Grid-cell u-size-4of12">

            <div class="Event-body">

                <?php if (isset($event['date'])) : ?>

                <time class="Event-date"><?php echo $event['date']; ?></time>

                <?php endif; ?>

                <p class="Event-location"><?php echo apply_filters('the_title', $event['location']); ?></p>

            </div>

        </div>

    </div>

</article>
