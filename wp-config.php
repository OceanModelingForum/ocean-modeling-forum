<?php
/**
 * The base configurations of the WordPress.
 *
 * This file has the following configurations: MySQL settings, Table Prefix,
 * Secret Keys, and ABSPATH. You can find more information by visiting
 * {@link http://codex.wordpress.org/Editing_wp-config.php Editing wp-config.php}
 * Codex page. You can get the MySQL settings from your web host.
 *
 * This file is used by the wp-config.php creation script during the
 * installation. You don't have to use the web site, you can just copy this file
 * to "wp-config.php" and fill in the values.
 *
 * @package WordPress
 */

// ** MySQL settings - You can get this info from your web host ** //
/** The name of the database for WordPress */
define('DB_NAME', 'omf');

/** MySQL database username */
define('DB_USER', 'root');

/** MySQL database password */
define('DB_PASSWORD', 'root');

/** MySQL hostname */
define('DB_HOST', 'localhost');

/** Database Charset to use in creating database tables. */
define('DB_CHARSET', 'utf8');

/** The Database Collate type. Don't change this if in doubt. */
define('DB_COLLATE', '');

/**#@+
 * Authentication Unique Keys and Salts.
 *
 * Change these to different unique phrases!
 * You can generate these using the {@link https://api.wordpress.org/secret-key/1.1/salt/ WordPress.org secret-key service}
 * You can change these at any point in time to invalidate all existing cookies. This will force all users to have to log in again.
 *
 * @since 2.6.0
 */
define('AUTH_KEY',         't3YX;V$K*H1(gYMTD0PiWIn]W>0JFs QG5lSw[d[z6G?|2dytC$Q&NVaVrW1BZ+J');
define('SECURE_AUTH_KEY',  'DY&]J@/* BYR+Ws99-y1:EQi|s,QN8(,x B_45ra+-Blf;R^(|[>cP(0}djy1OaI');
define('LOGGED_IN_KEY',    '&Zn&G-kP17cA:-@2./&jLB86W$Ck=X(?+&rf%zs^+hw0V$|kvhmH~,8ccw[gW2Cb');
define('NONCE_KEY',        'J(5b_uluB#VG+$$L[cs1|EFb>eSfyoTk2R#6dOR}Ur5}j/T]sKsnw~|Df@q<kAx|');
define('AUTH_SALT',        '#s<SxVcNuS~D^7+su,sb6k659C|l*,mYqCXcTi#]}|q|xk&N2|7ch:#+V_0fvaP;');
define('SECURE_AUTH_SALT', '7-Mv%}D.>0@IXe+@Omrp]Tgx_}Sk)w?>/P~u2c;X+<+:shkS~+@M%,~uou@yoK[i');
define('LOGGED_IN_SALT',   'fUS@bNBw+z6a?t$.YX`[tn7{R2PM)NU)0O>l;-_*re.UPOl+OGs%-7<17{/-|giK');
define('NONCE_SALT',       '6 LG_~`2oP|jp_;?l#;.wXh/0.1%ULAI`?9345~7vz$AIru-5-fVx_3-@WZu;h{?');

/**#@-*/

/**
 * WordPress Database Table prefix.
 *
 * You can have multiple installations in one database if you give each a unique
 * prefix. Only numbers, letters, and underscores please!
 */
$table_prefix  = 'wp_';

/**
 * For developers: WordPress debugging mode.
 *
 * Change this to true to enable the display of notices during development.
 * It is strongly recommended that plugin and theme developers use WP_DEBUG
 * in their development environments.
 */
define('WP_DEBUG', false);

/* That's all, stop editing! Happy blogging. */

/** Absolute path to the WordPress directory. */
if ( !defined('ABSPATH') )
	define('ABSPATH', dirname(__FILE__) . '/');

/** Sets up WordPress vars and included files. */
require_once(ABSPATH . 'wp-settings.php');
