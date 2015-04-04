<?php

use \ElContraption\WpPostType\PostType;
use \ElContraption\WpThemeConfig\ThemeConfig;

/*
|--------------------------------------------------------------------------
| Autoloader
|--------------------------------------------------------------------------
*/

require('vendor/autoload.php');

/*
|--------------------------------------------------------------------------
| Theme configuration
|--------------------------------------------------------------------------
*/

$config = ThemeConfig::getInstance();


/*
|--------------------------------------------------------------------------
| Load helpers
|--------------------------------------------------------------------------
*/

$includes = array(
    'lib/shortcodes.php',
);

foreach ($includes as $include)
{
    require_once($include);
}

/*
|--------------------------------------------------------------------------
| Redirect non-logged in users to the coming soon page
|--------------------------------------------------------------------------
*/

add_action('template_redirect', function()
{
    if (is_user_logged_in()) return;

    if (is_page('coming-soon')) return;

    wp_redirect(home_url('coming-soon'));
    exit();
});
