<?php

/**
 * Display an event within a schedule block.
 */

?>

<article class="Event">

    <div class="Grid Grid--align-middle">

        <div class="Grid-cell u-size-8of12">

            <header class="Event-header">

                <h3 class="Event-title"><?php echo apply_filters('the_title', $event['title']); ?></h3>

            </header>

        </div>

        <div class="Grid-cell u-size-4of12">

            <div class="Event-body">

                <?php if (isset($event['date'])) : ?>

                <time class="Event-date"><?php echo $event['date']; ?></time>

                <?php endif; ?>

                <p class="Event-location">Seattle, WA</p>

            </div>

        </div>

    </div>

</article>
