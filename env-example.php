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

return $env;
