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
define('DB_NAME', 'designerclub-lhr');

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
define('AUTH_KEY',         '4yoR2x@zm[k$JM}m0@TN>$bFc{er_+!XGB/j:YMJGE|u7cBOx7Xp.BQl3)}x,R3x');
define('SECURE_AUTH_KEY',  'E*=|z{9xX4!mGYIrxhSLyZ/#.!oaPf7!T_8B mcV| wj0OtcxXNxU`E!FH?F=iu ');
define('LOGGED_IN_KEY',    'sYu7z$`8u&Byu<Ot$@_>-lQs+N1?[`-xB2zr=94m?!*6AQ3FMOW~zcH_r]p=6PYM');
define('NONCE_KEY',        '`+GJ?KO0pp1(tpX-X:F 96Gi{b!^[[>9hPh[w9d JSQ *_DQiqnfS+AF]B(6?1J/');
define('AUTH_SALT',        'R*pQs-9B>3]ob@R2&oC24aWW`Ve--7BW(]1v|NFR3!yS~uxHs~ZC%Bab@<$~N<jV');
define('SECURE_AUTH_SALT', 'oiqX51SjL!GSfl,.rbe@&)2dH&%+s--H}eaeXo[0L&drV^{4<p_RwaV1Rr;/@u9&');
define('LOGGED_IN_SALT',   '$U@!R=0$n{Q9jR*]1/qke;uob[PhittDO DxH;{3JO#`~CpCV01{i HR]N0zyco7');
define('NONCE_SALT',       'GNS-3j<Gt0C*p~qy~Qrrvp~QKz~53K(-b5Ot<OC6)3,Ih1Slopv$.F0tXX/TUTdb');

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
