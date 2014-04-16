<?php
/**
 * Register new widget
 */
add_action('widgets_init', create_function('', 'register_widget( "FacebookFeed" );'));

class FacebookFeed extends WP_Widget {
	//                          __              __      
	//   _________  ____  _____/ /_____ _____  / /______
	//  / ___/ __ \/ __ \/ ___/ __/ __ `/ __ \/ __/ ___/
	// / /__/ /_/ / / / (__  ) /_/ /_/ / / / / /_(__  ) 
	// \___/\____/_/ /_/____/\__/\__,_/_/ /_/\__/____/  
	const FACEBOOK_APP_ID = '1425546341034865';
	const FACEBOOK_SECRET = '2b5b3b592646a60b9cf5859405efe17c';

	//                __  _                 
	//   ____  ____  / /_(_)___  ____  _____
	//  / __ \/ __ \/ __/ / __ \/ __ \/ ___/
	// / /_/ / /_/ / /_/ / /_/ / / / (__  ) 
	// \____/ .___/\__/_/\____/_/ /_/____/  
	//     /_/                              
	private $facebook;

	//                    __  __              __    
	//    ____ ___  ___  / /_/ /_  ____  ____/ /____
	//   / __ `__ \/ _ \/ __/ __ \/ __ \/ __  / ___/
	//  / / / / / /  __/ /_/ / / / /_/ / /_/ (__  ) 
	// /_/ /_/ /_/\___/\__/_/ /_/\____/\__,_/____/  
	public function __construct() 
	{
		require_once 'google_url.php'; 
		require_once 'facebook/facebook.php'; 


		$widget_ops     = array('classname' => 'widget-sign-up', 'description' => 'Display facebook feed' );		
		parent::__construct('facebookfeed', 'Facebook feed widget', $widget_ops);

		$this->facebook = new Facebook(array(
			'appId'  => self::FACEBOOK_APP_ID,
			'secret' => self::FACEBOOK_SECRET)); 
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
		$username      = isset($instance['username']) ? $instance['username'] : '';
		$count         = isset($instance['count']) ? $instance['count'] : 1;
		$before_widget = str_replace('column', 'column col-3', $before_widget);
		$goo_gl        = new Googl();
		
		echo $before_widget;
		echo ($title) ? $before_title.$title.$after_title : '';		

		$fb = $this->getMessages($username, $count);
		echo '<ul class="twit-blocks">';
		foreach ($fb as $msg) 
		{
			$minutes_ago = intval((microtime(true) - strtotime($msg['created_time'])) / 60);
			$url         = 'https://www.facebook.com/'.$msg['id'].'/';
			$url         = $goo_gl->shorten($url);
			?>
			<li class="block">
				<div class="cf">
					<a href="<?php echo $url; ?>" class="link"><?php echo $url; ?></a>
					<span class="time"><?php echo $minutes_ago; ?> min ago</span>
				</div>
				<p><?php echo $msg['msg']; ?></p>
			</li>
			<?php
		}
		echo '</ul><!-- twit-blocks -->';		

		echo $after_widget;
	}

	/**
	 * Get facebook messages
	 * @param  string $user 
	 * @return array
	 */
	public function getMessages($user, $count)
	{
		$fb = array();
		$user_profile = $this->facebook->api('/'.$user.'/posts');
		
		foreach ($user_profile['data'] as &$post) 
		{
			$id  = $post['id'];
			$msg = isset($post['story']) ? $post['story'] : '';
			$msg = isset($post['message']) ? $post['message'] : $msg;
			if(strlen($msg) && $count)
			{
				$count--;
				$fb[] = array(
					'id'           => $id, 
					'msg'          => $msg,
					'created_time' => $post['created_time']);
			}
		}		
		return $fb;
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