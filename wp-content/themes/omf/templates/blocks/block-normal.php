<?php

/**
 * Show a layout block.
 *
 * Should be rendered via \OMF\Block class.
 */

?>

<section class="<?php echo $classes; ?>" id="<?php echo $id; ?>" style="<?php echo $styles; ?>">

    <div class="Block-header"></div>

    <div class="Block-content">

        <div class="Block-content-inner u-align--middle">

            <div class="Block-container">

                <div class="Grid Grid--collapsable">

                    <div class="Grid-cell u-size-6of12">

                        <?php if (isset($title)) : ?>

                            <h2 class="Block-title"><?php echo $title; ?></h2>

                        <?php endif; ?>

                        <?php if (isset($headline)) : ?>

                            <p class="Block-headline"><?php echo $headline; ?></p>

                        <?php endif; ?>

                        <?php if (isset($lede)) : ?>

                            <p class="Block-lede"><?php echo $lede; ?></p>

                        <?php endif; ?>

                        <?php if (isset($text)) : ?>

                            <?php echo $text; ?>

                        <?php endif; ?>

                    </div>


                </div>

            </div>

        </div>

    </div>

    <div class="Block-footer">

        <div class="Block-footer-inner u-align--center">

            <a class="Button Button--dark Button--arrow Button--arrow-down Button--wiggle" href="#approach">

                <div class="Button-title">Our Approach</div>

                <svg class="Button-icon"><use xlink:href="#icon-chevron-down"></use></svg>

            </a>

        </div>

    </div>

</section>
