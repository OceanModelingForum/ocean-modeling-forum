<?php

use \ElContraption\WpPostType\PostType;
use \ElContraption\WpThemeConfig\ThemeConfig;
use \OMF\Profiles;
use \OMF\WorkingGroups;

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
    'lib/files.php',
);

foreach ($includes as $include)
{
    require_once($include);
}

/*
|--------------------------------------------------------------------------
| Initialize Working Groups
|--------------------------------------------------------------------------
*/

WorkingGroups::getInstance();

/*
|--------------------------------------------------------------------------
| Initialize Profiles
|--------------------------------------------------------------------------
*/

Profiles::getInstance();

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
