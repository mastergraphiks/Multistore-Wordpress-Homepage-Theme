<?php
/**
 * The base configurations of the WordPress.
 *
 * This file has the following configurations: MySQL settings, Table Prefix,
 * Secret Keys, WordPress Language, and ABSPATH. You can find more information
 * by visiting {@link http://codex.wordpress.org/Editing_wp-config.php Editing
 * wp-config.php} Codex page. You can get the MySQL settings from your web host.
 *
 * This file is used by the wp-config.php creation script during the
 * installation. You don't have to use the web site, you can just copy this file
 * to "wp-config.php" and fill in the values.
 *
 * @package WordPress
 */

// ** MySQL settings - You can get this info from your web host ** //
/** The name of the database for WordPress */
define('DB_NAME', 'designerclub');

/** MySQL database username */
define('DB_USER', 'root');

/** MySQL database password */
define('DB_PASSWORD', '');

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
define('AUTH_KEY',         '*;e~R:3m-[jAg#xD=OKH2:Z<#KRSgmp?[qq-D|;Jbj4UO++JhOdpEE m1C> r)B=');
define('SECURE_AUTH_KEY',  ',)%eP*3aI;,3I_aA)LAG(-iph).%$|6R,jusWfb4S~^]0q@Ol7sO*9`th+gXS?ve');
define('LOGGED_IN_KEY',    'tjxyKyr@&u%6?@Wy}L;!ElR!0y;&2*#o8`=hIX$^P/P8=g^2.+eO&~wkx/1&FW[&');
define('NONCE_KEY',        't EdApG!,<dnOiK{@ImRksJAcI*R[/X6xg~PKsV!%&8rZKBlqMJB-#Z|&Q[OGnF+');
define('AUTH_SALT',        'n)7!*rmma5=lPOT6}~n~tGvuB>`4Tw]9a~=O[^uhf]X>6iRScNE$n|_Wep}8F|WV');
define('SECURE_AUTH_SALT', '~HTkk#<,|3^eV+R8)#T L+x$F.m+FRrckCf>Q ETKJTV}s`RxH(GV9Ce7*~txxw}');
define('LOGGED_IN_SALT',   '+SC-/3l?QWBkm)RP5#OZ[U3q>;Ff``%8|bjFm%;Bv0djE/}[GH3kcB0&XY`  16M');
define('NONCE_SALT',       'feTDOT[8u5UfHIiR#pHQGJH.%dOE gPccm2tLoO, n|e*za4d<+rATnaPYWD2k7t');

/**#@-*/

/**
 * WordPress Database Table prefix.
 *
 * You can have multiple installations in one database if you give each a unique
 * prefix. Only numbers, letters, and underscores please!
 */
$table_prefix  = 'wp_';

/**
 * WordPress Localized Language, defaults to English.
 *
 * Change this to localize WordPress. A corresponding MO file for the chosen
 * language must be installed to wp-content/languages. For example, install
 * de_DE.mo to wp-content/languages and set WPLANG to 'de_DE' to enable German
 * language support.
 */
define('WPLANG', '');

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
