<?php

// Register widgetized areas
if ( function_exists('register_sidebar') ) {
    register_sidebars(1,array('name' => 'Sidebar','before_widget' => '<div class="widget">','after_widget' => '</div>','before_title' => '<h3><span>','after_title' => '</span></h3>'));
	register_sidebars(2,array('name' => 'Footer Widget %d','before_widget' => '<div class="widget">','after_widget' => '</div>','before_title' => '<h3>','after_title' => '</h3>'));
	register_sidebars(1,array('name' => 'Top Strip Navigation','before_widget' => '<div class="widget">','after_widget' => '</div>','before_title' => '<h3><span>','after_title' => '</span></h3>'));
	register_sidebars(1,array('name' => 'Header Navigation','before_widget' => '<div class="widget">','after_widget' => '</div>','before_title' => '<h3><span>','after_title' => '</span></h3>'));
}
	
// Check for widgets in widget-ready areas http://wordpress.org/support/topic/190184?replies=7#post-808787
// Thanks to Chaos Kaizer http://blog.kaizeku.com/
function is_sidebar_active( $index = 1){
	$sidebars	= wp_get_sidebars_widgets();
	$key		= (string) 'sidebar-'.$index;
 
	return (isset($sidebars[$key]));
}


// =============================== Connect with us Widget ======================================
class isocializeWidget extends WP_Widget {
	function isocializeWidget() {
	//Constructor
		$widget_ops = array('classname' => 'widget Connect with us', 'description' => '' );		
		$this->WP_Widget('widget_isocialize', 'PT &rarr; Connect with us', $widget_ops);
	}
	function widget($args, $instance) {
	// prints the widget
		extract($args, EXTR_SKIP);
		$title = empty($instance['title']) ? '' : apply_filters('widget_title', $instance['title']);
		$facebook = empty($instance['facebook']) ? '' : apply_filters('widget_facebook', $instance['facebook']);
		$twitter = empty($instance['twitter']) ? '' : apply_filters('widget_twitter', $instance['twitter']);
		$youtube = empty($instance['youtube']) ? '' : apply_filters('widget_youtube', $instance['youtube']);
		$rss = empty($instance['rss']) ? '' : apply_filters('widget_rss', $instance['rss']);
		 ?>						

 
      	 <h3><?php echo $title; ?> </h3> 
         
      	<ul>
        <?php if ( $facebook <> "" ) { ?>	
          <li class="facebook"><a href="<?php echo $facebook; ?>"> facebook </a> </li>
         <?php } ?>
         <?php if ( $twitter <> "" ) { ?>	
          <li class="twitter"><a href="<?php echo $twitter; ?>">twitter </a> </li>
         <?php } ?>
         <?php if ( $youtube <> "" ) { ?>	
          <li class="youtube"><a href="<?php echo $youtube; ?>"> youtube </a> </li>
         <?php } ?>
         <?php if ( $rss <> "" ) { ?>	
          <li class="rss"><a href="<?php echo $rss; ?>">update via rss </a> </li>
         <?php } ?>
		</ul>
       
              
	<?php
	}
	function update($new_instance, $old_instance) {
	//save the widget
		$instance = $old_instance;		
		$instance['title'] = strip_tags($new_instance['title']);
		$instance['facebook'] = ($new_instance['facebook']);
		$instance['twitter'] = ($new_instance['twitter']);
		$instance['youtube'] = ($new_instance['youtube']);
		$instance['rss'] = ($new_instance['rss']);
		return $instance;
	}
	function form($instance) {
	//widgetform in backend
		$instance = wp_parse_args( (array) $instance, array( 'title' => '', 'facebook' => '', 'twitter' => '', 'youtube' => '', 'rss' => '' ) );		
		$title = strip_tags($instance['title']);
		$facebook = ($instance['facebook']);
		$twitter = ($instance['twitter']);
		$youtube = ($instance['youtube']);
		$rss = ($instance['rss']);			
?>
<p><label for="<?php echo $this->get_field_id('title'); ?>">Widget Title: <input class="widefat" id="<?php echo $this->get_field_id('title'); ?>" name="<?php echo $this->get_field_name('title'); ?>" type="text" value="<?php echo attribute_escape($title); ?>" /></label></p> 
     
 <p> <label for="<?php echo $this->get_field_id('facebook'); ?>">Facebook: (write full URL) 
    <input class="widefat" id="<?php echo $this->get_field_id('facebook'); ?>" name="<?php echo $this->get_field_name('facebook'); ?>" type="text" value="<?php echo attribute_escape($facebook); ?>" /> </label> </p>
 <p> <label for="<?php echo $this->get_field_id('twitter'); ?>">Twitter: (write full URL) 
    <input class="widefat" id="<?php echo $this->get_field_id('twitter'); ?>" name="<?php echo $this->get_field_name('twitter'); ?>" type="text" value="<?php echo attribute_escape($twitter); ?>" />
  </label> </p>
 <p> <label for="<?php echo $this->get_field_id('youtube'); ?>">Youtube: (write full URL) 
    <input class="widefat" id="<?php echo $this->get_field_id('youtube'); ?>" name="<?php echo $this->get_field_name('youtube'); ?>" type="text" value="<?php echo attribute_escape($youtube); ?>" />
  </label> </p>
   <p> <label for="<?php echo $this->get_field_id('rss'); ?>">RSS FEED: (write full URL) 
    <input class="widefat" id="<?php echo $this->get_field_id('rss'); ?>" name="<?php echo $this->get_field_name('rss'); ?>" type="text" value="<?php echo attribute_escape($rss); ?>" />
  </label> </p>
<?php
	}}
