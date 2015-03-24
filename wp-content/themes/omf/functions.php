<?php

use \ElContraption\WpThemeConfig\ThemeConfig;

/**
 * Autoloader
 */
require('vendor/autoload.php');

/**
 * WP Theme Config
 */
$config = ThemeConfig::getInstance();

/**
 * Redirect non-logged in users to the holding page.
 */
add_action('template_redirect', function()
{
    if (is_user_logged_in())
    {
        return;
    }

    if (is_page('coming-soon'))
    {
        return;
    }

    wp_redirect(home_url('coming-soon'));
});
