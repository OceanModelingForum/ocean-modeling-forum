<?php
/**
 * Display the main menu
 */

$args = array(
    'theme_location'    => 'main-menu',
    'container'         => false,
    'depth'             => 1,
    'menu_class'        => 'Menu-items',
    'menu_id'           => false,
    'link_before'       => '<div class="u-container">',
    'link_after'        => '</div>'
);

?>

<nav class="Menu">

    <div class="Menu-content">

        <div class="Menu-center">

            <?php wp_nav_menu($args); ?>

            <div class="Menu-footer">

                <div class="u-container">

                    <h2 class="Menu-title">Contact</h2>

                    <ul class="Menu-small">

                        <li>
                            <a href="mailto:info@oceanmodelingforum.org">
                                <span>info@oceanmodelingforum.org</span>
                            </a>
                        </li>

                    </ul>

                </div>

            </div>

        </div>

    </div>

    <div class="Menu-overlay"></div>

</nav>
