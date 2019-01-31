<?php get_header(); ?>

<div id="page" class="clearfix">

          <div id="content"> 
          
            	<h1 class="head"><?php _e('404 Error Page');?></h1>
            
             
                     
                        <div class="pagespot">
                
                            <div class="post archive-spot">
                                                                                    
                                <h2><?php _e(get_option('ptthemes_404error_name')); ?></h2>
                                
                                <div class="cat-spot"><p><?php echo get_option('ptthemes_404solution_name'); ?></p></div>
                
                                <div class="fix"></div>
                                        
                            </div><!--/post-->  
                
                        </div><!--/pagespot -->
		
  			  </div> <!-- content #end -->
 		 <?php get_sidebar(); ?>
  </div> <!-- page #end -->

<?php get_footer(); ?>
