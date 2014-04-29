<?php
/**
 * Register new widget
 */
add_action('widgets_init', create_function('', 'register_widget( "LatestBlogPost" );'));

class LatestBlogPost extends WP_Widget {
	//                    __  __              __    
	//    ____ ___  ___  / /_/ /_  ____  ____/ /____
	//   / __ `__ \/ _ \/ __/ __ \/ __ \/ __  / ___/
	//  / / / / / /  __/ /_/ / / / /_/ / /_/ (__  ) 
	// /_/ /_/ /_/\___/\__/_/ /_/\____/\__,_/____/  
	public function __construct() 
	{		
		$widget_ops     = array('classname' => 'widget-sign-up', 'description' => 'Display latest blog post' );		
		parent::__construct('latestblogpost', 'Latest blog post widget', $widget_ops);
	}

	/**
	 * Render widget
	 * @param  array $args     
	 * @param  array $instance 
	 */
	public function widget($args, $instance) 
	{
		extract($args);

		$title         = isset($instance['title']) ? $instance['title'] : '';
		$count         = isset($instance['count']) ? $instance['count'] : 0;		
		$display_link  = $instance['display_link'];
		$before_widget = str_replace('column', 'column col-3', $before_widget);

		$args = array(
			'posts_per_page'   => $count,
			'offset'           => 0,
			'category'         => '',
			'orderby'          => 'post_date',
			'order'            => 'DESC',
			'include'          => '',
			'exclude'          => '',
			'meta_key'         => '',
			'meta_value'       => '',
			'post_type'        => 'post',
			'post_mime_type'   => '',
			'post_parent'      => '',
			'post_status'      => 'publish',
			'suppress_filters' => true );

		$posts = get_posts($args);
		
		echo $before_widget;
		if($title) echo $before_title.$title.$after_title;				

		if($posts)
		{
			echo '<ul class="blog-blocks">';
			foreach ($posts as $key => $value) 
			{
				$date = date('F d, Y', strtotime($value->post_date));
				?>
				<li class="block">
					<p><?php echo $this->getShortString($value->post_content); ?></p>
					<?php
					if($display_link === true)
					{
						?>
						<a href="<?php echo get_permalink($value->ID); ?>"><span class="date"><?php echo $date; ?></span></a>
						<?php
					}
					?>
					
				</li>
				<?php					
			}
			echo '</ul><!-- blog-blocks -->';
		}
		echo $after_widget;
	}

	/**
	 * Render options form
	 * @param  array $instance
	 */
	public function form($instance) 
	{	
		$title        = isset($instance['title']) ? $instance['title'] : '';	
		$count        = isset($instance['count']) ? $instance['count'] : '';			
		$display_link = $this->checked($instance['display_link']);
		?>
		<table>
			<tbody>
				<tr>
					<th><label for="<?php echo $this->get_field_id('title'); ?>"><?php _e('Title:'); ?></label></th>
					<td><input type="text" id="<?php echo $this->get_field_id('title'); ?>" name="<?php echo $this->get_field_name('title'); ?>" value="<?php echo $title; ?>" class="w100"></td>
				</tr>
				<tr>
					<th><label for="<?php echo $this->get_field_id('count'); ?>"><?php _e('Count:'); ?></label></th>
					<td><input type="text" id="<?php echo $this->get_field_id('count'); ?>" name="<?php echo $this->get_field_name('count'); ?>" value="<?php echo $count; ?>" class="w100"></td>
				</tr>						
				<tr>
					<th><label for="<?php echo $this->get_field_id('display_link'); ?>"><?php _e('Display links:'); ?></label></th>
					<td>
						<input type="hidden" name="<?php echo $this->get_field_name('display_link'); ?>" value="off">
						<input type="checkbox" id="<?php echo $this->get_field_id('display_link'); ?>" name="<?php echo $this->get_field_name('display_link'); ?>" <?php echo $display_link; ?>>
					</td>
				</tr>						
			</tbody>
		</table>		
		<?php
	}

	/**
	 * Helper function for checkbox
	 * @param  boolean $yes
	 * @return string
	 */
	private function checked($yes = true)	
	{
		return ($yes === true) ? 'checked' : '';
	}

	/**
	 * Update data
	 * @param  array $new_instance
	 * @param  array $old_instance
	 * @return array              
	 */
	public function update( $new_instance, $old_instance ) 
	{
		$instance                 = $old_instance;
		$instance['title']        = strip_tags($new_instance['title']);			
		$instance['count']        = intval($new_instance['count']);			
		$instance['display_link'] = ($new_instance['display_link'] == 'on');		
		
		return $instance;
	}

	/**
	 * Get the trimmed string
	 * @param  string $str   
	 * @param  integer $symbols   
	 * @return string
	 */
	public function getShortString($str, $symbols = 55)
	{
		return preg_match("/^(.{".$symbols.",}?)\s+/s", $str, $m) ? $m[1] . '...' : $str; 
	}
}