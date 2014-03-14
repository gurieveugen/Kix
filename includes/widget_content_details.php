<?php
/**
 * Register new widget
 */
add_action('widgets_init', create_function('', 'register_widget( "ContactDetails" );'));

class ContactDetails extends WP_Widget {
	//                    __  __              __    
	//    ____ ___  ___  / /_/ /_  ____  ____/ /____
	//   / __ `__ \/ _ \/ __/ __ \/ __ \/ __  / ___/
	//  / / / / / /  __/ /_/ / / / /_/ / /_/ (__  ) 
	// /_/ /_/ /_/\___/\__/_/ /_/\____/\__,_/____/  
	public function __construct() 
	{
		$widget_ops     = array('classname' => 'widget-sign-up', 'description' => 'Display contact details' );		
		parent::__construct('contactdetails', 'Contact details widget', $widget_ops);
	}

	/**
	 * Render widget
	 * @param  array $args     
	 * @param  array $instance 
	 */
	public function widget($args, $instance) 
	{
		extract($args);

		$title      = isset($instance['title']) ? $instance['title'] : '';
		$text_above = isset($instance['text_above']) ? $instance['text_above'] : '';
		$tel        = isset($instance['tel']) ? $instance['tel'] : '';
		$email      = isset($instance['email']) ? $instance['email'] : '';		
		$text_below = isset($instance['text_below']) ? $instance['text_below'] : '';

		echo $before_widget;
		if($title) echo $before_title.$title.$after_title;
		?>
		<div class="contact-block">
			<address><?php echo $text_above; ?></address>
			<span class="tel"><?php echo $tel; ?></span>
			<a href="mailto:<?php echo $email; ?>" class="mail"><?php echo $email; ?></a>
			<?php echo $this->getSocials($instance); ?>
			<p><?php echo $text_below; ?></p>
		</div>
		<?php
		echo $after_widget;
	}

