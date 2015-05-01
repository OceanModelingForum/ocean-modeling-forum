<?php

/**
 * Modal template: profile.
 */

?>

<div class="Profile-modal">

    <button class="Modal-close-button" data-modal-dismiss>
        <svg><use xlink:href="#icon-cancel-circle"></use></svg>
    </button>

    <div class="Profile-modal-content">

        <div class="u-container u-container--medium">

            <article class="Profile" data-modal-prevent-dismiss="yes">

                <div class="Profile-inner" data-modal-prevent-dismiss="inner">

                    <div class="Grid Grid--collapsable Grid--align-top">

                        <div class="Grid-cell u-size-4of12">

                            <?php if ($image) : ?>

                                <div class="Bio-card-image" style="background-image: url(<?php echo $image['sizes']['medium']; ?>);"></div>

                            <?php endif; ?>

                        </div>

                        <div class="Grid-cell u-size-8of12">

                            <header class="Bio-card-header">

                                <h3 class="Bio-card-name"><?php echo $name; ?></h3>

                                <?php if ($title) : ?>

                                    <p class="Bio-card-title"><?php echo apply_filters('the_title', $title); ?></p>

                                <?php endif; ?>

                                <?php if ($organization) : ?>

                                    <p class="Bio-card-org"><?php echo apply_filters('the_title', $organization); ?></p>

                                <?php endif; ?>

                            </header>

                            <?php if ($bio) : ?>

                                <br>

                                <div class="Bio-card-content">

                                    <?php echo apply_filters('the_content', $bio); ?>

                                </div>

                            <?php endif; ?>

                        </div>

                    </div>

                </div>

            </div>

        </div>


    </div>

</div>
