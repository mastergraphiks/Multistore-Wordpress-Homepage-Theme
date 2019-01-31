<?php
set_time_limit(0);
global  $wpdb;
//require_once (TEMPLATEPATH . '/delete_data.php');

/////////////// GENERAL SETTINGS START ///////////////
$shoppingcart_general_settings = get_option('shoppingcart_general_settings');
if(!$shoppingcart_general_settings || ($shoppingcart_general_settings && count($shoppingcart_general_settings)==0))
{
	$cartinfo = array(
						"currency"				=> 'USD',
						"currencysym"			=> '$',
						"site_email"			=>   get_option('admin_email'),
						"site_email_name"		=>	get_option('blogname'),
						"tax"					=>	'0.00',
						"is_show_weight"		=>	'1',
						"store_type"			=>	'cart',
						"imagepath"				=>	"",		
						"is_show_coupon"		=>	"1",
						"dash_noof_orders"		=>	"10",
						"is_show_tellafrnd"		=>	"1",
						"is_show_addcomment"	=>	"0",
						"checkout_type"			=>	"cart",
						"is_show_relproducts"	=>	"1",
						"digitalproductpath"	=>	"",
						"is_show_blogpage"		=>	"1",
						"is_show_storepage"		=>	"1",
						"is_show_category"		=>	"1",
						"checkout_method"		=>	"normal",
						"is_show_termcondition"	=>	'1',
						"termcondition"			=>	'Accept Terms and Conditions',
						"loginpagecontent"		=>	'If you are an existing customer of [#$store_name#] or have previously registered you may sign in below or request a new password. Otherwise please enter your information below and an account will be created for you.',												
						"bill_address1"			=>	"1",
						"bill_address2"			=>	"1",																	
						"bill_city"				=>	"1",
						"bill_state"			=>	"1",
						"bill_country"			=>	"1",
						"bill_zip"				=>	"1",
						"is_active_affiliate"	=>	"0",
						"send_email_guest"		=>	"1",						
						);
	update_option("shoppingcart_general_settings",$cartinfo);
}
/////////////// GENERAL SETTINGS END ///////////////
/////////////// PAYMENT SETTINGS START ///////////////
	$paymethodinfo = array();
	$payOpts = array();
	$payOpts[] = array(
					"title"			=>	"Merchant Id",
					"fieldname"		=>	"merchantid",
					"value"			=>	"myaccount@paypal.com",
					"description"	=>	"Example : myaccount@paypal.com",
					);
	$payOpts[] = array(
					"title"			=>	"Cancel Url",
					"fieldname"		=>	"cancel_return",
					"value"			=>	get_option('siteurl')."/?page=cancel_return&pmethod=paypal",
					"description"	=>	"Example : http://mydomain.com/cancel_return.php",
					);
	$payOpts[] = array(
					"title"			=>	"Return Url",
					"fieldname"		=>	"returnUrl",
					"value"			=>	get_option('siteurl')."/?page=return&pmethod=paypal",
					"description"	=>	"Example : http://mydomain.com/return.php",
					);
	$payOpts[] = array(
					"title"			=>	"Notify Url",
					"fieldname"		=>	"notify_url",
					"value"			=>	get_option('siteurl')."/?page=notifyurl&pmethod=paypal",
					"description"	=>	"Example : http://mydomain.com/notifyurl.php",
					);								
	$paymethodinfo[] = array(
						"name" 		=> 'Paypal',
						"key" 		=> 'paypal',
						"isactive"	=>	'1', // 1->display,0->hide
						"display_order"=>'1',
						"payOpts"	=>	$payOpts,
						);
	//////////pay settings end////////
	//////////google checkout start////////
	$payOpts = array();
	$payOpts[] = array(
					"title"			=>	"Merchant Id",
					"fieldname"		=>	"merchantid",
					"value"			=>	"1234567890",
					"description"	=>	"Example : 1234567890"
					);
	$paymethodinfo[] = array(
						"name" 		=> 'Google Checkout',
						"key" 		=> 'googlechkout',
						"isactive"	=>	'1', // 1->display,0->hide
						"display_order"=>'2',
						"payOpts"	=>	$payOpts,
						);
//////////google checkout end////////
//////////authorize.net start////////
$payOpts = array();
	$payOpts[] = array(
					"title"			=>	"Login ID",
					"fieldname"		=>	"loginid",
					"value"			=>	"yourname@domain.com",
					"description"	=>	"Example : yourname@domain.com"
					);
	$payOpts[] = array(
					"title"			=>	"Transaction Key",
					"fieldname"		=>	"transkey",
					"value"			=>	"1234567890",
					"description"	=>	"Example : 1234567890",
					);
	$paymethodinfo[] = array(
						"name" 		=> 'Authorize.net',
						"key" 		=> 'authorizenet',
						"isactive"	=>	'1', // 1->display,0->hide
						"display_order"=>'3',
						"payOpts"	=>	$payOpts,
						);
//////////authorize.net end////////
//////////worldpay start////////
	$payOpts = array();	
	$payOpts[] = array(
					"title"			=>	"Instant Id",
					"fieldname"		=>	"instId",
					"value"			=>	"123456",
					"description"	=>	"Example : 123456"
					);
	$payOpts[] = array(
					"title"			=>	"Account Id",
					"fieldname"		=>	"accId1",
					"value"			=>	"12345",
					"description"	=>	"Example : 12345"
					);
	$paymethodinfo[] = array(
						"name" 		=> 'Worldpay',
						"key" 		=> 'worldpay',
						"isactive"	=>	'1', // 1->display,0->hide\
						"display_order"=>'4',
						"payOpts"	=>	$payOpts,
						);
//////////worldpay end////////
//////////2co start////////
	$payOpts = array();
	$payOpts[] = array(
					"title"			=>	"Vendor ID",
					"fieldname"		=>	"vendorid",
					"value"			=>	"1303908",
					"description"	=>	"Enter Vendor ID Example : 1303908"
					);
	$payOpts[] = array(
					"title"			=>	"Notify Url",
					"fieldname"		=>	"ipnfilepath",
					"value"			=>	get_option('siteurl')."/?page=notifyurl&pmethod=2co",
					"description"	=>	"Example : http://mydomain.com/2co_notifyurl.php",
					);
	$paymethodinfo[] = array(
						"name" 		=> '2CO (2Checkout)',
						"key" 		=> '2co',
						"isactive"	=>	'1', // 1->display,0->hide
						"display_order"=>'5',
						"payOpts"	=>	$payOpts,
						);
//////////2co end////////
//////////pre bank transfer start////////
	$payOpts = array();
	$payOpts[] = array(
					"title"			=>	"Bank Information",
					"fieldname"		=>	"bankinfo",
					"value"			=>	"ICICI Bank",
					"description"	=>	"Enter the bank name to which you want to transfer payment"
					);
	$payOpts[] = array(
					"title"			=>	"Account ID",
					"fieldname"		=>	"bank_accountid",
					"value"			=>	"AB1234567890",
					"description"	=>	"Enter your bank Account ID",
					);
	$paymethodinfo[] = array(
						"name" 		=> 'Pre Bank Transfer',
						"key" 		=> 'prebanktransfer',
						"isactive"	=>	'1', // 1->display,0->hide
						"display_order"=>'6',
						"payOpts"	=>	$payOpts,
						);				
//////////pre bank transfer end////////
//////////pay cash on devivery start////////
	$payOpts = array();
	$paymethodinfo[] = array(
						"name" 		=> 'Pay Cash On Delivery',
						"key" 		=> 'payondelevary',
						"isactive"	=>	'1', // 1->display,0->hide
						"display_order"=>'7',
						"payOpts"	=>	$payOpts,
						);
//////////pay cash on devivery end////////
for($i=0;$i<count($paymethodinfo);$i++)
{
	$payment_method_info = array();
	$payment_method_info  = get_option('payment_method_'.$paymethodinfo[$i]['key']);
	if(!$payment_method_info)
	{
		update_option('payment_method_'.$paymethodinfo[$i]['key'],$paymethodinfo[$i]);
	}
}
/////////////// PAYMENT SETTINGS END ///////////////
/////////////// SHIPPING METHIDS START /////////////// 
$shippingmethodinfo = array();
$payOpts = array();
$payOpts[] = array(
				"title"			=>	"Enable Free Shipping?",
				"fieldname"		=>	"free_shipping_amt",
				"value"			=>	"0",
				"description"	=>	"Example : shipping amt = 0 ",
				);
$payOpts = array();
$shippingmethodinfo[] = array(
					"name" 		=> 'Free Shipping',
					"key" 		=> 'free_shipping',
					"isactive"	=>	'1', // 1->display,0->hide
					"payOpts"	=>	$payOpts,
					);
///////////////////////////////////////
$payOpts = array();
$payOpts[] = array(
				"title"			=>	"Shipping Amount",
				"fieldname"		=>	"flat_rate_amt",
				"value"			=>	"0",
				"description"	=>	"Example : enter a value that will be added as default for shipping when someone goes throught checkout"
				);
$shippingmethodinfo[] = array(
					"name" 		=> 'Flat Rate Shipping',
					"key" 		=> 'flat_rate',
					"isactive"	=>	'0', // 1->display,0->hide
					"payOpts"	=>	$payOpts,
					);
///////////////////////////////////////
$payOpts = array();
$payOpts[] = array(
				"title"			=>	"Price Shipping 1",
				"fieldname"		=>	"price_shipping1",
				"value"			=>	"10->100=1",
				"description"	=>	'Example : if total price is between $10 and $100 then shipping price is $1 so the equation is -> <strong>10->100=1</strong>'
				);
$payOpts[] = array(
				"title"			=>	"Price Shipping 2",
				"fieldname"		=>	"price_shipping2",
				"value"			=>	"101->200=10",
				"description"	=>	'Example : if total price is between $101 and $200 then shipping price is $10 so the equation is -> <strong>101->200=10</strong>'
				);
$payOpts[] = array(
				"title"			=>	"Price Shipping 3",
				"fieldname"		=>	"price_shipping3",
				"value"			=>	"201->300=20",
				"description"	=>	'Example : if total price is between $201 and $300 then shipping price is $20 so the equation is -> <strong>201->300=20</strong>'
				);
$payOpts[] = array(
				"title"			=>	"Price Shipping 4",
				"fieldname"		=>	"price_shipping4",
				"value"			=>	"301->500=50",
				"description"	=>	'Example : if total price is between $301 and $500 then shipping price is $50 so the equation is -> <strong>301->500=50</strong>'
				);
$payOpts[] = array(
				"title"			=>	"Price Shipping 5",
				"fieldname"		=>	"price_shipping5",
				"value"			=>	"501->1000=60",
				"description"	=>	'Example : if total price is between $301 and $500 then shipping price is $60 so the equation is -> <strong>301->500=60</strong>'
				);
$shippingmethodinfo[] = array(
					"name" 		=> 'Price Base Shipping',
					"key" 		=> 'price_base',
					"isactive"	=>	'0', // 1->display,0->hide
					"payOpts"	=>	$payOpts,
					);
///////////////////////////////////////
$payOpts = array();
$payOpts[] = array(
				"title"			=>	"Weight Shipping 1",
				"fieldname"		=>	"price_shipping1",
				"value"			=>	"1->10=10",
				"description"	=>	"Example : if total weight is between 1 lbs and 10 lbs then shipping price is $10 so the equation is -> <strong>1->10=10</strong>"
				);
$payOpts[] = array(
				"title"			=>	"Weight Shipping 2",
				"fieldname"		=>	"price_shipping2",
				"value"			=>	"11->51=20",
				"description"	=>	"Example : if total weight is between 11 lbs and 51 lbs then shipping price is $20 so the equation is -> <strong>11->51=20</strong>"
				);
$payOpts[] = array(
				"title"			=>	"Weight Shipping 3",
				"fieldname"		=>	"price_shipping3",
				"value"			=>	"51->100=30",
				"description"	=>	"Example : if total weight is between 51 lbs and 100 lbs then shipping price is $30 so the equation is -> <strong>51->100=30</strong>"
				);
$payOpts[] = array(
				"title"			=>	"Weight Shipping 4",
				"fieldname"		=>	"price_shipping4",
				"value"			=>	"101->150=40",
				"description"	=>	"Example : if total weight is between 101 lbs and 150 lbs then shipping price is $40 so the equation is -> <strong>101->150=40</strong>"
				);
$payOpts[] = array(
				"title"			=>	"Weight Shipping 5",
				"fieldname"		=>	"price_shipping5",
				"value"			=>	"151->200=40",
				"description"	=>	"Example : if total weight is between 101 lbs and 150 lbs then shipping price is $40 so the equation is -> <strong>151->200=40</strong>"
				);
$shippingmethodinfo[] = array(
					"name" 		=> 'Weight Base Shipping',
					"key" 		=> 'weight_base',
					"isactive"	=>	'0', // 1->display,0->hide
					"payOpts"	=>	$payOpts,
					);
						
for($i=0;$i<count($shippingmethodinfo);$i++)
{
	$shipping_method_info = array();
	$shipping_method_info  = get_option('shipping_method_'.$shippingmethodinfo[$i]['key']);
	if(!$shipping_method_info)
	{
		update_option('shipping_method_'.$shippingmethodinfo[$i]['key'],$shippingmethodinfo[$i]);
	}
}
/////////////// SHIPPING METHIDS END ///////////////
/////////////// DISCOUNT COUPON START ///////////////
$discount_coupons = array();
$discount_coupons  = get_option('discount_coupons');
if(!$discount_coupons)
{
	$discount_coupons_arr[] = array(
						"couponcode"	=>	'friend_discount',
						"dis_per"		=>	'per',
						"dis_amt"		=>	'15',
						);
	$discount_coupons_arr[] = array(
						"couponcode"	=>	'customer_discount',
						"dis_per"		=>	'amt',
						"dis_amt"		=>	'100',
						);
	update_option('discount_coupons',$discount_coupons_arr);
}
/////////////// DISCOUNT COUPON END ///////////////
/////////////// TERMS & products START ///////////////
$category_array = array('Blog','Feature',array('Women','Dresses','Yoga Pants & Leggings','Shorts','Tops'),'Kids',array('Men','Shirts','Jumpers & Cardigans'),array('Shoe','Boots','Sandals'));
$dummy_image_path = get_template_directory_uri().'/images/dummy/';

$post_array = array();
$post_author = $wpdb->get_var("SELECT ID FROM $wpdb->users order by ID asc limit 1");
$post_info = array();
$post_info[] = array(
					"post_title"	=>	'Sample Lorem Ipsum Post',
					"post_content"	=>	'What is Lorem Ipsum?<br><br>
Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.
Why do we use it?<br><br>It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed to using Content here, content here, making it look like readable English. Many desktop publishing packages and web page editors now use Lorem Ipsum as their default model text, and a search for lorem ipsum will uncover many web sites still in their infancy. Various versions have evolved over the years, sometimes by accident, sometimes on purpose (injected humour and the like).
<br><br>Where does it come from?',
					);
$post_info[] = array(
					"post_title"	=>	'another sample post',
					"post_content"	=>	'What is Lorem Ipsum?<br><br>
Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.
Why do we use it?<br><br>It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed to using Content here, content here, making it look like readable English. Many desktop publishing packages and web page editors now use Lorem Ipsum as their default model text, and a search for lorem ipsum will uncover many web sites still in their infancy. Various versions have evolved over the years, sometimes by accident, sometimes on purpose (injected humour and the like).
<br><br>Where does it come from?',
					);
$post_info[] = array(
					"post_title"	=>	'Sample Blog Post',
					"post_content"	=>	'orem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.',
					);
$post_info[] = array(
					"post_title"	=>	'What is Lorem Ipsum?',
					"post_content"	=>	'What is Lorem Ipsum?<br><br>
Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.
Why do we use it?<br><br>It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed to using Content here, content here, making it look like readable English. Many desktop publishing packages and web page editors now use Lorem Ipsum as their default model text, and a search for lorem ipsum will uncover many web sites still in their infancy. Various versions have evolved over the years, sometimes by accident, sometimes on purpose (injected humour and the like).
<br><br>Where does it come from?',
					);
$post_info[] = array(
					"post_title"	=>	'Letraset sheets',
					"post_content"	=>	'What is Lorem Ipsum?<br><br>
Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.
Why do we use it?<br><br>It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed to using Content here, content here, making it look like readable English. Many desktop publishing packages and web page editors now use Lorem Ipsum as their default model text, and a search for lorem ipsum will uncover many web sites still in their infancy. Various versions have evolved over the years, sometimes by accident, sometimes on purpose (injected humour and the like).
<br><br>Where does it come from?',
					);
$post_info[] = array(
					"post_title"	=>	'Why do we use it?',
					"post_content"	=>	'What is Lorem Ipsum?<br><br>
Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.
Why do we use it?<br><br>It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed to using Content here, content here, making it look like readable English. Many desktop publishing packages and web page editors now use Lorem Ipsum as their default model text, and a search for lorem ipsum will uncover many web sites still in their infancy. Various versions have evolved over the years, sometimes by accident, sometimes on purpose (injected humour and the like).
<br><br>Where does it come from?',
					);				
$post_array['Blog'] = $post_info;
//====================================================================================//
$post_info = array();
////product 1 start///
$post_meta = array();
$post_meta = array(
					"productimage"			=> $dummy_image_path.'dress1.jpg',	
					"productimage1"			=> $dummy_image_path.'dress2.jpg',		
					"productimage2"			=> $dummy_image_path.'dress3.jpg',		
					"productimage3"			=> $dummy_image_path.'dress4.jpg',		
					"productimage4"			=> $dummy_image_path.'dress5.jpg',		
					"productimage5"			=> $dummy_image_path.'dress6.jpg',		
					"productimage6"			=> $dummy_image_path.'dress7.jpg',		
					"price"					=> '70',	
					"specialprice"			=> '50',	
					"size"					=> 'x,xl,xxx,xxxl',
					"color"					=> 'red,black,blue,yellow,purple,pink',
					"posttype"				=> 'product',
				);
$post_info[] = array(
					"post_title"	=>	'Double-scoopneck tee dress in solids',
					"post_content"	=>	'Casually cool for every day, in soft stretchy Supima&reg; cotton. Imported.
* Scoopneck and scoopback
* Short sleeves
* Slim fit with straight skirt
* 17&quot; from waist
* With spandex for a stretchier, sexier fit
* Machine wash. Tumble dry.',
					"post_meta"		=>	$post_meta,
					"post_feature"	=>	1,
					);
////product 1 end///
////product 2 start///
$post_meta = array();
$post_meta = array(
					"productimage"			=> $dummy_image_path.'dress2.jpg',	
					"productimage1"			=> $dummy_image_path.'dress1.jpg',		
					"productimage2"			=> $dummy_image_path.'dress3.jpg',		
					"productimage3"			=> $dummy_image_path.'dress4.jpg',		
					"productimage4"			=> $dummy_image_path.'dress5.jpg',		
					"productimage5"			=> $dummy_image_path.'dress6.jpg',		
					"productimage6"			=> $dummy_image_path.'dress7.jpg',	
					"price"					=> '40',	
					"specialprice"			=> '35',	
					"size"					=> 'x,xl,xxx,xxxl',
					"color"					=> 'red,black,blue,yellow,purple,pink',
					"posttype"				=> 'product',
				);
$post_info[] = array(
					"post_title"	=>	'Strapless Bra Top dress',
					"post_content"	=>	'With improved comfort and built-in support so you can give your bra the day off. Ruched sweetheart neckline. Imported cotton/modal/spandex.
Level 1 features:
* Shelf bra with luxe Supima&reg; cotton
* Plush inner elastic underband with signature VS logo for comfort, 7" from waist. Sizes XS-XL. #255-849 ',
					"post_meta"		=>	$post_meta,
					"post_feature"	=>	1,
					);
////product 2 end///
////product 3 start///
$post_meta = array();
$post_meta = array(
					"productimage"			=> $dummy_image_path.'dress3.jpg',	
					"productimage1"			=> $dummy_image_path.'dress1.jpg',		
					"productimage2"			=> $dummy_image_path.'dress2.jpg',		
					"productimage3"			=> $dummy_image_path.'dress4.jpg',		
					"productimage4"			=> $dummy_image_path.'dress5.jpg',		
					"productimage5"			=> $dummy_image_path.'dress6.jpg',		
					"productimage6"			=> $dummy_image_path.'dress7.jpg',	
					"price"					=> '232',	
					"specialprice"			=> '',	
					"size"					=> 'x,xl,xxx,xxxl',
					"color"					=> 'red,black,blue,yellow,purple,pink',
					"posttype"				=> 'product',
				);
$post_info[] = array(
					"post_title"	=>	'Ruched strapless Bra Top dress',
					"post_content"	=>	'Channel your inner flirt in a seriously sleek silhouette. Imported cotton/spandex.

* Slim fit with slight a-line skirt
* Built-in shelf bra
* Ruched on sides
* With spandex for a stretchier, sexier fit
* 19&quot; from waist
* Machine wash. Tumble dry.',
					"post_meta"		=>	$post_meta,
					"post_feature"	=>	1,
					);
////product 3 end///
////product 4 start///
$post_meta = array();
$post_meta = array(
					"productimage"			=> $dummy_image_path.'dress4.jpg',	
					"productimage1"			=> $dummy_image_path.'dress1.jpg',		
					"productimage2"			=> $dummy_image_path.'dress3.jpg',		
					"productimage3"			=> $dummy_image_path.'dress2.jpg',		
					"productimage4"			=> $dummy_image_path.'dress5.jpg',		
					"productimage5"			=> $dummy_image_path.'dress6.jpg',		
					"productimage6"			=> $dummy_image_path.'dress7.jpg',	
					"price"					=> '355',	
					"specialprice"			=> '',	
					"size"					=> 'x,xl,xxx,xxxl',
					"color"					=> 'red,black,blue,yellow,purple,pink',
					"posttype"				=> 'product',
				);
