<?php
/**
 * WordPress core upgrade functionality.
 *
 * @package WordPress
 * @subpackage Administration
 * @since 2.7.0
 */

/**
 * Stores files to be deleted.
 *
 * @since 2.7.0
 * @global array $_old_files
 * @var array
 * @name $_old_files
 */
global $_old_files;

$_old_files = array(
'admin/bookmarklet.php',
'admin/css/upload.css',
'admin/css/upload-rtl.css',
'admin/css/press-this-ie.css',
'admin/css/press-this-ie-rtl.css',
'admin/edit-form.php',
'admin/link-import.php',
'admin/images/box-bg-left.gif',
'admin/images/box-bg-right.gif',
'admin/images/box-bg.gif',
'admin/images/box-butt-left.gif',
'admin/images/box-butt-right.gif',
'admin/images/box-butt.gif',
'admin/images/box-head-left.gif',
'admin/images/box-head-right.gif',
'admin/images/box-head.gif',
'admin/images/heading-bg.gif',
'admin/images/login-bkg-bottom.gif',
'admin/images/login-bkg-tile.gif',
'admin/images/notice.gif',
'admin/images/toggle.gif',
'admin/images/comment-stalk-classic.gif',
'admin/images/comment-stalk-fresh.gif',
'admin/images/comment-stalk-rtl.gif',
'admin/images/comment-pill.gif',
'admin/images/del.png',
'admin/images/media-button-gallery.gif',
'admin/images/media-buttons.gif',
'admin/images/tail.gif',
'admin/images/gear.png',
'admin/images/tab.png',
'admin/images/postbox-bg.gif',
'admin/includes/upload.php',
'admin/js/dbx-admin-key.js',
'admin/js/link-cat.js',
'admin/js/forms.js',
'admin/js/upload.js',
'admin/js/set-post-thumbnail-handler.js',
'admin/js/set-post-thumbnail-handler.dev.js',
'admin/js/page.js',
'admin/js/page.dev.js',
'admin/js/slug.js',
'admin/js/slug.dev.js',
'admin/profile-update.php',
'admin/templates.php',
'wp-includes/images/audio.png',
'wp-includes/images/css.png',
'wp-includes/images/default.png',
'wp-includes/images/doc.png',
'wp-includes/images/exe.png',
'wp-includes/images/html.png',
'wp-includes/images/js.png',
'wp-includes/images/pdf.png',
'wp-includes/images/swf.png',
'wp-includes/images/tar.png',
'wp-includes/images/text.png',
'wp-includes/images/video.png',
'wp-includes/images/zip.png',
'wp-includes/js/dbx.js',
'wp-includes/js/fat.js',
'wp-includes/js/list-manipulation.js',
'wp-includes/js/jquery/jquery.dimensions.min.js',
'wp-includes/js/tinymce/langs/en.js',
'wp-includes/js/tinymce/plugins/autosave/editor_plugin_src.js',
'wp-includes/js/tinymce/plugins/autosave/langs',
'wp-includes/js/tinymce/plugins/directionality/images',
'wp-includes/js/tinymce/plugins/directionality/langs',
'wp-includes/js/tinymce/plugins/inlinepopups/css',
'wp-includes/js/tinymce/plugins/inlinepopups/images',
'wp-includes/js/tinymce/plugins/inlinepopups/jscripts',
'wp-includes/js/tinymce/plugins/paste/images',
'wp-includes/js/tinymce/plugins/paste/jscripts',
'wp-includes/js/tinymce/plugins/paste/langs',
'wp-includes/js/tinymce/plugins/spellchecker/classes/HttpClient.class.php',
'wp-includes/js/tinymce/plugins/spellchecker/classes/TinyGoogleSpell.class.php',
'wp-includes/js/tinymce/plugins/spellchecker/classes/TinyPspell.class.php',
'wp-includes/js/tinymce/plugins/spellchecker/classes/TinyPspellShell.class.php',
'wp-includes/js/tinymce/plugins/spellchecker/css/spellchecker.css',
'wp-includes/js/tinymce/plugins/spellchecker/images',
'wp-includes/js/tinymce/plugins/spellchecker/langs',
'wp-includes/js/tinymce/plugins/spellchecker/tinyspell.php',
'wp-includes/js/tinymce/plugins/wordpress/images',
'wp-includes/js/tinymce/plugins/wordpress/langs',
'wp-includes/js/tinymce/plugins/wordpress/popups.css',
'wp-includes/js/tinymce/plugins/wordpress/wordpress.css',
'wp-includes/js/tinymce/plugins/wphelp',
'wp-includes/js/tinymce/themes/advanced/css',
'wp-includes/js/tinymce/themes/advanced/images',
'wp-includes/js/tinymce/themes/advanced/jscripts',
'wp-includes/js/tinymce/themes/advanced/langs',
'wp-includes/js/tinymce/tiny_mce_gzip.php',
'wp-includes/js/wp-ajax.js',
'admin/admin-db.php',
'admin/cat.js',
'admin/categories.js',
'admin/custom-fields.js',
'admin/dbx-admin-key.js',
'admin/edit-comments.js',
'admin/install-rtl.css',
'admin/install.css',
'admin/upgrade-schema.php',
'admin/upload-functions.php',
'admin/upload-rtl.css',
'admin/upload.css',
'admin/upload.js',
'admin/users.js',
'admin/widgets-rtl.css',
'admin/widgets.css',
'admin/xfn.js',
'wp-includes/js/tinymce/license.html',
'admin/cat-js.php',
'admin/edit-form-ajax-cat.php',
'admin/execute-pings.php',
'admin/import/b2.php',
'admin/import/btt.php',
'admin/import/jkw.php',
'admin/inline-uploading.php',
'admin/link-categories.php',
'admin/list-manipulation.js',
'admin/list-manipulation.php',
'wp-includes/comment-functions.php',
'wp-includes/feed-functions.php',
'wp-includes/functions-compat.php',
'wp-includes/functions-formatting.php',
'wp-includes/functions-post.php',
'wp-includes/js/dbx-key.js',
'wp-includes/js/tinymce/plugins/autosave/langs/cs.js',
'wp-includes/js/tinymce/plugins/autosave/langs/sv.js',
'wp-includes/js/tinymce/themes/advanced/editor_template_src.js',
'wp-includes/links.php',
'wp-includes/pluggable-functions.php',
'wp-includes/template-functions-author.php',
'wp-includes/template-functions-category.php',
'wp-includes/template-functions-general.php',
'wp-includes/template-functions-links.php',
'wp-includes/template-functions-post.php',
'wp-includes/wp-l10n.php',
'admin/import-b2.php',
'admin/import-blogger.php',
'admin/import-greymatter.php',
'admin/import-livejournal.php',
'admin/import-mt.php',
'admin/import-rss.php',
'admin/import-textpattern.php',
'admin/quicktags.js',
'wp-images/fade-butt.png',
'wp-images/get-firefox.png',
'wp-images/header-shadow.png',
'wp-images/smilies',
'wp-images/wp-small.png',
'wp-images/wpminilogo.png',
'wp.php',
'wp-includes/gettext.php',
'wp-includes/streams.php',
// MU
'admin/wpmu-admin.php',
'admin/wpmu-blogs.php',
'admin/wpmu-edit.php',
'admin/wpmu-options.php',
'admin/wpmu-themes.php',
'admin/wpmu-upgrade-site.php',
'admin/wpmu-users.php',
'wp-includes/wpmu-default-filters.php',
'wp-includes/wpmu-functions.php',
'wpmu-settings.php',
'index-install.php',
'README.txt',
'htaccess.dist',
'admin/css/mu-rtl.css',
'admin/css/mu.css',
'admin/images/site-admin.png',
'admin/includes/mu.php',
'wp-includes/images/wordpress-mu.png',
// 3.0
'admin/categories.php',
'admin/edit-category-form.php',
'admin/edit-page-form.php',
'admin/edit-pages.php',
'admin/images/wp-logo.gif',
'admin/js/wp-gears.dev.js',
'admin/js/wp-gears.js',
'admin/options-misc.php',
'admin/page-new.php',
'admin/page.php',
'admin/rtl.css',
'admin/rtl.dev.css',
'admin/update-links.php',
'admin/admin.css',
'admin/admin.dev.css',
'wp-includes/js/codepress',
'wp-includes/js/jquery/autocomplete.dev.js',
'wp-includes/js/jquery/interface.js',
'wp-includes/js/jquery/autocomplete.js',
'wp-includes/js/scriptaculous/prototype.js',
'wp-includes/js/tinymce/wp-tinymce.js',
'admin/import',
'admin/images/ico-edit.png',
'admin/images/fav-top.png',
'admin/images/ico-close.png',
'admin/images/admin-header-footer.png',
'admin/images/screen-options-left.gif',
'admin/images/ico-add.png',
'admin/images/browse-happy.gif',
'admin/images/ico-viewpage.png',
// 3.1
'wp-includes/js/tinymce/blank.htm',
'wp-includes/js/tinymce/plugins/safari',
'admin/edit-link-categories.php',
'admin/edit-post-rows.php',
'admin/edit-attachment-rows.php',
'admin/link-category.php',
'admin/edit-link-category-form.php',
'admin/sidebar.php',
'admin/images/list-vs.png',
'admin/images/button-grad-vs.png',
'admin/images/button-grad-active-vs.png',
'admin/images/fav-arrow-vs.gif',
'admin/images/fav-arrow-vs-rtl.gif',
'admin/images/fav-top-vs.gif',
'admin/images/screen-options-right.gif',
'admin/images/screen-options-right-up.gif',
'admin/images/visit-site-button-grad-vs.gif',
'admin/images/visit-site-button-grad.gif',
'wp-includes/classes.php',
// 3.2
'wp-includes/default-embeds.php',
'wp-includes/js/tinymce/plugins/wordpress/img/more.gif',
'wp-includes/js/tinymce/plugins/wordpress/img/toolbars.gif',
'wp-includes/js/tinymce/plugins/wordpress/img/help.gif',
'wp-includes/js/tinymce/themes/advanced/img/fm.gif',
'wp-includes/js/tinymce/themes/advanced/img/sflogo.png',
'admin/js/list-table.js',
'admin/js/list-table.dev.js',
'admin/images/logo-login.gif',
'admin/images/star.gif'
);

