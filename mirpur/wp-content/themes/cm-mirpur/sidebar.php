<?php 
session_start();
ob_start();
global $Cart,$General;
$itemsInCartCount = $Cart->cartCount();
$cartInfo = $Cart->getcartInfo();
?>
<div id="sidebar">
    <?php
    if($General->is_storetype_shoppingcart() || $General->is_storetype_digital())
	{
	?>
    <div class="widget">
        <h3><?php _e(SHOPPING_CART_TEXT);?></h3>
        
       <?php
	   global $Cart,$General;
		$itemsInCartCount = $Cart->cartCount();
		$cartInfo = $Cart->getcartInfo();
       if($itemsInCartCount>0)
	   {
	   ?>
      	<div class="shipping_section clearfix" id="cart_content_sidebar">
         <div class="shipping_title clearfix"> <span class="pro_s"> <?php _e('Product');?></span> <span class="pro_q"> <?php _e('Qty');?></span> <span class="pro_p"> <?php _e('Price');?></span> </div>
		 <?php
         for($i=0;$i<count($cartInfo);$i++)
		 {
		 	$grandTotal = $General->get_currency_symbol().number_format($Cart->getCartAmt(),2);
		 ?>
            <div class="shipping_row clearfix"> <span class="pro_s"> <?php echo $cartInfo[$i]['product_name'];?> <?php if($cartInfo[$i]['product_att']){ echo "<br>".$cartInfo[$i]['product_att'];} //echo "<br>".preg_replace('/([(])([+-])([0-9]*)([)])/','',$cartInfo[$i]['product_att']);}?></span> <span class="pro_q"><?php echo $cartInfo[$i]['product_qty'];?></span> <span class="pro_p"> <?php echo $General->get_currency_symbol().number_format($cartInfo[$i]['product_gross_price'],2);?></span> </div>
        <?php }?>
        <div class="shipping_total"><?php _e('Total');?> : <?php echo $grandTotal;?> </div>
        
        <p class="fl" ><a href="<?php echo get_option('siteurl');?>/?page=cart" class="b_viewcart"> <?php _e(VIEW_CART_TEXT);?> </a></p>
        
        <div class="b_checkout">
        <?php
		if($_REQUEST['page']=='cart'){
		?>
		 <a href="<?php echo get_option('siteurl');?>/?page=checkout"><?php _e(CHECKOUT_TEXT);?> &raquo;</a>
		<?php	
		}else{
		?>
		<a href="<?php echo get_option('siteurl');?>/?page=cart"><?php _e(CHECKOUT_TEXT);?> &raquo; </a>
		<?php }?>
         </div>
        </div> 
       <?php
	   }else
	   {
	   ?>
        <div class="shipping_section clearfix" id="cart_content_sidebar"><strong><?php _e(SHOPPING_CART_EMPTY_MSG);?></strong></div>
        <?php
        }
		?>
        </div> <!-- widget #end-->
     <?php
     }
	 ?>   
        
        
       <div class="widget"><h3><span><?php _e(CATEGORIES_TEXT);?></span></h3>
       <ul>
        <?php
					$ex_catIdArr = get_categories('exclude=9999999' . get_inc_categories("cat_exclude_") .',1');
					$catIdArr = array();
					foreach($ex_catIdArr as $ex_catIdArrObj)
					{
						$catIdArr[] = $ex_catIdArrObj->term_id;
					}
					$includeCats = implode(',',$catIdArr);
					
					wp_list_categories('orderby=name&title_li=&include='.$includeCats);
					?>
 		</ul>
      
        <?php
       // $order_catids = '41,49,47,39';
       // categories_list_sidebar('orderby=name&title_li=&include='.$includeCats,$order_catids);
		?>
        
        
        <?php if ( function_exists('dynamic_sidebar') && (is_sidebar_active(1)) ) { // Show on the front page ?>
									<?php dynamic_sidebar(1); ?>  
                             <?php } ?>
        
    </div> <!-- siderbar #end -->
 </div>