$post_info[] = array(
					"post_title"	=>	'Sweetheart halter Bra Top dress',
					"post_content"	=>	'With improved comfort and built-in support so you can give your bra the day off. Banded hem. Imported ECOSIL&reg;/modal/spandex.
* With modal for a supersoft feel and luxurious drape and spandex for a stretchier, sexier fit
* 17&quot; from waist
* Machine wash. Tumble dry.
Level 1 features:
* Shelf bra with luxe Supima&reg; cotton
* Plush inner elastic underband with signature VS logo for comfort',
					"post_meta"		=>	$post_meta,
					"post_feature"	=>	1,
					);
////product 4 end///
////product 5 start///
$post_meta = array();
$post_meta = array(
					"productimage"			=> $dummy_image_path.'dress5.jpg',	
					"productimage1"			=> $dummy_image_path.'dress1.jpg',		
					"productimage2"			=> $dummy_image_path.'dress3.jpg',		
					"productimage3"			=> $dummy_image_path.'dress2.jpg',		
					"productimage4"			=> $dummy_image_path.'dress4.jpg',		
					"productimage5"			=> $dummy_image_path.'dress6.jpg',		
					"productimage6"			=> $dummy_image_path.'dress7.jpg',
					"price"					=> '222',	
					"specialprice"			=> '',	
					"size"					=> 'x,xl,xxx,xxxl',
					"color"					=> 'red,black,blue,yellow,purple,pink',
					"posttype"				=> 'product',
				);
$post_info[] = array(
					"post_title"	=>	'Double-scoopneck tee dress in stripe & dot print',
					"post_content"	=>	'Casual chic, to a tee. Imported cotton.
* Scoopneck and scoopback
* Short sleeves
* Slim fit with straight skirt
* Made from light and luxe 100% pure cotton
* 17&quot; from waist
* Machine wash. Tumble dry.',
					"post_meta"		=>	$post_meta,
					"post_feature"	=>	1,
					);
////product 5 end///
////product 6 start///
$post_meta = array();
$post_meta = array(
					"productimage"			=> $dummy_image_path.'dress6.jpg',	
					"productimage1"			=> $dummy_image_path.'dress1.jpg',		
					"productimage2"			=> $dummy_image_path.'dress3.jpg',		
					"productimage3"			=> $dummy_image_path.'dress2.jpg',		
					"productimage4"			=> $dummy_image_path.'dress4.jpg',		
					"productimage5"			=> $dummy_image_path.'dress5.jpg',		
					"productimage6"			=> $dummy_image_path.'dress7.jpg',
					"price"					=> '350',	
					"specialprice"			=> '',	
					"size"					=> 'x,xl,xxx,xxxl',
					"color"					=> 'red,black,blue,yellow,purple,pink',
					"posttype"				=> 'product',
				);
$post_info[] = array(
					"post_title"	=>	'Sweetheart halter dress',
					"post_content"	=>	'Colorful, curvy and totally cute in the season must-have prints. Imported cotton.
					* Full skirt
					* Exposed back zip
					* 17&quot; from waist
					* Hand wash. Line dry.',
					"post_meta"		=>	$post_meta,
					"post_feature"	=>	1,
					);
////product 6 end///
////product 7 start///
$post_meta = array();
$post_meta = array(
					"productimage"			=> $dummy_image_path.'dress7.jpg',	
					"productimage1"			=> $dummy_image_path.'dress1.jpg',		
					"productimage2"			=> $dummy_image_path.'dress3.jpg',		
					"productimage3"			=> $dummy_image_path.'dress2.jpg',		
					"productimage4"			=> $dummy_image_path.'dress4.jpg',		
					"productimage5"			=> $dummy_image_path.'dress5.jpg',		
					"productimage6"			=> $dummy_image_path.'dress6.jpg',
					"price"					=> '350',	
					"specialprice"			=> '',	
					"size"					=> 'x,xl,xxx,xxxl',
					"color"					=> 'red,black,blue,yellow,purple,pink',
					"posttype"				=> 'product',
				);
$post_info[] = array(
					"post_title"	=>	'Dip-dye strapless dress',
					"post_content"	=>	'A shoulder-baring boho beauty. Smocking and embroidered details. Imported cotton.
18" from waist. ',
					"post_meta"		=>	$post_meta,
					"post_feature"	=>	1,
					);
////product 7 end///
////product 8 start///
$post_meta = array();
$post_meta = array(
					"productimage"			=> $dummy_image_path.'dress8.jpg',	
					"productimage1"			=> $dummy_image_path.'dress1.jpg',		
					"productimage2"			=> $dummy_image_path.'dress3.jpg',		
					"productimage3"			=> $dummy_image_path.'dress2.jpg',		
					"productimage4"			=> $dummy_image_path.'dress4.jpg',		
					"productimage5"			=> $dummy_image_path.'dress5.jpg',		
					"productimage6"			=> $dummy_image_path.'dress6.jpg',	
					"specialprice"			=> '',	
					"size"					=> 'x,xl,xxx,xxxl',
					"color"					=> 'red,black,blue,yellow,purple,pink',
					"posttype"				=> 'product',
				);
$post_info[] = array(
					"post_title"	=>	'Printed beaded halter Bra Top dress',
					"post_content"	=>	'With improved comfort and built-in support so you can give your bra the day off. Beaded halter straps. Imported cotton/modal.
* Empire waist
* With modal for a supersoft feel and luxurious drape
* 19&quot; from waist
* Machine wash. Tumble dry.
Level 1 features:
* Shelf bra with luxe Supima&reg; cotton
* Plush inner elastic underband with signature VS logo for comfort',
					"post_meta"		=>	$post_meta,
					"post_feature"	=>	1,
					);
////product 8 end///
////product 9 start///
$post_meta = array();
$post_meta = array(
					"productimage"			=> $dummy_image_path.'dress9.jpg',	
					"productimage1"			=> $dummy_image_path.'dress1.jpg',		
					"productimage2"			=> $dummy_image_path.'dress3.jpg',		
					"productimage3"			=> $dummy_image_path.'dress2.jpg',		
					"productimage4"			=> $dummy_image_path.'dress4.jpg',		
					"productimage5"			=> $dummy_image_path.'dress5.jpg',		
					"productimage6"			=> $dummy_image_path.'dress6.jpg',
					"price"					=> '500',	
					"specialprice"			=> '',	
					"size"					=> 'x,xl,xxx,xxxl',
					"color"					=> 'red,black,blue,yellow,purple,pink',
					"posttype"				=> 'product',
				);
$post_info[] = array(
					"post_title"	=>	'Drop-waist strapless dress',
					"post_content"	=>	'Full-on flirty, with a ruffled hem. Imported cotton mayan gauze.
* Fit-and-flare shape
* Elastic at top hem
* Tie-front smocked waistband
* 17&quot; from waist
* Machine wash. Tumble dry.',
					"post_meta"		=>	$post_meta,
					"post_feature"	=>	1,
					);
////product 9 end///
////product 10 start///
$post_meta = array();
$post_meta = array(
					"productimage"			=> $dummy_image_path.'dress10.jpg',	
					"productimage1"			=> $dummy_image_path.'dress1.jpg',		
					"productimage2"			=> $dummy_image_path.'dress3.jpg',		
					"productimage3"			=> $dummy_image_path.'dress2.jpg',		
					"productimage4"			=> $dummy_image_path.'dress4.jpg',		
					"productimage5"			=> $dummy_image_path.'dress5.jpg',		
					"productimage6"			=> $dummy_image_path.'dress6.jpg',
					"price"					=> '950',	
					"specialprice"			=> '850',	
					"size"					=> 'x,xl,xxx,xxxl',
					"color"					=> 'red,black,blue,yellow,purple,pink',
					"posttype"				=> 'product',
				);
$post_info[] = array(
					"post_title"	=>	'Daytime jersey A-line Convertible Dress in solids',
					"post_content"	=>	'One dress, so many ways to wear it. Imported cotton/modal/spandex.
* Dress has an asymmetric hem
* Daytime jersey combines the soft feel of cotton with the fluid drape of modal
* Machine wash. Tumble dry.
Can be worn in a variety of styles, including:
* Strapless
* Halter
* One shoulder
Or create your own look. The possibilities are endless.
Solids. 20" from waist.',
					"post_meta"		=>	$post_meta,
					"post_feature"	=>	1,
					);
////product 10 end///

$post_array['Dresses'] = $post_info;
//====================================================================================//
$post_info = array();
////product 1 start///
$post_meta = array();
$post_meta = array(
					"productimage"			=> $dummy_image_path.'women1.jpg',	
					"productimage1"			=> $dummy_image_path.'women2.jpg',		
					"productimage2"			=> $dummy_image_path.'women3.jpg',		
					"productimage3"			=> $dummy_image_path.'women4.jpg',		
					"productimage4"			=> $dummy_image_path.'women1.jpg',		
					"productimage5"			=> $dummy_image_path.'women2.jpg',		
					"productimage6"			=> $dummy_image_path.'women3.jpg',		
					"price"					=> '70',	
					"specialprice"			=> '50',	
					"size"					=> 'x,xl,xxx,xxxl',
					"color"					=> 'red,black,blue,yellow,purple,pink',
					"posttype"				=> 'product',
				);
$post_info[] = array(
					"post_title"	=>	'Terry short hooded jumpsuit',
					"post_content"	=>	'Casually cool for every day, in soft stretchy Supima&reg; cotton. Imported.
* Scoopneck and scoopback
* Short sleeves
* Slim fit with straight skirt
* 17&quot; from waist
* With spandex for a stretchier, sexier fit
* Machine wash. Tumble dry.',
					"post_meta"		=>	$post_meta,
					"post_feature"	=>	1,
					);
////product 1 end///
////product 2 start///
$post_meta = array();
$post_meta = array(
					"productimage"			=> $dummy_image_path.'women2.jpg',	
					"productimage1"			=> $dummy_image_path.'women1.jpg',		
					"productimage2"			=> $dummy_image_path.'women3.jpg',		
					"productimage3"			=> $dummy_image_path.'women4.jpg',		
					"productimage4"			=> $dummy_image_path.'women1.jpg',		
					"productimage5"			=> $dummy_image_path.'women2.jpg',		
					"productimage6"			=> $dummy_image_path.'women3.jpg',	
					"price"					=> '40',	
					"specialprice"			=> '35',	
					"size"					=> 'x,xl,xxx,xxxl',
					"color"					=> 'red,black,blue,yellow,purple,pink',
					"posttype"				=> 'product',
				);
$post_info[] = array(
					"post_title"	=>	'Plaid cotton jersey short',
					"post_content"	=>	'Dyed-to-match colors. Elastic waist. No pockets. Domestic.
					Soft and cozy fleece to live in all season long. V-inset neckline and rolled, wrist-length sleeves. Roomy fit. Hip-length. Imported cotton/polyester.',
					"post_meta"		=>	$post_meta,
					"post_feature"	=>	1,
					);
////product 2 end///
////product 3 start///
$post_meta = array();
$post_meta = array(
					"productimage"			=> $dummy_image_path.'women3.jpg',	
					"productimage1"			=> $dummy_image_path.'women2.jpg',		
					"productimage2"			=> $dummy_image_path.'women1.jpg',		
					"productimage3"			=> $dummy_image_path.'women4.jpg',		
					"productimage4"			=> $dummy_image_path.'women1.jpg',		
					"productimage5"			=> $dummy_image_path.'women2.jpg',		
					"productimage6"			=> $dummy_image_path.'women3.jpg',		
					"price"					=> '232',	
					"specialprice"			=> '',	
					"size"					=> 'x,xl,xxx,xxxl',
					"color"					=> 'red,black,blue,yellow,purple,pink',
					"posttype"				=> 'product',
				);
$post_info[] = array(
					"post_title"	=>	'Fleece short',
					"post_content"	=>	'From our Plush and Lush Fleece Collection. Put a little luxe in your life with soft fleece in a right-now shape. Side pockets. Imported cotton/polyester.
					Cozy and comfortable, this downtime standby helps soften your look. Kangaroo pocket. Elbow-sleeves. Imported cotton/polyester.',
					"post_meta"		=>	$post_meta,
					"post_feature"	=>	1,
					);
////product 3 end///
////product 4 start///
$post_meta = array();
$post_meta = array(
					"productimage"			=> $dummy_image_path.'women4.jpg',	
					"productimage1"			=> $dummy_image_path.'women2.jpg',		
					"productimage2"			=> $dummy_image_path.'women3.jpg',		
					"productimage3"			=> $dummy_image_path.'women2.jpg',		
					"productimage4"			=> $dummy_image_path.'women1.jpg',		
					"productimage5"			=> $dummy_image_path.'women2.jpg',		
					"productimage6"			=> $dummy_image_path.'women1.jpg',		
					"price"					=> '355',	
					"specialprice"			=> '',	
					"size"					=> 'x,xl,xxx,xxxl',
					"color"					=> 'red,black,blue,yellow,purple,pink',
					"posttype"				=> 'product',
				);
$post_info[] = array(
					"post_title"	=>	'Beach linen short jumpsuit',
					"post_content"	=>	'Play it cool in summer must-have fabric. Adjustable tie at back. Two front pockets. Imported.',
					"post_meta"		=>	$post_meta,
					"post_feature"	=>	1,
					);
////product 4 end///
$post_array['Women'] = $post_info;
//====================================================================================//
////product 1 start///
$post_info = array();
$post_meta = array();
$post_meta = array(
					"productimage"			=> $dummy_image_path.'yoga1.jpg',	
					"productimage1"			=> $dummy_image_path.'yoga2.jpg',		
					"productimage2"			=> $dummy_image_path.'yoga3.jpg',			
					"productimage3"			=> $dummy_image_path.'yoga4.jpg',			
					"productimage4"			=> $dummy_image_path.'yoga5.jpg',			
					"productimage5"			=> $dummy_image_path.'yoga6.jpg',			
					"productimage6"			=> $dummy_image_path.'yoga7.jpg',			
					"price"					=> '95',	
					"specialprice"			=> '80',	
					"size"					=> 'x,xl,xxx,xxxl',
					"color"					=> 'red,black,blue,yellow,purple,pink',
					"posttype"				=> 'product',
				);
$post_info[] = array(
					"post_title"	=>	'Yoga foldover pant',
					"post_content"	=>	'Sleek, stretchy, slim-fit piece that moves with you and retains its shape. Adjustable rise waistband. Slim fit. Bootcut. Imported cotton/Lycra&reg; spandex',
					"post_meta"		=>	$post_meta,
					"post_feature"	=>	0,
					);
////product 1 end///
////product 2 start///
$post_meta = array();
$post_meta = array(
					"productimage"			=> $dummy_image_path.'yoga2.jpg',	
					"productimage1"			=> $dummy_image_path.'yoga1.jpg',		
					"productimage2"			=> $dummy_image_path.'yoga3.jpg',			
					"productimage3"			=> $dummy_image_path.'yoga4.jpg',			
					"productimage4"			=> $dummy_image_path.'yoga5.jpg',			
					"productimage5"			=> $dummy_image_path.'yoga6.jpg',			
					"productimage6"			=> $dummy_image_path.'yoga7.jpg',
					"productimage3"			=> '',		
					"productimage4"			=> '',		
					"productimage5"			=> '',		
					"productimage6"			=> '',
					"price"					=> '150',	
					"specialprice"			=> '100',	
					"size"					=> 'x,xl,xxx,xxxl',
					"color"					=> 'red,black,blue,yellow,purple,pink',
					"posttype"				=> 'product',
				);
$post_info[] = array(
					"post_title"	=>	'Yoga foldover legging',
					"post_content"	=>	'Sleek, stretchy, slim-fit piece that moves with you and retains its shape. Adjustable fold-over waist. Imported cotton/Lycra&reg; spandex.',
					"post_meta"		=>	$post_meta,
					"post_feature"	=>	0,
					);
////product 2 end///
////product 3 start///
$post_meta = array();
$post_meta = array(
					"productimage"			=> $dummy_image_path.'yoga3.jpg',	
					"productimage1"			=> $dummy_image_path.'yoga2.jpg',		
					"productimage2"			=> $dummy_image_path.'yoga1.jpg',			
					"productimage3"			=> $dummy_image_path.'yoga4.jpg',			
					"productimage4"			=> $dummy_image_path.'yoga5.jpg',			
					"productimage5"			=> $dummy_image_path.'yoga6.jpg',			
					"productimage6"			=> $dummy_image_path.'yoga7.jpg',
					"price"					=> '100',	
					"specialprice"			=> '70',	
					"size"					=> 'x,xl,xxx,xxxl',
					"color"					=> 'red,black,blue,yellow,purple,pink',
					"posttype"				=> 'product',
				);
$post_info[] = array(
					"post_title"	=>	'Daily legging',
					"post_content"	=>	'Soft, stretchy and just as comfy as your favorite tee, in must-have neutrals and bold brights. Imported. 95% cotton, 5% spandex.
* Elastic waistband
* Fitted through leg',
					"post_meta"		=>	$post_meta,
					"post_feature"	=>	0,
					);
////product 3 end///
////product 4 start///
$post_meta = array();
$post_meta = array(
					"productimage"			=> $dummy_image_path.'yoga4.jpg',	
					"productimage1"			=> $dummy_image_path.'yoga2.jpg',		
					"productimage2"			=> $dummy_image_path.'yoga3.jpg',			
					"productimage3"			=> $dummy_image_path.'yoga1.jpg',			
					"productimage4"			=> $dummy_image_path.'yoga5.jpg',			
					"productimage5"			=> $dummy_image_path.'yoga6.jpg',			
					"productimage6"			=> $dummy_image_path.'yoga7.jpg',
					"price"					=> '100',	
					"specialprice"			=> '70',	
					"size"					=> 'x,xl,xxx,xxxl',
					"color"					=> 'red,black,blue,yellow,purple,pink',
					"posttype"				=> 'product',
				);
$post_info[] = array(
					"post_title"	=>	'Terry classic pant in solids',
					"post_content"	=>	'Cozy comfort in a fresh shape, for on the go or lounging around. Relaxed fit. Drawstring waistband. Imported cotton/polyester.',
					"post_meta"		=>	$post_meta,
					"post_feature"	=>	0,
					);
////product 4 end///
////product 5 start///
$post_meta = array();
$post_meta = array(
					"productimage"			=> $dummy_image_path.'yoga5.jpg',	
					"productimage1"			=> $dummy_image_path.'yoga2.jpg',		
					"productimage2"			=> $dummy_image_path.'yoga3.jpg',			
					"productimage3"			=> $dummy_image_path.'yoga4.jpg',			
					"productimage4"			=> $dummy_image_path.'yoga1.jpg',			
					"productimage5"			=> $dummy_image_path.'yoga6.jpg',			
					"productimage6"			=> $dummy_image_path.'yoga7.jpg',
					"price"					=> '150',	
					"specialprice"			=> '90',	
					"size"					=> 'x,xl,xxx,xxxl',
					"color"					=> 'red,black,blue,yellow,purple,pink',
					"posttype"				=> 'product',
				);
$post_info[] = array(
					"post_title"	=>	'Yoga knot-waist foldover pant',
					"post_content"	=>	'Sleek, stretchy, slim-fit piece that moves with you and retains its shape. Adjustable fold-over waist. Imported cotton/spandex.',
					"post_meta"		=>	$post_meta,
					"post_feature"	=>	0,
					);
////product 5 end///
////product 6 start///
$post_meta = array();
$post_meta = array(
					"productimage"			=> $dummy_image_path.'yoga6.jpg',	
					"productimage1"			=> $dummy_image_path.'yoga2.jpg',		
					"productimage2"			=> $dummy_image_path.'yoga3.jpg',			
					"productimage3"			=> $dummy_image_path.'yoga4.jpg',			
					"productimage4"			=> $dummy_image_path.'yoga5.jpg',			
					"productimage5"			=> $dummy_image_path.'yoga1.jpg',			
					"productimage6"			=> $dummy_image_path.'yoga7.jpg',
					"price"					=> '150',	
					"specialprice"			=> '90',	
					"size"					=> 'x,xl,xxx,xxxl',
					"color"					=> 'red,black,blue,yellow,purple,pink',
					"posttype"				=> 'product',
				);
$post_info[] = array(
					"post_title"	=>	'Tie-dye side-stripe yoga legging',
					"post_content"	=>	'The smooth, stretchy, slim-fit essential that moves with you and retains it shape, now in a free-spirited print. Elastic waist. Imported cotton/Lycra&reg; spandex.',
					"post_meta"		=>	$post_meta,
					"post_feature"	=>	0,
					);
////product 6 end///	
////product 7 start///
$post_meta = array();
$post_meta = array(
					"productimage"			=> $dummy_image_path.'yoga7.jpg',	
					"productimage1"			=> $dummy_image_path.'yoga2.jpg',		
					"productimage2"			=> $dummy_image_path.'yoga3.jpg',			
					"productimage3"			=> $dummy_image_path.'yoga4.jpg',			
					"productimage4"			=> $dummy_image_path.'yoga5.jpg',			
					"productimage5"			=> $dummy_image_path.'yoga1.jpg',			
					"productimage6"			=> $dummy_image_path.'yoga6.jpg',
					"price"					=> '150',	
					"specialprice"			=> '90',	
					"size"					=> 'x,xl,xxx,xxxl',
					"color"					=> 'red,black,blue,yellow,purple,pink',
					"posttype"				=> 'product',
				);
$post_info[] = array(
					"post_title"	=>	'Yoga crop pant',
					"post_content"	=>	'Sleek, stretchy, slim-fit piece that moves with you and retains its shape. Imported cotton/Lycra&reg; spandex',
					"post_meta"		=>	$post_meta,
					"post_feature"	=>	0,
					);
