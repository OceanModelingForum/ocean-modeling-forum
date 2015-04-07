<?php
/**
 * Displays the global footer
 */

$menu_args = array(
    'location' => 'footer_menu'
);

?>

    <footer class="Footer" role="contentinfo">

        <div class="u-container">

            <div class="Grid Grid--collapsable">

                <div class="Grid-cell u-size-6of12">

                    <nav class="Footer-menu">

                        <?php wp_nav_menu($menu_args); ?>

                    </nav>

                </div>

                <div class="Grid-cell u-size-6of12 u-align--right">

                    <a class="Footer-back-to-top" href="#top">Back to top</a>

                </div>

            </div>

        </div>

    </footer>

    </div><?php // /.Container ?>

    <?php wp_footer(); ?>

</body>
</html>