register_widget('isocializeWidget');



// =============================== live help Widget ======================================
class helpwidget extends WP_Widget {
	function helpwidget() {
	//Constructor
		$widget_ops = array('classname' => 'widget Live help', 'description' => '' );		
		$this->WP_Widget('widget_help', 'PT &rarr; Live help', $widget_ops);
	}
	function widget($args, $instance) {
	// prints the widget
		extract($args, EXTR_SKIP);
		$title = empty($instance['title']) ? '' : apply_filters('widget_title', $instance['title']);
		$text = empty($instance['text']) ? '' : apply_filters('widget_text', $instance['text']);
		$phoneno = empty($instance['phoneno']) ? '' : apply_filters('widget_phoneno', $instance['phoneno']);
		$time = empty($instance['time']) ? '' : apply_filters('widget_time', $instance['time']);
		 ?>						

 
      	 <h3><?php echo $title; ?> </h3> 
         
      	 
        <?php if ( $text <> "" ) { ?>	
          <p class="callus"><?php echo $text; ?></p>
         <?php } ?>
         
         <?php if ( $phoneno <> "" ) { ?>	
          <p class="phoneno"><?php echo $phoneno; ?> </p>
         <?php } ?>
         
         <?php if ( $time <> "" ) { ?>	
          <p class="time"><?php echo $time; ?> </p>
         <?php } ?>
        
		 
       
              
	<?php
	}
	function update($new_instance, $old_instance) {
	//save the widget
		$instance = $old_instance;		
		$instance['title'] = strip_tags($new_instance['title']);
		$instance['text'] = ($new_instance['text']);
		$instance['phoneno'] = ($new_instance['phoneno']);
		$instance['time'] = ($new_instance['time']);
		return $instance;
	}
	function form($instance) {
	//widgetform in backend
		$instance = wp_parse_args( (array) $instance, array( 'title' => '', 'text' => '', 'phoneno' => '', 'phoneno' => '' ) );		
		$title = strip_tags($instance['title']);
		$text = ($instance['text']);
		$phoneno = ($instance['phoneno']);
		$time = ($instance['time']);
?>
<p><label for="<?php echo $this->get_field_id('title'); ?>">Widget Title: <input class="widefat" id="<?php echo $this->get_field_id('title'); ?>" name="<?php echo $this->get_field_name('title'); ?>" type="text" value="<?php echo attribute_escape($title); ?>" /></label></p> 
     
 <p> <label for="<?php echo $this->get_field_id('text'); ?>">Text: 
    <input class="widefat" id="<?php echo $this->get_field_id('text'); ?>" name="<?php echo $this->get_field_name('text'); ?>" type="text" value="<?php echo attribute_escape($text); ?>" /> </label> </p>
 <p> <label for="<?php echo $this->get_field_id('phoneno'); ?>">Shop Phone No: 
    <input class="widefat" id="<?php echo $this->get_field_id('phoneno'); ?>" name="<?php echo $this->get_field_name('phoneno'); ?>" type="text" value="<?php echo attribute_escape($phoneno); ?>" />
  </label> </p>
 <p> <label for="<?php echo $this->get_field_id('time'); ?>">Shop Time:
    <input class="widefat" id="<?php echo $this->get_field_id('time'); ?>" name="<?php echo $this->get_field_name('time'); ?>" type="text" value="<?php echo attribute_escape($time); ?>" />
  </label> </p>
<?php
	}}
