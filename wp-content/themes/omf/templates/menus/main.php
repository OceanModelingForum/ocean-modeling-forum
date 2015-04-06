<?php
/**
 * Display the main menu
 */

$main = array(
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

            <ul class="Menu-items">

                <li>
                    <a href="{{root}}">
                        <div class="u-container">
                            Home
                        </div>
                    </a>
                </li>

                <li>
                    <a href="{{root}}#working-groups">
                        <div class="u-container">
                            Working Groups
                        </div>
                    </a>
                </li>

                <li>
                    <a href="{{root}}#summary">
                        <div class="u-container">
                            About OMF
                        </div>
                    </a>
                </li>

                <li>
                    <a href="{{root}}news">
                        <div class="u-container">
                            News
                        </div>
                    </a>
                </li>

            </ul>

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
