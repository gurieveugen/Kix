<?php
/**
 * Register new widget
 */
add_action('widgets_init', create_function('', 'register_widget( "TwitterFeed" );'));

class TwitterFeed extends WP_Widget {
	//                          __              __      
	//   _________  ____  _____/ /_____ _____  / /______
	//  / ___/ __ \/ __ \/ ___/ __/ __ `/ __ \/ __/ ___/
	// / /__/ /_/ / / / (__  ) /_/ /_/ / / / / /_(__  ) 
	// \___/\____/_/ /_/____/\__/\__,_/_/ /_/\__/____/  
	const CONSUMER_KEY        = 'FoRJZBenKUFmIQFLDp2gQ';
	const CONSUMER_SECRET     = 'Kudk8D5ZAxb5tWAoXRO21T47gp6EXRplJ82MEUiqc';
	const ACCESS_TOKEN        = '532546390-23aT4nDlWpYLA543yUfmExBqFs0RDb9AZBRbNFTd';
	const ACCESS_TOKEN_SECRET = 'Mt9Hj9aocqQ7qSQGzowzUkFWpvJx8kyBoLAV9GGfV9kvL';

	//                    __  __              __    
	//    ____ ___  ___  / /_/ /_  ____  ____/ /____
	//   / __ `__ \/ _ \/ __/ __ \/ __ \/ __  / ___/
	//  / / / / / /  __/ /_/ / / / /_/ / /_/ (__  ) 
	// /_/ /_/ /_/\___/\__/_/ /_/\____/\__,_/____/  
	public function __construct() 
	{
		require_once 'twitteroauth/twitteroauth.php'; 
		$widget_ops     = array('classname' => 'widget-sign-up', 'description' => 'Display twitter feed' );		
		parent::__construct('twitterfeed', 'Twitter feed widget', $widget_ops);
	}

	/**
	 * Render widget
	 * @param  array $args     
	 * @param  array $instance 
	 */
	public function widget($args, $instance) 
	{
		extract($args);

		$title    = isset($instance['title']) ? $instance['title'] : '';
		$username = isset($instance['username']) ? $instance['username'] : '';
		$count    = isset($instance['count']) ? $instance['count'] : 0;
		$before_widget = str_replace('column', 'column col-2', $before_widget);
		
		echo $before_widget;
		if($title) echo $before_title.$title.$after_title;		
		$connection = new TwitterOAuth(self::CONSUMER_KEY, self::CONSUMER_SECRET, self::ACCESS_TOKEN, self::ACCESS_TOKEN_SECRET);		 
		$tweets     = $connection->get("https://api.twitter.com/1.1/statuses/user_timeline.json?screen_name=".$username."&count=".$count);		 
		//var_dump($tweets);
		echo '<ul class="twit-blocks">';
		foreach ($tweets as $key => $value) 
		{
			$minutes_ago = intval((microtime(true) - strtotime($value->created_at)) / 60);
			?>
			<li class="block">
				<div class="cf">
					<a href="https://twitter.com/<?php echo $username; ?>/status/<?php echo $value->id_str; ?>" class="link">https://twitter.com/<?php echo $username; ?>/status/<?php echo $value->id_str; ?></a>
					<span class="time"><?php echo $minutes_ago; ?> min ago</span>
				</div>
				<p><?php echo $value->text; ?></p>
			</li>
			<?php
		}
		echo '</ul><!-- twit-blocks -->';
		echo $after_widget;
	}

	/**
	 * Render options form
	 * @param  array $instance
	 */
	public function form($instance) 
	{	
		$title    = isset($instance['title']) ? $instance['title'] : '';	
		$username = isset($instance['username']) ? $instance['username'] : '';
		$count    = isset($instance['count']) ? $instance['count'] : '';			

		?>
		<table>
			<tbody>
				<tr>
					<th><label for="<?php echo $this->get_field_id('title'); ?>"><?php _e('Title:'); ?></label></th>
					<td><input type="text" id="<?php echo $this->get_field_id('title'); ?>" name="<?php echo $this->get_field_name('title'); ?>" value="<?php echo $title; ?>" class="w100"></td>
				</tr>						
				<tr>
					<th><label for="<?php echo $this->get_field_id('username'); ?>"><?php _e('User name:'); ?></label></th>
					<td><input type="text" id="<?php echo $this->get_field_id('username'); ?>" name="<?php echo $this->get_field_name('username'); ?>" value="<?php echo $username; ?>" class="w100"></td>
				</tr>		
				<tr>
					<th><label for="<?php echo $this->get_field_id('count'); ?>"><?php _e('Count:'); ?></label></th>
					<td><input type="text" id="<?php echo $this->get_field_id('count'); ?>" name="<?php echo $this->get_field_name('count'); ?>" value="<?php echo $count; ?>" class="w100"></td>
				</tr>						
			</tbody>
		</table>		
		<?php
	}

	/**
	 * Update data
	 * @param  array $new_instance
	 * @param  array $old_instance
	 * @return array              
	 */
	public function update( $new_instance, $old_instance ) 
	{
		$instance             = $old_instance;
		$instance['title']    = strip_tags($new_instance['title']);	
		$instance['username'] = strip_tags($new_instance['username']);			
		$instance['count']    = intval($new_instance['count']);			
		
		return $instance;
	}
}