register_widget('helpwidget');

// =============================== Flickr widget ======================================
function flickrWidget()
{
	$settings = get_option("widget_flickrwidget");

	$id = $settings['id'];
	$number = $settings['number'];

?>

<div class="widget flickr">
			
        <h3 class="hl">flickr photostream</span></h3>
				
		<div class="fix"></div>
            			
            <script type="text/javascript" src="http://www.flickr.com/badge_code_v2.gne?count=<?php echo $number; ?>&amp;display=latest&amp;size=s&amp;layout=x&amp;source=user&amp;user=<?php echo $id; ?>"></script>  
		
		<div class="fix"></div>
		
</div>		

<?php
}
function flickrWidgetAdmin() {

	$settings = get_option("widget_flickrwidget");

	// check if anything's been sent
	if (isset($_POST['update_flickr'])) {
		$settings['id'] = strip_tags(stripslashes($_POST['flickr_id']));
		$settings['number'] = strip_tags(stripslashes($_POST['flickr_number']));

		update_option("widget_flickrwidget",$settings);
	}

	echo '<p>
			<label for="flickr_id">Flickr ID (<a href="http://www.idgettr.com">idGettr</a>):
			<input id="flickr_id" name="flickr_id" type="text" class="widefat" value="'.$settings['id'].'" /></label></p>';
	echo '<p>
			<label for="flickr_number">Number of photos:
			<input id="flickr_number" name="flickr_number" type="text" class="widefat" value="'.$settings['number'].'" /></label></p>';
	echo '<input type="hidden" id="update_flickr" name="update_flickr" value="1" />';

}

register_sidebar_widget('PT &rarr; Flickr Photos', 'flickrWidget');
register_widget_control('PT &rarr; Flickr Photos', 'flickrWidgetAdmin', 250, 200);