/**
 * Stores new files in wp-content to copy
 *
 * The contents of this array indicate any new bundled plugins/themes which
 * should be installed with the WordPress Upgrade. These items will not be
 * re-installed in future upgrades, this behaviour is controlled by the
 * introduced version present here being older than the current installed version.
 *
 * The content of this array should follow the following format:
 *  Filename (relative to wp-content) => Introduced version
 * Directories should be noted by suffixing it with a trailing slash (/)
 *
 * @since 3.2.0
 * @global array $_new_bundled_files
 * @var array
 * @name $_new_bundled_files
 */
global $_new_bundled_files;

$_new_bundled_files = array(
'plugins/akismet/' => '2.0',
'themes/twentyten/' => '3.0',
'themes/twentyeleven/' => '3.2'
);

/**
 * Upgrade the core of WordPress.
 *
 * This will create a .maintenance file at the base of the WordPress directory
 * to ensure that people can not access the web site, when the files are being
 * copied to their locations.
 *
 * The files in the {@link $_old_files} list will be removed and the new files
 * copied from the zip file after the database is upgraded.
 *
 * The files in the {@link $_new_bundled_files} list will be added to the installation
 * if the version is greater than or equal to the old version being upgraded.
 *
 * The steps for the upgrader for after the new release is downloaded and
 * unzipped is:
 *   1. Test unzipped location for select files to ensure that unzipped worked.
 *   2. Create the .maintenance file in current WordPress base.
 *   3. Copy new WordPress directory over old WordPress files.
 *   4. Upgrade WordPress to new version.
 *     4.1. Copy all files/folders other than wp-content
 *     4.2. Copy any language files to WP_LANG_DIR (which may differ from WP_CONTENT_DIR
 *     4.3. Copy any new bundled themes/plugins to their respective locations
 *   5. Delete new WordPress directory path.
 *   6. Delete .maintenance file.
 *   7. Remove old files.
 *   8. Delete 'update_core' option.
 *
 * There are several areas of failure. For instance if PHP times out before step
 * 6, then you will not be able to access any portion of your site. Also, since
 * the upgrade will not continue where it left off, you will not be able to
 * automatically remove old files and remove the 'update_core' option. This
 * isn't that bad.
 *
 * If the copy of the new WordPress over the old fails, then the worse is that
 * the new WordPress directory will remain.
 *
 * If it is assumed that every file will be copied over, including plugins and
 * themes, then if you edit the default theme, you should rename it, so that
 * your changes remain.
 *
 * @since 2.7.0
 *
 * @param string $from New release unzipped path.
 * @param string $to Path to old WordPress installation.
 * @return WP_Error|null WP_Error on failure, null on success.
 */
