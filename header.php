<?php
/**
 * @package WordPress
 * @subpackage Base_Theme
 */
?>
<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>" />
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title><?php echo (wp_title( ' ', false, 'right' ) == '') ? get_bloginfo('name') : (wp_title( ' ', false, 'right' ) == ''); ?></title>
	<link rel="profile" href="http://gmpg.org/xfn/11" />
	<link rel="stylesheet" type="text/css" media="all" href="<?php bloginfo( 'stylesheet_url' ); ?>" />
	<link media="only screen and (max-width: 980px)" rel="stylesheet" type="text/css" href="<?php echo TDU; ?>/css/tablet.css">
	<link media="only screen and (max-width: 600px)" rel="stylesheet" type="text/css" href="<?php echo TDU; ?>/css/mobile.css">
	<link media="all" rel="stylesheet" type="text/css" href="<?php echo TDU; ?>/css/jquery.formstyler.css">
	<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>" />
	<?php if ( is_singular() && get_option( 'thread_comments' ) ) wp_enqueue_script( 'comment-reply' ); 
		wp_head(); ?>
	<script type="text/javascript" src="<?php echo TDU; ?>/js/jquery.cycle.all.js" ></script>
	<script type="text/javascript" src="<?php echo TDU; ?>/js/jquery.flexslider-min.js" ></script>
	<script type="text/javascript" src="<?php echo TDU; ?>/js/jquery.main.js" ></script>
	<script src="<?php echo TDU; ?>/js/jquery.formstyler.min.js"></script>
	<script>
		(function($) {
			$(function() {
				$('input, .select select').styler();
			})
			})(jQuery)
	</script>
	<!--[if lt IE 9]>
		<script type="text/javascript" src="<?php echo TDU; ?>/js/html5.js"></script>
		<script type="text/javascript" src="<?php echo TDU; ?>/js/pie.js"></script>
		<script type="text/javascript" src="<?php echo TDU; ?>/js/init-pie.js"></script>
	<![endif]-->
	<!--[if lte IE 9]>
		<script type="text/javascript" src="<?php echo TDU; ?>/js/jquery.placeholder.min.js"></script>
		<script type="text/javascript">
			jQuery(function(){
				jQuery('input, textarea').placeholder();
			});
		</script>
	<![endif]-->
	<!--[if IE 8]>
		<link rel="stylesheet" type="text/css" media="all" href="<?php echo TDU; ?>/css/ie8.css" />
	<![endif]-->


</head>
<body <?php body_class(); ?>>
	<div id="wrapper">
		<header id="header" class="cf">
			<div class="center-wrap cf">
				<a href="<?php echo home_url('/'); ?>" class="logo"><img src="<?php echo TDU; ?>/images/logo.png" alt="<?php bloginfo('name'); ?>"></a>
				<div class="header-button">
					<span class="mobile-visible btn-nav-m"></span>
					<a href="#" class="btn-login">Client Login</a>
				</div>
			<?php wp_nav_menu( array(
				'container' => 'nav',
				'menu_id' => 'nav',
				'theme_location' => 'primary_nav',
				)); ?>
			</div>
		</header>
