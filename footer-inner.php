<?php
/**
 * @package WordPress
 * @subpackage Base_Theme
 */
?>
<footer id="footer" class="inner">
			<div class="center-wrap cf">
				<p class="copy">Copyright &copy; 2014 ShopKIX. All Rights Reserved</p>
				<?php wp_nav_menu( array(
					'container'      => '',	
					'menu_class'     => 'bottom-text',					
					'theme_location' => 'bottom_lg')); ?>	
				<!-- <ul class="bottom-text">
					<li><a href="#">Privacy Policy</a></li>
					<li><a href="#">Terms of Use</a></li>
				</ul> -->
			</div>
		</footer>
	</div>
<?php wp_footer(); ?>
</body>
</html>