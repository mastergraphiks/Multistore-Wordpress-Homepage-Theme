    <div id="footer" class="clearfix">
    
    
    
    
    		<div class="connetwithus">
            	 <?php if (function_exists('dynamic_sidebar') && dynamic_sidebar(2) )  ?> 
            </div>
            
            <div class="connetwithus">
            	<h3>Other Links</h3>
            	  <?php if ( get_option('ptthemes_footerpages') <> "" ) { ?>
                    <ul class="fnav">
                    <?php wp_list_pages('title_li=&depth=0&include=' . get_option('ptthemes_footerpages') . '&sort_column=menu_order'); ?>
                    </ul>
				<?php } ?>
            </div>
            
            <div class="livehelp">
            	<?php if (function_exists('dynamic_sidebar') && dynamic_sidebar(3) )  ?> 
            </div>
         	
            
            
            <div class="copyrights">
            <p > &copy; <?php the_time('Y'); ?> <?php bloginfo(); ?>  All rights reserved. </p>
            <p> <span class="designby"> Design & Developed by: Laila & Maria BSIT(07-11) </span>  <br /> <br />
            
            	<img src="<?php bloginfo('template_directory'); ?>/images/secure_payment.png" alt=""  />
            
            </div>
            
            
            
           
     </div><!-- footer #end -->

 <?php wp_footer(); ?><?php if ( get_option('ptthemes_google_analytics') <> "" ) { echo stripslashes(get_option('ptthemes_google_analytics')); } ?>

<?php if(is_home()){ // home page slider jquery ?>
<?php /*?><script type="text/javascript" src="<?php bloginfo('template_directory'); ?>/library/js/jquery-1.2.6.min.js"></script><?php */?>
<?php 
}
elseif(get_option('permalink_structure') == '')
{
?>
<script type="text/javascript" src="<?php bloginfo('template_directory'); ?>/library/js/jquery-1.2.6.min.js"></script>
<?php
}
?>

</body>

</html>
		