// =============================== sidebar Advt Widget ======================================
class sidebar_advt extends WP_Widget {
	function sidebar_advt() {
	//Constructor
		$widget_ops = array('classname' => 'widget Advt 210x200px', 'description' => 'Sidebar Advt' );		
		$this->WP_Widget('widget_advt', 'PT &rarr; Advt 210x200px', $widget_ops);
	}
	function widget($args, $instance) {
	// prints the widget
		extract($args, EXTR_SKIP);
		$title = empty($instance['title']) ? '' : apply_filters('widget_title', $instance['title']);
		$advt1 = empty($instance['advt1']) ? '' : apply_filters('widget_advt1', $instance['advt1']);
		$advt_link1 = empty($instance['advt_link1']) ? '' : apply_filters('widget_advt_link1', $instance['advt_link1']);
		 ?>						

 
      		<!--<h3><?php // echo $title; ?> </h3>-->
         
         <div class="widget">
			
            <div class="ad-box">
        	<?php if ( $advt1 <> "" ) { ?>	
             <a href="<?php echo $advt_link1; ?>"><img src="<?php echo $advt1; ?> " alt="" /></a>
             <?php } ?>
             </div>
        </div>
              
	<?php
	}
	function update($new_instance, $old_instance) {
	//save the widget
		$instance = $old_instance;		
		$instance['title'] = strip_tags($new_instance['title']);
		$instance['advt1'] = ($new_instance['advt1']);
		$instance['advt_link1'] = ($new_instance['advt_link1']);
		return $instance;
	}
	function form($instance) {
	//widgetform in backend
		$instance = wp_parse_args( (array) $instance, array( 'title' => '', 'advt1' => '', 'advt_link1' => '', 'advt2' => '', 'advt_link2' => '' ) );		
		$title = strip_tags($instance['title']);
		$advt1 = ($instance['advt1']);
		$advt_link1 = ($instance['advt_link1']);
?>
<!--<p><label for="<?php // echo $this->get_field_id('title'); ?>">Widget Title: <input class="widefat" id="<?php // echo $this->get_field_id('title'); ?>" name="<?php // echo $this->get_field_name('title'); ?>" type="text" value="<?php // echo attribute_escape($title); ?>" /></label></p>-->
     
 <p> <label for="<?php echo $this->get_field_id('advt1'); ?>">Advt 1 Image Path (ex.http://pt.com/images/banner.jpg)
    <input class="widefat" id="<?php echo $this->get_field_id('advt1'); ?>" name="<?php echo $this->get_field_name('advt1'); ?>" type="text" value="<?php echo attribute_escape($advt1); ?>" />
  </label> </p>
<p>  <label for="<?php echo $this->get_field_id('advt_link1'); ?>">Advt 1 link 
    <input class="widefat" id="<?php echo $this->get_field_id('advt_link1'); ?>" name="<?php echo $this->get_field_name('advt_link1'); ?>" type="text" value="<?php echo attribute_escape($advt_link1); ?>" />
  </label>
</p>
<?php
	}}
register_widget('sidebar_advt');



// =============================== Popular Posts Widget ======================================

function PopularPostsSidebar()
{

    $settings_pop = get_option("widget_popularposts");

	$name = $settings_pop['name'];
	$number = $settings_pop['number'];
	if ($name <> "") { $popname = $name; } else { $popname = 'Popular Posts'; }
	if ($number <> "") { $popnumber = $number; } else { $popnumber = '10'; }

?>

<div class="widget popular">

	<h3 class="hl"><span><?php echo $popname; ?></span></h3>
	
		<ul>
			 
			<?php
			global $wpdb;
            $now = gmdate("Y-m-d H:i:s",time());
            $lastmonth = gmdate("Y-m-d H:i:s",gmmktime(date("H"), date("i"), date("s"), date("m")-12,date("d"),date("Y")));
            $popularposts = "SELECT ID, post_title, COUNT($wpdb->comments.comment_post_ID) AS 'stammy' FROM $wpdb->posts, $wpdb->comments WHERE comment_approved = '1' AND $wpdb->posts.ID=$wpdb->comments.comment_post_ID AND post_status = 'publish' AND post_date < '$now' AND post_date > '$lastmonth' AND comment_status = 'open' GROUP BY $wpdb->comments.comment_post_ID ORDER BY stammy DESC LIMIT $popnumber";
            $posts = $wpdb->get_results($popularposts);
            $popular = '';
            if($posts){
                foreach($posts as $post){
	                $post_title = stripslashes($post->post_title);
		               $guid = get_permalink($post->ID);
					   
					      $first_post_title=substr($post_title,0,26);
            ?>
		        <li>
                    <a href="<?php echo $guid; ?>" title="<?php echo $post_title; ?>"><?php echo $first_post_title; ?></a>
                    <br style="clear:both" />
                </li>
            <?php } } ?>

		</ul>
</div>

<?php
}
function PopularPostsAdmin() {

	$settings_pop = get_option("widget_popularposts");

	// check if anything's been sent
	if (isset($_POST['update_popular'])) {
		$settings_pop['name'] = strip_tags(stripslashes($_POST['popular_name']));
		$settings_pop['number'] = strip_tags(stripslashes($_POST['popular_number']));

		update_option("widget_popularposts",$settings_pop);
	}

	echo '<p>
			<label for="popular_name">Title:
			<input id="popular_name" name="popular_name" type="text" class="widefat" value="'.$settings_pop['name'].'" /></label></p>';
	echo '<p>
			<label for="popular_number">Number of popular posts:
			<input id="popular_number" name="popular_number" type="text" class="widefat" value="'.$settings_pop['number'].'" /></label></p>';
	echo '<input type="hidden" id="update_popular" name="update_popular" value="1" />';

}

register_sidebar_widget('PT &rarr; Popular Posts', 'PopularPostsSidebar');
register_widget_control('PT &rarr; Popular Posts', 'PopularPostsAdmin', 250, 200);


// =============================== Twitter widget ======================================
// Plugin Name: Twitter Widget
// Plugin URI: http://seanys.com/2007/10/12/twitter-wordpress-widget/
// Description: Adds a sidebar widget to display Twitter updates (uses the Javascript <a href="http://twitter.com/badges/which_badge">Twitter 'badge'</a>)
// Version: 1.0.3
// Author: Sean Spalding
// Author URI: http://seanys.com/
// License: GPL

function widget_Twidget_init() {

	if ( !function_exists('register_sidebar_widget') )
		return;

	function widget_Twidget($args) {

		// "$args is an array of strings that help widgets to conform to
		// the active theme: before_widget, before_title, after_widget,
		// and after_title are the array keys." - These are set up by the theme
		extract($args);

		// These are our own options
		$options = get_option('widget_Twidget');
		$account = $options['account'];  // Your Twitter account name
		$title = $options['title'];  // Title in sidebar for widget
		$show = $options['show'];  // # of Updates to show
		$follow = $options['follow'];  // # of Updates to show

        // Output
		echo $before_widget ;

		// start
		echo '<div class="twitter clearfix"><div class="twitter_icon"><a href="http://www.twitter.com/'.$account.'/" title="'.$follow.'">'.$title.' </a></div>';              
		echo '<div class="twitter_post"><div id="twitter">';
		echo '<ul id="twitter_update_list"><li></li></ul>
		      <script type="text/javascript" src="http://twitter.com/javascripts/blogger.js"></script>';
		echo '<script type="text/javascript" src="http://twitter.com/statuses/user_timeline/'.$account.'.json?callback=twitterCallback2&amp;count='.$show.'"></script>';
		echo '</div></div></div>';
			
				
		// echo widget closing tag
		echo $after_widget;
	}

	// Settings form
	function widget_Twidget_control() {

		// Get options
		$options = get_option('widget_Twidget');
		// options exist? if not set defaults
		if ( !is_array($options) )
			$options = array('account'=>'rbhavesh', 'title'=>'Twitter Updates', 'show'=>'3');

        // form posted?
		if ( $_POST['Twitter-submit'] ) {

			// Remember to sanitize and format use input appropriately.
			$options['account'] = strip_tags(stripslashes($_POST['Twitter-account']));
			$options['title'] = strip_tags(stripslashes($_POST['Twitter-title']));
			$options['show'] = strip_tags(stripslashes($_POST['Twitter-show']));
			$options['follow'] = strip_tags(stripslashes($_POST['Twitter-follow']));
			$options['linkedin'] = strip_tags(stripslashes($_POST['Twitter-linkedin']));
			$options['facebook'] = strip_tags(stripslashes($_POST['Twitter-facebook']));
			update_option('widget_Twidget', $options);
		}

		// Get options for form fields to show
		$account = htmlspecialchars($options['account'], ENT_QUOTES);
		$title = htmlspecialchars($options['title'], ENT_QUOTES);
		$show = htmlspecialchars($options['show'], ENT_QUOTES);
		$follow = htmlspecialchars($options['follow'], ENT_QUOTES);

		// The form fields
		echo '<p style="text-align:left;">
				<label for="Twitter-account">' . __('Twitter Account ID:') . '
				<input style="width: 280px;" id="Twitter-account" name="Twitter-account" type="text" value="'.$account.'" />
				</label></p>';
		echo '<p style="text-align:left;">
				<label for="Twitter-title">' . __('Title:') . '
				<input style="width: 280px;" id="Twitter-title" name="Twitter-title" type="text" value="'.$title.'" />
				</label></p>';
		echo '<p style="text-align:left;">
				<label for="Twitter-show">' . __('Show Twitter Posts:') . '
				<input style="width: 280px;" id="Twitter-show" name="Twitter-show" type="text" value="'.$show.'" />
				</label></p>';
		echo '<input type="hidden" id="Twitter-submit" name="Twitter-submit" value="1" />';
	}


	// Register widget for use
	register_sidebar_widget(array('PT &rarr; Twitter', 'widgets'), 'Widget_Twidget');

	// Register settings for use, 300x200 pixel form
	register_widget_control(array('PT &rarr; Twitter', 'widgets'), 'Widget_Twidget_control', 300, 200);
	
}

// Run code and init
add_action('widgets_init', 'widget_Twidget_init');
?>