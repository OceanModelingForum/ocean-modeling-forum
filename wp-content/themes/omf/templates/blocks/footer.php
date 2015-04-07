<?php

/**
 * The bottom of a block.
 */

?>

            </div>

        </div>

    </div>

    <?php if ( $image_placement == 'background' && $show_next_arrow ) : ?>

        <div class="Block-footer">

            <div class="Block-footer-inner">

                <?php if ($show_next_arrow) : ?>

                    <div class="u-align--center">

                        <?php echo $next_arrow; ?>

                    </div>

                <?php endif; ?>

            </div>

        </div>

    <?php endif; ?>

</section>
