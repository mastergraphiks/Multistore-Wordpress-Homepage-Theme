<?php global $is_home; ?>


	<div id="banner">
    	<?php /*?> <img src="<?php bloginfo('template_directory'); ?>/images/main_banner.png"  alt=""  /><?php */?>
        
<link rel="stylesheet" href="<?php bloginfo('template_directory'); ?>/library/css/slider.css" type="text/css" media="screen">
<script type="text/javascript" src="<?php bloginfo('template_url'); ?>/library/js/jquery-1.3.2.min.js"></script>
<script src="<?php bloginfo('template_directory'); ?>/library/js/jquery_002.js" type="text/javascript"></script>
<script type="text/javascript">
$(window).load(function() {
	$('#slider').nivoSlider({
		effect:'random', //Specify sets like: 'fold,fade,sliceDown'
		slices:15,
		animSpeed:700,
		pauseTime:3000,
		startSlide:0, //Set starting Slide (0 index)
		directionNav:true, //Next & Prev
		directionNavHide:true, //Only show on hover
		controlNav:true, //1,2,3...
		controlNavThumbs:false, //Use thumbnails for Control Nav
      controlNavThumbsFromRel:false, //Use image rel for thumbs
		controlNavThumbsSearch: '.jpg', //Replace this with...
		controlNavThumbsReplace: '_thumb.jpg', //...this in thumb Image src
		keyboardNav:true, //Use left & right arrows
		pauseOnHover:true, //Stop animation while hovering
		manualAdvance:false, //Force manual transitions
		captionOpacity:0.8, //Universal caption opacity
		beforeChange: function(){},
		afterChange: function(){},
		slideshowEnd: function(){} //Triggers after all slides have been shown
	});
});
</script>


<div  id="slider">

   <?php if ( get_option('ptthemes_banner1_url') != "") { ?>
 		<a style="display:block;" class="nivo-imageLink" href="<?php echo stripslashes(get_option('ptthemes_banner1_link'));  ?>">
        <img style="display:none;" src="<?php echo stripslashes(get_option('ptthemes_banner1_url'));  ?>" alt="" title="<?php echo stripslashes(get_option('ptthemes_banner1_caption'));  ?>" />
        </a>
        <?php } ?>
        
        <?php if ( get_option('ptthemes_banner2_url') != "") { ?>
 		<a style="display:block;" class="nivo-imageLink" href="<?php echo stripslashes(get_option('ptthemes_banner2_link'));  ?>">
        <img style="display:none;" src="<?php echo stripslashes(get_option('ptthemes_banner2_url'));  ?>" alt="" title="<?php echo stripslashes(get_option('ptthemes_banner2_caption'));  ?>" />
        </a>
        <?php } ?>
        
        <?php if ( get_option('ptthemes_banner3_url') != "") { ?>
 		<a style="display:block;" class="nivo-imageLink" href="<?php echo stripslashes(get_option('ptthemes_banner3_link'));  ?>">
        <img style="display:none;" src="<?php echo stripslashes(get_option('ptthemes_banner3_url'));  ?>" alt="" title="<?php echo stripslashes(get_option('ptthemes_banner3_caption'));  ?>" />
        </a>
        <?php } ?>
        
        
        <?php if ( get_option('ptthemes_banner4_url') != "") { ?>
 		<a style="display:block;" class="nivo-imageLink" href="<?php echo stripslashes(get_option('ptthemes_banner4_link'));  ?>">
        <img style="display:none;" src="<?php echo stripslashes(get_option('ptthemes_banner4_url'));  ?>" alt="" title="<?php echo stripslashes(get_option('ptthemes_banner4_caption'));  ?>" />
        </a>
        <?php } ?>
        
        
        <?php if ( get_option('ptthemes_banner5_url') != "") { ?>
 		<a style="display:block;" class="nivo-imageLink" href="<?php echo stripslashes(get_option('ptthemes_banner5_link'));  ?>">
        <img style="display:none;" src="<?php echo stripslashes(get_option('ptthemes_banner5_url'));  ?>" alt="" title="<?php echo stripslashes(get_option('ptthemes_banner5_caption'));  ?>" />
        </a>
        <?php } ?>
        
        <?php if ( get_option('ptthemes_homepage_features') != "") { ?>
 		<a style="display:block;" class="nivo-imageLink" href="<?php echo stripslashes(get_option('ptthemes_banner1_link'));  ?>">
        <img style="display:none;" src="<?php echo stripslashes(get_option('ptthemes_banner1_url'));  ?>" alt="" title="<?php echo stripslashes(get_option('ptthemes_banner1_caption'));  ?>" />
        </a>
        <?php } ?>
		
	</div>
        
        
    </div>

<div id="page" class="clearfix">
 
   <div id="carousel">
   
    <script type="text/javascript" src="<?php bloginfo('template_url'); ?>/library/js/jquery.jcarousel.pack.js"></script>
    <script type="text/javascript">
	jQuery(document).ready(function() {
	    jQuery('#mycarousel').jcarousel();
	});
	</script>
    <link rel="stylesheet" href="<?php bloginfo('template_url'); ?>/library/css/carousel.css" type="text/css" media="screen" title="default" />
    
    <?php include(TEMPLATEPATH . '/library/includes/tpl_latest_products.php'); ?>
    
  </div>
 





<?php /*?>
<div id="slider">
 	<div class="slider_top">
		<div class="slider_bottom">

                 	 <?php  if ( function_exists('dynamic_sidebar') && (is_sidebar_active(1)) ) { // Show on the front page ?>
							<?php  dynamic_sidebar(1); ?>  
                     <?php } ?>
                </div>
              </div>
            </div> <!-- slider #end -->
            
            
            <div class="front_advt" >
            	 <?php if ( function_exists('dynamic_sidebar') && (is_sidebar_active(2)) ) { // Show on the front page ?>
						<?php dynamic_sidebar(2); ?>  
                 <?php } ?>
            </div>
              
             <h4 class="clearboth">Latest Posts</h4>
              <?php include(TEMPLATEPATH . '/library/includes/tpl_latest_products.php'); ?><?php */?>
              
<!--For Slider -->
 </div>         