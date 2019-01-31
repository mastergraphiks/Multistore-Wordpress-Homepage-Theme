<?php
error_reporting(E_ERROR);
global $Cart,$General;
$itemsInCartCount = $Cart->cartCount();
$cartAmount = $Cart->getCartAmt();
global $current_user;
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head profile="http://gmpg.org/xfn/11">
<title>
<?php if ( is_home() ) { ?><?php bloginfo('description'); ?>&nbsp;|&nbsp;<?php bloginfo('name'); ?><?php } ?>
<?php if ( is_search() ) { ?>Search Results&nbsp;|&nbsp;<?php bloginfo('name'); ?><?php } ?>
<?php if ( is_author() ) { ?>Author Archives&nbsp;|&nbsp;<?php bloginfo('name'); ?><?php } ?>
<?php if ( is_single() ) { ?><?php wp_title(''); ?><?php } ?>
<?php if ( is_page() ) { ?><?php wp_title(''); ?><?php } ?>
<?php if ( is_category() ) { ?><?php single_cat_title(); ?>&nbsp;|&nbsp;<?php bloginfo('name'); ?><?php } ?>
<?php if ( is_month() ) { ?><?php the_time('F'); ?>&nbsp;|&nbsp;<?php bloginfo('name'); ?><?php } ?>
<?php if (function_exists('is_tag')) { if ( is_tag() ) { ?><?php bloginfo('name'); ?>&nbsp;|&nbsp;Tag Archive&nbsp;|&nbsp;<?php single_tag_title("", true); } } ?>
</title>

<meta http-equiv="Content-Type" content="<?php bloginfo('html_type'); ?>; charset=<?php bloginfo('charset'); ?>" />
<?php if (is_home()) { ?><?php if ( get_option('ptthemes_meta_description') <> "" ) { ?>
<meta name="description" content="<?php echo stripslashes(get_option('ptthemes_meta_description')); ?>" />
<?php } ?><?php if ( get_option('ptthemes_meta_keywords') <> "" ) { ?>
<meta name="keywords" content="<?php echo stripslashes(get_option('ptthemes_meta_keywords')); ?>" />
<?php } ?><?php if ( get_option('ptthemes_meta_author') <> "" ) { ?>
<meta name="author" content="<?php echo stripslashes(get_option('ptthemes_meta_author')); ?>" /><?php } ?><?php } ?>
<link rel="stylesheet" type="text/css" href="<?php bloginfo('stylesheet_url'); ?>" media="screen" /><?php if ( get_option('ptthemes_favicon') <> "" ) { ?>
<link rel="shortcut icon" type="image/png" href="<?php echo get_option('ptthemes_favicon'); ?>" /><?php } ?>
<link rel="alternate" type="application/rss+xml" title="RSS 2.0" href="<?php if ( get_option('ptthemes_feedburner_url') <> "" ) { echo get_option('ptthemes_feedburner_url'); } else { echo get_bloginfo_rss('rss2_url'); } ?>" /><link rel="pingback" href="<?php bloginfo('pingback_url'); ?>" />
<link rel="stylesheet" type="text/css" href="<?php bloginfo('template_directory'); ?>/library/css/print.css" media="print" />
<!--[if lt IE 7]>
<script type="text/javascript" src="<?php bloginfo('template_directory'); ?>/library/js/pngfix.js"></script>

<![endif]-->
<?php if ( get_option('ptthemes_scripts_header') <> "" ) { echo stripslashes(get_option('ptthemes_scripts_header')); } ?>
<link href="<?php bloginfo('template_directory'); ?>/library/css/dropdownmenu.css" rel="stylesheet" type="text/css" />
         
