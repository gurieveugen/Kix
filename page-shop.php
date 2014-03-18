<?php
/*
 * @package WordPress
 * Template Name: Shop Page
*/
?>
<?php get_header('inner-shop'); ?>
<div id="main" class="landing shop">
	<div class="center-wrap cf">
		<div class="slider-landing">
			<ul class="slides cf">
				<li class="active"><img src="<?php echo TDU; ?>/images/img-1-1.jpg" alt="image description"></li>
				<li><img src="<?php echo TDU; ?>/images/img-2-1.jpg" alt="image description"></li>
			</ul>
		</div>
		<script type="text/javascript">
			jQuery(function(){
				jQuery('.slider-landing').flexslider({
					selector: ".slides > li",
					animation: "slide",
					slideshowSpeed: 7000,
					animationSpeed: 600,
					controlNav: false,
					directionNav: false
				});
			});
		</script>
		<aside class="aside-form">
			<a href="#" class="logo-shop"><img src="<?php echo TDU; ?>/images/logo-shop.png" alt="image description"></a>
			<div class="text">
                <?php while ( have_posts() ) : the_post(); ?>
                    <?php the_content(); ?>				
                <?php endwhile; ?>
			</div>
            <?php echo do_shortcode('[contact-form-7 id="97" title="Lending"]'); ?>	
		</aside>
	</div>
</div>
<?php get_footer('inner'); ?>