////product 7 end///
////product 8 start///
$post_meta = array();
$post_meta = array(
					"productimage"			=> $dummy_image_path.'yoga8.jpg',	
					"productimage1"			=> $dummy_image_path.'yoga2.jpg',		
					"productimage2"			=> $dummy_image_path.'yoga3.jpg',			
					"productimage3"			=> $dummy_image_path.'yoga4.jpg',			
					"productimage4"			=> $dummy_image_path.'yoga5.jpg',			
					"productimage5"			=> $dummy_image_path.'yoga1.jpg',			
					"productimage6"			=> $dummy_image_path.'yoga6.jpg',
					"price"					=> '150',	
					"specialprice"			=> '90',	
					"size"					=> 'x,xl,xxx,xxxl',
					"color"					=> 'red,black,blue,yellow,purple,pink',
					"posttype"				=> 'product',
				);
$post_info[] = array(
					"post_title"	=>	'Yoga biker short',
					"post_content"	=>	'Strike a pose in a sleek and chic shape. Mid rise. Imported cotton/Lycra&reg; spandex.
					So soft and comfy, you want to live in it. Single front pocket. Imported cotton/modal.',
					"post_meta"		=>	$post_meta,
					"post_feature"	=>	0,
					);
////product 8 end///
////product 9 start///
$post_meta = array();
$post_meta = array(
					"productimage"			=> $dummy_image_path.'yoga9.jpg',	
					"productimage1"			=> $dummy_image_path.'yoga2.jpg',		
					"productimage2"			=> $dummy_image_path.'yoga3.jpg',			
					"productimage3"			=> $dummy_image_path.'yoga4.jpg',			
					"productimage4"			=> $dummy_image_path.'yoga5.jpg',			
					"productimage5"			=> $dummy_image_path.'yoga1.jpg',			
					"productimage6"			=> $dummy_image_path.'yoga6.jpg',
					"price"					=> '150',	
					"specialprice"			=> '90',	
					"size"					=> 'x,xl,xxx,xxxl',
					"color"					=> 'red,black,blue,yellow,purple,pink',
					"posttype"				=> 'product',
				);
$post_info[] = array(
					"post_title"	=>	'Yoga foldover sailor pant',
					"post_content"	=>	'Strike a pose in a sleek and chic shape. Imported cotton/Lycra&reg; spandex.',
					"post_meta"		=>	$post_meta,
					"post_feature"	=>	0,
					);
////product 9 end///
////product 10 start///
$post_meta = array();
$post_meta = array(
					"productimage"			=> $dummy_image_path.'yoga10.jpg',	
					"productimage1"			=> $dummy_image_path.'yoga2.jpg',		
					"productimage2"			=> $dummy_image_path.'yoga3.jpg',			
					"productimage3"			=> $dummy_image_path.'yoga4.jpg',			
					"productimage4"			=> $dummy_image_path.'yoga5.jpg',			
					"productimage5"			=> $dummy_image_path.'yoga1.jpg',			
					"productimage6"			=> $dummy_image_path.'yoga6.jpg',
					"price"					=> '150',	
					"specialprice"			=> '90',	
					"size"					=> 'x,xl,xxx,xxxl',
					"color"					=> 'red,black,blue,yellow,purple,pink',
					"posttype"				=> 'product',
				);
$post_info[] = array(
					"post_title"	=>	'Modal button-up jumpsuit',
					"post_content"	=>	'A right-now shape that casually chic in silky-soft modal. Drawstring waist. Tapered crop leg. Imported.
					Shelf bra. Imported cotton/Lycra&reg; spandex.',
					"post_meta"		=>	$post_meta,
					"post_feature"	=>	0,
					);
////product 10 end///
$post_array['Yoga Pants & Leggings'] = $post_info;
//====================================================================================//
////product 1 start///
$post_info = array();
$post_meta = array();
$post_meta = array(
					"productimage"			=> $dummy_image_path.'shorts1.jpg',	
					"productimage1"			=> $dummy_image_path.'shorts2.jpg',		
					"productimage2"			=> $dummy_image_path.'shorts3.jpg',			
					"productimage3"			=> $dummy_image_path.'shorts4.jpg',			
					"productimage4"			=> $dummy_image_path.'shorts5.jpg',			
					"productimage5"			=> $dummy_image_path.'shorts6.jpg',			
					"productimage6"			=> $dummy_image_path.'shorts7.jpg',			
					"price"					=> '95',	
					"specialprice"			=> '80',	
					"size"					=> 'x,xl,xxx,xxxl',
					"color"					=> 'red,black,blue,yellow,purple,pink',
					"posttype"				=> 'product',
				);
$post_info[] = array(
					"post_title"	=>	'The Hipster short',
					"post_content"	=>	'Front zip with two-button closure. Wide waistband. Tailored hem. Imported cotton/spandex.',
					"post_meta"		=>	$post_meta,
					"post_feature"	=>	0,
					);
////product 1 end///
////product 2 start///
$post_meta = array();
$post_meta = array(
					"productimage"			=> $dummy_image_path.'shorts2.jpg',	
					"productimage1"			=> $dummy_image_path.'shorts1.jpg',		
					"productimage2"			=> $dummy_image_path.'shorts3.jpg',			
					"productimage3"			=> $dummy_image_path.'shorts4.jpg',			
					"productimage4"			=> $dummy_image_path.'shorts5.jpg',			
					"productimage5"			=> $dummy_image_path.'shorts6.jpg',			
					"productimage6"			=> $dummy_image_path.'shorts7.jpg',
					"productimage3"			=> '',		
					"productimage4"			=> '',		
					"productimage5"			=> '',		
					"productimage6"			=> '',
					"price"					=> '150',	
					"specialprice"			=> '100',	
					"size"					=> 'x,xl,xxx,xxxl',
					"color"					=> 'red,black,blue,yellow,purple,pink',
					"posttype"				=> 'product',
				);
$post_info[] = array(
					"post_title"	=>	'Fringe denim short',
					"post_content"	=>	'The perfect fray to while away weekends. Now also in new garment-dyed washes. Imported cotton.',
					"post_meta"		=>	$post_meta,
					"post_feature"	=>	0,
					);
////product 2 end///
////product 3 start///
$post_meta = array();
$post_meta = array(
					"productimage"			=> $dummy_image_path.'shorts3.jpg',	
					"productimage1"			=> $dummy_image_path.'shorts2.jpg',		
					"productimage2"			=> $dummy_image_path.'shorts1.jpg',			
					"productimage3"			=> $dummy_image_path.'shorts4.jpg',			
					"productimage4"			=> $dummy_image_path.'shorts5.jpg',			
					"productimage5"			=> $dummy_image_path.'shorts6.jpg',			
					"productimage6"			=> $dummy_image_path.'shorts7.jpg',
					"price"					=> '100',	
					"specialprice"			=> '70',	
					"size"					=> 'x,xl,xxx,xxxl',
					"color"					=> 'red,black,blue,yellow,purple,pink',
					"posttype"				=> 'product',
				);
$post_info[] = array(
					"post_title"	=>	'Linen pull-on short',
					"post_content"	=>	'A cool, casual piece in the season must-have fabric. Knit drawstring waist. Ribbed waistband. Front pockets and back flap pockets. 1 cuffs with snap tabs. Imported.',
					"post_meta"		=>	$post_meta,
					"post_feature"	=>	0,
					);
////product 3 end///
////product 4 start///
$post_meta = array();
$post_meta = array(
					"productimage"			=> $dummy_image_path.'shorts4.jpg',	
					"productimage1"			=> $dummy_image_path.'shorts2.jpg',		
					"productimage2"			=> $dummy_image_path.'shorts3.jpg',			
					"productimage3"			=> $dummy_image_path.'shorts1.jpg',			
					"productimage4"			=> $dummy_image_path.'shorts5.jpg',			
					"productimage5"			=> $dummy_image_path.'shorts6.jpg',			
					"productimage6"			=> $dummy_image_path.'shorts7.jpg',
					"price"					=> '100',	
					"specialprice"			=> '70',	
					"size"					=> 'x,xl,xxx,xxxl',
					"color"					=> 'red,black,blue,yellow,purple,pink',
					"posttype"				=> 'product',
				);
$post_info[] = array(
					"post_title"	=>	'Frayed twill short',
					"post_content"	=>	'A crisp and casual must-have for your weekend wardrobe. Front zip with button closure. Side slant pockets. Back welt pockets. Frayed hem. Imported cotton/spandex.',
					"post_meta"		=>	$post_meta,
					"post_feature"	=>	0,
					);
////product 4 end///
////product 5 start///
$post_meta = array();
$post_meta = array(
					"productimage"			=> $dummy_image_path.'shorts5.jpg',	
					"productimage1"			=> $dummy_image_path.'shorts2.jpg',		
					"productimage2"			=> $dummy_image_path.'shorts3.jpg',			
					"productimage3"			=> $dummy_image_path.'shorts4.jpg',			
					"productimage4"			=> $dummy_image_path.'shorts1.jpg',			
					"productimage5"			=> $dummy_image_path.'shorts6.jpg',			
					"productimage6"			=> $dummy_image_path.'shorts7.jpg',
					"price"					=> '150',	
					"specialprice"			=> '90',	
					"size"					=> 'x,xl,xxx,xxxl',
					"color"					=> 'red,black,blue,yellow,purple,pink',
					"posttype"				=> 'product',
				);
$post_info[] = array(
					"post_title"	=>	'Beach linen cuffed short',
					"post_content"	=>	'A cool, casual piece in summer must-have fabric. Imported.
* Tie waist with front zip
* Back flap pockets
* Tabbed cuff hem
3 1/2 inseam, rolled. 6 1/2 inseam, unrolled.',
					"post_meta"		=>	$post_meta,
					"post_feature"	=>	0,
					);
////product 5 end///
////product 6 start///
$post_meta = array();
$post_meta = array(
					"productimage"			=> $dummy_image_path.'shorts6.jpg',	
					"productimage1"			=> $dummy_image_path.'shorts2.jpg',		
					"productimage2"			=> $dummy_image_path.'shorts3.jpg',			
					"productimage3"			=> $dummy_image_path.'shorts4.jpg',			
					"productimage4"			=> $dummy_image_path.'shorts5.jpg',			
					"productimage5"			=> $dummy_image_path.'shorts1.jpg',			
					"productimage6"			=> $dummy_image_path.'shorts7.jpg',
					"price"					=> '150',	
					"specialprice"			=> '90',	
					"size"					=> 'x,xl,xxx,xxxl',
					"color"					=> 'red,black,blue,yellow,purple,pink',
					"posttype"				=> 'product',
				);
$post_info[] = array(
					"post_title"	=>	'Belted poplin short',
					"post_content"	=>	'Removable d-ring belt. Imported cotton.
3" inseam. Sizes 0-14. #252-484',
					"post_meta"		=>	$post_meta,
					"post_feature"	=>	0,
					);
////product 6 end///	
////product 7 start///
$post_meta = array();
$post_meta = array(
					"productimage"			=> $dummy_image_path.'shorts7.jpg',	
					"productimage1"			=> $dummy_image_path.'shorts2.jpg',		
					"productimage2"			=> $dummy_image_path.'shorts3.jpg',			
					"productimage3"			=> $dummy_image_path.'shorts4.jpg',			
					"productimage4"			=> $dummy_image_path.'shorts5.jpg',			
					"productimage5"			=> $dummy_image_path.'shorts6.jpg',			
					"productimage6"			=> $dummy_image_path.'shorts1.jpg',
					"price"					=> '150',	
					"specialprice"			=> '90',	
					"size"					=> 'x,xl,xxx,xxxl',
					"color"					=> 'red,black,blue,yellow,purple,pink',
					"posttype"				=> 'product',
				);
$post_info[] = array(
					"post_title"	=>	'The Low Five short in stretch',
					"post_content"	=>	'Cuts in on the jean scene. Cuffed. Imported cotton/spandex.
* Low rise
* Slim fit
3 1/2 inseam.',
					"post_meta"		=>	$post_meta,
					"post_feature"	=>	0,
					);
////product 7 end///
////product 8 start///
$post_meta = array();
$post_meta = array(
					"productimage"			=> $dummy_image_path.'yoga8.jpg',	
					"productimage1"			=> $dummy_image_path.'yoga2.jpg',		
					"productimage2"			=> $dummy_image_path.'yoga3.jpg',			
					"productimage3"			=> $dummy_image_path.'yoga4.jpg',			
					"productimage4"			=> $dummy_image_path.'yoga5.jpg',			
					"productimage5"			=> $dummy_image_path.'yoga1.jpg',			
					"productimage6"			=> $dummy_image_path.'yoga6.jpg',
					"price"					=> '150',	
					"specialprice"			=> '90',	
					"size"					=> 'x,xl,xxx,xxxl',
					"color"					=> 'red,black,blue,yellow,purple,pink',
					"posttype"				=> 'product',
				);
$post_info[] = array(
					"post_title"	=>	'Yoga biker short',
					"post_content"	=>	'Strike a pose in a sleek and chic shape. Mid rise. Imported cotton/Lycra&reg; spandex.
					So soft and comfy, you want to live in it. Single front pocket. Imported cotton/modal.',
					"post_meta"		=>	$post_meta,
					"post_feature"	=>	0,
					);
////product 8 end///
$post_array['Shorts'] = $post_info;
//====================================================================================//
////product 1 start///
$post_info = array();
$post_meta = array();
$post_meta = array(
					"productimage"			=> $dummy_image_path.'top1.jpg',	
					"productimage1"			=> $dummy_image_path.'top2.jpg',		
					"productimage2"			=> $dummy_image_path.'top3.jpg',			
					"productimage3"			=> $dummy_image_path.'top4.jpg',			
					"productimage4"			=> $dummy_image_path.'top5.jpg',			
					"productimage5"			=> $dummy_image_path.'top6.jpg',			
					"productimage6"			=> $dummy_image_path.'top7.jpg',			
					"price"					=> '95',	
					"specialprice"			=> '80',	
					"size"					=> 'x,xl,xxx,xxxl',
					"color"					=> 'red,black,blue,yellow,purple,pink',
					"posttype"				=> 'product',
				);
$post_info[] = array(
					"post_title"	=>	'One-shoulder Bra Top',
					"post_content"	=>	'With improved comfort and built-in support, so you can give your bra the day off. Imported cotton/spandex.
Level 1 features:
* Shelf bra with luxe Supima&reg; cotton
* Plush inner elastic underband with signature VS logo for comfort
* Right-now style, plus the incredible fit, comfort and support of a bra
* Perfectly priced to mix and match or stock up on colors
* With spandex for the stretchiest, sexiest fit
* Available in a wide variety of colors
* Machine wash. Tumble dry.',
					"post_meta"		=>	$post_meta,
					"post_feature"	=>	0,
					);
////product 1 end///
////product 2 start///
$post_meta = array();
$post_meta = array(
					"productimage"			=> $dummy_image_path.'top2.jpg',	
					"productimage1"			=> $dummy_image_path.'top1.jpg',		
					"productimage2"			=> $dummy_image_path.'top3.jpg',			
					"productimage3"			=> $dummy_image_path.'top4.jpg',			
					"productimage4"			=> $dummy_image_path.'top5.jpg',			
					"productimage5"			=> $dummy_image_path.'top6.jpg',			
					"productimage6"			=> $dummy_image_path.'top7.jpg',
					"productimage3"			=> '',		
					"productimage4"			=> '',		
					"productimage5"			=> '',		
					"productimage6"			=> '',
					"price"					=> '150',	
					"specialprice"			=> '100',	
					"size"					=> 'x,xl,xxx,xxxl',
					"color"					=> 'red,black,blue,yellow,purple,pink',
					"posttype"				=> 'product',
				);
$post_info[] = array(
					"post_title"	=>	'Twist-front halter Bra Top',
					"post_content"	=>	'With improved comfort and built-in support, so you can give your bra the day off. Ruched at bust. Goldtone embellishment on straps. Imported cotton/modal.
Level 1 features:
* Plush inner elastic underband with signature VS logo for comfort
* Right-now style, plus the incredible fit, comfort and support of a bra, for one great price
* With modal for a supersoft feel and luxurious drape
* Available in a wide variety of colors
* Machine wash. Tumble dry.',
					"post_meta"		=>	$post_meta,
					"post_feature"	=>	0,
					);
////product 2 end///
////product 3 start///
$post_meta = array();
$post_meta = array(
					"productimage"			=> $dummy_image_path.'top3.jpg',	
					"productimage1"			=> $dummy_image_path.'top2.jpg',		
					"productimage2"			=> $dummy_image_path.'top1.jpg',			
					"productimage3"			=> $dummy_image_path.'top4.jpg',			
					"productimage4"			=> $dummy_image_path.'top5.jpg',			
					"productimage5"			=> $dummy_image_path.'top6.jpg',			
					"productimage6"			=> $dummy_image_path.'top7.jpg',
					"price"					=> '100',	
					"specialprice"			=> '70',	
					"size"					=> 'x,xl,xxx,xxxl',
					"color"					=> 'red,black,blue,yellow,purple,pink',
					"posttype"				=> 'product',
				);
$post_info[] = array(
					"post_title"	=>	'Ruched halter Bra Top',
					"post_content"	=>	'A cool, casual piece in the season must-have fabric. Knit drawstring waist. Ribbed waistband. Front pockets and back flap pockets. 1 cuffs with snap tabs. Imported.',
					"post_meta"		=>	$post_meta,
					"post_feature"	=>	0,
					);
////product 3 end///
////product 4 start///
$post_meta = array();
$post_meta = array(
					"productimage"			=> $dummy_image_path.'top4.jpg',	
					"productimage1"			=> $dummy_image_path.'top2.jpg',		
					"productimage2"			=> $dummy_image_path.'top3.jpg',			
					"productimage3"			=> $dummy_image_path.'top1.jpg',			
					"productimage4"			=> $dummy_image_path.'top5.jpg',			
					"productimage5"			=> $dummy_image_path.'top6.jpg',			
					"productimage6"			=> $dummy_image_path.'top7.jpg',
					"price"					=> '100',	
					"specialprice"			=> '70',	
					"size"					=> 'x,xl,xxx,xxxl',
					"color"					=> 'red,black,blue,yellow,purple,pink',
					"posttype"				=> 'product',
				);
$post_info[] = array(
					"post_title"	=>	'Cotton modal scoopneck top',
					"post_content"	=>	'A crisp and casual must-have for your weekend wardrobe. Front zip with button closure. Side slant pockets. Back welt pockets. Frayed hem. Imported cotton/spandex.',
					"post_meta"		=>	$post_meta,
					"post_feature"	=>	0,
					);
////product 4 end///
////product 5 start///
$post_meta = array();
$post_meta = array(
					"productimage"			=> $dummy_image_path.'top5.jpg',	
					"productimage1"			=> $dummy_image_path.'top2.jpg',		
					"productimage2"			=> $dummy_image_path.'top3.jpg',			
					"productimage3"			=> $dummy_image_path.'top4.jpg',			
					"productimage4"			=> $dummy_image_path.'top1.jpg',			
					"productimage5"			=> $dummy_image_path.'top6.jpg',			
					"productimage6"			=> $dummy_image_path.'top7.jpg',
					"price"					=> '150',	
					"specialprice"			=> '90',	
					"size"					=> 'x,xl,xxx,xxxl',
					"color"					=> 'red,black,blue,yellow,purple,pink',
					"posttype"				=> 'product',
				);
$post_info[] = array(
					"post_title"	=>	'Strapless corset',
					"post_content"	=>	'Show some shoulder in a romantic, body-skimming top. Exposed back zip. Imported cotton/spandex.',
					"post_meta"		=>	$post_meta,
					"post_feature"	=>	0,
					);
////product 5 end///
////product 6 start///
$post_meta = array();
$post_meta = array(
					"productimage"			=> $dummy_image_path.'top6.jpg',	
					"productimage1"			=> $dummy_image_path.'top2.jpg',		
					"productimage2"			=> $dummy_image_path.'top3.jpg',			
					"productimage3"			=> $dummy_image_path.'top4.jpg',			
					"productimage4"			=> $dummy_image_path.'top5.jpg',			
					"productimage5"			=> $dummy_image_path.'top1.jpg',			
					"productimage6"			=> $dummy_image_path.'top7.jpg',
					"price"					=> '150',	
					"specialprice"			=> '90',	
					"size"					=> 'x,xl,xxx,xxxl',
					"color"					=> 'red,black,blue,yellow,purple,pink',
					"posttype"				=> 'product',
				);
$post_info[] = array(
					"post_title"	=>	'Flyaway-back cami',
					"post_content"	=>	'Get fresh with fun florals and a flirty glimpse of back. Imported cotton/polyester.
					The wardrobe essential you always reach for, now in new washes and a redesigned fit, plus cool fades, whiskering and tints. Our low rise, five-pocket jean is sure to be a wardrobe staple. Pitched waistband dips low in front while providing plenty of coverage in back. Imported cotton/spandex.
* Bootcut with 19&quot; leg opening
* Low rise
* Slim fit
* 8 1/4 front rise
* 11.5 oz. stretch denim',
					"post_meta"		=>	$post_meta,
					"post_feature"	=>	0,
					);
////product 6 end///	
////product 7 start///
$post_meta = array();
$post_meta = array(
					"productimage"			=> $dummy_image_path.'top7.jpg',	
					"productimage1"			=> $dummy_image_path.'top2.jpg',		
					"productimage2"			=> $dummy_image_path.'top3.jpg',			
					"productimage3"			=> $dummy_image_path.'top4.jpg',			
					"productimage4"			=> $dummy_image_path.'top5.jpg',			
					"productimage5"			=> $dummy_image_path.'top6.jpg',			
					"productimage6"			=> $dummy_image_path.'top1.jpg',
					"price"					=> '150',	
					"specialprice"			=> '90',	
					"size"					=> 'x,xl,xxx,xxxl',
					"color"					=> 'red,black,blue,yellow,purple,pink',
					"posttype"				=> 'product',
				);
