<?php
/*
 * @package WordPress
 * @subpackage Base_Theme
 */
// =========================================================
// REQUIRE
// =========================================================
require_once 'includes/post_type_slider.php';
require_once 'includes/widget_content_details.php';
require_once 'includes/widget_twitter_feed.php';
require_once 'includes/widget_latest_posts.php';
// =========================================================
// CONSTANTS
// =========================================================
define('TDU', get_bloginfo('template_url'));
// =========================================================
// HOOKS
// =========================================================
add_theme_support( 'automatic-feed-links');
add_theme_support( 'html5', array( 'search-form', 'comment-form', 'comment-list'));
add_theme_support( 'post-thumbnails' );
add_filter( 'use_default_gallery_style', '__return_false');
add_filter('nav_menu_css_class', 'change_menu_classes');
add_filter('the_content', 'filter_template_url');
add_filter('get_the_content', 'filter_template_url');
add_filter('widget_text', 'filter_template_url');
add_filter('the_content', 'template_url');
add_filter('get_the_content', 'template_url');
add_filter('widget_text', 'template_url');
add_filter( 'wpcf7_form_class_attr', 'customFormClass');
add_action('wp_enqueue_scripts', 'scripts_method');
set_post_thumbnail_size( 604, 270, true );
add_image_size( 'single-post-thumbnail', 400, 9999, false );

// =========================================================
// REGISTER SIDEBARS AND MENUS
// =========================================================
register_sidebar(array(
	'id'            => 'right-sidebar',
	'name'          => 'Right Sidebar',
	'before_widget' => '<div class="widget %2$s" id="%1$s">',
	'after_widget'  => '</div>',
	'before_title'  => '<h3>',
	'after_title'   => '</h3>'
));

register_sidebar(array(
	'id'            => 'footer-sidebar',
	'name'          => 'Footer Sidebar',
	'before_widget' => '<div class="column %s" id="%1$s">',
	'after_widget'  => '</div>',
	'before_title'  => '<h4>',
	'after_title'   => '</h4>'
));

register_nav_menus( array(
	'primary_nav' => __('Primary Navigation', 'theme'),
	'top_nav'     => __('Top Navigation', 'theme'),
	'bottom_nav'  => __('Bottom Navigation', 'theme'),
	'bottom_lg'   => __('Bottom Navigation for Landing page', 'theme')));

// =========================================================
// Just for admin panel
// =========================================================
if(is_admin())
{
	wp_enqueue_style('admin-styles', TDU.'/css/admin-styles.min.css');
	wp_enqueue_style('font-awesome', TDU.'/css/font-awesome.min.css');
}

// =========================================================
// METHODS
// =========================================================

/**
 * Custom active menu classes
 * @param  string $css_classes 
 * @return string              
 */
function change_menu_classes($css_classes)
{
	$css_classes = str_replace("current-menu-item", "current-menu-item active", $css_classes);
	$css_classes = str_replace("current-menu-parent", "current-menu-parent active", $css_classes);
	return $css_classes;
}

