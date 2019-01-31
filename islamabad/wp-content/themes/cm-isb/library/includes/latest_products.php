<?php
$totalpost_count = 0;
$limit = 1000;
$blogCategoryIdStr = str_replace(',',',-',get_inc_categories("cat_exclude_"));
query_posts('showposts=' . $limit . '&cat='.$blogCategoryIdStr);
if(have_posts())
{
	while(have_posts())
	{
		 the_post();
		$totalpost_count++;
	}
}
//echo $totalpost_count;
$limit = 10; // number of post per page for home page

$posts_per_page_homepage = $limit;
global $paged;
$blogCategoryIdStr = str_replace(',',',-',get_inc_categories("cat_exclude_"));
query_posts('showposts=' . $limit . '&paged=' . $paged .'&cat='.$blogCategoryIdStr);
?>
<?php
 if(have_posts())
 {
 ?>
 <ul id="mycarousel" class="jcarousel-skin-tango">
        <?php
        while(have_posts())
        {
            the_post();
            $data = get_post_meta( $post->ID, 'key', true );
            $product_price = $Product->get_product_price($post->ID);
            ?>
            <li>
           
            <?php
			if($Product->get_product_price_sale($post->ID)>0)
			{
			?>
            <img src="<?php bloginfo('template_directory'); ?>/images/sale.png" alt="" class="sale_img" />
            <?php
			}else
			{
			?>
            <?php
			}
			?>
          
                  <a href="<?php the_permalink() ?>" class="product_thumb" > 
                   <img title="<?php echo the_title();?>" src="<?php echo bloginfo('template_url'); ?>/thumb.php?src=<?php echo $data[ 'productimage' ]; ?>&amp;w=162&amp;zc=1&amp;q=80<?php echo $thumb_url;?>" alt=""  /></a>
                   
                     <p><a href="<?php the_permalink() ?>" title="Permanent Link to <?php the_title_attribute(); ?>">
			<?php
          	echo substr($post->post_title,0,18);
			if(strlen($post->post_title)>19)
			{
				echo "...";
			}
			?></a> <br /> 
            
            	<span class="price"><?php
				if($Product->get_product_price_sale($post->ID)>0)
				{
					 echo '<s>'.$General->get_currency_symbol() . number_format($Product->get_product_price_only($post->ID),2).'</s>&nbsp;';
					 echo '<b>'.$General->get_currency_symbol() . $Product->get_product_price_sale($post->ID).'</b>';
					 
				}else
				{
					if($General->is_storetype_catalog())
					 {
						if($Product->get_product_price_only($post->ID)>0)
						{
							echo $General->get_currency_symbol() . number_format($Product->get_product_price_only($post->ID),2);	
						}
					 }else
					 {
						echo $General->get_currency_symbol() . number_format($Product->get_product_price_only($post->ID),2);
					 }
				 }
				 ?> </span>
            
            </p> 
            
            
           
                   
             </li>
        <?php
        }
        ?>
      </ul>
      
      <?php
 }
 ?>
      
<a href="<?php echo get_option('siteurl')."/?page=store";?>" class="highlight_button fr" ><?php _e('View Store');?> &raquo;</a>
  <?php 
global $Cart,$General;
$itemsInCartCount = $Cart->cartCount();
$cartAmount = $Cart->getCartAmt();
?><!-- sidebar #end -->