$post_info[] = array(
					"post_title"	=>	'Off-the-shoulder top in leopard',
					"post_content"	=>	'Elastic neckline with embellished drawstring with keyhole. Imported cotton.
					Casual chic, freshly cropped. Hand-finished for one-of-a-kind fading, distressing and destruction. Button fly. Five-pocket styling. Rolled cuff. Imported cotton.
* At waist
* Easy fit',
					"post_meta"		=>	$post_meta,
					"post_feature"	=>	0,
					);
////product 7 end///
////product 8 start///
$post_meta = array();
$post_meta = array(
					"productimage"			=> $dummy_image_path.'top8.jpg',	
					"productimage1"			=> $dummy_image_path.'top2.jpg',		
					"productimage2"			=> $dummy_image_path.'top3.jpg',			
					"productimage3"			=> $dummy_image_path.'top4.jpg',			
					"productimage4"			=> $dummy_image_path.'top5.jpg',			
					"productimage5"			=> $dummy_image_path.'top6.jpg',			
					"productimage6"			=> $dummy_image_path.'top7.jpg',
					"price"					=> '150',	
					"specialprice"			=> '90',	
					"size"					=> 'x,xl,xxx,xxxl',
					"color"					=> 'red,black,blue,yellow,purple,pink',
					"posttype"				=> 'product',
				);
$post_info[] = array(
					"post_title"	=>	'Off-the-shoulder lacy t',
					"post_content"	=>	'Elastic neckline with embellished drawstring with keyhole. Imported cotton.
					Casual chic, freshly cropped. Hand-finished for one-of-a-kind fading, distressing and destruction. Button fly. Five-pocket styling. Rolled cuff. Imported cotton.
* At waist
* Easy fit',
					"post_meta"		=>	$post_meta,
					"post_feature"	=>	0,
					);
////product 8 end///
$post_array['Tops'] = $post_info;
//====================================================================================//
////product 1 start///
$post_info = array();
$post_meta = array();
$post_meta = array(
					"productimage"			=> $dummy_image_path.'kids1.jpg',	
					"productimage1"			=> $dummy_image_path.'kids2.jpg',		
					"productimage2"			=> $dummy_image_path.'kids3.jpg',			
					"productimage3"			=> $dummy_image_path.'kids4.jpg',			
					"productimage4"			=> $dummy_image_path.'kids5.jpg',			
					"productimage5"			=> $dummy_image_path.'kids6.jpg',			
					"productimage6"			=> $dummy_image_path.'kids7.jpg',			
					"price"					=> '95',	
					"specialprice"			=> '80',	
					"size"					=> 'x,xl,xxx,xxxl',
					"color"					=> 'red,black,blue,yellow,purple,pink',
					"posttype"				=> 'product',
				);
$post_info[] = array(
					"post_title"	=>	'Mini A Ture Ras Knitted',
					"post_content"	=>	'This knitted boys jumper from Mini A Ture is a great addition to any boys wardrobe. The hooded jumper is trimmed with a contrast blue trim. The dipped neckline means that this top can be worn over a contrasting colour top, like the Mini A Ture Casper striped long sleeved t-shirt, or any other top you may own. Machine wash @ 30 degrees.',
					"post_meta"		=>	$post_meta,
					"post_feature"	=>	0,
					);
////product 1 end///
////product 2 start///
$post_meta = array();
$post_meta = array(
					"productimage"			=> $dummy_image_path.'kids2.jpg',	
					"productimage1"			=> $dummy_image_path.'kids1.jpg',		
					"productimage2"			=> $dummy_image_path.'kids3.jpg',			
					"productimage3"			=> $dummy_image_path.'kids4.jpg',			
					"productimage4"			=> $dummy_image_path.'kids5.jpg',			
					"productimage5"			=> $dummy_image_path.'kids6.jpg',			
					"productimage6"			=> $dummy_image_path.'kids7.jpg',
					"productimage3"			=> '',		
					"productimage4"			=> '',		
					"productimage5"			=> '',		
					"productimage6"			=> '',
					"price"					=> '150',	
					"specialprice"			=> '100',	
					"size"					=> 'x,xl,xxx,xxxl',
					"color"					=> 'red,black,blue,yellow,purple,pink',
					"posttype"				=> 'product',
				);
$post_info[] = array(
					"post_title"	=>	'Mini A Ture Klaude Shorts',
					"post_content"	=>	'These boys shorts from Mini A Ture are made from a lightweight cotton & are perfect for summer days. Made from 100% cotton these lighter weight shorts are great for summer days. Team them with a long sleeved top on cooler days. These shorts reach the knee. Machine wash @ 30 degrees.',
					"post_meta"		=>	$post_meta,
					"post_feature"	=>	0,
					);
////product 2 end///
////product 3 start///
$post_meta = array();
$post_meta = array(
					"productimage"			=> $dummy_image_path.'kids3.jpg',	
					"productimage1"			=> $dummy_image_path.'kids2.jpg',		
					"productimage2"			=> $dummy_image_path.'kids1.jpg',			
					"productimage3"			=> $dummy_image_path.'kids4.jpg',			
					"productimage4"			=> $dummy_image_path.'kids5.jpg',			
					"productimage5"			=> $dummy_image_path.'kids6.jpg',			
					"productimage6"			=> $dummy_image_path.'kids7.jpg',
					"price"					=> '100',	
					"specialprice"			=> '70',	
					"size"					=> 'x,xl,xxx,xxxl',
					"color"					=> 'red,black,blue,yellow,purple,pink',
					"posttype"				=> 'product',
				);
$post_info[] = array(
					"post_title"	=>	'Mini A Ture Casper Striped',
					"post_content"	=>	'This basic boys long sleeved t-shirt is made from 100% cotton. The thick jersey top is a medley of stripes that will look fab if worn alone or layered with another item. Machine wash @ 30 degrees.',
					"post_meta"		=>	$post_meta,
					"post_feature"	=>	0,
					);
////product 3 end///
////product 4 start///
$post_meta = array();
$post_meta = array(
					"productimage"			=> $dummy_image_path.'kids4.jpg',	
					"productimage1"			=> $dummy_image_path.'kids2.jpg',		
					"productimage2"			=> $dummy_image_path.'kids3.jpg',			
					"productimage3"			=> $dummy_image_path.'kids1.jpg',			
					"productimage4"			=> $dummy_image_path.'kids5.jpg',			
					"productimage5"			=> $dummy_image_path.'kids6.jpg',			
					"productimage6"			=> $dummy_image_path.'kids7.jpg',
					"price"					=> '100',	
					"specialprice"			=> '70',	
					"size"					=> 'x,xl,xxx,xxxl',
					"color"					=> 'red,black,blue,yellow,purple,pink',
					"posttype"				=> 'product',
				);
$post_info[] = array(
					"post_title"	=>	'Polo Shirt',
					"post_content"	=>	'This Cool boys top from No Added Sugar is made from 100% cotton jersey and featuring herringbone tape at side vents to the hem and along the front placket. Wash at 40 °C & iron on reverse.',
					"post_meta"		=>	$post_meta,
					"post_feature"	=>	0,
					);
////product 4 end///
////product 5 start///
$post_meta = array();
$post_meta = array(
					"productimage"			=> $dummy_image_path.'kids5.jpg',	
					"productimage1"			=> $dummy_image_path.'kids2.jpg',		
					"productimage2"			=> $dummy_image_path.'kids3.jpg',			
					"productimage3"			=> $dummy_image_path.'kids4.jpg',			
					"productimage4"			=> $dummy_image_path.'kids1.jpg',			
					"productimage5"			=> $dummy_image_path.'kids6.jpg',			
					"productimage6"			=> $dummy_image_path.'kids7.jpg',
					"price"					=> '150',	
					"specialprice"			=> '90',	
					"size"					=> 'x,xl,xxx,xxxl',
					"color"					=> 'red,black,blue,yellow,purple,pink',
					"posttype"				=> 'product',
				);
$post_info[] = array(
					"post_title"	=>	'Philina Next Blue Trousers',
					"post_content"	=>	'These girls trousers from Phister & Philina are perfect for spring & summer months. They are made from a soft cotton & have contrast colour cotton ribbed cuffs. The trousers fit as full trousers or can be pulled up for a cropped look. Team them with the garden top for a pretty outfit! Machine wash @ 30 degrees.',
					"post_meta"		=>	$post_meta,
					"post_feature"	=>	0,
					);
////product 5 end///
////product 6 start///
$post_meta = array();
$post_meta = array(
					"productimage"			=> $dummy_image_path.'kids6.jpg',	
					"productimage1"			=> $dummy_image_path.'kids2.jpg',		
					"productimage2"			=> $dummy_image_path.'kids3.jpg',			
					"productimage3"			=> $dummy_image_path.'kids4.jpg',			
					"productimage4"			=> $dummy_image_path.'kids5.jpg',			
					"productimage5"			=> $dummy_image_path.'kids1.jpg',			
					"productimage6"			=> $dummy_image_path.'kids7.jpg',
					"price"					=> '150',	
					"specialprice"			=> '90',	
					"size"					=> 'x,xl,xxx,xxxl',
					"color"					=> 'red,black,blue,yellow,purple,pink',
					"posttype"				=> 'product',
				);
$post_info[] = array(
					"post_title"	=>	'Marybel Ruffle Coat In Gold',
					"post_content"	=>	'This girls coat from Marybel is a beautiful ruffled coat that looks fantastic when layered over any of the Marybel range. The occasion coat fastens with a zip up front & a pretty bow tie at the waist. The ruffles on the coat conceal the zip. The gold coat is made from an 100% coated cotton that means it is rainproof, but light enough to layer over the pretty dresses or skirts.',
					"post_meta"		=>	$post_meta,
					"post_feature"	=>	0,
					);
////product 6 end///	
////product 7 start///
$post_meta = array();
$post_meta = array(
					"productimage"			=> $dummy_image_path.'kids7.jpg',	
					"productimage1"			=> $dummy_image_path.'kids2.jpg',		
					"productimage2"			=> $dummy_image_path.'kids3.jpg',			
					"productimage3"			=> $dummy_image_path.'kids4.jpg',			
					"productimage4"			=> $dummy_image_path.'kids5.jpg',			
					"productimage5"			=> $dummy_image_path.'kids6.jpg',			
					"productimage6"			=> $dummy_image_path.'kids1.jpg',
					"price"					=> '150',	
					"specialprice"			=> '90',	
					"size"					=> 'x,xl,xxx,xxxl',
					"color"					=> 'red,black,blue,yellow,purple,pink',
					"posttype"				=> 'product',
				);
$post_info[] = array(
					"post_title"	=>	'Philina Clock Mini Dress In Pink',
					"post_content"	=>	'This cool girls dress from Phister & Philina is bright pink cotton featuring a pretty pig design, just like peppa pig! The simple cotton dress has an elasticated neck & arms & is cut in a smock style so you can move around free & easy! Layer it over the any of the dream tops for effortless cool.',
					"post_meta"		=>	$post_meta,
					"post_feature"	=>	0,
					);
////product 7 end///
////product 8 start///
$post_meta = array();
$post_meta = array(
					"productimage"			=> $dummy_image_path.'kids8.jpg',	
					"productimage1"			=> $dummy_image_path.'kids2.jpg',		
					"productimage2"			=> $dummy_image_path.'kids3.jpg',			
					"productimage3"			=> $dummy_image_path.'kids4.jpg',			
					"productimage4"			=> $dummy_image_path.'kids5.jpg',			
					"productimage5"			=> $dummy_image_path.'kids6.jpg',			
					"productimage6"			=> $dummy_image_path.'kids7.jpg',
					"price"					=> '150',	
					"specialprice"			=> '90',	
					"size"					=> 'x,xl,xxx,xxxl',
					"color"					=> 'red,black,blue,yellow,purple,pink',
					"posttype"				=> 'product',
				);
$post_info[] = array(
					"post_title"	=>	'Star Dress In Navy',
					"post_content"	=>	'This girls dress from Tommy Hilfiger is great for casual days. The 100% jersey cotton dress has a simple design of scattered white stars intermixed with the Tommy Hilfiger name. The drop waist detail makes a simple detail. The racer back vest top is great for layering over t-shirts on cooler days.',
					"post_meta"		=>	$post_meta,
					"post_feature"	=>	0,
					);
////product 8 end///
$post_array['Kids'] = $post_info;
//====================================================================================//
////product 1 start///
$post_info = array();
$post_meta = array();
$post_meta = array(
					"productimage"			=> $dummy_image_path.'men1.jpg',	
					"productimage1"			=> $dummy_image_path.'men2.jpg',		
					"productimage2"			=> $dummy_image_path.'men3.jpg',			
					"productimage3"			=> $dummy_image_path.'men4.jpg',			
					"productimage4"			=> $dummy_image_path.'men5.jpg',			
					"productimage5"			=> $dummy_image_path.'men1.jpg',			
					"productimage6"			=> $dummy_image_path.'men2.jpg',			
					"price"					=> '95',	
					"specialprice"			=> '80',	
					"size"					=> 'x,xl,xxx,xxxl',
					"color"					=> 'red,black,blue,yellow,purple,pink',
					"posttype"				=> 'product',
				);
$post_info[] = array(
					"post_title"	=>	'Diesel T-Mystic Indian Head T-Shirt',
					"post_content"	=>	'&gt; Cotton t-shirt by Diesel
&gt; Contrast front logo printed design
&gt; Crew neckline and short sleeves',
					"post_meta"		=>	$post_meta,
					"post_feature"	=>	0,
					);
////product 1 end///
////product 2 start///
$post_meta = array();
$post_meta = array(
					"productimage"			=> $dummy_image_path.'men2.jpg',	
					"productimage1"			=> $dummy_image_path.'men1.jpg',		
					"productimage2"			=> $dummy_image_path.'men3.jpg',			
					"productimage3"			=> $dummy_image_path.'men4.jpg',			
					"productimage4"			=> $dummy_image_path.'men5.jpg',			
					"productimage5"			=> $dummy_image_path.'men1.jpg',			
					"productimage6"			=> $dummy_image_path.'men2.jpg',
					"productimage3"			=> '',		
					"productimage4"			=> '',		
					"productimage5"			=> '',		
					"productimage6"			=> '',
					"price"					=> '150',	
					"specialprice"			=> '100',	
					"size"					=> 'x,xl,xxx,xxxl',
					"color"					=> 'red,black,blue,yellow,purple,pink',
					"posttype"				=> 'product',
				);
$post_info[] = array(
					"post_title"	=>	'Diesel T-Bear T-Shirt',
					"post_content"	=>	'- Cotton t-shirt by Diesel
    - Contrast printed logo design to front
    - Crew neckline and short sleeves',
					"post_meta"		=>	$post_meta,
					"post_feature"	=>	0,
					);
////product 2 end///
////product 3 start///
$post_meta = array();
$post_meta = array(
					"productimage"			=> $dummy_image_path.'men3.jpg',	
					"productimage1"			=> $dummy_image_path.'men2.jpg',		
					"productimage2"			=> $dummy_image_path.'men1.jpg',			
					"productimage3"			=> $dummy_image_path.'men4.jpg',			
					"productimage4"			=> $dummy_image_path.'men5.jpg',			
					"productimage5"			=> $dummy_image_path.'men1.jpg',			
					"productimage6"			=> $dummy_image_path.'men2.jpg',
					"price"					=> '100',	
					"specialprice"			=> '70',	
					"size"					=> 'x,xl,xxx,xxxl',
					"color"					=> 'red,black,blue,yellow,purple,pink',
					"posttype"				=> 'product',
				);
$post_info[] = array(
					"post_title"	=>	'T-Fan2 Indian Head T-Shirt',
					"post_content"	=>	'- Lightweight cotton t-shirt by Diesel
    - Contrast graphic print to front
    - V-neckline and short sleeves',
					"post_meta"		=>	$post_meta,
					"post_feature"	=>	0,
					);
////product 3 end///
////product 4 start///
$post_meta = array();
$post_meta = array(
					"productimage"			=> $dummy_image_path.'men4.jpg',	
					"productimage1"			=> $dummy_image_path.'men2.jpg',		
					"productimage2"			=> $dummy_image_path.'men3.jpg',			
					"productimage3"			=> $dummy_image_path.'men1.jpg',			
					"productimage4"			=> $dummy_image_path.'men5.jpg',			
					"productimage5"			=> $dummy_image_path.'men1.jpg',			
					"productimage6"			=> $dummy_image_path.'men2.jpg',
					"price"					=> '100',	
					"specialprice"			=> '70',	
					"size"					=> 'x,xl,xxx,xxxl',
					"color"					=> 'red,black,blue,yellow,purple,pink',
					"posttype"				=> 'product',
				);
$post_info[] = array(
					"post_title"	=>	'Diesel Lontry Leather Jacket',
					"post_content"	=>	'- Matt finish leather jacket by Diesel
    - Contrast panelled trim and popper stud detailing
   - Mandarin collar with twin pockets and zip fastening',
					"post_meta"		=>	$post_meta,
					"post_feature"	=>	0,
					);
////product 4 end///
////product 5 start///
$post_meta = array();
$post_meta = array(
					"productimage"			=> $dummy_image_path.'men5.jpg',	
					"productimage1"			=> $dummy_image_path.'men2.jpg',		
					"productimage2"			=> $dummy_image_path.'men3.jpg',			
					"productimage3"			=> $dummy_image_path.'men1.jpg',			
					"productimage4"			=> $dummy_image_path.'men5.jpg',			
					"productimage5"			=> $dummy_image_path.'men4.jpg',			
					"productimage6"			=> $dummy_image_path.'men2.jpg',
					"price"					=> '100',	
					"specialprice"			=> '70',	
					"size"					=> 'x,xl,xxx,xxxl',
					"color"					=> 'red,black,blue,yellow,purple,pink',
					"posttype"				=> 'product',
				);
$post_info[] = array(
					"post_title"	=>	'T-Sober Indian Brave',
					"post_content"	=>	'- Lightweight cotton t-shirt by Diesel
    - Bold logo indian brave front print
    - Classic crew neck and short sleeves',
					"post_meta"		=>	$post_meta,
					"post_feature"	=>	0,
					);
////product 5 end///
$post_array['Men'] = $post_info;
//====================================================================================//
////product 1 start///
$post_info = array();
$post_meta = array();
$post_meta = array(
					"productimage"			=> $dummy_image_path.'shirts1.jpg',	
					"productimage1"			=> $dummy_image_path.'shirts2.jpg',		
					"productimage2"			=> $dummy_image_path.'shirts3.jpg',			
					"productimage3"			=> $dummy_image_path.'shirts4.jpg',			
					"productimage4"			=> $dummy_image_path.'shirts5.jpg',			
					"productimage5"			=> $dummy_image_path.'shirts6.jpg',			
					"productimage6"			=> $dummy_image_path.'shirts7.jpg',			
					"price"					=> '95',	
					"specialprice"			=> '80',	
					"size"					=> 'x,xl,xxx,xxxl',
					"color"					=> 'red,black,blue,yellow,purple,pink',
					"posttype"				=> 'product',
				);
$post_info[] = array(
					"post_title"	=>	'White Base Check Shirt',
					"post_content"	=>	'- Lightweight cotton shirt
    - Contrast checked finish and chest pocket
   - Slim shape design with button-down collar',
					"post_meta"		=>	$post_meta,
					"post_feature"	=>	0,
					);
////product 1 end///
////product 2 start///
$post_meta = array();
$post_meta = array(
					"productimage"			=> $dummy_image_path.'shirts2.jpg',	
					"productimage1"			=> $dummy_image_path.'shirts1.jpg',		
					"productimage2"			=> $dummy_image_path.'shirts3.jpg',			
					"productimage3"			=> $dummy_image_path.'shirts4.jpg',			
					"productimage4"			=> $dummy_image_path.'shirts5.jpg',			
					"productimage5"			=> $dummy_image_path.'shirts6.jpg',			
					"productimage6"			=> $dummy_image_path.'shirts7.jpg',
					"productimage3"			=> '',		
					"productimage4"			=> '',		
					"productimage5"			=> '',		
					"productimage6"			=> '',
					"price"					=> '150',	
					"specialprice"			=> '100',	
					"size"					=> 'x,xl,xxx,xxxl',
					"color"					=> 'red,black,blue,yellow,purple,pink',
					"posttype"				=> 'product',
				);
$post_info[] = array(
					"post_title"	=>	'Roll Sleeve Check Shirt',
					"post_content"	=>	'- Lightweight cotton shirt
    - Bold check finish and button-down collar
    - Slim fit design with button roll tabs to sleeves',
					"post_meta"		=>	$post_meta,
					"post_feature"	=>	0,
					);
////product 2 end///
////product 3 start///
$post_meta = array();
$post_meta = array(
					"productimage"			=> $dummy_image_path.'shirts3.jpg',	
					"productimage1"			=> $dummy_image_path.'shirts2.jpg',		
					"productimage2"			=> $dummy_image_path.'shirts1.jpg',			
					"productimage3"			=> $dummy_image_path.'shirts4.jpg',			
					"productimage4"			=> $dummy_image_path.'shirts5.jpg',			
					"productimage5"			=> $dummy_image_path.'shirts6.jpg',			
					"productimage6"			=> $dummy_image_path.'shirts7.jpg',	
					"price"					=> '100',	
					"specialprice"			=> '70',	
					"size"					=> 'x,xl,xxx,xxxl',
					"color"					=> 'red,black,blue,yellow,purple,pink',
					"posttype"				=> 'product',
				);
