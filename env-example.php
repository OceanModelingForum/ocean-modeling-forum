<?php
/**
 * Environment-specific configuration
 */
$env = array();

/**
 * Debug mode
 */
$env['debug'] = false;

/**
 * WordPress database settings
 */
$env['db_name']             = '';
$env['db_user']             = 'root';
$env['db_pass']             = 'root';
$env['db_host']             = 'localhost';
$env['db_charset']          = 'utf8';
$env['db_collate']          = '';
$env['table_prefix']        = 'wp_';

/**
 * WordPress auth keys
 *
 * Change these to different unique phrases!
 * You can generate these using the {@link https://api.wordpress.org/secret-key/1.1/salt/ WordPress.org secret-key service}
 * You can change these at any point in time to invalidate all existing cookies. This will force all users to have to log in again.
 */
$env['auth_key']            = '';
$env['secure_auth_key']     = '';
$env['logged_in_key']       = '';
$env['nonce_key']           = '';
$env['auth_salt']           = '';
$env['secure_auth_salt']    = '';
$env['logged_in_salt']      = '';
$env['nonce_salt']          = '';

/**
 * Production deployment settings
 */
$env['production'] = array(

    /**
     * SSH credentials: you@server.com
     */
    'ssh' => '',

    /**
     * Repository URL: git@github.com/username/projectname.git
     */
    'repository' => '',

    /**
     * Release directory: path on the server to store releases
     * e.g. /var/www/releases
     */
    'release_dir' => '',

    /**
     * App directory: path on the server to symlink to the current release
     * e.g. /var/www/public_html
     */
    'app_dir' => '',

    /**
     * Shared directory: path on the server to share files between releases
     * e.g. /var/www/shared
     */
    'shared_dir' => '',

    /**
     * Shared assets: array of files to share between releases
     * e.g. ['.htaccess', 'env.php', 'wp-content/uploads']
     *
     * The path to the asset in the shared directory must match the path set here
     */
    'shared_assets' => '',

    /**
     * Composer directory: the path to the directory to run composer install on
     * e.g. /var/www/public_html/wp-content/themes/theme-name
     */
    'composer_dir' => ''
);

return $env;