function update_core($from, $to) {
	global $wp_filesystem, $_old_files, $_new_bundled_files, $wpdb;

	@set_time_limit( 300 );

	$php_version    = phpversion();
	$mysql_version  = $wpdb->db_version();
	$required_php_version = '5.2.4';
	$required_mysql_version = '5.0';
	$wp_version = '3.2.1';
	$php_compat     = version_compare( $php_version, $required_php_version, '>=' );
	$mysql_compat   = version_compare( $mysql_version, $required_mysql_version, '>=' ) || file_exists( WP_CONTENT_DIR . '/db.php' );

	if ( !$mysql_compat || !$php_compat )
		$wp_filesystem->delete($from, true);

	if ( !$mysql_compat && !$php_compat )
		return new WP_Error( 'php_mysql_not_compatible', sprintf( __('The update cannot be installed because WordPress %1$s requires PHP version %2$s or higher and MySQL version %3$s or higher. You are running PHP version %4$s and MySQL version %5$s.'), $wp_version, $required_php_version, $required_mysql_version, $php_version, $mysql_version ) );
	elseif ( !$php_compat )
		return new WP_Error( 'php_not_compatible', sprintf( __('The update cannot be installed because WordPress %1$s requires PHP version %2$s or higher. You are running version %3$s.'), $wp_version, $required_php_version, $php_version ) );
	elseif ( !$mysql_compat )
		return new WP_Error( 'mysql_not_compatible', sprintf( __('The update cannot be installed because WordPress %1$s requires MySQL version %2$s or higher. You are running version %3$s.'), $wp_version, $required_mysql_version, $mysql_version ) );

	// Sanity check the unzipped distribution
	apply_filters('update_feedback', __('Verifying the unpacked files&#8230;'));
	$distro = '';
	$roots = array( '/wordpress/', '/wordpress-mu/' );
	foreach( $roots as $root ) {
		if ( $wp_filesystem->exists($from . $root . 'readme.html') && $wp_filesystem->exists($from . $root . 'wp-includes/version.php') ) {
			$distro = $root;
			break;
		}
	}
	if ( !$distro ) {
		$wp_filesystem->delete($from, true);
		return new WP_Error('insane_distro', __('The update could not be unpacked') );
	}

	apply_filters('update_feedback', __('Installing the latest version&#8230;'));

	// Create maintenance file to signal that we are upgrading
	$maintenance_string = '<?php $upgrading = ' . time() . '; ?>';
	$maintenance_file = $to . '.maintenance';
	$wp_filesystem->delete($maintenance_file);
	$wp_filesystem->put_contents($maintenance_file, $maintenance_string, FS_CHMOD_FILE);

	// Copy new versions of WP files into place.
	$result = _copy_dir($from . $distro, $to, array('wp-content') );

	// Custom Content Directory needs updating now.
	// Copy Languages
	if ( !is_wp_error($result) && $wp_filesystem->is_dir($from . $distro . 'wp-content/languages') ) {
		if ( WP_LANG_DIR != ABSPATH . WPINC . '/languages' || @is_dir(WP_LANG_DIR) )
			$lang_dir = WP_LANG_DIR;
		else
			$lang_dir = WP_CONTENT_DIR . '/languages';

		if ( !@is_dir($lang_dir) && 0 === strpos($lang_dir, ABSPATH) ) { // Check the language directory exists first
			$wp_filesystem->mkdir($to . str_replace($lang_dir, ABSPATH, ''), FS_CHMOD_DIR); // If it's within the ABSPATH we can handle it here, otherwise they're out of luck.
			clearstatcache(); // for FTP, Need to clear the stat cache
		}

		if ( @is_dir($lang_dir) ) {
			$wp_lang_dir = $wp_filesystem->find_folder($lang_dir);
			if ( $wp_lang_dir )
				$result = copy_dir($from . $distro . 'wp-content/languages/', $wp_lang_dir);
		}
	}

	// Copy New bundled plugins & themes
	// This gives us the ability to install new plugins & themes bundled with future versions of WordPress whilst avoiding the re-install upon upgrade issue.
	if ( !is_wp_error($result) && ( ! defined('CORE_UPGRADE_SKIP_NEW_BUNDLED') || ! CORE_UPGRADE_SKIP_NEW_BUNDLED ) ) {
		$old_version = $GLOBALS['wp_version']; // $wp_version in local scope == new version
		foreach ( (array) $_new_bundled_files as $file => $introduced_version ) {
			// If $introduced version is greater than what the site was previously running
			if ( version_compare($introduced_version, $old_version, '>') ) {
				$directory = ('/' == $file[ strlen($file)-1 ]);
				list($type, $filename) = explode('/', $file, 2);

				if ( 'plugins' == $type )
					$dest = $wp_filesystem->wp_plugins_dir();
				elseif ( 'themes' == $type )
					$dest = trailingslashit($wp_filesystem->wp_themes_dir()); // Back-compat, ::wp_themes_dir() did not return trailingslash'd pre-3.2
				else
					continue;

				if ( ! $directory ) {
					if ( $wp_filesystem->exists($dest . $filename) )
						continue;

					if ( ! $wp_filesystem->copy($from . $distro . 'wp-content/' . $file, $dest . $filename, FS_CHMOD_FILE) )
						$result = new WP_Error('copy_failed', __('Could not copy file.'), $dest . $filename);
				} else {
					if ( $wp_filesystem->is_dir($dest . $filename) )
						continue;

					$wp_filesystem->mkdir($dest . $filename, FS_CHMOD_DIR);
					$_result = copy_dir( $from . $distro . 'wp-content/' . $file, $dest . $filename);
					if ( is_wp_error($_result) ) //If a error occurs partway through this final step, keep the error flowing through, but keep process going.
						$result = $_result;
				}
			}
		} //end foreach
	}

	// Handle $result error from the above blocks
	if ( is_wp_error($result) ) {
		$wp_filesystem->delete($maintenance_file);
		$wp_filesystem->delete($from, true);
		return $result;
	}

	// Remove old files
	foreach ( $_old_files as $old_file ) {
		$old_file = $to . $old_file;
		if ( !$wp_filesystem->exists($old_file) )
			continue;
		$wp_filesystem->delete($old_file, true);
	}

	// Upgrade DB with separate request
	apply_filters('update_feedback', __('Upgrading database&#8230;'));
	$db_upgrade_url = admin_url('upgrade.php?step=upgrade_db');
	wp_remote_post($db_upgrade_url, array('timeout' => 60));

	// Remove working directory
	$wp_filesystem->delete($from, true);

	// Force refresh of update information
	if ( function_exists('delete_site_transient') )
		delete_site_transient('update_core');
	else
		delete_option('update_core');

	// Remove maintenance file, we're done.
	$wp_filesystem->delete($maintenance_file);
}