$post_info[] = array(
					"post_title"	=>	'Grid Check Shirt',
					"post_content"	=>	'- Lightweight cotton shirt
    - Bold checked finish and single chest pocket
    - Slim fit tailored design with button down collar',
					"post_meta"		=>	$post_meta,
					"post_feature"	=>	0,
					);
////product 3 end///
////product 4 start///
$post_meta = array();
$post_meta = array(
					"productimage"			=> $dummy_image_path.'shirts4.jpg',	
					"productimage1"			=> $dummy_image_path.'shirts2.jpg',		
					"productimage2"			=> $dummy_image_path.'shirts3.jpg',			
					"productimage3"			=> $dummy_image_path.'shirts1.jpg',			
					"productimage4"			=> $dummy_image_path.'shirts5.jpg',			
					"productimage5"			=> $dummy_image_path.'shirts6.jpg',			
					"productimage6"			=> $dummy_image_path.'shirts7.jpg',	
					"price"					=> '100',	
					"specialprice"			=> '70',	
					"size"					=> 'x,xl,xxx,xxxl',
					"color"					=> 'red,black,blue,yellow,purple,pink',
					"posttype"				=> 'product',
				);
$post_info[] = array(
					"post_title"	=>	'Two Stoned Awark Check Shirt',
					"post_content"	=>	'- Lightweight cotton shirt by Two Stoned
    - Contrasting check design with chest pockets
   - Button-through styling with embroidered logo',
					"post_meta"		=>	$post_meta,
					"post_feature"	=>	0,
					);
////product 4 end///
////product 5 start///
$post_meta = array();
$post_meta = array(
					"productimage"			=> $dummy_image_path.'shirts5.jpg',	
					"productimage1"			=> $dummy_image_path.'shirts2.jpg',		
					"productimage2"			=> $dummy_image_path.'shirts3.jpg',			
					"productimage3"			=> $dummy_image_path.'shirts4.jpg',			
					"productimage4"			=> $dummy_image_path.'shirts1.jpg',			
					"productimage5"			=> $dummy_image_path.'shirts6.jpg',			
					"productimage6"			=> $dummy_image_path.'shirts7.jpg',	
					"price"					=> '100',	
					"specialprice"			=> '70',	
					"size"					=> 'x,xl,xxx,xxxl',
					"color"					=> 'red,black,blue,yellow,purple,pink',
					"posttype"				=> 'product',
				);
$post_info[] = array(
					"post_title"	=>	'Roll Up Sleeve Shirt',
					"post_content"	=>	'- Classic cotton shirt
    - Roll up tab sleeves, pockets to chest
    - Slim fitted style and button-through ',
					"post_meta"		=>	$post_meta,
					"post_feature"	=>	0,
					);
////product 5 end///
////product 6 start///
$post_meta = array();
$post_meta = array(
					"productimage"			=> $dummy_image_path.'shirts6.jpg',	
					"productimage1"			=> $dummy_image_path.'shirts2.jpg',		
					"productimage2"			=> $dummy_image_path.'shirts3.jpg',			
					"productimage3"			=> $dummy_image_path.'shirts4.jpg',			
					"productimage4"			=> $dummy_image_path.'shirts1.jpg',			
					"productimage5"			=> $dummy_image_path.'shirts5.jpg',			
					"productimage6"			=> $dummy_image_path.'shirts7.jpg',	
					"price"					=> '100',	
					"specialprice"			=> '70',	
					"size"					=> 'x,xl,xxx,xxxl',
					"color"					=> 'red,black,blue,yellow,purple,pink',
					"posttype"				=> 'product',
				);
$post_info[] = array(
					"post_title"	=>	'Laundered Utility Check Shirt',
					"post_content"	=>	'- Lightweight cotton shirt by ASOS Laundered
  - Woven check design with button-through front
 - Twin chest pockets and epaulette detailing',
					"post_meta"		=>	$post_meta,
					"post_feature"	=>	0,
					);
////product 6 end///
////product 7 start///
$post_meta = array();
$post_meta = array(
					"productimage"			=> $dummy_image_path.'shirts7.jpg',	
					"productimage1"			=> $dummy_image_path.'shirts2.jpg',		
					"productimage2"			=> $dummy_image_path.'shirts3.jpg',			
					"productimage3"			=> $dummy_image_path.'shirts4.jpg',			
					"productimage4"			=> $dummy_image_path.'shirts1.jpg',			
					"productimage5"			=> $dummy_image_path.'shirts6.jpg',			
					"productimage6"			=> $dummy_image_path.'shirts1.jpg',	
					"price"					=> '100',	
					"specialprice"			=> '70',	
					"size"					=> 'x,xl,xxx,xxxl',
					"color"					=> 'red,black,blue,yellow,purple,pink',
					"posttype"				=> 'product',
				);
$post_info[] = array(
					"post_title"	=>	'Lauren Korey Shombry Shirt',
					"post_content"	=>	'- Shirt by Polo Jeans Ralph Lauren
    - Twin chest pockets and contrast buttons
    - Button through design and classic collar',
					"post_meta"		=>	$post_meta,
					"post_feature"	=>	0,
					);
////product 7 end///
////product 8 start///
$post_meta = array();
$post_meta = array(
					"productimage"			=> $dummy_image_path.'shirts8.jpg',	
					"productimage1"			=> $dummy_image_path.'shirts2.jpg',		
					"productimage2"			=> $dummy_image_path.'shirts3.jpg',			
					"productimage3"			=> $dummy_image_path.'shirts4.jpg',			
					"productimage4"			=> $dummy_image_path.'shirts1.jpg',			
					"productimage5"			=> $dummy_image_path.'shirts6.jpg',			
					"productimage6"			=> $dummy_image_path.'shirts7.jpg',	
					"price"					=> '100',	
					"specialprice"			=> '70',	
					"size"					=> 'x,xl,xxx,xxxl',
					"color"					=> 'red,black,blue,yellow,purple,pink',
					"posttype"				=> 'product',
				);
$post_info[] = array(
					"post_title"	=>	'Logan Check Shirt',
					"post_content"	=>	'- Shirt by Polo Jeans Ralph Lauren
    - All-over check print design and chest pockets
    - Button through design and long sleeve style',
					"post_meta"		=>	$post_meta,
					"post_feature"	=>	0,
					);
////product 8 end///
////product 9 start///
$post_meta = array();
$post_meta = array(
					"productimage"			=> $dummy_image_path.'shirts9.jpg',	
					"productimage1"			=> $dummy_image_path.'shirts2.jpg',		
					"productimage2"			=> $dummy_image_path.'shirts3.jpg',			
					"productimage3"			=> $dummy_image_path.'shirts4.jpg',			
					"productimage4"			=> $dummy_image_path.'shirts1.jpg',			
					"productimage5"			=> $dummy_image_path.'shirts6.jpg',			
					"productimage6"			=> $dummy_image_path.'shirts7.jpg',	
					"price"					=> '100',	
					"specialprice"			=> '70',	
					"size"					=> 'x,xl,xxx,xxxl',
					"color"					=> 'red,black,blue,yellow,purple,pink',
					"posttype"				=> 'product',
				);
$post_info[] = array(
					"post_title"	=>	'Corgan Military Shirt',
					"post_content"	=>	'- Cotton shirt by Polo Jeans Ralph Lauren
    - Button-through front and twin chest pockets
   - Military style with embroidered logo detail',
					"post_meta"		=>	$post_meta,
					"post_feature"	=>	0,
					);
////product 9 end///
////product 10 start///
$post_meta = array();
$post_meta = array(
					"productimage"			=> $dummy_image_path.'shirts10.jpg',	
					"productimage1"			=> $dummy_image_path.'shirts2.jpg',		
					"productimage2"			=> $dummy_image_path.'shirts3.jpg',			
					"productimage3"			=> $dummy_image_path.'shirts4.jpg',			
					"productimage4"			=> $dummy_image_path.'shirts1.jpg',			
					"productimage5"			=> $dummy_image_path.'shirts6.jpg',			
					"productimage6"			=> $dummy_image_path.'shirts7.jpg',	
					"price"					=> '100',	
					"specialprice"			=> '70',	
					"size"					=> 'x,xl,xxx,xxxl',
					"color"					=> 'red,black,blue,yellow,purple,pink',
					"posttype"				=> 'product',
				);
$post_info[] = array(
					"post_title"	=>	'Roxanne Checked Shirt',
					"post_content"	=>	'- Long sleeve worker shirt by Two Stoned
    - All over small checks and button front
   - Twin pockets to chest, embroidered logo badge',
					"post_meta"		=>	$post_meta,
					"post_feature"	=>	0,
					);
////product 10 end///
$post_array['Shirts'] = $post_info;
//====================================================================================//
////product 1 start///
$post_info = array();
$post_meta = array();
$post_meta = array(
					"productimage"			=> $dummy_image_path.'jumpers1.jpg',	
					"productimage1"			=> $dummy_image_path.'jumpers2.jpg',		
					"productimage2"			=> $dummy_image_path.'jumpers3.jpg',			
					"productimage3"			=> $dummy_image_path.'jumpers4.jpg',			
					"productimage4"			=> $dummy_image_path.'jumpers5.jpg',			
					"productimage5"			=> $dummy_image_path.'jumpers6.jpg',			
					"productimage6"			=> $dummy_image_path.'jumpers7.jpg',			
					"price"					=> '95',	
					"specialprice"			=> '80',	
					"size"					=> 'x,xl,xxx,xxxl',
					"color"					=> 'red,black,blue,yellow,purple,pink',
					"posttype"				=> 'product',
				);
$post_info[] = array(
					"post_title"	=>	'White Base Check Shirt',
					"post_content"	=>	'- Lightweight cotton shirt
    - Contrast checked finish and chest pocket
   - Slim shape design with button-down collar',
					"post_meta"		=>	$post_meta,
					"post_feature"	=>	0,
					);
////product 1 end///
////product 2 start///
$post_meta = array();
$post_meta = array(
					"productimage"			=> $dummy_image_path.'jumpers2.jpg',	
					"productimage1"			=> $dummy_image_path.'jumpers1.jpg',		
					"productimage2"			=> $dummy_image_path.'jumpers3.jpg',			
					"productimage3"			=> $dummy_image_path.'jumpers4.jpg',			
					"productimage4"			=> $dummy_image_path.'jumpers5.jpg',			
					"productimage5"			=> $dummy_image_path.'jumpers6.jpg',			
					"productimage6"			=> $dummy_image_path.'jumpers7.jpg',
					"productimage3"			=> '',		
					"productimage4"			=> '',		
					"productimage5"			=> '',		
					"productimage6"			=> '',
					"price"					=> '150',	
					"specialprice"			=> '100',	
					"size"					=> 'x,xl,xxx,xxxl',
					"color"					=> 'red,black,blue,yellow,purple,pink',
					"posttype"				=> 'product',
				);
$post_info[] = array(
					"post_title"	=>	'Breasted Jersey Cardigan',
					"post_content"	=>	'- Soft jersey double breasted fitted cardigan
    - Long sleeves with ribbed cuffs and hem
    - Deep v-neck with front button fastening',
					"post_meta"		=>	$post_meta,
					"post_feature"	=>	0,
					);
////product 2 end///
////product 3 start///
$post_meta = array();
$post_meta = array(
					"productimage"			=> $dummy_image_path.'jumpers3.jpg',	
					"productimage1"			=> $dummy_image_path.'jumpers2.jpg',		
					"productimage2"			=> $dummy_image_path.'jumpers1.jpg',			
					"productimage3"			=> $dummy_image_path.'jumpers4.jpg',			
					"productimage4"			=> $dummy_image_path.'jumpers5.jpg',			
					"productimage5"			=> $dummy_image_path.'jumpers6.jpg',			
					"productimage6"			=> $dummy_image_path.'jumpers7.jpg',	
					"price"					=> '100',	
					"specialprice"			=> '70',	
					"size"					=> 'x,xl,xxx,xxxl',
					"color"					=> 'red,black,blue,yellow,purple,pink',
					"posttype"				=> 'product',
				);
$post_info[] = array(
					"post_title"	=>	'Voi Christian V-Neck Jumper',
					"post_content"	=>	'- Cotton knit jumper by Voi
    - Contrast striped trim and embroidered logo detail
    - V-neckline, ribbed trim and woven logo tab to side',
					"post_meta"		=>	$post_meta,
					"post_feature"	=>	0,
					);
////product 3 end///
////product 4 start///
$post_meta = array();
$post_meta = array(
					"productimage"			=> $dummy_image_path.'jumpers4.jpg',	
					"productimage1"			=> $dummy_image_path.'jumpers2.jpg',		
					"productimage2"			=> $dummy_image_path.'jumpers3.jpg',			
					"productimage3"			=> $dummy_image_path.'jumpers1.jpg',			
					"productimage4"			=> $dummy_image_path.'jumpers5.jpg',			
					"productimage5"			=> $dummy_image_path.'jumpers6.jpg',			
					"productimage6"			=> $dummy_image_path.'jumpers7.jpg',	
					"price"					=> '100',	
					"specialprice"			=> '70',	
					"size"					=> 'x,xl,xxx,xxxl',
					"color"					=> 'red,black,blue,yellow,purple,pink',
					"posttype"				=> 'product',
				);
$post_info[] = array(
					"post_title"	=>	'New Grant Y Neck Knitwear',
					"post_content"	=>	'- Lightweight cotton knitwear by Voi New
    - Contrasting trim with buttoned through neckline
    - Ribbed hemlines, embroidered brand logo to chest',
					"post_meta"		=>	$post_meta,
					"post_feature"	=>	0,
					);
////product 4 end///
////product 5 start///
$post_meta = array();
$post_meta = array(
					"productimage"			=> $dummy_image_path.'jumpers5.jpg',	
					"productimage1"			=> $dummy_image_path.'jumpers2.jpg',		
					"productimage2"			=> $dummy_image_path.'jumpers3.jpg',			
					"productimage3"			=> $dummy_image_path.'jumpers4.jpg',			
					"productimage4"			=> $dummy_image_path.'jumpers1.jpg',			
					"productimage5"			=> $dummy_image_path.'jumpers6.jpg',			
					"productimage6"			=> $dummy_image_path.'jumpers7.jpg',	
					"price"					=> '100',	
					"specialprice"			=> '70',	
					"size"					=> 'x,xl,xxx,xxxl',
					"color"					=> 'red,black,blue,yellow,purple,pink',
					"posttype"				=> 'product',
				);
$post_info[] = array(
					"post_title"	=>	'Marshall College Cardigan',
					"post_content"	=>	'- Cotton knit cardigan by Franklin & Marshall
    - Contrast applique detail and woven logo tab
    - V-neck style with twin contrast trim pockets',
					"post_meta"		=>	$post_meta,
					"post_feature"	=>	0,
					);
////product 5 end///
////product 6 start///
$post_meta = array();
$post_meta = array(
					"productimage"			=> $dummy_image_path.'jumpers6.jpg',	
					"productimage1"			=> $dummy_image_path.'jumpers2.jpg',		
					"productimage2"			=> $dummy_image_path.'jumpers3.jpg',			
					"productimage3"			=> $dummy_image_path.'jumpers4.jpg',			
					"productimage4"			=> $dummy_image_path.'jumpers5.jpg',			
					"productimage5"			=> $dummy_image_path.'jumpers1.jpg',			
					"productimage6"			=> $dummy_image_path.'jumpers7.jpg',	
					"price"					=> '100',	
					"specialprice"			=> '70',	
					"size"					=> 'x,xl,xxx,xxxl',
					"color"					=> 'red,black,blue,yellow,purple,pink',
					"posttype"				=> 'product',
				);
$post_info[] = array(
					"post_title"	=>	'Shawl Collar Cardigan',
					"post_content"	=>	'- Cotton knit cardigan by Franklin & Marshall
    - Contrast trim and embroidered applique logo detail
    - Thick ribbed textured finish with shawl collar design',
					"post_meta"		=>	$post_meta,
					"post_feature"	=>	0,
					);
////product 6 end///
////product 7 start///
$post_meta = array();
$post_meta = array(
					"productimage"			=> $dummy_image_path.'jumpers7.jpg',	
					"productimage1"			=> $dummy_image_path.'jumpers2.jpg',		
					"productimage2"			=> $dummy_image_path.'jumpers3.jpg',			
					"productimage3"			=> $dummy_image_path.'jumpers4.jpg',			
					"productimage4"			=> $dummy_image_path.'jumpers5.jpg',			
					"productimage5"			=> $dummy_image_path.'jumpers6.jpg',			
					"productimage6"			=> $dummy_image_path.'jumpers1.jpg',	
					"price"					=> '100',	
					"specialprice"			=> '70',	
					"size"					=> 'x,xl,xxx,xxxl',
					"color"					=> 'red,black,blue,yellow,purple,pink',
					"posttype"				=> 'product',
				);
$post_info[] = array(
					"post_title"	=>	'Neck Hooded Jumper',
					"post_content"	=>	' - Hooded jumper by Unconditional
    - Deep scooped neckline and hooded design
    - Drawstring to hood and long sleeve styling',
					"post_meta"		=>	$post_meta,
					"post_feature"	=>	0,
					);
////product 7 end///
////product 8 start///
$post_meta = array();
$post_meta = array(
					"productimage"			=> $dummy_image_path.'jumpers8.jpg',	
					"productimage1"			=> $dummy_image_path.'jumpers2.jpg',		
					"productimage2"			=> $dummy_image_path.'jumpers3.jpg',			
					"productimage3"			=> $dummy_image_path.'jumpers4.jpg',			
					"productimage4"			=> $dummy_image_path.'jumpers5.jpg',			
					"productimage5"			=> $dummy_image_path.'jumpers6.jpg',			
					"productimage6"			=> $dummy_image_path.'jumpers7.jpg',	
					"price"					=> '100',	
					"specialprice"			=> '70',	
					"size"					=> 'x,xl,xxx,xxxl',
					"color"					=> 'red,black,blue,yellow,purple,pink',
					"posttype"				=> 'product',
				);
$post_info[] = array(
					"post_title"	=>	'Unconditional Sleeveless Cardigan',
					"post_content"	=>	'- Cardigan by Unconditional
    - Deep v-neck design with three buttons
    - Twin pockets with sleeveless style design',
					"post_meta"		=>	$post_meta,
					"post_feature"	=>	0,
					);
////product 8 end///
$post_array['Jumpers & Cardigans'] = $post_info;
//====================================================================================//
////product 1 start///
$post_info = array();
$post_meta = array();
$post_meta = array(
					"productimage"			=> $dummy_image_path.'shoe1.jpg',	
					"productimage1"			=> $dummy_image_path.'shoe2.jpg',		
					"productimage2"			=> $dummy_image_path.'shoe3.jpg',			
					"productimage3"			=> $dummy_image_path.'shoe4.jpg',			
					"productimage4"			=> $dummy_image_path.'shoe5.jpg',			
					"productimage5"			=> $dummy_image_path.'shoe1.jpg',			
					"productimage6"			=> $dummy_image_path.'shoe2.jpg',			
					"price"					=> '95',	
					"specialprice"			=> '80',	
					"size"					=> 'UK7,UK8,UK9,UK10',
					"color"					=> 'red,black,blue,yellow,purple,pink',
					"posttype"				=> 'product',
				);
$post_info[] = array(
					"post_title"	=>	'White Base Check Shirt',
					"post_content"	=>	'- Men suede loafers made in Italy
    - Tassel detail to front with contrast stitch
    - Slip on style with low profile style heel',
					"post_meta"		=>	$post_meta,
					"post_feature"	=>	0,
					);
////product 1 end///
////product 2 start///
$post_meta = array();
$post_meta = array(
					"productimage"			=> $dummy_image_path.'shoe2.jpg',	
					"productimage1"			=> $dummy_image_path.'shoe1.jpg',		
					"productimage2"			=> $dummy_image_path.'shoe3.jpg',			
					"productimage3"			=> $dummy_image_path.'shoe4.jpg',			
					"productimage4"			=> $dummy_image_path.'shoe5.jpg',			
					"productimage5"			=> $dummy_image_path.'shoe1.jpg',			
					"productimage6"			=> $dummy_image_path.'shoe2.jpg',
					"productimage3"			=> '',		
					"productimage4"			=> '',		
					"productimage5"			=> '',		
					"productimage6"			=> '',
					"price"					=> '150',	
					"specialprice"			=> '100',	
					"size"					=> 'UK7,UK8,UK9,UK10',
					"color"					=> 'red,black,blue,yellow,purple,pink',
					"posttype"				=> 'product',
				);
$post_info[] = array(
					"post_title"	=>	'Net Garment Dyed Trainers',
					"post_content"	=>	'- Men trainers by Diesel
    - All over dyed finish with contrast stripes
    - Lace-up style with rubber toe and sole',
					"post_meta"		=>	$post_meta,
					"post_feature"	=>	0,
					);
////product 2 end///
////product 3 start///
$post_meta = array();
$post_meta = array(
					"productimage"			=> $dummy_image_path.'shoe3.jpg',	
					"productimage1"			=> $dummy_image_path.'shoe2.jpg',		
					"productimage2"			=> $dummy_image_path.'shoe1.jpg',			
					"productimage3"			=> $dummy_image_path.'shoe4.jpg',			
					"productimage4"			=> $dummy_image_path.'shoe5.jpg',			
					"productimage5"			=> $dummy_image_path.'shoe1.jpg',			
					"productimage6"			=> $dummy_image_path.'shoe2.jpg',	
					"price"					=> '100',	
					"specialprice"			=> '70',	
					"size"					=> 'UK7,UK8,UK9,UK10',
					"color"					=> 'red,black,blue,yellow,purple,pink',
					"posttype"				=> 'product',
				);
