<?php

if (! file_exists(dirname(__FILE__) . '/env.php')) {
	throw new Exception('Could not find an env.php file with local configuration settings.');
}

$env = require(dirname(__FILE__) . '/env.php');

define('DB_NAME', $env['db_name']);
define('DB_USER', $env['db_user']);
define('DB_PASSWORD', $env['db_pass']);
define('DB_HOST', $env['db_host']);
define('DB_CHARSET', $env['db_charset']);
define('DB_COLLATE', $env['db_collate']);
define('AUTH_KEY', $env['auth_key']);
define('SECURE_AUTH_KEY', $env['secure_auth_key']);
define('LOGGED_IN_KEY', $env['logged_in_key']);
define('NONCE_KEY', $env['nonce_key']);
define('AUTH_SALT', $env['auth_salt']);
define('SECURE_AUTH_SALT', $env['secure_auth_salt']);
define('LOGGED_IN_SALT', $env['logged_in_salt']);
define('NONCE_SALT', $env['nonce_salt']);

$table_prefix  = $env['table_prefix'];

define('WP_DEBUG', $env['debug']);

if ( !defined('ABSPATH') )
	define('ABSPATH', dirname(__FILE__) . '/');

/** Sets up WordPress vars and included files. */
require_once(ABSPATH . 'wp-settings.php');
