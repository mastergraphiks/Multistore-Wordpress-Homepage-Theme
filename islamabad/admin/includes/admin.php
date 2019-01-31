<?php
/**
 * Includes all of the WordPress Administration API files.
 *
 * @package WordPress
 * @subpackage Administration
 */

/** WordPress Bookmark Administration API */
require_once(ABSPATH . 'admin/includes/bookmark.php');

/** WordPress Comment Administration API */
require_once(ABSPATH . 'admin/includes/comment.php');

/** WordPress Administration File API */
require_once(ABSPATH . 'admin/includes/file.php');

/** WordPress Image Administration API */
require_once(ABSPATH . 'admin/includes/image.php');

/** WordPress Media Administration API */
require_once(ABSPATH . 'admin/includes/media.php');

/** WordPress Import Administration API */
require_once(ABSPATH . 'admin/includes/import.php');

/** WordPress Misc Administration API */
require_once(ABSPATH . 'admin/includes/misc.php');

/** WordPress Plugin Administration API */
require_once(ABSPATH . 'admin/includes/plugin.php');

/** WordPress Post Administration API */
require_once(ABSPATH . 'admin/includes/post.php');

/** WordPress Taxonomy Administration API */
require_once(ABSPATH . 'admin/includes/taxonomy.php');

/** WordPress Template Administration API */
require_once(ABSPATH . 'admin/includes/template.php');

/** WordPress List Table Administration API and base class */
require_once(ABSPATH . 'admin/includes/class-wp-list-table.php');
require_once(ABSPATH . 'admin/includes/list-table.php');

/** WordPress Theme Administration API */
require_once(ABSPATH . 'admin/includes/theme.php');

/** WordPress User Administration API */
require_once(ABSPATH . 'admin/includes/user.php');

/** WordPress Update Administration API */
require_once(ABSPATH . 'admin/includes/update.php');

/** WordPress Deprecated Administration API */
require_once(ABSPATH . 'admin/includes/deprecated.php');

/** WordPress Multi-Site support API */
if ( is_multisite() ) {
	require_once(ABSPATH . 'admin/includes/ms.php');
	require_once(ABSPATH . 'admin/includes/ms-deprecated.php');
}

?>