	/**
	 * Render options form
	 * @param  array $instance
	 */
	public function form($instance) 
	{	
		$title      = isset($instance['title']) ? $instance['title'] : '';	
		$text_above = isset($instance['text_above']) ? $instance['text_above'] : '';
		$tel        = isset($instance['tel']) ? $instance['tel'] : '';
		$email      = isset($instance['email']) ? $instance['email'] : '';
		$facebook   = isset($instance['facebook']) ? $instance['facebook'] : '';
		$twitter    = isset($instance['twitter']) ? $instance['twitter'] : '';
		$linkedin   = isset($instance['linkedin']) ? $instance['linkedin'] : '';
		$pinterest  = isset($instance['pinterest']) ? $instance['pinterest'] : '';
		$rss        = isset($instance['rss']) ? $instance['rss'] : '';
		$youtube    = isset($instance['youtube']) ? $instance['youtube'] : '';
		$text_below = isset($instance['text_below']) ? $instance['text_below'] : '';

		?>
		<table>
			<tbody>
				<tr>
					<th><label for="<?php echo $this->get_field_id('title'); ?>"><?php _e('Title:'); ?></label></th>
					<td><input type="text" id="<?php echo $this->get_field_id('title'); ?>" name="<?php echo $this->get_field_name('title'); ?>" value="<?php echo $title; ?>" class="w100"></td>
				</tr>		
				<tr>
					<th><label for="<?php echo $this->get_field_id('text_above'); ?>"><?php _e('Text above:'); ?></label></th>
					<td><textarea name="<?php echo $this->get_field_name('text_above'); ?>" id="<?php echo $this->get_field_id('text_above'); ?>" cols="30" rows="10" class="w100"><?php echo $text_above; ?></textarea></td>
				</tr>		
				<tr>
					<th><label for="<?php echo $this->get_field_id('tel'); ?>"><?php _e('Phone:'); ?></label></th>
					<td><input type="text" id="<?php echo $this->get_field_id('tel'); ?>" name="<?php echo $this->get_field_name('tel'); ?>" value="<?php echo $tel; ?>" class="w100"></td>
				</tr>		
				<tr>
					<th><label for="<?php echo $this->get_field_id('email'); ?>"><?php _e('Email:'); ?></label></th>
					<td><input type="text" id="<?php echo $this->get_field_id('email'); ?>" name="<?php echo $this->get_field_name('email'); ?>" value="<?php echo $email; ?>" class="w100"></td>
				</tr>		
				<tr>
					<th><label for="<?php echo $this->get_field_id('facebook'); ?>"><?php _e('Facebook:'); ?></label></th>
					<td><input type="text" id="<?php echo $this->get_field_id('facebook'); ?>" name="<?php echo $this->get_field_name('facebook'); ?>" value="<?php echo $facebook; ?>" class="w100"></td>
				</tr>		
				<tr>
					<th><label for="<?php echo $this->get_field_id('twitter'); ?>"><?php _e('Twitter:'); ?></label></th>
					<td><input type="text" id="<?php echo $this->get_field_id('twitter'); ?>" name="<?php echo $this->get_field_name('twitter'); ?>" value="<?php echo $twitter; ?>" class="w100"></td>
				</tr>	
				<tr>
					<th><label for="<?php echo $this->get_field_id('linkedin'); ?>"><?php _e('Linked in:'); ?></label></th>
					<td><input type="text" id="<?php echo $this->get_field_id('linkedin'); ?>" name="<?php echo $this->get_field_name('linkedin'); ?>" value="<?php echo $linkedin; ?>" class="w100"></td>
				</tr>	
				<tr>
					<th><label for="<?php echo $this->get_field_id('pinterest'); ?>"><?php _e('Pinterest:'); ?></label></th>
					<td><input type="text" id="<?php echo $this->get_field_id('pinterest'); ?>" name="<?php echo $this->get_field_name('pinterest'); ?>" value="<?php echo $pinterest; ?>" class="w100"></td>
				</tr>	
				<tr>
					<th><label for="<?php echo $this->get_field_id('rss'); ?>"><?php _e('RSS:'); ?></label></th>
					<td><input type="text" id="<?php echo $this->get_field_id('rss'); ?>" name="<?php echo $this->get_field_name('rss'); ?>" value="<?php echo $rss; ?>" class="w100"></td>
				</tr>	
				<tr>
					<th><label for="<?php echo $this->get_field_id('youtube'); ?>"><?php _e('YouTube:'); ?></label></th>
					<td><input type="text" id="<?php echo $this->get_field_id('youtube'); ?>" name="<?php echo $this->get_field_name('youtube'); ?>" value="<?php echo $youtube; ?>" class="w100"></td>
				</tr>		
				<tr>
					<th><label for="<?php echo $this->get_field_id('text_below'); ?>"><?php _e('Text below:'); ?></label></th>
					<td><textarea name="<?php echo $this->get_field_name('text_below'); ?>" id="<?php echo $this->get_field_id('text_below'); ?>" cols="30" rows="10" class="w100"><?php echo $text_below; ?></textarea></td>
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
		$instance               = $old_instance;
		$instance['title']      = strip_tags($new_instance['title']);	
		$instance['text_above'] = strip_tags($new_instance['text_above']);			
		$instance['tel']        = strip_tags($new_instance['tel']);	
		$instance['email']      = strip_tags($new_instance['email']);	
		$instance['facebook']   = strip_tags($new_instance['facebook']);
		$instance['twitter']    = strip_tags($new_instance['twitter']);
		$instance['linkedin']   = strip_tags($new_instance['linkedin']);
		$instance['pinterest']  = strip_tags($new_instance['pinterest']);
		$instance['rss']        = strip_tags($new_instance['rss']);
		$instance['youtube']    = strip_tags($new_instance['youtube']);		
		$instance['text_below'] = strip_tags($new_instance['text_below']);	
		
		return $instance;
	}

	/**
	 * Get social icons (buttons)
	 * @param  array $instance 
	 * @return string           
	 */
	public function getSocials($instance)
	{
		$keys = array('facebook', 'twitter', 'linkedin', 'pinterest', 'rss', 'youtube');
		$arr  = $this->removeEmptyItems($instance);		
		$str  = '<ul class="socials">';
		foreach ($keys as $key => &$value) 
		{
			$str.= isset($arr[$value]) ? '<li class="'.$value.'"><a href="'.$arr[$value].'">'.$value.'</a></li>'."\n" : ''; 
		}
		$str .= '</ul><!-- socials -->';

		return $str;
	}

	/**
	 * Remove all empty ( "" ) items
	 * @param  array $arr
	 * @return array
	 */
	public function removeEmptyItems($arr)
	{
		$empty_items = array_keys($arr, "");		
		foreach($empty_items as $key => &$item) unset($arr[$item]);
		return $arr;
	}
}