$post_info[] = array(
					"post_title"	=>	'Wabasha Leather Deck Shoes',
					"post_content"	=>	'Classic men deck shoes by Red Wing
    - Leather upper with contrast stitch to front
    - Laced sides and flexible moulded soles',
					"post_meta"		=>	$post_meta,
					"post_feature"	=>	0,
					);
////product 3 end///
////product 4 start///
$post_meta = array();
$post_meta = array(
					"productimage"			=> $dummy_image_path.'shoe4.jpg',	
					"productimage1"			=> $dummy_image_path.'shoe2.jpg',		
					"productimage2"			=> $dummy_image_path.'shoe3.jpg',			
					"productimage3"			=> $dummy_image_path.'shoe1.jpg',			
					"productimage4"			=> $dummy_image_path.'shoe5.jpg',			
					"productimage5"			=> $dummy_image_path.'shoe1.jpg',			
					"productimage6"			=> $dummy_image_path.'shoe2.jpg',	
					"price"					=> '100',	
					"specialprice"			=> '70',	
					"size"					=> 'UK7,UK8,UK9,UK10',
					"color"					=> 'red,black,blue,yellow,purple,pink',
					"posttype"				=> 'product',
				);
$post_info[] = array(
					"post_title"	=>	'Maritime Leather Deck Shoes',
					"post_content"	=>	'Men deck shoes from H By Hudson
    - Perforated design with contrast panelling
    - Deck shoe styling and reinforced stitching',
					"post_meta"		=>	$post_meta,
					"post_feature"	=>	0,
					);
////product 4 end///
////product 5 start///
$post_meta = array();
$post_meta = array(
					"productimage"			=> $dummy_image_path.'shoe5.jpg',	
					"productimage1"			=> $dummy_image_path.'shoe2.jpg',		
					"productimage2"			=> $dummy_image_path.'shoe3.jpg',			
					"productimage3"			=> $dummy_image_path.'shoe4.jpg',			
					"productimage4"			=> $dummy_image_path.'shoe1.jpg',			
					"productimage5"			=> $dummy_image_path.'shoe3.jpg',			
					"productimage6"			=> $dummy_image_path.'shoe2.jpg',	
					"price"					=> '100',	
					"specialprice"			=> '70',	
					"size"					=> 'UK7,UK8,UK9,UK10',
					"color"					=> 'red,black,blue,yellow,purple,pink',
					"posttype"				=> 'product',
				);
$post_info[] = array(
					"post_title"	=>	'Nanny State Winston Herringbone Loafers',
					"post_content"	=>	'Men loafers by Nanny State
    * - All-over herringbone print design
    * - Classic loafer style and logo detailing',
					"post_meta"		=>	$post_meta,
					"post_feature"	=>	0,
					);
////product 5 end///
$post_array['Shoe'] = $post_info;
//====================================================================================//
////product 1 start///
$post_info = array();
$post_meta = array();
$post_meta = array(
					"productimage"			=> $dummy_image_path.'boots1.jpg',	
					"productimage1"			=> $dummy_image_path.'boots2.jpg',		
					"productimage2"			=> $dummy_image_path.'boots3.jpg',			
					"productimage3"			=> $dummy_image_path.'boots4.jpg',			
					"productimage4"			=> $dummy_image_path.'boots5.jpg',			
					"productimage5"			=> $dummy_image_path.'boots1.jpg',			
					"productimage6"			=> $dummy_image_path.'boots2.jpg',			
					"price"					=> '95',	
					"specialprice"			=> '80',	
					"size"					=> 'UK7,UK8,UK9,UK10',
					"color"					=> 'red,black,blue,yellow,purple,pink',
					"posttype"				=> 'product',
				);
$post_info[] = array(
					"post_title"	=>	'Engineer Cork Sole Boots',
					"post_content"	=>	'Classic men boots by Red Wing
    - Hard wearing style with strap detail
    - Reinforced sole and buckle fastening',
					"post_meta"		=>	$post_meta,
					"post_feature"	=>	0,
					);
////product 1 end///
////product 2 start///
$post_meta = array();
$post_meta = array(
					"productimage"			=> $dummy_image_path.'boots2.jpg',	
					"productimage1"			=> $dummy_image_path.'boots1.jpg',		
					"productimage2"			=> $dummy_image_path.'boots3.jpg',			
					"productimage3"			=> $dummy_image_path.'boots4.jpg',			
					"productimage4"			=> $dummy_image_path.'boots5.jpg',			
					"productimage5"			=> $dummy_image_path.'boots1.jpg',			
					"productimage6"			=> $dummy_image_path.'boots2.jpg',
					"productimage3"			=> '',		
					"productimage4"			=> '',		
					"productimage5"			=> '',		
					"productimage6"			=> '',
					"price"					=> '150',	
					"specialprice"			=> '100',	
					"size"					=> 'UK7,UK8,UK9,UK10',
					"color"					=> 'red,black,blue,yellow,purple,pink',
					"posttype"				=> 'product',
				);
$post_info[] = array(
					"post_title"	=>	'Red Wing Boots',
					"post_content"	=>	'Men leather boots by Red Wing
     - Metallic eyelets and reinforced stitch
    - Contrast sole and classic chukka style',
					"post_meta"		=>	$post_meta,
					"post_feature"	=>	0,
					);
////product 2 end///
////product 3 start///
$post_meta = array();
$post_meta = array(
					"productimage"			=> $dummy_image_path.'boots3.jpg',	
					"productimage1"			=> $dummy_image_path.'boots2.jpg',		
					"productimage2"			=> $dummy_image_path.'boots1.jpg',			
					"productimage3"			=> $dummy_image_path.'boots4.jpg',			
					"productimage4"			=> $dummy_image_path.'boots5.jpg',			
					"productimage5"			=> $dummy_image_path.'boots1.jpg',			
					"productimage6"			=> $dummy_image_path.'boots2.jpg',	
					"price"					=> '100',	
					"specialprice"			=> '70',	
					"size"					=> 'UK7,UK8,UK9,UK10',
					"color"					=> 'red,black,blue,yellow,purple,pink',
					"posttype"				=> 'product',
				);
$post_info[] = array(
					"post_title"	=>	'Red Wing Work Chukka Boots',
					"post_content"	=>	'Classic men deck shoes by Red Wing
    - Leather upper with contrast stitch to front
    - Laced sides and flexible moulded soles',
					"post_meta"		=>	$post_meta,
					"post_feature"	=>	0,
					);
////product 3 end///
////product 4 start///
$post_meta = array();
$post_meta = array(
					"productimage"			=> $dummy_image_path.'boots4.jpg',	
					"productimage1"			=> $dummy_image_path.'boots2.jpg',		
					"productimage2"			=> $dummy_image_path.'boots3.jpg',			
					"productimage3"			=> $dummy_image_path.'boots1.jpg',			
					"productimage4"			=> $dummy_image_path.'boots5.jpg',			
					"productimage5"			=> $dummy_image_path.'boots1.jpg',			
					"productimage6"			=> $dummy_image_path.'boots2.jpg',	
					"price"					=> '100',	
					"specialprice"			=> '70',	
					"size"					=> 'UK7,UK8,UK9,UK10',
					"color"					=> 'red,black,blue,yellow,purple,pink',
					"posttype"				=> 'product',
				);
$post_info[] = array(
					"post_title"	=>	'Narrative Cup-Sole Boat Boots',
					"post_content"	=>	' - Suede men boat shoes by Narrative
    - Contrast panelling with textured finish
    - Round toe, lace-up and thick sole',
					"post_meta"		=>	$post_meta,
					"post_feature"	=>	0,
					);
////product 4 end///
////product 5 start///
$post_meta = array();
$post_meta = array(
					"productimage"			=> $dummy_image_path.'boots5.jpg',	
					"productimage1"			=> $dummy_image_path.'boots2.jpg',		
					"productimage2"			=> $dummy_image_path.'boots3.jpg',			
					"productimage3"			=> $dummy_image_path.'boots4.jpg',			
					"productimage4"			=> $dummy_image_path.'boots1.jpg',			
					"productimage5"			=> $dummy_image_path.'boots2.jpg',			
					"productimage6"			=> $dummy_image_path.'boots3.jpg',	
					"price"					=> '100',	
					"specialprice"			=> '70',	
					"size"					=> 'UK7,UK8,UK9,UK10',
					"color"					=> 'red,black,blue,yellow,purple,pink',
					"posttype"				=> 'product',
				);
$post_info[] = array(
					"post_title"	=>	'Ksubi Raven Lace-Up Boots',
					"post_content"	=>	'- Hardwearing men boots by Ksubi
    - Distressed finish with lace-up front
    - Elastic side panel and chunky soles',
					"post_meta"		=>	$post_meta,
					"post_feature"	=>	0,
					);
////product 5 end///
////product 6 start///
$post_meta = array();
$post_meta = array(
					"productimage"			=> $dummy_image_path.'boots6.jpg',	
					"productimage1"			=> $dummy_image_path.'boots7.jpg',		
					"productimage2"			=> $dummy_image_path.'boots8.jpg',			
					"productimage3"			=> $dummy_image_path.'boots9.jpg',			
					"productimage4"			=> $dummy_image_path.'boots10.jpg',			
					"productimage5"			=> $dummy_image_path.'boots6.jpg',			
					"productimage6"			=> $dummy_image_path.'boots7.jpg',
					"productimage3"			=> '',		
					"productimage4"			=> '',		
					"productimage5"			=> '',		
					"productimage6"			=> '',
					"price"					=> '150',	
					"specialprice"			=> '100',	
					"size"					=> 'UK7,UK8,UK9,UK10',
					"color"					=> 'red,black,blue,yellow,purple,pink',
					"posttype"				=> 'product',
				);
$post_info[] = array(
					"post_title"	=>	'Cuff boot',
					"post_content"	=>	'Slouches towards it-boot status with buckle detail. Imported sueded polyester. 3 1/2 heel.',
					"post_meta"		=>	$post_meta,
					"post_feature"	=>	0,
					);
////product 6 end///
////product 7 start///
$post_meta = array();
$post_meta = array(
					"productimage"			=> $dummy_image_path.'boots7.jpg',	
					"productimage1"			=> $dummy_image_path.'boots6.jpg',		
					"productimage2"			=> $dummy_image_path.'boots8.jpg',			
					"productimage3"			=> $dummy_image_path.'boots9.jpg',			
					"productimage4"			=> $dummy_image_path.'boots10.jpg',			
					"productimage5"			=> $dummy_image_path.'boots6.jpg',			
					"productimage6"			=> $dummy_image_path.'boots7.jpg',
					"productimage3"			=> '',		
					"productimage4"			=> '',		
					"productimage5"			=> '',		
					"productimage6"			=> '',
					"price"					=> '150',	
					"specialprice"			=> '100',	
					"size"					=> 'UK7,UK8,UK9,UK10',
					"color"					=> 'red,black,blue,yellow,purple,pink',
					"posttype"				=> 'product',
				);
$post_info[] = array(
					"post_title"	=>	'Strappy bootie',
					"post_content"	=>	'Imported polyurethane. 5 heel with 1 platform.',
					"post_meta"		=>	$post_meta,
					"post_feature"	=>	0,
					);
////product 7 end///
////product 8 start///
$post_meta = array();
$post_meta = array(
					"productimage"			=> $dummy_image_path.'boots8.jpg',	
					"productimage1"			=> $dummy_image_path.'boots7.jpg',		
					"productimage2"			=> $dummy_image_path.'boots8.jpg',			
					"productimage3"			=> $dummy_image_path.'boots9.jpg',			
					"productimage4"			=> $dummy_image_path.'boots10.jpg',			
					"productimage5"			=> $dummy_image_path.'boots6.jpg',			
					"productimage6"			=> $dummy_image_path.'boots7.jpg',	
					"price"					=> '100',	
					"specialprice"			=> '70',	
					"size"					=> 'UK7,UK8,UK9,UK10',
					"color"					=> 'red,black,blue,yellow,purple,pink',
					"posttype"				=> 'product',
				);
$post_info[] = array(
					"post_title"	=>	'Low fringe bootie',
					"post_content"	=>	'Imported suede.',
					"post_meta"		=>	$post_meta,
					"post_feature"	=>	0,
					);
////product 8 end///
////product 9 start///
$post_meta = array();
$post_meta = array(
					"productimage"			=> $dummy_image_path.'boots9.jpg',	
					"productimage1"			=> $dummy_image_path.'boots7.jpg',		
					"productimage2"			=> $dummy_image_path.'boots8.jpg',			
					"productimage3"			=> $dummy_image_path.'boots9.jpg',			
					"productimage4"			=> $dummy_image_path.'boots10.jpg',			
					"productimage5"			=> $dummy_image_path.'boots6.jpg',			
					"productimage6"			=> $dummy_image_path.'boots7.jpg',	
					"price"					=> '100',	
					"specialprice"			=> '70',	
					"size"					=> 'UK7,UK8,UK9,UK10',
					"color"					=> 'red,black,blue,yellow,purple,pink',
					"posttype"				=> 'product',
				);
$post_info[] = array(
					"post_title"	=>	'Ankle-wrap wedge boot',
					"post_content"	=>	'Imported polyester canvas.
4 1/2 heel with 1 1/4 platform.',
					"post_meta"		=>	$post_meta,
					"post_feature"	=>	0,
					);
////product 9 end///
////product 10 start///
$post_meta = array();
$post_meta = array(
					"productimage"			=> $dummy_image_path.'boots10.jpg',	
					"productimage1"			=> $dummy_image_path.'boots7.jpg',		
					"productimage2"			=> $dummy_image_path.'boots8.jpg',			
					"productimage3"			=> $dummy_image_path.'boots9.jpg',			
					"productimage4"			=> $dummy_image_path.'boots10.jpg',			
					"productimage5"			=> $dummy_image_path.'boots6.jpg',			
					"productimage6"			=> $dummy_image_path.'boots7.jpg',	
					"price"					=> '100',	
					"specialprice"			=> '70',	
					"size"					=> 'UK7,UK8,UK9,UK10',
					"color"					=> 'red,black,blue,yellow,purple,pink',
					"posttype"				=> 'product',
				);
$post_info[] = array(
					"post_title"	=>	'Classic tall boot',
					"post_content"	=>	'Imported sheepskin.',
					"post_meta"		=>	$post_meta,
					"post_feature"	=>	0,
					);
////product 10 end///
$post_array['Boots'] = $post_info;
//====================================================================================//
////product 1 start///
$post_info = array();
$post_meta = array();
$post_meta = array(
					"productimage"			=> $dummy_image_path.'sandals1.jpg',	
					"productimage1"			=> $dummy_image_path.'sandals2.jpg',		
					"productimage2"			=> $dummy_image_path.'sandals3.jpg',			
					"productimage3"			=> $dummy_image_path.'sandals4.jpg',			
					"productimage4"			=> $dummy_image_path.'sandals5.jpg',			
					"productimage5"			=> $dummy_image_path.'sandals1.jpg',			
					"productimage6"			=> $dummy_image_path.'sandals2.jpg',			
					"price"					=> '95',	
					"specialprice"			=> '80',	
					"size"					=> 'UK7,UK8,UK9,UK10',
					"color"					=> 'red,black,blue,yellow,purple,pink',
					"posttype"				=> 'product',
				);
$post_info[] = array(
					"post_title"	=>	'Patent platform sandal',
					"post_content"	=>	'With stud embellishment. Imported polyurethane.
4 3/4 heel.',
					"post_meta"		=>	$post_meta,
					"post_feature"	=>	0,
					);
////product 1 end///
////product 2 start///
$post_meta = array();
$post_meta = array(
					"productimage"			=> $dummy_image_path.'sandals2.jpg',	
					"productimage1"			=> $dummy_image_path.'sandals1.jpg',		
					"productimage2"			=> $dummy_image_path.'sandals3.jpg',			
					"productimage3"			=> $dummy_image_path.'sandals4.jpg',			
					"productimage4"			=> $dummy_image_path.'sandals5.jpg',			
					"productimage5"			=> $dummy_image_path.'sandals1.jpg',			
					"productimage6"			=> $dummy_image_path.'sandals2.jpg',
					"productimage3"			=> '',		
					"productimage4"			=> '',		
					"productimage5"			=> '',		
					"productimage6"			=> '',
					"price"					=> '150',	
					"specialprice"			=> '100',	
					"size"					=> 'UK7,UK8,UK9,UK10',
					"color"					=> 'red,black,blue,yellow,purple,pink',
					"posttype"				=> 'product',
				);
$post_info[] = array(
					"post_title"	=>	'Studded gladiator',
					"post_content"	=>	'Imported polyurethane.Black or Snakeprint. Sizes 5-11; 6 1/2 - 8 1/2. #254-060 $78. ',
					"post_meta"		=>	$post_meta,
					"post_feature"	=>	0,
					);
////product 2 end///
////product 3 start///
$post_meta = array();
$post_meta = array(
					"productimage"			=> $dummy_image_path.'sandals3.jpg',	
					"productimage1"			=> $dummy_image_path.'sandals2.jpg',		
					"productimage2"			=> $dummy_image_path.'sandals1.jpg',			
					"productimage3"			=> $dummy_image_path.'sandals4.jpg',			
					"productimage4"			=> $dummy_image_path.'sandals5.jpg',			
					"productimage5"			=> $dummy_image_path.'sandals1.jpg',			
					"productimage6"			=> $dummy_image_path.'sandals2.jpg',	
					"price"					=> '100',	
					"specialprice"			=> '70',	
					"size"					=> 'UK7,UK8,UK9,UK10',
					"color"					=> 'red,black,blue,yellow,purple,pink',
					"posttype"				=> 'product',
				);
$post_info[] = array(
					"post_title"	=>	'Woven platform sandal',
					"post_content"	=>	'A strappy, sexy standout. Imported polyurethane.
5 heel with 1 platform.',
					"post_meta"		=>	$post_meta,
					"post_feature"	=>	0,
					);
////product 3 end///
////product 4 start///
$post_meta = array();
$post_meta = array(
					"productimage"			=> $dummy_image_path.'sandals4.jpg',	
					"productimage1"			=> $dummy_image_path.'sandals2.jpg',		
					"productimage2"			=> $dummy_image_path.'sandals3.jpg',			
					"productimage3"			=> $dummy_image_path.'sandals1.jpg',			
					"productimage4"			=> $dummy_image_path.'sandals5.jpg',			
					"productimage5"			=> $dummy_image_path.'sandals1.jpg',			
					"productimage6"			=> $dummy_image_path.'sandals2.jpg',	
					"price"					=> '100',	
					"specialprice"			=> '70',	
					"size"					=> 'UK7,UK8,UK9,UK10',
					"color"					=> 'red,black,blue,yellow,purple,pink',
					"posttype"				=> 'product',
				);
$post_info[] = array(
					"post_title"	=>	'Lizard print sandal',
					"post_content"	=>	'Imported polyurethane. 5 heel with 1 platform.',
					"post_meta"		=>	$post_meta,
					"post_feature"	=>	0,
					);
////product 4 end///
////product 5 start///
$post_meta = array();
$post_meta = array(
					"productimage"			=> $dummy_image_path.'sandals5.jpg',	
					"productimage1"			=> $dummy_image_path.'sandals2.jpg',		
					"productimage2"			=> $dummy_image_path.'sandals3.jpg',			
					"productimage3"			=> $dummy_image_path.'sandals4.jpg',			
					"productimage4"			=> $dummy_image_path.'sandals1.jpg',			
					"productimage5"			=> $dummy_image_path.'sandals2.jpg',			
					"productimage6"			=> $dummy_image_path.'sandals3.jpg',	
					"price"					=> '100',	
					"specialprice"			=> '70',	
					"size"					=> 'UK7,UK8,UK9,UK10',
					"color"					=> 'red,black,blue,yellow,purple,pink',
					"posttype"				=> 'product',
				);
$post_info[] = array(
					"post_title"	=>	'Ankle-cuff sandal',
					"post_content"	=>	'A wildly chic platform. Imported polyurethane.
5 heel with 1 platform.',
					"post_meta"		=>	$post_meta,
					"post_feature"	=>	0,
					);
////product 5 end///
////product 6 start///
$post_meta = array();
$post_meta = array(
					"productimage"			=> $dummy_image_path.'sandals6.jpg',	
					"productimage1"			=> $dummy_image_path.'sandals7.jpg',		
					"productimage2"			=> $dummy_image_path.'sandals8.jpg',			
					"productimage3"			=> $dummy_image_path.'sandals9.jpg',			
					"productimage4"			=> $dummy_image_path.'sandals10.jpg',			
					"productimage5"			=> $dummy_image_path.'sandals6.jpg',			
					"productimage6"			=> $dummy_image_path.'sandals7.jpg',
					"productimage3"			=> '',		
					"productimage4"			=> '',		
					"productimage5"			=> '',		
					"productimage6"			=> '',
					"price"					=> '150',	
					"specialprice"			=> '100',	
					"size"					=> 'UK7,UK8,UK9,UK10',
					"color"					=> 'red,black,blue,yellow,purple,pink',
					"posttype"				=> 'product',
				);
$post_info[] = array(
					"post_title"	=>	'Camper Escher Sandals',
					"post_content"	=>	'- Men leather sandals by Camper
    - Multiple strap design with toe loop
   - Buckle fastening with cushioned sole',
					"post_meta"		=>	$post_meta,
					"post_feature"	=>	0,
					);
