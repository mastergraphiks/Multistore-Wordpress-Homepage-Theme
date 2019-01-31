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
define('DB_NAME', 'designerclub-k');

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
define('AUTH_KEY',         'A>eTk5 ZLj*.Or0SeFq/08S}[Zlg<OY!ep8;sNV<o9i,:y*OvaJ5>8op/rYRBePi');
define('SECURE_AUTH_KEY',  ')r#LRtaEa!>!VS50WQuKCb]~&`IJjC<omwspEpocUww9*I3!zU,%{YUr1(-JjdO6');
define('LOGGED_IN_KEY',    'M^!gAK=ZDQM;6-^94sRiFcE?#eH*U<=1j-H2A3y}_ijyr<C,T_UtXUx7Af-*$h0f');
define('NONCE_KEY',        'pw@|R<P!H);a&x+v7X!<PQZ3Vxo!4Td8RB&whAHk]NisqlPKWKOLnE>k/7VgNFPV');
define('AUTH_SALT',        'Ey`odD2ohG^#>;E,Plb0tL/<,:|^5+)zxt_8ozT K$Y{G<wY/J$E.!S4>x=&[;yJ');
define('SECURE_AUTH_SALT', '`Lqy@X+ftara^FbMONUO(eb1}XsLtv>>!0hdB*R>EfuR%)LY}/8UA.1j<},{1fQY');
define('LOGGED_IN_SALT',   '`G?$%XqvSw:$HkRKK?l_<[/>w@0eacSv0}B;<`=D~s_P7`=?m%%3v7QD5?ALNK s');
define('NONCE_SALT',       'g~{N{wTn)dfXE2*$1tw5AYT2xzb=etq?QR4-F}ABVVvk7zn0LP+M;g1DO<%r/C64');

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
