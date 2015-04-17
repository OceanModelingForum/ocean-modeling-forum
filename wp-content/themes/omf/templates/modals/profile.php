<?php

/**
 * Modal template: profile.
 */

?>

<article class="Profile">

    <div class="u-container u-container--medium">

        <div class="Grid Grid--collapsable Grid--align-middle">

            <div class="Grid-cell u-size-3of12">

                <?php if ( ! empty($image)) : ?>

                    <div class="Profile-image" style="background-image: url(<?php echo $image['sizes']['medium'] ?>);"></div>

                <?php endif; ?>

            </div>

            <div class="Grid-cell u-size-9of12">

                <header class="Profile-header">

                    <h2 class="Profile-name"><?php echo apply_filters('the_title', $name); ?></h2>

                    <?php if ( ! empty($title)) : ?>

                        <p class="Profile-title"><?php echo apply_filters('the_title', $title); ?></p>

                    <?php endif; ?>

                    <?php if ( ! empty($organization)) : ?>

                        <p class="Profile-organization"><?php echo apply_filters('the_title', $organization); ?></p>

                    <?php endif; ?>

                </header>

                <?php if ( ! empty($bio)) : ?>

                    <div class="Profile-content">

                        <?php echo apply_filters('the_content', $bio); ?>

                    </div>

                <?php endif; ?>

            </div>

        </div>

    </div>

</div>