////product 6 end///
////product 7 start///
$post_meta = array();
$post_meta = array(
					"productimage"			=> $dummy_image_path.'sandals7.jpg',	
					"productimage1"			=> $dummy_image_path.'sandals6.jpg',		
					"productimage2"			=> $dummy_image_path.'sandals8.jpg',			
					"productimage3"			=> $dummy_image_path.'sandals9.jpg',			
					"productimage4"			=> $dummy_image_path.'sandals10.jpg',			
					"productimage5"			=> $dummy_image_path.'sandals6.jpg',			
					"productimage6"			=> $dummy_image_path.'sandals7.jpg',
					"productimage3"			=> '',		
					"productimage4"			=> '',		
					"productimage5"			=> '',		
					"productimage6"			=> '',
					"price"					=> '150',	
					"specialprice"			=> '100',	
					"size"					=> 'UK7,UK8,UK9,UK10',
					"color"					=> 'red,black,blue,yellow,purple,pink',
					"posttype"				=> 'product',
				);
$post_info[] = array(
					"post_title"	=>	'Creative Exclusive To ASOS Chunky',
					"post_content"	=>	'Men leather sandals by Officine Creative
    * - Contrast laces and chunky rivet detailing
    * - Slingback and thick contrast cleated sole',
					"post_meta"		=>	$post_meta,
					"post_feature"	=>	0,
					);
////product 7 end///
////product 8 start///
$post_meta = array();
$post_meta = array(
					"productimage"			=> $dummy_image_path.'sandals8.jpg',	
					"productimage1"			=> $dummy_image_path.'sandals7.jpg',		
					"productimage2"			=> $dummy_image_path.'sandals8.jpg',			
					"productimage3"			=> $dummy_image_path.'sandals9.jpg',			
					"productimage4"			=> $dummy_image_path.'sandals10.jpg',			
					"productimage5"			=> $dummy_image_path.'sandals6.jpg',			
					"productimage6"			=> $dummy_image_path.'sandals7.jpg',	
					"price"					=> '100',	
					"specialprice"			=> '70',	
					"size"					=> 'UK7,UK8,UK9,UK10',
					"color"					=> 'red,black,blue,yellow,purple,pink',
					"posttype"				=> 'product',
				);
$post_info[] = array(
					"post_title"	=>	'Officine Creative Lace-Up Cut-Out Sandals',
					"post_content"	=>	'- Men sandals by Officine Creative
     - Panel design with lace-up front fastening
     - Moulded sole with reinforced heel and logo',
					"post_meta"		=>	$post_meta,
					"post_feature"	=>	0,
					);
////product 8 end///
////product 9 start///
$post_meta = array();
$post_meta = array(
					"productimage"			=> $dummy_image_path.'sandals9.jpg',	
					"productimage1"			=> $dummy_image_path.'sandals7.jpg',		
					"productimage2"			=> $dummy_image_path.'sandals8.jpg',			
					"productimage3"			=> $dummy_image_path.'sandals9.jpg',			
					"productimage4"			=> $dummy_image_path.'sandals10.jpg',			
					"productimage5"			=> $dummy_image_path.'sandals6.jpg',			
					"productimage6"			=> $dummy_image_path.'sandals7.jpg',	
					"price"					=> '100',	
					"specialprice"			=> '70',	
					"size"					=> 'UK7,UK8,UK9,UK10',
					"color"					=> 'red,black,blue,yellow,purple,pink',
					"posttype"				=> 'product',
				);
$post_info[] = array(
					"post_title"	=>	'Officine Creative Ankle Gladiator Sandals',
					"post_content"	=>	'Men gladiator sandals by Officine Creative
    - Wide strap design with ankle buckle fastening
    - Moulded sole with stitch edge and logo detail',
					"post_meta"		=>	$post_meta,
					"post_feature"	=>	0,
					);
////product 9 end///
////product 10 start///
$post_meta = array();
$post_meta = array(
					"productimage"			=> $dummy_image_path.'sandals10.jpg',	
					"productimage1"			=> $dummy_image_path.'sandals7.jpg',		
					"productimage2"			=> $dummy_image_path.'sandals8.jpg',			
					"productimage3"			=> $dummy_image_path.'sandals9.jpg',			
					"productimage4"			=> $dummy_image_path.'sandals10.jpg',			
					"productimage5"			=> $dummy_image_path.'sandals6.jpg',			
					"productimage6"			=> $dummy_image_path.'sandals7.jpg',	
					"price"					=> '100',	
					"specialprice"			=> '70',	
					"size"					=> 'UK7,UK8,UK9,UK10',
					"color"					=> 'red,black,blue,yellow,purple,pink',
					"posttype"				=> 'product',
				);
$post_info[] = array(
					"post_title"	=>	'Leather Cross-Over Strap Sandal',
					"post_content"	=>	'- Leather flat sandals
     - Cross-over slim strappy design
    - Adjustable buckle and toe loop',
					"post_meta"		=>	$post_meta,
					"post_feature"	=>	0,
					);
////product 10 end///
$post_array['Sandals'] = $post_info;

//===============================================================================//

$feature_cat_name = 'Feature';
for($c=0;$c<count($category_array);$c++)
{
	$feature_cat_id = $wpdb->get_var("SELECT term_id FROM $wpdb->terms where name like \"$feature_cat_name\"");
	$cat_name = $category_array[$c];
	if(is_array($cat_name))
	{
		$parent_cat_id = '0';
		$cat_name_arr = $cat_name;
		for($i=0;$i<count($cat_name_arr);$i++)
		{
			$cat_id = '';
			$cat_name = $cat_name_arr[$i];
			
			$cat_id = $wpdb->get_var("SELECT term_id FROM $wpdb->terms where name like \"$cat_name\"");
			if($cat_id=='')
			{
				$srch_arr = array("'",'"',"?",".","!","@","#","$","%","^","&","*","(",")","-","+","+"," ",';',',','_');
			$replace_arr = array('','','','','','','','','','','','','','','','','','','','',',','');
				$slug = str_replace($srch_arr,$replace_arr,$cat_name);
				$cat_sql = "insert into $wpdb->terms (name,slug) values (\"$cat_name\",\"$slug\")";
				$wpdb->query($cat_sql);
				$last_cat_id = $wpdb->get_var("SELECT max(term_id) FROM $wpdb->terms");
				$cat_id  = $last_cat_id;
				$count = count($post_array[$cat_name]);
				$tt_sql = "insert into $wpdb->term_taxonomy (term_id,taxonomy,parent,count) values (\"$last_cat_id\",'category',\"$parent_cat_id\",\"$count\")";
				$wpdb->query($tt_sql);
				$last_tt_id = $wpdb->get_var("SELECT max(term_taxonomy_id) FROM $wpdb->term_taxonomy");
				if($post_array[$cat_name])
				{
					$post_info_arr = $post_array[$cat_name];
					if(count($post_info_arr)>0)
					{
						for($p=0;$p<count($post_info_arr);$p++)
						{
							$post_title = $post_info_arr[$p]['post_title'];
							$post_id_count = $wpdb->get_var("SELECT count(ID) FROM $wpdb->posts where post_title like \"$post_title\"");
							if($post_id_count==0)
							{
								$post_content = addslashes($post_info_arr[$p]['post_content']);
								$post_date = date('Y-m-d H:s:i');
	
								$post_name = strtolower(str_replace(array("'",'"',"?",".","!","@","#","$","%","^","&","*","(",")","-","+","+"," ",';',',','_'),array('','','','','','','','','','','','','','','','','','','','',',',''),$post_title));
								$post_name_count = $wpdb->get_var("SELECT count(ID) FROM $wpdb->posts where post_name=\"$post_name\"");
								if($post_name_count>0)
								{
									$post_name = $post_name.'-'.($post_name_count+1);
								}
								$post_sql = "insert into $wpdb->posts (post_author,post_date,post_date_gmt,post_content,post_title,post_name) values (\"$post_author\", \"$post_date\", \"$post_date\", \"$post_content\", \"$post_title\", \"$post_name\")";
								$wpdb->query($post_sql);
								$last_post_id = $wpdb->get_var("SELECT max(ID) FROM $wpdb->posts");
								$guid = get_option('siteurl')."/?p=$last_post_id";
								$guid_sql = "update $wpdb->posts set guid=\"$guid\" where ID=\"$last_post_id\"";
								$wpdb->query($guid_sql);
								update_post_meta( $last_post_id, 'key', $post_info_arr[$p]['post_meta'] );
								update_post_meta( $last_post_id, 'pt_dummy_content', 1 );
								$ter_relation_sql = "insert into $wpdb->term_relationships (object_id,term_taxonomy_id) values (\"$last_post_id\",\"$last_tt_id\")";
								$wpdb->query($ter_relation_sql);
								$post_feature = $post_info_arr[$p]['post_feature'];
								if($post_feature && $feature_cat_id)
								{
									$ter_relation_sql = "insert into $wpdb->term_relationships (object_id,term_taxonomy_id) values (\"$last_post_id\",\"$feature_cat_id\")";
									$wpdb->query($ter_relation_sql);
									$tt_update_sql = "update $wpdb->term_taxonomy set count=count+1 where term_id=\"$feature_cat_id\"";
									$wpdb->query($tt_update_sql);
								}
							}
						}
					}
				}				
			}else
			{
				$last_cat_id = $cat_id;
				$count = count($post_array[$cat_name]);
				$last_tt_id = $wpdb->get_var("SELECT tt.term_taxonomy_id FROM $wpdb->term_taxonomy tt where tt.term_id=\"$last_cat_id\" and tt.taxonomy='category'");
				if($post_array[$cat_name])
				{
					$post_info_arr = $post_array[$cat_name];
					if(count($post_info_arr)>0)
					{
						for($p=0;$p<count($post_info_arr);$p++)
						{
							$post_title = $post_info_arr[$p]['post_title'];
							$post_id_count = $wpdb->get_var("SELECT count(ID) FROM $wpdb->posts where post_title like \"$post_title\"");
							if($post_id_count==0)
							{
								$tt_update_sql = "update $wpdb->term_taxonomy set count=count+1 where term_id=\"$last_cat_id\"";
								$wpdb->query($tt_update_sql);
								$post_content = addslashes($post_info_arr[$p]['post_content']);
								$post_date = date('Y-m-d H:s:i');
								$post_name = strtolower(str_replace(array("'",'"',"?",".","!","@","#","$","%","^","&","*","(",")","-","+","+"," ",';',',','_'),array('','','','','','','','','','','','','','','','','','','','',',',''),$post_title));
								$post_name_count = $wpdb->get_var("SELECT count(ID) FROM $wpdb->posts where post_name=\"$post_name%\"");
								if($post_name_count>0)
								{
									$post_name = $post_name.'-'.($post_name_count+1);
								}
								$post_sql = "insert into $wpdb->posts (post_author,post_date,post_date_gmt,post_content,post_title,post_name) values (\"$post_author\", \"$post_date\", \"$post_date\", \"$post_content\", \"$post_title\", \"$post_name\")";
								$wpdb->query($post_sql);
								$last_post_id = $wpdb->get_var("SELECT max(ID) FROM $wpdb->posts");
								$guid = get_option('siteurl')."/?p=$last_post_id";
								$guid_sql = "update $wpdb->posts set guid=\"$guid\" where ID=\"$last_post_id\"";
								$wpdb->query($guid_sql);
								update_post_meta( $last_post_id, 'key', $post_info_arr[$p]['post_meta'] );
								update_post_meta( $last_post_id, 'pt_dummy_content', 1 );
								$ter_relation_sql = "insert into $wpdb->term_relationships (object_id,term_taxonomy_id) values (\"$last_post_id\",\"$last_tt_id\")";
								$wpdb->query($ter_relation_sql);
								$post_feature = $post_info_arr[$p]['post_feature'];
								if($post_feature && $feature_cat_id)
								{
									$ter_relation_sql = "insert into $wpdb->term_relationships (object_id,term_taxonomy_id) values (\"$last_post_id\",\"$feature_cat_id\")";
									$wpdb->query($ter_relation_sql);
									$tt_update_sql = "update $wpdb->term_taxonomy set count=count+1 where term_id=\"$feature_cat_id\"";
									$wpdb->query($tt_update_sql);
								}
							}
						}
					}
				}
				
			}
			if($i==0)
			{
				$parent_cat_id = $last_cat_id;
			}
		}
	}else
	{
		$cat_id = '';
		$cat_id = $wpdb->get_var("SELECT term_id FROM $wpdb->terms where name like \"$cat_name\"");
		if($cat_id=='')
		{
			$srch_arr = array("'",'"',"?",".","!","@","#","$","%","^","&","*","(",")","-","+","+"," ",';',',','_');
			$replace_arr = array('','','','','','','','','','','','','','','','','','','','',',','');
			$slug = str_replace($srch_arr,$replace_arr,$cat_name);
			$cat_sql = "insert into $wpdb->terms (name,slug) values (\"$cat_name\",\"$slug\")";
			$wpdb->query($cat_sql);
			$last_cat_id = $wpdb->get_var("SELECT max(term_id) FROM $wpdb->terms");
			$count = count($post_array[$cat_name]);
			$parent_cat_id = 0;
			$tt_sql = "insert into $wpdb->term_taxonomy (term_id,taxonomy,parent,count) values (\"$last_cat_id\",'category',\"$parent_cat_id\",\"$count\")";
			$wpdb->query($tt_sql);
			$last_tt_id = $wpdb->get_var("SELECT max(term_taxonomy_id) FROM $wpdb->term_taxonomy");
			if($post_array[$cat_name])
			{
				$post_info_arr = $post_array[$cat_name];
				if(count($post_info_arr)>0)
				{
					for($p=0;$p<count($post_info_arr);$p++)
					{
						$post_title = $post_info_arr[$p]['post_title'];
						$post_id_count = $wpdb->get_var("SELECT count(ID) FROM $wpdb->posts where post_title like \"$post_title\"");
						if($post_id_count==0)
						{
							$post_content = $post_info_arr[$p]['post_content'];
							$post_date = date('Y-m-d H:s:i');
							$post_name = strtolower(str_replace(array("'",'"',"?",".","!","@","#","$","%","^","&","*","(",")","-","+","+"," ",';',',','_'),array('','','','','','','','','','','','','','','','','','','','',',',''),$post_title));
							$post_name_count = $wpdb->get_var("SELECT count(ID) FROM $wpdb->posts where post_name=\"$post_name\"");
							if($post_name_count>0)
							{
								$post_name = $post_name.'-'.($post_name_count+1);
							}
							$post_sql = "insert into $wpdb->posts (post_author,post_date,post_date_gmt,post_content,post_title,post_name) values (\"$post_author\", \"$post_date\", \"$post_date\", \"$post_content\", \"$post_title\", \"$post_name\")";
							$wpdb->query($post_sql);
							$last_post_id = $wpdb->get_var("SELECT max(ID) FROM $wpdb->posts");
							$guid = get_option('siteurl')."/?p=$last_post_id";
							$guid_sql = "update $wpdb->posts set guid=\"$guid\" where ID=\"$last_post_id\"";
							$wpdb->query($guid_sql);
							update_post_meta( $last_post_id, 'key', $post_info_arr[$p]['post_meta'] );
							update_post_meta( $last_post_id, 'pt_dummy_content', 1 );
							$ter_relation_sql = "insert into $wpdb->term_relationships (object_id,term_taxonomy_id) values (\"$last_post_id\",\"$last_tt_id\")";
							$wpdb->query($ter_relation_sql);
							$feature_cat_id = $wpdb->get_var("SELECT term_id FROM $wpdb->terms where name=\"$feature_cat_name\"");
							$post_feature = $post_info_arr[$p]['post_feature'];
							if($post_feature && $feature_cat_id)
							{
								$ter_relation_sql = "insert into $wpdb->term_relationships (object_id,term_taxonomy_id) values (\"$last_post_id\",\"$feature_cat_id\")";
								$wpdb->query($ter_relation_sql);
								$tt_update_sql = "update $wpdb->term_taxonomy set count=count+1 where term_id=\"$feature_cat_id\"";
								$wpdb->query($tt_update_sql);
							}
						}
					}
				}
			}	
		}else
		{
			$last_cat_id = $cat_id;
			$last_tt_id = $wpdb->get_var("SELECT tt.term_taxonomy_id FROM $wpdb->term_taxonomy tt where tt.term_id=\"$last_cat_id\" and tt.taxonomy='category'");
			if($post_array[$cat_name])
			{
				$post_info_arr = $post_array[$cat_name];
				if(count($post_info_arr)>0)
				{
					for($p=0;$p<count($post_info_arr);$p++)
					{
						$post_title = $post_info_arr[$p]['post_title'];
						$post_id_count = $wpdb->get_var("SELECT count(ID) FROM $wpdb->posts where post_title like \"$post_title\"");
						if($post_id_count==0)
						{
							$tt_update_sql = "update $wpdb->term_taxonomy set count=count+1 where term_id=\"$last_cat_id\"";
							$wpdb->query($tt_update_sql);
							$post_content = $post_info_arr[$p]['post_content'];
							$post_date = date('Y-m-d H:s:i');
							$post_name = strtolower(str_replace(array("'",'"',"?",".","!","@","#","$","%","^","&","*","(",")","-","+","+"," ",';',',','_'),array('','','','','','','','','','','','','','','','','','','','',',',''),$post_title));
							$post_name_count = $wpdb->get_var("SELECT count(ID) FROM $wpdb->posts where post_name=\"$post_name\"");
							if($post_name_count>0)
							{
								$post_name = $post_name.'-'.($post_name_count+1);
							}
							$post_sql = "insert into $wpdb->posts (post_author,post_date,post_date_gmt,post_content,post_title,post_name) values (\"$post_author\", \"$post_date\", \"$post_date\", \"$post_content\", \"$post_title\", \"$post_name\")";
							$wpdb->query($post_sql);
							$last_post_id = $wpdb->get_var("SELECT max(ID) FROM $wpdb->posts");
							$guid = get_option('siteurl')."/?p=$last_post_id";
							$guid_sql = "update $wpdb->posts set guid=\"$guid\" where ID=\"$last_post_id\"";
							$wpdb->query($guid_sql);
							update_post_meta( $last_post_id, 'key', $post_info_arr[$p]['post_meta'] );
							update_post_meta( $last_post_id, 'pt_dummy_content', 1 );
							$ter_relation_sql = "insert into $wpdb->term_relationships (object_id,term_taxonomy_id) values (\"$last_post_id\",\"$last_tt_id\")";
							$wpdb->query($ter_relation_sql);
							$post_feature = $post_info_arr[$p]['post_feature'];
							$feature_cat_id = $wpdb->get_var("SELECT term_id FROM $wpdb->terms where name=\"$feature_cat_name\"");
							if($post_feature && $feature_cat_id)
							{
								$ter_relation_sql = "insert into $wpdb->term_relationships (object_id,term_taxonomy_id) values (\"$last_post_id\",\"$feature_cat_id\")";
								$wpdb->query($ter_relation_sql);
								$tt_update_sql = "update $wpdb->term_taxonomy set count=count+1 where term_id=\"$feature_cat_id\"";
								$wpdb->query($tt_update_sql);
							}
						}
					}
				}
			}
		}
	}
}
/////////////// TERMS END ///////////////
/////////////// Design Settings START ///////////////
$blog_cat_name = 'Blog';
$blog_cat_id = $wpdb->get_var("SELECT term_id FROM $wpdb->terms where name=\"$blog_cat_name\"");
update_option("cat_exclude_$blog_cat_id",$blog_cat_id);
update_option("ptthemes_breadcrumbs",'true');
update_option("ptthemes_add_to_cart_button_position",'Below Description');
update_option("ptthemes_size_chart",'<img src="'.$dummy_image_path.'size_chart.png" alt="" >');
update_option("ptthemes_feed_name",'Templatic');
update_option("ptthemes_feed_url",'http://feeds.feedburner.com/Templatic');
update_option("ptthemes_feedburner_url",'http://feeds.feedburner.com/Templatic');

update_option("ptthemes_banner1_url",$dummy_image_path.'main_banner.png');
update_option("ptthemes_banner1_link",'http://templatic.com');
update_option("ptthemes_banner2_url",$dummy_image_path.'main_banner2.png');
update_option("ptthemes_banner2_link",'http://templatic.com');
update_option("ptthemes_banner3_url",$dummy_image_path.'main_banner3.png');
update_option("ptthemes_banner3_link",'http://templatic.com');
update_option("ptthemes_banner4_url",$dummy_image_path.'main_banner4.png');
update_option("ptthemes_banner4_link",'http://templatic.com');
update_option("ptthemes_banner5_url",$dummy_image_path.'main_banner5.png');
update_option("ptthemes_banner5_link",'http://templatic.com');
/////////////// Design Settings END ///////////////

/////////////// WIDGET SETTINGS START ///////////////
$recentpost_info = array();
$recentpost_info[1] = array(
					"title"				=>	'Recent Posts',
					"number"			=>	5,
					);
$recentpost_info['_multiwidget'] = '1';

update_option('widget_recent-posts',$recentpost_info);
$recentpost_info_info = get_option('widget_recent-posts');
krsort($recentpost_info_info);
foreach($recentpost_info_info as $key1=>$val1)
{
	$recentpost_info_info_key = $key1;
	if(is_int($recentpost_info_info_key))
	{
		break;
	}
}

$flicker = array();
$flicker = array(
					"id"				=>	'15184611@N00',
					"number"			=>	6,
					);
update_option('widget_flickrwidget',$flicker);

$adv_info_arr = array();
$adv_info_arr[1] = array(
					"title"				=>	'',
					"advt1"				=>	$dummy_image_path.'ad-290x300.png',
					"advt_link1"		=>	'http://templatic.com',
					);
$adv_info_arr['_multiwidget'] = '1';
update_option('widget_widget_advt',$adv_info_arr);
$adv_info_arr = get_option('widget_widget_advt');
krsort($adv_info_arr);
foreach($adv_info_arr as $key1=>$val1)
{
	$adv_info_key = $key1;
	if(is_int($adv_info_key))
	{
		break;
	}
}
//$wp_inactive_widgets = get_option('sidebars_widgets');
$wp_inactive_widgets["sidebar-1"] = array('recent-posts-'.$recentpost_info_info_key,'pt-flickr-photos','widget_advt-'.$adv_info_key);

