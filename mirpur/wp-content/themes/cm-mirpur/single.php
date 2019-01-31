<?php 
session_start();
ob_start();
get_header(); 
global $Product,$Cart, $General;
$product_price = $Product->get_product_price($post->ID);
$product_cart_price = $Product->get_product_price_no_currency($post->ID);
$product_qty = $Product->get_product_qty($post->ID);
$product_size =$Product->get_product_custom_dl($post->ID,'size','','',__('Select Size'));
$product_color = $Product->get_product_custom_dl($post->ID,'color','','',__('Select Color'));

$product_tax = $General->get_product_tax();
$customarray = array('size','color');
//$product_custom_dl_jscript = $Product->get_product_custom_dl_jscript($post->ID,$customarray);
$data = get_post_meta( $post->ID, 'key', true );
?>
<?php get_header(); ?>

<script> var closebutton='<?php bloginfo('template_directory'); ?>/library/js/closebox.png'; </script>
<script type="text/javascript" src="<?php bloginfo('template_directory'); ?>/library/js/jquery.js"></script>
<script type="text/javascript" src="<?php bloginfo('template_directory'); ?>/library/js/fancyzoom.js"></script>
<link href="<?php bloginfo('template_directory'); ?>/library/css/thickbox.css" rel="stylesheet" type="text/css" />
<script type="text/javascript" charset="utf-8">
$(document).ready(function() {
	$('div.photo a').fancyZoom({scaleImg: true, closeOnClick: true});
	$('#medium_box_link').fancyZoom({width:400, height:300});
	$('#large_box_link').fancyZoom();
	$('#flash_box_link').fancyZoom();
});
</script>
<script type="text/javascript">
$(document).ready(function(){

$('.hide').hide();

$('body').append('<div id="infoBacking"></div><div id="infoHolder" class="large"></div>');
$('#infoBacking').css({position:'absolute', left:0, top:0, display:'none', textAlign:'center', background:'', zIndex:'600'});
$('#infoHolder').css({left:0, top:0, display:'none', textAlign:'center', zIndex:'600', position:'absolute'});
if($.browser.msie){$('#infoHolder').css({position:'absolute'});}


$('.more').mouseover(function() {$(this).css({textDecoration:'none'});} );
$('.more').mouseout(function() {$(this).css({textDecoration:'none'});} );

$('.more').click(function(){

if ($('.' + $(this).attr("title")).length > 0) {

	browserWindow()
	getScrollXY()

	if (height<totalY) { height=totalY; }

	$('#infoBacking').css({width: totalX + 'px', height: height + 'px', top:'0px', left:scrOfX + 'px', opacity:0.85});
	$('#infoHolder').css({width: width + 'px', top:scrOfY + 25 + 'px', left:scrOfX + 'px'});
	source = $(this).attr("title");

	$('#infoHolder').html('<div id="info">' + $('.' + source).html() + '<p class="clear"><span class="close">Close X</span></p></div>');

	$('#infoBacking').css({display:'block'});
	$('#infoHolder').show();
	$('#info').fadeIn('slow');
}

$('.close').click(function(){
	$('#infoBacking').hide();
	$('#infoHolder').fadeOut('fast');
});

});

/* find browser window size */
function browserWindow () {
	width = 0
	height = 0;
	if (document.documentElement) {
		width = document.documentElement.offsetWidth;
		height = document.documentElement.offsetHeight;
	} else if (window.innerWidth && window.innerHeight) {
		width = window.innerWidth;
		height = window.innerHeight;
	}
	return [width, height];
}
/* find total page height */
function getScrollXY() {
	scrOfX = 0; 
	scrOfY = 0;
	if( typeof( window.pageYOffset ) == 'number' ) {
		scrOfY = window.pageYOffset;
		scrOfX = window.pageXOffset;
	} else if( document.body && ( document.body.scrollLeft || document.body.scrollTop ) ) {
		scrOfY = document.body.scrollTop;
		scrOfX = document.body.scrollLeft;
	} else if( document.documentElement && ( document.documentElement.scrollLeft || document.documentElement.scrollTop ) ) {
		scrOfY = document.documentElement.scrollTop;
		scrOfX = document.documentElement.scrollLeft;
	}
	totalY = (window.innerHeight != null? window.innerHeight : document.documentElement && document.documentElement.clientHeight ? document.documentElement.clientHeight : document.body != null ? document.body.clientHeight : null);

	totalX = (window.innerWidth != null? window.innerWidth : document.documentElement && document.documentElement.clientWidth ? document.documentElement.clientWidth : document.body != null ? document.body.clientWidth : null);
	
	return [ scrOfX, scrOfY, totalY, totalX ];
}

return false;
				});
				</script>
<div id="page" class="clearfix">
	<div class="breadcrumb clearfix">
      	<?php 
		if(have_posts())
		{
			if ( get_option( 'ptthemes_breadcrumbs' )) { yoast_breadcrumb('',''); }
		} ?>
     </div> <!-- breadcrumbs #end -->
         <div id="content">      
				
         <?php
		$blogCategoryIdStr = get_inc_categories("cat_exclude_");
		$blogCategoryIdArr = explode(',',$blogCategoryIdStr);
		if(have_posts())
		{
			$post_count = 1;
			while(have_posts())
			{
				$post_count++;
				the_post();
				$cagInfo = get_the_category();
				$postCatId = $cagInfo[0]->term_id;
				if(!in_array($postCatId,$blogCategoryIdArr))  //DISPLAY PRODUCT
				{
					include (TEMPLATEPATH . "/library/includes/product_detail.php");
				}else ///DISPLAY BLOG POST
				{
					include (TEMPLATEPATH . "/library/includes/blog_detail.php");
				}
			
			if($post_count>1)
			{
				break;
			}
			}
		}else
		{
			?>
             <div class="posts">
          <div class="entry-head">
            <h2><?php echo get_option('ptthemes_404error_name'); ?></h2>
          </div>
          <div class="entry-content">
            <p><?php echo get_option('ptthemes_404solution_name'); ?></p>
          </div>
        </div>
            <?php
		}
		 ?>       
  			  </div> <!-- content #end -->
 		 <?php get_sidebar(); ?>
  </div> <!-- page #end -->
 <?php get_footer(); ?>