<?php
/**
 * @package WordPress
 * @subpackage Base_Theme
 */
?>
		<footer id="footer">
			<div class="center-wrap-1300">
				<div class="footer-area">
					<?php
					if(is_active_sidebar('footer-sidebar'))
					{
						dynamic_sidebar('footer-sidebar');
					}
					?>																				
					<div class="column col-form">
						<?php echo do_shortcode('[contact-form-7 id="48" title="Contact Form"]'); ?>						
					</div>
				</div>
			</div>
			<div class="footer-bottom">
				<div class="center-wrap-1300">
					<p>Copyright  &copy; 2014 AppKIX. All Rights Reserved.</p>
					<?php wp_nav_menu( array(
						'container'      => '',						
						'theme_location' => 'bottom_nav')); ?>					
				</div>
			</div>
		</footer>
	</div>
<?php wp_footer(); ?>
</body>
</html>