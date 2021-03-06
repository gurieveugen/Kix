<?php

class Slider{
	//                    __  __              __    
	//    ____ ___  ___  / /_/ /_  ____  ____/ /____
	//   / __ `__ \/ _ \/ __/ __ \/ __ \/ __  / ___/
	//  / / / / / /  __/ /_/ / / / /_/ / /_/ (__  ) 
	// /_/ /_/ /_/\___/\__/_/ /_/\____/\__,_/____/  
	public function __construct()
	{		
		// =========================================================
		// HOOKS
		// =========================================================
		add_action('init', array($this, 'createPostTypeSlider'));		
		add_action('save_post', array($this, 'saveSlider'), 0);	
		add_action('add_meta_boxes', array($this, 'metaBoxSlider'));
		add_filter('manage_edit-slide_columns', array($this, 'columnThumb'));	
		add_action('manage_posts_custom_column', array($this, 'columnthumbShow'), 10, 2);
		add_shortcode('slider', array($this, 'displaySlider'));
		add_image_size('slide-image', 1580, 470, true);
		add_image_size('slide-thumb-image', 100, 100, true);				
	}

	/**
	 * Create GCEvents post type and his taxonomies
	 */
	public function createPostTypeSlider()
	{

		$post_labels = array(
			'name'               => __('Slides'),
			'singular_name'      => __('Slide'),
			'add_new'            => __('Add new'),
			'add_new_item'       => __('Add new slide'),
			'edit_item'          => __('Edit slide'),
			'new_item'           => __('New slide'),
			'all_items'          => __('Slides'),
			'view_item'          => __('View slide'),
			'search_items'       => __('Search slide'),
			'not_found'          => __('Slide not found'),
			'not_found_in_trash' => __('Slide not found in trash'),
			'parent_item_colon'  => '',
			'menu_name'          => __('Slides'));

		$post_args = array(
			'labels'             => $post_labels,
			'public'             => true,
			'publicly_queryable' => true,
			'show_ui'            => true,
			'show_in_menu'       => true,
			'query_var'          => true,
			'rewrite'            => array( 'slug' => 'slide' ),
			'capability_type'    => 'post',
			'has_archive'        => true,
			'hierarchical'       => false,
			'menu_position'      => null,
			'supports'           => array( 'title', 'editor', 'thumbnail'));

		register_post_type('slide', $post_args);
	}

	/**
	 * Register new column
	 * @param  array $columns 
	 * @return array
	 */
	public function columnThumb($columns)
	{
		return array_merge($columns, array('thumb' => __('Image'), 'learn_more' => __('Learn more URL')));
	}

	/**
	 * Display new column
	 * @param  string  $column  
	 * @param  integer $post_id           
	 */
	public function columnThumbShow($column, $post_id)
	{		
		switch ($column) 
		{
			case 'thumb':
				if(has_post_thumbnail($post_id)) echo get_the_post_thumbnail($post_id, 'slide-thumb-image');
				break;
			case 'learn_more':
				$meat       = $this->getMeta($post_id);
				$learn_more = isset($meat['learn_more']) ? $meat['learn_more'] : '';
				echo $learn_more;
				break;
		}			
	}

	/**
	 * Add GCEvents meata box
	 */
	public function metaBoxSlider($post_type)
	{
		$post_types = array('slide');
		if(in_array($post_type, $post_types))
		{
			add_meta_box('metaBoxSlider', __('Slider settings'), array($this, 'metaBoxSliderRender'), $post_type, 'side', 'high');	
		}
		
	}

	/**
	 * render Slider Meta box
	 */
	public function metaBoxSliderRender($post)
	{
		$meta = $this->getMeta($post->ID);
		wp_nonce_field( 'slider_box', 'slider_box_nonce' );
		?>	
		<div class="gcslider">
			<p>
				<label for="slider_learn_more"><?php _e('Lear more URL'); ?>:</label>
				<input type="text" name="meta[learn_more]" id="slider_learn_more" value="<?php echo $meta['learn_more']; ?>" class="w100">
			</p>			
		</div>	
		<?php
	}

	/**
	 * Get meta array
	 * @param  integer $id
	 * @return array
	 */
	public function getMeta($id)
	{
		return get_post_meta($id, 'meta', true);
	}
	