<!--For Menu -->
<?php wp_head(); ?>
<?php if ( get_option('ptthemes_customcss') ) { ?>
<link href="<?php bloginfo('template_directory'); ?>/custom.css" rel="stylesheet" type="text/css">
<?php } ?>
</head>
<body <?php body_class(); ?>>

	<div id="header" class="clearfix">
    
    	<div class="h_left">
    	 <?php if ( get_option('ptthemes_show_blog_title') ) { ?>
                    <div class="blog-title"><a href="<?php echo get_option('home'); ?>/"><?php bloginfo('name'); ?></a> </div>
                <p class="blog-description">
                  <?php bloginfo('description'); ?>
                </p>
                
                <?php } else { ?>
                <a href="<?php echo get_option('home'); ?>/"><img src="<?php if ( get_option('ptthemes_logo_url') <> "" ) { echo get_option('ptthemes_logo_url'); } else { echo get_bloginfo('template_directory').'/images/logo.png'; } ?>" alt="<?php bloginfo('name'); ?>" class="logo"  /></a>             
                <?php } ?>
                </div> <!-- h_left #end-->
                
                
                <div class="h_right">
                     
        <?php if (function_exists('dynamic_sidebar') && dynamic_sidebar('Top Strip Navigation') ){}else{  ?>	        			
 		<ul >
        
         <li ><a href="<?php echo get_option('home'); ?>"> Home </a></li> 
             
                        
              <?php
         if($General->is_show_storepage())
		 {
		 ?>
      
      
      <?php
		 }
		 ?>
	   	 <?php wp_list_pages('title_li=&depth=0&exclude=' . get_inc_pages("pag_exclude_") .'&sort_column=menu_order'); ?>
        
         
         
         
			
	  </ul>
      <?php }?>
        				
                        
        
        
                    
					
                    
                   <?php
                   if($General->is_storetype_shoppingcart() || $General->is_storetype_digital()){
				   ?>
                    <div class="cart">
                    	 <span class="bag"> <?php _e('You have');?> <strong >
                        <a href="<?php echo get_option('siteurl'); ?>/?page=cart"><strong> <span id="cart_information_span"><?php echo $itemsInCartCount . "(".$General->get_currency_symbol()."$cartAmount)";?></span></strong></a>  
                        </strong> <?php _e(SHOPPING_CART_CONTENT_TEXT);?>   </span>
                        
                        
                        <?php 
					//print_r($current_user->data->user_nicename);
					if($current_user->data->ID)
				   {
				   ?>
     	 <p>  <?php _e(WELCOME_TEXT);?> <strong><?php echo $current_user->data->user_nicename;?></strong>, <br />  <a href="<?php echo get_option('siteurl'); ?>/?page=myaccount"><?php _e(MY_ACCOUNT_TEXT);?></a> | <a href="<?php echo get_option('siteurl'); ?>/?page=login&amp;action=logout"><?php _e(LOGOUT_TEXT);?></a>   </p>
      <?php
				   }else
				   {
				   ?>
     				<p>  <?php _e(HELLO_GUEST_TEXT);?>, <a href="<?php echo get_option('siteurl'); ?>/?page=login"><?php _e(LOGIN_TEXT);?></a> | <a href="<?php echo get_option('siteurl'); ?>/?page=login"><?php _e(REGISTER_TEXT);?></a>   </p>
     			 	<?php
				   }
					?>
                                          
                    </div> <!-- cart #end -->
                    <?php }?>
                    
                    
      </div>
                
    </div> <!-- #header #end -->
    
    <div id="main_navi" class="clearfix"  >
    	<div id="main_navi_in">
     <?php if (function_exists('dynamic_sidebar') && dynamic_sidebar('Header Navigation') ){}else{  ?>	
      <?php 
	 		echo " <ul id='nav'>";
			$ex_catIdArr = get_categories('exclude=9999999' . get_inc_categories("cat_exclude_") .',1');
			$catIdArr = array();
			foreach($ex_catIdArr as $ex_catIdArrObj)
			{
				$catIdArr[] = $ex_catIdArrObj->term_id;
			}
			$includeCats = implode(',',$catIdArr);
			wp_list_categories('orderby=name&title_li=&include='.$includeCats);
		?>
        
        <?php
 		global $wpdb;
 		$blogcatname = get_option('ptthemes_blogcategory');
 		$catid = $wpdb->get_var("SELECT term_ID FROM $wpdb->terms WHERE name = '$blogcatname'");
   		 ?>
         
         <?php
         if($General->is_show_blogpage())
		 {
			 
		 ?>
     <?php $General->show_blog_link_header_nav(); ?>
      <?php
		 }
		 ?>
         
          </ul>
        
        <?php }?>
      </div>
  </div> 
  
  
   <div id="search_section">
    	 <div id="search_section_in">
         		<?php  include(TEMPLATEPATH."/searchform.php");?>
                
                <div class="subscribe" >
               <form  action="http://feedburner.google.com/fb/a/mailverify" method="post" target="popupwindow"  onsubmit="window.open('http://feedburner.google.com/fb/a/mailverify?uri=<?php echo stripslashes(get_option('ptthemes_feedburner_id'));  ?>', 'popupwindow', 'scrollbars=yes,width=550,height=520');return true">
               <input type="text" class="field" onFocus="if (this.value == 'signup for email') {this.value = '';}" 
               onBlur="if (this.value == '') {this.value = 'signup for email';}" name="email"/>
              <input type="hidden" value="<?php echo stripslashes(get_option('ptthemes_feedburner_id'));  ?>" name="uri"/><input type="hidden" name="loc" value="en_US"/>
               <input type="image" src="<?php bloginfo('template_url'); ?>/images/none.png"  class="replace"  value="Subscribe"  />
               </form>
             </div>
            
            
         </div>
       </div>   