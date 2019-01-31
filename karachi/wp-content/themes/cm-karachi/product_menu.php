<?php
/////////////////////////////////////////
// ************* Theme Options Page *********** //
add_action('admin_menu', 'mkt_add_product'); //Add new menu block to admin side

function mkt_add_product(){	
	if(function_exists(add_object_page))
    {
       add_object_page("Products", "Store Options", 8, 'product_menu.php', 'theme_settings', get_option( 'siteurl' ).'/wp-content/themes/'.get_option( 'template' ).'/images/favicon.ico'); // title of new sidebar
    }
    else
    {
       add_menu_page("Products", "Shopping Cart", 8, 'product_menu.php', 'theme_settings', get_option( 'siteurl' ).'/wp-content/themes/'.get_option( 'template' ).'/images/favicon.ico'); // title of new sidebar
    }
	
	//add_submenu_page('product_menu.php', "Add Product", "Add Product", 8, 'newprd', 'add_product'); // sublink2
	add_submenu_page('product_menu.php', "Add Product", "Add Product", 8, 'product_menu.php', 'add_product'); // sublink2
	add_submenu_page('product_menu.php', "Manage Products", "Manage Products", 8, 'newprd', 'product_listing'); //sublink1
	add_submenu_page('product_menu.php', "Manage Orders", "Manage Orders", 8, 'manageorders', 'manage_orders'); // sublink4
	add_submenu_page('product_menu.php', "Stock", "Stock", 8, 'stock', 'stock'); // sublink4
	add_submenu_page('product_menu.php', "Payment Options", "Payment Options", 8, 'paymentoptions', 'payment_options'); // sublink4
	add_submenu_page('product_menu.php', "Manage Shipping", "Manage Shipping", 8, 'manageshipping', 'manage_shipping'); // sublink4
	
}

//////AFFILIATE SETTINGS START/////
require_once (TEMPLATEPATH . '/library/includes/affiliates/set_affiliate_settings.php');
//////AFFILIATE SETTINGS END/////

function notification()
{
	if($_REQUEST['file']!='')
	{
		include_once(TEMPLATEPATH . '/library/includes/admin_notification_edit.php');
	}else
	{
		include_once(TEMPLATEPATH . '/library/includes/admin_notification.php');
	}
}

function stock()
{
	include_once(TEMPLATEPATH . '/library/includes/admin_stock.php');
}

function product_listing()
{
	wp_redirect(get_option( 'siteurl' ) ."/admin/edit.php?ptype=prd");
}
function add_product()
{
	wp_redirect(get_option( 'siteurl' ) ."/admin/post-new.php?ptype=prd");
}

function payment_options()
{
	include_once(TEMPLATEPATH . '/library/includes/admin_paymethods.php');
}

function manage_shipping()
{
	include_once(TEMPLATEPATH . '/library/includes/admin_shippings.php');
}

function bulk_upload()
{
	include_once(TEMPLATEPATH . '/library/includes/admin_bulk_upload.php');
}

function theme_settings()
{
	mytheme_add_admin();
	//include_once(TEMPLATEPATH . '/library/functions/admin_settings.php');
}
function manage_coupon()
{
	if($_REQUEST['pagetype']=='addedit')
	{
		include_once(TEMPLATEPATH . '/library/includes/admin_coupon.php');
	}else
	{
		include_once(TEMPLATEPATH . '/library/includes/admin_manage_coupon.php');
	}
}

function manage_orders()
{
	//admin_order_detail.php
	if($_GET['oid'])
	{
		include_once(TEMPLATEPATH . '/library/includes/admin_order_detail.php');
	}else
	{
		include_once(TEMPLATEPATH . '/library/includes/admin_manage_orders.php');
	}
}

function general_settings()
{
	include_once(TEMPLATEPATH . '/library/includes/admin_settings.php');
}
?>