function theme_paging_nav() 
{
	global $wp_query;

	// Don't print empty markup if there's only one page.
	if ( $wp_query->max_num_pages < 2 )
		return;
	?>
	<nav class="navigation paging-navigation" role="navigation">
		<h1 class="screen-reader-text"><?php _e( 'Posts navigation', 'theme' ); ?></h1>
		<div class="nav-links">

			<?php if ( get_next_posts_link() ) : ?>
			<div class="nav-previous"><?php next_posts_link( __( '<span class="meta-nav">&larr;</span> Older posts', 'theme' ) ); ?></div>
			<?php endif; ?>

			<?php if ( get_previous_posts_link() ) : ?>
			<div class="nav-next"><?php previous_posts_link( __( 'Newer posts <span class="meta-nav">&rarr;</span>', 'theme' ) ); ?></div>
			<?php endif; ?>

		</div><!-- .nav-links -->
	</nav><!-- .navigation -->
	<?php
}
function theme_post_nav() {
	global $post;

	// Don't print empty markup if there's nowhere to navigate.
	$previous = ( is_attachment() ) ? get_post( $post->post_parent ) : get_adjacent_post( false, '', true );
	$next     = get_adjacent_post( false, '', false );

	if ( ! $next && ! $previous )
		return;
	?>
	<nav class="navigation post-navigation" role="navigation">
		<h1 class="screen-reader-text"><?php _e( 'Post navigation', 'theme' ); ?></h1>
		<div class="nav-links">

			<?php previous_post_link( '%link', _x( '<span class="meta-nav">&larr;</span> %title', 'Previous post link', 'theme' ) ); ?>
			<?php next_post_link( '%link', _x( '%title <span class="meta-nav">&rarr;</span>', 'Next post link', 'theme' ) ); ?>

		</div><!-- .nav-links -->
	</nav><!-- .navigation -->
	<?php
}
function theme_entry_date( $echo = true ) {
	if ( has_post_format( array( 'chat', 'status' ) ) )
		$format_prefix = _x( '%1$s on %2$s', '1: post format name. 2: date', 'theme' );
	else
		$format_prefix = '%2$s';

	$date = sprintf( '<span class="date"><a href="%1$s" title="%2$s" rel="bookmark"><time class="entry-date" datetime="%3$s">%4$s</time></a></span>',
		esc_url( get_permalink() ),
		esc_attr( sprintf( __( 'Permalink to %s', 'theme' ), the_title_attribute( 'echo=0' ) ) ),
		esc_attr( get_the_date( 'c' ) ),
		esc_html( sprintf( $format_prefix, get_post_format_string( get_post_format() ), get_the_date() ) )
	);

	if ( $echo )
		echo $date;

	return $date;
}
function theme_entry_meta() 
{
	if ( is_sticky() && is_home() && ! is_paged() )
		echo '<span class="featured-post">' . __( 'Sticky', 'theme' ) . '</span>';

	if ( ! has_post_format( 'link' ) && 'post' == get_post_type() )
		theme_entry_date();

	// Translators: used between list items, there is a space after the comma.
	$categories_list = get_the_category_list( __( ', ', 'theme' ) );
	if ( $categories_list ) {
		echo '<span class="categories-links">' . $categories_list . '</span>';
	}

	// Translators: used between list items, there is a space after the comma.
	$tag_list = get_the_tag_list( '', __( ', ', 'theme' ) );
	if ( $tag_list ) {
		echo '<span class="tags-links">' . $tag_list . '</span>';
	}

	// Post author
	if ( 'post' == get_post_type() ) {
		printf( '<span class="author vcard"><a class="url fn n" href="%1$s" title="%2$s" rel="author">%3$s</a></span>',
			esc_url( get_author_posts_url( get_the_author_meta( 'ID' ) ) ),
			esc_attr( sprintf( __( 'View all posts by %s', 'theme' ), get_the_author() ) ),
			get_the_author()
		);
	}
}

/**
 * Register the needed version JQUERY
 */
function scripts_method() 
{
	wp_deregister_script( 'jquery' );
	wp_register_script( 'jquery', TDU.'/js/jquery-1.11.0.min.js');
	wp_enqueue_script( 'jquery' );
}


/**
 * register tag [template-url]
 * @param  string $text 
 * @return string
 */
function template_url($text) 
{
	return str_replace('[template-url]',get_bloginfo('template_url'), $text);
}

/**
 * register tag [template-url]
 * @param  string $text 
 * @return string
 */
function filter_template_url($text) 
{
	return str_replace('[template-url]',get_bloginfo('template_url'), $text);
}

/**
 * Set custom class to "Contact Form 7"
 * @param  string $class 
 * @return string        
 */
function customFormClass($class) 
{
	$class .= ' form-subscribe';
	return $class;
}