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
define('DB_NAME', 'designerclub-isb');

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
define('AUTH_KEY',         '!h#[,Q`(3dGrds/(RAw5ld[+pfEcGj(q`W[sfGFY0`Lu*iD^_(T6KnzFuS8*7(:}');
define('SECURE_AUTH_KEY',  'Kh@;-E1N6;9p:N2B48SK<#$:Cv]-l6ip3rw_;aA~QxXkY3u%?MI`75O?c%@IZ0Os');
define('LOGGED_IN_KEY',    'B[x43iBymhLUaXbQ,*JsNCj(b8h29]`.0l/+MZQMk-jVh$T4hH=,Xh8`R{DIi{X;');
define('NONCE_KEY',        '/-oF|@+`<P#@zM+}?w)f8H3EsqL>!A326PQHP*K-&ri*s8wKM2:y,D-S%Lk>c~)+');
define('AUTH_SALT',        '@rCmiX<Hsf)jV&j=Je#.^7,!)Q>Ev:oUHKOe.{0O{hV(k;/MpDn?g[u{8VYEg%pl');
define('SECURE_AUTH_SALT', 'zXhim:x=`X!06y*w{0-aY5 j1,+5|g;5 nBo#Vo0BVmD/UV5:QAA[b`E{lhAbC^%');
define('LOGGED_IN_SALT',   '>Y)6|@N!49ret@@T}|WnumH .~Yiy92RFgmL)N {#t/WbrKb2hohOox*v8]Tg,/8');
define('NONCE_SALT',       'IzyRz??BBag~CF[A:tn@s(cd@Y REMP0ehcB]~nz3X5=@9$oaf0=~;idw*{r:vqr');

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
