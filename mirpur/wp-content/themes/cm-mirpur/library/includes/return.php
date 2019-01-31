 <?php get_header(); ?>
<div id="page" class="clearfix">

	<div class="breadcrumb clearfix">
      <?php if ( get_option( 'ptthemes_breadcrumbs' )) { yoast_breadcrumb('',' &raquo; '.__(PAYMENT_SUCCESS_TITLE)); } ?>
     </div> <!-- breadcrumbs #end -->
                
                
         <div id="content">      
     
				<h1 class="head"><?php _e(PAYMENT_SUCCESS_TITLE);?></h1>
  
<?php
global $upload_folder_path;
$destinationfile =   ABSPATH . $upload_folder_path."notification/message/payment_success_paypal.txt";
if(file_exists($destinationfile))
{
	$filecontent = file_get_contents($destinationfile);
}
?>
<?php
$store_name = get_option('blogname');
$search_array = array('[#$store_name#]');
$replace_array = array($store_name);
$filecontent = str_replace($search_array,$replace_array,$filecontent);
if($filecontent)
{
echo $filecontent;
}else
{
?> 
<h4><?php _e(PAYMENT_SUCCESS_MSG1); ?></h4>
<h6><?php _e(PAYMENT_SUCCESS_MSG2); ?></h6>
<h6><?php _e(PAYMENT_SUCCESS_MSG3.' '.get_option('blogname').'.'); ?></h6>
<?php
}
?>
                    
  			  </div> <!-- content #end -->
 		 <?php get_sidebar(); ?>
  </div> <!-- page #end -->
 <?php get_footer(); ?>