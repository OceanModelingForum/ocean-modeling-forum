<?php

/**
 * The bottom of a block.
 */

?>

            </div>

        </div>

    </div>

    <?php if ( $image_placement == 'background' ) : ?>

        <div class="Block-footer">

            <div class="Block-footer-inner">

                <?php if ($show_next_arrow) : ?>

                    <div class="u-align--center">

                        <?php echo $next_arrow; ?>

                    </div>

                <?php endif; ?>

                <?php if ($image_caption) : ?>

                    <div class="Image-caption">
                        <?php echo $image_caption; ?>
                    </div>

                <?php endif; ?>

            </div>

        </div>

    <?php endif; ?>

</section>