	/**
	 * Save post
	 * @param  integer $post_id 
	 * @return integer
	 */
	public function saveSlider($post_id)
	{
		// =========================================================
		// Check nonce
		// =========================================================
		if(!isset( $_POST['slider_box_nonce'])) return $post_id;
		if(!wp_verify_nonce($_POST['slider_box_nonce'], 'slider_box')) return $post_id;
		if(defined( 'DOING_AUTOSAVE') && DOING_AUTOSAVE) return $post_id;

		// =========================================================
		// Check the user's permissions.
		// =========================================================
		if ( 'page' == $_POST['post_type'] ) 
		{			
			if (!current_user_can( 'edit_page', $post_id)) return $post_id;
		} 
		else 
		{
			if(!current_user_can( 'edit_post', $post_id)) return $post_id;
		}

		// =========================================================
		// Save
		// =========================================================		
		if(isset($_POST['meta']))
		{
			update_post_meta($post_id, 'meta', $_POST['meta']);
		}

		return $post_id;
	}

	/**
	 * Get post type imtes
	 * @param  integer $count
	 * @return array        
	 */
	public function getItems($count = -1)
	{
		$all = array(
			'posts_per_page'   => $count,
			'offset'           => 0,			
			'orderby'          => 'post_date',
			'order'            => 'DESC',
			'post_type'        => 'slide',
			'post_status'      => 'publish');
		$arr = get_posts($all);
		foreach ($arr as $key => &$value) 
		{
			$images = null;
			if(has_post_thumbnail($value->ID))
			{
				$post_thumbnail_id = get_post_thumbnail_id($value->ID);
				$slide_image       = wp_get_attachment_image_src($post_thumbnail_id ,'slide-image', false);
				$slide_thumb_image = wp_get_attachment_image_src($post_thumbnail_id ,'slide-thumb-image', false);
				$images['full']    = $slide_image[0];
				$images['small']   = $slide_thumb_image[0];
			}
			$value->images = $images;
			$value->meta   = $this->getMeta($value->ID);
		}
		return $arr;
	}

	/**
	 * Get Slider HTML
	 * @return string
	 */
	public function getSlider($count = -1, $active = 1)
	{
		$i = 1;
		$slides_html = '';
		$slides      = $this->getSlides($count);		
		foreach ($slides as $key => $value) 
		{
			if(has_post_thumbnail($key))
			{
				$args        = array('class' => 'image', 'alt' => $value->post_title, 'title' => $value->post_title);
				$meta        = get_post_meta($key, 'slider', true);
				$slides_html.= '<li id="hivista_slide'.$i.'"'.$this->active(($i == $active)).'>
									<div class="text">
										<img alt="image description" src="/wp-content/themes/techbridge/images/text-for-girl-2.png">
									</div>
									<div class="row cf">
										<a class="link jcarousel-slider-control-next" href="#">next</a>
										<div class="holder cf">
											<p><span class="s-text">'.$meta['prev_text'].'</span><strong class="percentage p-'.$meta['precent'].'"><span>'.$meta['precent'].'%</span></strong> <span class="s-text">'.$meta['next_text'].'</span></p>
										</div> 
									</div>
									'.get_the_post_thumbnail($key, 'slide-image', $args).'								
								</li>';
				$indicators .= '<li id="hivista_indicator'.$i.'"'.$this->active(($i == $active)).'><a href="#" onclick="jumpToSlide('.$i.'); return false;"></a></li>';
				$i++;
			}
		}
		$out = '<section class="slider-holder">';
		$out.= '<div class="jcarousel-slider">';
		$out.= '<ul class="slides">'.$slides_html.'</ul>';
		$out.= '</div><!-- jcarousel -->';
		$out.= '<ul class="jcarousel-slider-pagination switcher cf"></ul>';
		$out.= '</section><!-- slider-holder -->';
		return $out;
	}

	/**
	 * Replace shortcode to Slider HTML
	 * @param  array $args 
	 * @return string       
	 */
	public function displaySlider($args)
	{
		$count  = (isset($args['count'])) ? intval($args['count']) : -1;
		$active = (isset($args['active'])) ? intval($args['active']) : 1;
		return $this->getSlider($count, $active);
	}

	/**
	 * Set active slider item
	 * @param  boolean $yes 
	 * @return string
	 */
	private function active($yes = false)
	{
		if($yes) return ' class="active"';
		return '';
	}
}
// =========================================================
// LAUNCH
// =========================================================
$GLOBALS['slider'] = new Slider();