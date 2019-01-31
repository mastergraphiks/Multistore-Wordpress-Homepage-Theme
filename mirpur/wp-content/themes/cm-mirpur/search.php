<?php get_header(); ?>



<div id="page" class="clearfix">

	<div class="breadcrumb clearfix">
      	<?php if ( get_option( 'ptthemes_breadcrumbs' )) { yoast_breadcrumb('',''); } ?>
     </div> <!-- breadcrumbs #end -->
                
                
         <div id="content"> 

    <?php if (is_paged()) $is_paged = true; ?>
    
             	   <?php if (is_search()) { ?>
                    <h1 class="head"><?php echo get_option('ptthemes_browsing_search'); ?> <?php printf(__('%s'), $s) ?> </h1>
                    <?php } ?>
 
			<?php if(have_posts()) : ?>
 			<?php while(have_posts()) : the_post() ?>
        
                <div id="post-<?php the_ID(); ?>" class="posts">
				    						                        
                    <div class="post_top">
                    <h2><a href="<?php the_permalink() ?>" rel="bookmark" title="Permanent Link to <?php the_title_attribute(); ?>"><?php the_title(); ?></a></h2>
                            
                    <p class="postmetadata">Posted on <?php the_time('F j, Y') ?> by <?php the_author(); ?> in <?php the_category(" , "); ?>  
                   </p>
                    </div>
				    
					 
					
					<?php if (( get_post_meta($post->ID,'image', true) ) && (get_option( 'ptthemes_timthumb_all' )) ) { ?>
                
                        <a title="Link to <?php the_title(); ?>" href="<?php the_permalink() ?>"><img src="<?php echo bloginfo('template_url'); ?>/thumb.php?src=<?php echo get_post_meta($post->ID, "image", $single = true); ?>&amp;h=95&amp;w=95&amp;zc=1&amp;q=80<?php echo $thumb_url;?>" alt="<?php the_title(); ?>" class="fll" style="margin-right:10px; margin-bottom:10px" /></a>          	
                        							
                    <?php } ?>
						
					<?php if ( get_option( 'ptthemes_postcontent_full' )) { ?> 
					
					    <?php the_content(); ?>
					
					<?php } else { ?>
					
					    <?php the_excerpt(); ?>
						
					<?php } ?>
					
					<div class="fix"><!----></div>
					
					<p class="post_bottom clearfix"> <span class="tags"><?php the_tags(); ?> </span>    <span class="commentcount"> <a href="<?php the_permalink(); ?>#commentarea"><?php comments_number('0 Comments', '1 Comments', '% Comments'); ?></a></span></p>
											
                </div><!--/post-->                            
        
            <?php endwhile; ?>
			
			<?php else: ?>
			
			    <div class="posts">
					
                    <h2><?php echo get_option('ptthemes_search_nothing_found'); ?></h2>
						
                </div> 
        
            <?php endif; ?>
			
			<div class="pagination">
			
                <?php if (function_exists('wp_pagenavi')) { ?><?php wp_pagenavi(); ?><?php } ?>
						
            </div>
			
		     </div> <!-- content #end -->
 		 <?php get_sidebar(); ?>
  </div> <!-- page #end -->

 <?php get_footer(); ?>