$adv_info = array();
$adv_info[1] = array(
					"title"				=>	'Connect with us',
					"facebook"			=>	'http://facebook.com',
					"twitter"			=>	'http://twitter.com',
					"youtube"			=>	'http://youtube.com',
					"rss"				=>	'http://feedburner.com',
					);
$adv_info['_multiwidget'] = '1';
update_option('widget_widget_isocialize',$adv_info);
$adv_info = get_option('widget_widget_isocialize');
krsort($adv_info);
foreach($adv_info as $key1=>$val1)
{
	$adv_info_key = $key1;
	if(is_int($adv_info_key))
	{
		break;
	}
}
$wp_inactive_widgets["sidebar-2"] = array('widget_isocialize-'.$adv_info_key);

$adv_info = array();
$adv_info[1] = array(
					"title"				=>	'Live Help',
					"text"				=>	'Call Us Toll Free',
					"phoneno"			=>	'550-650-75085',
					"time"				=>	'Mon-Fri 10-am to 6 pm est <br /> Sat-Sub 10-am to 2 pm est',
					);
$adv_info['_multiwidget'] = '1';
update_option('widget_widget_help',$adv_info);
$adv_info = get_option('widget_widget_help');
krsort($adv_info);
foreach($adv_info as $key1=>$val1)
{
	$adv_info_key = $key1;
	if(is_int($adv_info_key))
	{
		break;
	}
}
$wp_inactive_widgets["sidebar-3"] = array('widget_help-'.$adv_info_key);
update_option('sidebars_widgets',$wp_inactive_widgets);
//echo "<pre>";
//print_r(get_option('sidebars_widgets'));
//print_r(get_option('widget_widget_advt'));
//print_r(get_option('widget_widget_text'));
/////////////// WIDGET SETTINGS END ///////////////

$pages_array = array('About Us','Contact Us','Terms & Conditions','Privacy Policy');
$page_info_arr = array();
$page_info_arr['About Us'] = '
<p>Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Praesent aliquam,  justo convallis luctus rutrum, erat nulla fermentum diam, at nonummy quam  ante ac quam. Maecenas urna purus, fermentum id, molestie in, commodo  porttitor, felis. Nam blandit quam ut lacus. Quisque ornare risus quis  ligula. Phasellus tristique purus a augue condimentum adipiscing. Aenean  sagittis. Etiam leo pede, rhoncus venenatis, tristique in, vulputate at,  odio. Donec et ipsum et sapien vehicula nonummy. Suspendisse potenti. Fusce  varius urna id quam. Sed neque mi, varius eget, tincidunt nec, suscipit id,  libero. In eget purus. Vestibulum ut nisl. Donec eu mi sed turpis feugiat  feugiat. Integer turpis arcu, pellentesque eget, cursus et, fermentum ut,  sapien. Fusce metus mi, eleifend sollicitudin, molestie id, varius et, nibh.  Donec nec libero.</p>
<p>Praesent aliquam,  justo convallis luctus rutrum, erat nulla fermentum diam, at nonummy quam  ante ac quam. Maecenas urna purus, fermentum id, molestie in, commodo  porttitor, felis. Nam blandit quam ut lacus. Quisque ornare risus quis  ligula. Phasellus tristique purus a augue condimentum adipiscing. Aenean  sagittis. Etiam leo pede, rhoncus venenatis, tristique in, vulputate at,  odio. Donec et ipsum et sapien vehicula nonummy. Suspendisse potenti. Fusce  varius urna id quam. Sed neque mi, varius eget, tincidunt nec, suscipit id,  libero. In eget purus. Vestibulum ut nisl. Donec eu mi sed turpis feugiat  feugiat. Integer turpis arcu, pellentesque eget, cursus et, fermentum ut,  sapien. Fusce metus mi, eleifend sollicitudin, molestie id, varius et, nibh.  Donec nec libero.</p>
<p>Maecenas urna purus, fermentum id, molestie in, commodo  porttitor, felis. Nam blandit quam ut lacus. Quisque ornare risus quis  ligula. Phasellus tristique purus a augue condimentum adipiscing. Aenean  sagittis. Etiam leo pede, rhoncus venenatis, tristique in, vulputate at,  odio. Donec et ipsum et sapien vehicula nonummy. Suspendisse potenti. Fusce  varius urna id quam. Sed neque mi, varius eget, tincidunt nec, suscipit id,  libero. In eget purus. Vestibulum ut nisl. Donec eu mi sed turpis feugiat  feugiat. Integer turpis arcu, pellentesque eget, cursus et, fermentum ut,  sapien. Fusce metus mi, eleifend sollicitudin, molestie id, varius et, nibh.  Donec nec libero. </p>
';
$page_info_arr['Contact Us'] = '
<p>Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Praesent aliquam,  justo convallis luctus rutrum, erat nulla fermentum diam, at nonummy quam  ante ac quam. Maecenas urna purus, fermentum id, molestie in, commodo  porttitor, felis. Nam blandit quam ut lacus. Quisque ornare risus quis  ligula. Phasellus tristique purus a augue condimentum adipiscing. Aenean  sagittis. Etiam leo pede, rhoncus venenatis, tristique in, vulputate at,  odio. Donec et ipsum et sapien vehicula nonummy. Suspendisse potenti. Fusce  varius urna id quam. Sed neque mi, varius eget, tincidunt nec, suscipit id,  libero. In eget purus. Vestibulum ut nisl. Donec eu mi sed turpis feugiat  feugiat. Integer turpis arcu, pellentesque eget, cursus et, fermentum ut,  sapien. Fusce metus mi, eleifend sollicitudin, molestie id, varius et, nibh.  Donec nec libero.</p>
<p>Praesent aliquam,  justo convallis luctus rutrum, erat nulla fermentum diam, at nonummy quam  ante ac quam. Maecenas urna purus, fermentum id, molestie in, commodo  porttitor, felis. Nam blandit quam ut lacus. Quisque ornare risus quis  ligula. Phasellus tristique purus a augue condimentum adipiscing. Aenean  sagittis. Etiam leo pede, rhoncus venenatis, tristique in, vulputate at,  odio. Donec et ipsum et sapien vehicula nonummy. Suspendisse potenti. Fusce  varius urna id quam. Sed neque mi, varius eget, tincidunt nec, suscipit id,  libero. In eget purus. Vestibulum ut nisl. Donec eu mi sed turpis feugiat  feugiat. Integer turpis arcu, pellentesque eget, cursus et, fermentum ut,  sapien. Fusce metus mi, eleifend sollicitudin, molestie id, varius et, nibh.  Donec nec libero.</p>
<p>Maecenas urna purus, fermentum id, molestie in, commodo  porttitor, felis. Nam blandit quam ut lacus. Quisque ornare risus quis  ligula. Phasellus tristique purus a augue condimentum adipiscing. Aenean  sagittis. Etiam leo pede, rhoncus venenatis, tristique in, vulputate at,  odio. Donec et ipsum et sapien vehicula nonummy. Suspendisse potenti. Fusce  varius urna id quam. Sed neque mi, varius eget, tincidunt nec, suscipit id,  libero. In eget purus. Vestibulum ut nisl. Donec eu mi sed turpis feugiat  feugiat. Integer turpis arcu, pellentesque eget, cursus et, fermentum ut,  sapien. Fusce metus mi, eleifend sollicitudin, molestie id, varius et, nibh.  Donec nec libero. </p>
';
$page_info_arr['Terms & Conditions'] = '
<p>Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Praesent aliquam,  justo convallis luctus rutrum, erat nulla fermentum diam, at nonummy quam  ante ac quam. Maecenas urna purus, fermentum id, molestie in, commodo  porttitor, felis. Nam blandit quam ut lacus. Quisque ornare risus quis  ligula. Phasellus tristique purus a augue condimentum adipiscing. Aenean  sagittis. Etiam leo pede, rhoncus venenatis, tristique in, vulputate at,  odio. Donec et ipsum et sapien vehicula nonummy. Suspendisse potenti. Fusce  varius urna id quam. Sed neque mi, varius eget, tincidunt nec, suscipit id,  libero. In eget purus. Vestibulum ut nisl. Donec eu mi sed turpis feugiat  feugiat. Integer turpis arcu, pellentesque eget, cursus et, fermentum ut,  sapien. Fusce metus mi, eleifend sollicitudin, molestie id, varius et, nibh.  Donec nec libero.</p>
<p>Praesent aliquam,  justo convallis luctus rutrum, erat nulla fermentum diam, at nonummy quam  ante ac quam. Maecenas urna purus, fermentum id, molestie in, commodo  porttitor, felis. Nam blandit quam ut lacus. Quisque ornare risus quis  ligula. Phasellus tristique purus a augue condimentum adipiscing. Aenean  sagittis. Etiam leo pede, rhoncus venenatis, tristique in, vulputate at,  odio. Donec et ipsum et sapien vehicula nonummy. Suspendisse potenti. Fusce  varius urna id quam. Sed neque mi, varius eget, tincidunt nec, suscipit id,  libero. In eget purus. Vestibulum ut nisl. Donec eu mi sed turpis feugiat  feugiat. Integer turpis arcu, pellentesque eget, cursus et, fermentum ut,  sapien. Fusce metus mi, eleifend sollicitudin, molestie id, varius et, nibh.  Donec nec libero.</p>
<p>Maecenas urna purus, fermentum id, molestie in, commodo  porttitor, felis. Nam blandit quam ut lacus. Quisque ornare risus quis  ligula. Phasellus tristique purus a augue condimentum adipiscing. Aenean  sagittis. Etiam leo pede, rhoncus venenatis, tristique in, vulputate at,  odio. Donec et ipsum et sapien vehicula nonummy. Suspendisse potenti. Fusce  varius urna id quam. Sed neque mi, varius eget, tincidunt nec, suscipit id,  libero. In eget purus. Vestibulum ut nisl. Donec eu mi sed turpis feugiat  feugiat. Integer turpis arcu, pellentesque eget, cursus et, fermentum ut,  sapien. Fusce metus mi, eleifend sollicitudin, molestie id, varius et, nibh.  Donec nec libero. </p>
<p>Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Praesent aliquam,  justo convallis luctus rutrum, erat nulla fermentum diam, at nonummy quam  ante ac quam. Maecenas urna purus, fermentum id, molestie in, commodo  porttitor, felis. Nam blandit quam ut lacus. Quisque ornare risus quis  ligula. Phasellus tristique purus a augue condimentum adipiscing. Aenean  sagittis. Etiam leo pede, rhoncus venenatis, tristique in, vulputate at,  odio. Donec et ipsum et sapien vehicula nonummy. Suspendisse potenti. Fusce  varius urna id quam. Sed neque mi, varius eget, tincidunt nec, suscipit id,  libero. In eget purus. Vestibulum ut nisl. Donec eu mi sed turpis feugiat  feugiat. Integer turpis arcu, pellentesque eget, cursus et, fermentum ut,  sapien. Fusce metus mi, eleifend sollicitudin, molestie id, varius et, nibh.  Donec nec libero.</p>
<p>Praesent aliquam,  justo convallis luctus rutrum, erat nulla fermentum diam, at nonummy quam  ante ac quam. Maecenas urna purus, fermentum id, molestie in, commodo  porttitor, felis. Nam blandit quam ut lacus. Quisque ornare risus quis  ligula. Phasellus tristique purus a augue condimentum adipiscing. Aenean  sagittis. Etiam leo pede, rhoncus venenatis, tristique in, vulputate at,  odio. Donec et ipsum et sapien vehicula nonummy. Suspendisse potenti. Fusce  varius urna id quam. Sed neque mi, varius eget, tincidunt nec, suscipit id,  libero. In eget purus. Vestibulum ut nisl. Donec eu mi sed turpis feugiat  feugiat. Integer turpis arcu, pellentesque eget, cursus et, fermentum ut,  sapien. Fusce metus mi, eleifend sollicitudin, molestie id, varius et, nibh.  Donec nec libero.</p>
<p>Maecenas urna purus, fermentum id, molestie in, commodo  porttitor, felis. Nam blandit quam ut lacus. Quisque ornare risus quis  ligula. Phasellus tristique purus a augue condimentum adipiscing. Aenean  sagittis. Etiam leo pede, rhoncus venenatis, tristique in, vulputate at,  odio. Donec et ipsum et sapien vehicula nonummy. Suspendisse potenti. Fusce  varius urna id quam. Sed neque mi, varius eget, tincidunt nec, suscipit id,  libero. In eget purus. Vestibulum ut nisl. Donec eu mi sed turpis feugiat  feugiat. Integer turpis arcu, pellentesque eget, cursus et, fermentum ut,  sapien. Fusce metus mi, eleifend sollicitudin, molestie id, varius et, nibh.  Donec nec libero. </p>
';
$page_info_arr['Privacy Policy'] = '
<p>Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Praesent aliquam,  justo convallis luctus rutrum, erat nulla fermentum diam, at nonummy quam  ante ac quam. Maecenas urna purus, fermentum id, molestie in, commodo  porttitor, felis. Nam blandit quam ut lacus. Quisque ornare risus quis  ligula. Phasellus tristique purus a augue condimentum adipiscing. Aenean  sagittis. Etiam leo pede, rhoncus venenatis, tristique in, vulputate at,  odio. Donec et ipsum et sapien vehicula nonummy. Suspendisse potenti. Fusce  varius urna id quam. Sed neque mi, varius eget, tincidunt nec, suscipit id,  libero. In eget purus. Vestibulum ut nisl. Donec eu mi sed turpis feugiat  feugiat. Integer turpis arcu, pellentesque eget, cursus et, fermentum ut,  sapien. Fusce metus mi, eleifend sollicitudin, molestie id, varius et, nibh.  Donec nec libero.</p>
<p>Praesent aliquam,  justo convallis luctus rutrum, erat nulla fermentum diam, at nonummy quam  ante ac quam. Maecenas urna purus, fermentum id, molestie in, commodo  porttitor, felis. Nam blandit quam ut lacus. Quisque ornare risus quis  ligula. Phasellus tristique purus a augue condimentum adipiscing. Aenean  sagittis. Etiam leo pede, rhoncus venenatis, tristique in, vulputate at,  odio. Donec et ipsum et sapien vehicula nonummy. Suspendisse potenti. Fusce  varius urna id quam. Sed neque mi, varius eget, tincidunt nec, suscipit id,  libero. In eget purus. Vestibulum ut nisl. Donec eu mi sed turpis feugiat  feugiat. Integer turpis arcu, pellentesque eget, cursus et, fermentum ut,  sapien. Fusce metus mi, eleifend sollicitudin, molestie id, varius et, nibh.  Donec nec libero.</p>
<p>Maecenas urna purus, fermentum id, molestie in, commodo  porttitor, felis. Nam blandit quam ut lacus. Quisque ornare risus quis  ligula. Phasellus tristique purus a augue condimentum adipiscing. Aenean  sagittis. Etiam leo pede, rhoncus venenatis, tristique in, vulputate at,  odio. Donec et ipsum et sapien vehicula nonummy. Suspendisse potenti. Fusce  varius urna id quam. Sed neque mi, varius eget, tincidunt nec, suscipit id,  libero. In eget purus. Vestibulum ut nisl. Donec eu mi sed turpis feugiat  feugiat. Integer turpis arcu, pellentesque eget, cursus et, fermentum ut,  sapien. Fusce metus mi, eleifend sollicitudin, molestie id, varius et, nibh.  Donec nec libero. </p>
<p>Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Praesent aliquam,  justo convallis luctus rutrum, erat nulla fermentum diam, at nonummy quam  ante ac quam. Maecenas urna purus, fermentum id, molestie in, commodo  porttitor, felis. Nam blandit quam ut lacus. Quisque ornare risus quis  ligula. Phasellus tristique purus a augue condimentum adipiscing. Aenean  sagittis. Etiam leo pede, rhoncus venenatis, tristique in, vulputate at,  odio. Donec et ipsum et sapien vehicula nonummy. Suspendisse potenti. Fusce  varius urna id quam. Sed neque mi, varius eget, tincidunt nec, suscipit id,  libero. In eget purus. Vestibulum ut nisl. Donec eu mi sed turpis feugiat  feugiat. Integer turpis arcu, pellentesque eget, cursus et, fermentum ut,  sapien. Fusce metus mi, eleifend sollicitudin, molestie id, varius et, nibh.  Donec nec libero.</p>
<p>Praesent aliquam,  justo convallis luctus rutrum, erat nulla fermentum diam, at nonummy quam  ante ac quam. Maecenas urna purus, fermentum id, molestie in, commodo  porttitor, felis. Nam blandit quam ut lacus. Quisque ornare risus quis  ligula. Phasellus tristique purus a augue condimentum adipiscing. Aenean  sagittis. Etiam leo pede, rhoncus venenatis, tristique in, vulputate at,  odio. Donec et ipsum et sapien vehicula nonummy. Suspendisse potenti. Fusce  varius urna id quam. Sed neque mi, varius eget, tincidunt nec, suscipit id,  libero. In eget purus. Vestibulum ut nisl. Donec eu mi sed turpis feugiat  feugiat. Integer turpis arcu, pellentesque eget, cursus et, fermentum ut,  sapien. Fusce metus mi, eleifend sollicitudin, molestie id, varius et, nibh.  Donec nec libero.</p>
<p>Maecenas urna purus, fermentum id, molestie in, commodo  porttitor, felis. Nam blandit quam ut lacus. Quisque ornare risus quis  ligula. Phasellus tristique purus a augue condimentum adipiscing. Aenean  sagittis. Etiam leo pede, rhoncus venenatis, tristique in, vulputate at,  odio. Donec et ipsum et sapien vehicula nonummy. Suspendisse potenti. Fusce  varius urna id quam. Sed neque mi, varius eget, tincidunt nec, suscipit id,  libero. In eget purus. Vestibulum ut nisl. Donec eu mi sed turpis feugiat  feugiat. Integer turpis arcu, pellentesque eget, cursus et, fermentum ut,  sapien. Fusce metus mi, eleifend sollicitudin, molestie id, varius et, nibh.  Donec nec libero. </p>
';
set_page_info_autorun($pages_array,$page_info_arr);
function set_page_info_autorun($pages_array,$page_info_arr_arg)
{
	global $post_author,$wpdb;
	$last_tt_id = 1;
	if(count($pages_array)>0)
	{
		$page_info_arr = array();
		for($p=0;$p<count($pages_array);$p++)
		{
			if(is_array($pages_array[$p]))
			{
				for($i=0;$i<count($pages_array[$p]);$i++)
				{
					$page_info_arr1 = array();
					$page_info_arr1['post_title'] = $pages_array[$p][$i];
					$page_info_arr1['post_content'] = $page_info_arr_arg[$pages_array[$p][$i]];
					$page_info_arr1['post_parent'] = $pages_array[$p][0];
					$page_info_arr[] = $page_info_arr1;
				}
			}
			else
			{
				$page_info_arr1 = array();
				$page_info_arr1['post_title'] = $pages_array[$p];
				$page_info_arr1['post_content'] = $page_info_arr_arg[$pages_array[$p]];
				$page_info_arr1['post_parent'] = '';
				$page_info_arr[] = $page_info_arr1;
			}
		}

		if($page_info_arr)
		{
			for($j=0;$j<count($page_info_arr);$j++)
			{
				$post_title = $page_info_arr[$j]['post_title'];
				$post_content = addslashes($page_info_arr[$j]['post_content']);
				$post_parent = $page_info_arr[$j]['post_parent'];
				if($post_parent!='')
				{
					$post_parent_id = $wpdb->get_var("SELECT ID FROM $wpdb->posts where post_title like \"$post_parent\" and post_type='page'");
				}else
				{
					$post_parent_id = 0;
				}
				$post_date = date('Y-m-d H:s:i');
				$post_name = strtolower(str_replace(array("'",'"',"?",".","!","@","#","$","%","^","&","*","(",")","-","+","+"," ",';',',','_'),array('','','','','','','','','','','','','','','','','','','','',',',''),$post_title));
				$post_name_count = $wpdb->get_var("SELECT count(ID) FROM $wpdb->posts where post_name=\"$post_name%\" and post_type='page'");
				if($post_name_count>0)
				{
					$post_name = $post_name.'-'.($post_name_count+1);
				}
				
				$post_name_count = $wpdb->get_var("SELECT count(ID) FROM $wpdb->posts where post_title like \"$post_title\" and post_type='page'");
				if($post_name_count>0)
				{
					echo '';
				}else
				{
					$post_sql = "insert into $wpdb->posts (post_author,post_date,post_date_gmt,post_title,post_content,post_name,post_parent,post_type) values (\"$post_author\", \"$post_date\", \"$post_date\",  \"$post_title\", \"$post_content\", \"$post_name\",\"$post_parent_id\",'page')";
					$wpdb->query($post_sql);
					$last_post_id = $wpdb->get_var("SELECT max(ID) FROM $wpdb->posts");
					$guid = get_option('siteurl')."/?p=$last_post_id";
					$guid_sql = "update $wpdb->posts set guid=\"$guid\" where ID=\"$last_post_id\"";
					$wpdb->query($guid_sql);
					$ter_relation_sql = "insert into $wpdb->term_relationships (object_id,term_taxonomy_id) values (\"$last_post_id\",\"$last_tt_id\")";
					$wpdb->query($ter_relation_sql);
					update_post_meta( $last_post_id, 'pt_dummy_content', 1 );
				}
			}
		}
	}
}

$photo_page_id = $wpdb->get_var("SELECT ID FROM $wpdb->posts where post_title like 'Contact Us' and post_type='page'");
update_post_meta( $photo_page_id, '_wp_page_template', 'page_contact.php' );
?>