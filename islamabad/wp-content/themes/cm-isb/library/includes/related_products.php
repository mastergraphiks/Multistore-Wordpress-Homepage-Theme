<?php
global $General;
$post_array = $General->get_post_array($post->ID);
?>
<div class="realated_product_section clearfix">
  <h3><?php _e('Related Posts');?></h3>
  <ul class="realated_products">
<?php
if($post_array)
{
	$relatedprd_count = 0;
	foreach($post_array as $postval)
	{
		$product_id = $postval->ID;
		$product_post_title = $postval->post_title;
		$productlink = $postval->guid;
		if($postval->post_status == 'publish')
		{
	?>
		<?php
	$image_array = $General->get_post_image($product_id);
	//$imagepath = WP_CONTENT_DIR.str_replace(get_option( 'siteurl' ).'/wp-content','',$image_array[0]);
	//if($image_array[0]!='' && file_exists($imagepath))
	if($image_array[0]!='')
	{
		$relatedprd_count++;
	?>
		<li>
		<?php
				if($Product->get_product_price_sale($product_id)>0)
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
		
		 <a href="<?php echo $productlink;?>" class="product_thumb" ><img src="<?php echo bloginfo('template_url'); ?>/thumb.php?src=<?php echo $image_array[0]; ?>&amp;w=130&amp;zc=1&amp;q=80<?php echo $thumb_url;?>" title="<?php echo $product_post_title;?>" alt="<?php echo $product_post_title;?>"/></a>
		  <?php
		}
		?>
		  <a href="<?php echo $productlink;?>"><?php echo $product_post_title;?></a> </li>
		<?php
		}
		if($relatedprd_count==4)
		{
			break;
		}
	}
	
}
?>
  </ul>
</div>
