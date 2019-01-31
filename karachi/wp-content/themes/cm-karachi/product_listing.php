<?php
/*
Template Name: Product Listing Page
*/
?>
<?php get_header(); 
global $Product,$Cart;
?>
<?php get_header(); ?>
<div id="page" class="clearfix">

	<div class="breadcrumb clearfix">
      	<?php if ( get_option( 'ptthemes_breadcrumbs' )) { yoast_breadcrumb('',''); } ?>
     </div> <!-- breadcrumbs #end -->
                
                
         <div id="content" class="full_width">        
     
			<h1 class="head"><?php single_cat_title(); ?></h1>
     	
<?php
if(have_posts())
{
?>
 <script type="text/javascript" src="<?php bloginfo('template_directory'); ?>/library/js/jquery-latest.js"></script>
<script type="text/javascript">
$(document).ready(function(){
 
	$("a.switch_thumb").toggle(function(){
	  $(this).addClass("swap"); 
	  $("ul.display").fadeOut("fast", function() {
		$(this).fadeIn("fast").removeClass("thumb_view");
		 });
	  }, function () {
	  $(this).removeClass("swap");
	  $("ul.display").fadeOut("fast", function() {
		$(this).fadeIn("fast").addClass("thumb_view"); 
		});
	}); 

});
</script>
       <a href="#" class="switch_thumb swap"><?php _e('Switch View');?></a>
        <div class="clearfix"></div>
      <ul style="display: block;" class="display thumb_view">
        <?php
		$postcounter = 0;
        while(have_posts())
        {
            the_post();
			$postcounter++;
            $data = get_post_meta( $post->ID, 'key', true );
            $product_price = $Product->get_product_price($post->ID);
            ?>
        <li>
          <div class="content_block"> <a href="<?php the_permalink() ?>" class="product_thumb"><img src="<?php echo bloginfo('template_url'); ?>/thumb.php?src=<?php echo $data[ 'productimage' ]; ?>&amp;w=161&amp;zc=1&amp;q=80<?php echo $thumb_url;?>" alt=""  /></a>
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
            <div class="content">
              <h3><a href="<?php the_permalink() ?>" title="Permanent Link to <?php the_title_attribute(); ?>">
                <?php the_title(); ?>
                </a></h3>
              <p class="contentp"><?php echo bm_better_excerpt(700, ' ... '); ?></p>
              <p class="sale_price" >
              <?php
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
			 ?>
			  <?php /*?><?php echo $General->get_currency_symbol() . number_format($Product->get_product_price_only($post->ID),2); ?><?php */?>
               </p>
              <div class="viewdetails"> <a href="<?php the_permalink() ?>" title="<?php the_title_attribute(); ?>" class="b_viewdetails fl"><?php _e('View Details');?> &raquo;</a> </div>
            </div>
          </div>
          <!-- content block #end -->
        </li>
        <?php
				if($postcounter%5==0)
				{
				echo '<li class="product_sepretor"></li>';
				}
			?>
        <?php
        }
        ?>
      </ul>
 
  <div class="clearfix"></div>
      <div class="pagination">
        <div class="Navi">
          <?php if (function_exists('wp_pagenavi')) { ?>
          <?php wp_pagenavi(); ?>
          <?php } ?>
        </div>
      </div>    
<?php }?>                   
                 
  </div> <!-- content #end -->
 		 
         
</div> <!-- page #end -->
 
 <?php get_footer(); ?>