/**
 * Copies a directory from one location to another via the WordPress Filesystem Abstraction.
 * Assumes that WP_Filesystem() has already been called and setup.
 *
 * This is a temporary function for the 3.1 -> 3.2 upgrade only and will be removed in 3.3
 *
 * @ignore
 * @since 3.2.0
 * @see copy_dir()
 *
 * @param string $from source directory
 * @param string $to destination directory
 * @param array $skip_list a list of files/folders to skip copying
 * @return mixed WP_Error on failure, True on success.
 */
function _copy_dir($from, $to, $skip_list = array() ) {
	global $wp_filesystem;

	$dirlist = $wp_filesystem->dirlist($from);

	$from = trailingslashit($from);
	$to = trailingslashit($to);

	$skip_regex = '';
	foreach ( (array)$skip_list as $key => $skip_file )
		$skip_regex .= preg_quote($skip_file, '!') . '|';

	if ( !empty($skip_regex) )
		$skip_regex = '!(' . rtrim($skip_regex, '|') . ')$!i';

	foreach ( (array) $dirlist as $filename => $fileinfo ) {
		if ( !empty($skip_regex) )
			if ( preg_match($skip_regex, $from . $filename) )
				continue;

		if ( 'f' == $fileinfo['type'] ) {
			if ( ! $wp_filesystem->copy($from . $filename, $to . $filename, true, FS_CHMOD_FILE) ) {
				// If copy failed, chmod file to 0644 and try again.
				$wp_filesystem->chmod($to . $filename, 0644);
				if ( ! $wp_filesystem->copy($from . $filename, $to . $filename, true, FS_CHMOD_FILE) )
					return new WP_Error('copy_failed', __('Could not copy file.'), $to . $filename);
			}
		} elseif ( 'd' == $fileinfo['type'] ) {
			if ( !$wp_filesystem->is_dir($to . $filename) ) {
				if ( !$wp_filesystem->mkdir($to . $filename, FS_CHMOD_DIR) )
					return new WP_Error('mkdir_failed', __('Could not create directory.'), $to . $filename);
			}
			$result = _copy_dir($from . $filename, $to . $filename, $skip_list);
			if ( is_wp_error($result) )
				return $result;
		}
	}
	return true;
}

?>
