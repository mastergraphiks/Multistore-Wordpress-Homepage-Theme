<?php get_header(); ?>
<div id="page" class="clearfix">

	<div class="breadcrumb clearfix">
      <?php if ( get_option( 'ptthemes_breadcrumbs' )) { yoast_breadcrumb('',' &raquo; '.__(PAY_CANCELATION_TITLE)); } ?>
     </div> <!-- breadcrumbs #end -->
                
                
         <div id="content">      
     
				<h1 class="head"><?php _e(PAY_CANCELATION_TITLE); ?> </h1>
  
 		<table width="100%"><tr><td>&nbsp;</td></tr>
<tr><td>
<?php
global $upload_folder_path;
$destinationfile =   ABSPATH . $upload_folder_path."notification/message/payment_cancel_paypal.txt";
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
<h2><?php _e(PAY_CANCEL_MSG); ?></h2>
<?php
}
?>
</td></tr>
</table>
        
 	                    
  			  </div> <!-- content #end -->
 		 <?php get_sidebar(); ?>
  </div> <!-- page #end -->
 <?php get_footer(); ?>