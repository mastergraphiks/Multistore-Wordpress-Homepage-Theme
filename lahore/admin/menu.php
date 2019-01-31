<?php
/**
 * Build Administration Menu.
 *
 * @package WordPress
 * @subpackage Administration
 */

/**
 * Constructs the admin menu bar.
 *
 * The elements in the array are :
 *     0: Menu item name
 *     1: Minimum level or capability required.
 *     2: The URL of the item's file
 *     3: Class
 *     4: ID
 *     5: Icon for top level menu
 *
 * @global array $menu
 * @name $menu
 * @var array
 */


$menu[4] = array( '', 'read', 'separator1', '', 'wp-menu-separator' );

$menu[5] = array( __('Products'), 'edit_posts', 'edit.php', '', 'open-if-no-js menu-top menu-icon-post', 'menu-posts', 'div' );
	$submenu['edit.php'][5]  = array( __('All Products'), 'edit_posts', 'edit.php' );
	/* translators: add new post */
	$submenu['edit.php'][10]  = array( _x('', 'post'), 'edit_posts', 'post-new.php' );

	$i = 15;
	foreach ( get_taxonomies( array(), 'objects' ) as $tax ) {
		if ( ! $tax->show_ui || ! in_array('post', (array) $tax->object_type, true) )
			continue;

		$submenu['edit.php'][$i++] = array( esc_attr( $tax->labels->menu_name ), $tax->cap->manage_terms, 'edit-tags.php?taxonomy=' . $tax->name );
	}
	unset($tax);


	/* translators: add new file */
	$submenu['upload.php'][10] = array( _x('Add New', 'file'), 'upload_files', 'media-new.php');



$menu[20] = array( __('Pages'), 'edit_pages', 'edit.php?post_type=page', '', 'menu-top menu-icon-page', 'menu-pages', 'div' );
	$submenu['edit.php?post_type=page'][5] = array( __('All Pages'), 'edit_pages', 'edit.php?post_type=page' );
	/* translators: add new page */
	$submenu['edit.php?post_type=page'][10] = array( _x('Add New', 'page'), 'edit_pages', 'post-new.php?post_type=page' );
	$i = 15;
	foreach ( get_taxonomies( array(), 'objects' ) as $tax ) {
		if ( ! $tax->show_ui || ! in_array('page', (array) $tax->object_type, true) )
			continue;

		$submenu['edit.php?post_type=page'][$i++] = array( esc_attr( $tax->labels->menu_name ), $tax->cap->manage_terms, 'edit-tags.php?taxonomy=' . $tax->name . '&amp;post_type=page' );
	}
	unset($tax);

$awaiting_mod = wp_count_comments();
$awaiting_mod = $awaiting_mod->moderated;

$menu[59] = array( '', 'read', 'separator2', '', 'wp-menu-separator' );

if ( current_user_can( 'switch_themes') ) {
	

	

	$submenu['plugins.php'][5]  = array( __('Installed Plugins'), 'activate_plugins', 'plugins.php' );

		if ( ! is_multisite() ) {
			/* translators: add new plugin */
			$submenu['plugins.php'][10] = array( _x('Add New', 'plugin'), 'install_plugins', 'plugin-install.php' );
			$submenu['plugins.php'][15] = array( _x('Editor', 'plugin editor'), 'edit_plugins', 'plugin-editor.php' );
		}
}
unset($menu_perms, $update_plugins, $plugin_update_count);

if ( current_user_can('list_users') )
	$menu[70] = array( __('Users'), 'list_users', 'users.php', '', 'menu-top menu-icon-users', 'menu-users', 'div' );
else
	$menu[70] = array( __('Profile'), 'read', 'profile.php', '', 'menu-top menu-icon-users', 'menu-users', 'div' );

if ( current_user_can('list_users') ) {
	$_wp_real_parent_file['profile.php'] = 'users.php'; // Back-compat for plugins adding submenus to profile.php.
	$submenu['users.php'][5] = array(__('All Users'), 'list_users', 'users.php');
	if ( current_user_can('create_users') )
		$submenu['users.php'][10] = array(_x('Add New', 'user'), 'create_users', 'user-new.php');
	else
		$submenu['users.php'][10] = array(_x('Add New', 'user'), 'promote_users', 'user-new.php');

	$submenu['users.php'][15] = array(__('Your Profile'), 'read', 'profile.php');
} else {
	$_wp_real_parent_file['users.php'] = 'profile.php';
	$submenu['profile.php'][5] = array(__('Your Profile'), 'read', 'profile.php');
	if ( current_user_can('create_users') )
		$submenu['profile.php'][10] = array(__('Add New User'), 'create_users', 'user-new.php');
	else
		$submenu['profile.php'][10] = array(__('Add New User'), 'promote_users', 'user-new.php');
}



$menu[99] = array( '', 'read', 'separator-last', '', 'wp-menu-separator' );

// Back-compat for old top-levels
$_wp_real_parent_file['post.php'] = 'edit.php';
$_wp_real_parent_file['post-new.php'] = 'edit.php';
$_wp_real_parent_file['edit-pages.php'] = 'edit.php?post_type=page';
$_wp_real_parent_file['page-new.php'] = 'edit.php?post_type=page';
$_wp_real_parent_file['wpmu-admin.php'] = 'tools.php';
$_wp_real_parent_file['ms-admin.php'] = 'tools.php';

// ensure we're backwards compatible
$compat = array(
	'index' => 'dashboard',
	'edit' => 'posts',
	'post' => 'posts',
	'upload' => 'media',
	'link-manager' => 'links',
	'edit-pages' => 'pages',
	'page' => 'pages',
	'edit-comments' => 'comments',
	'options-general' => 'settings',
	'themes' => 'appearance',
	);

require_once(ABSPATH . 'admin/includes/menu.php');

?>
