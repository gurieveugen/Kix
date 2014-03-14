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
					<div class="column col-2">
						<h4>Twitter Feed</h4>
						<ul class="twit-blocks">
							<li class="block">
								<div class="cf">
									<a href="#" class="link">http://bit.ly/9m2iMT#</a>
									<span class="time">9 min ago</span>
								</div>
								<p>Lorem ipsum dolor sit amet consectetur adipisicing elit</p>
							</li>
							<li class="block">
								<div class="cf">
									<a href="#" class="link">http://bit.ly/9m2iMT#</a>
									<span class="time">9 min ago</span>
								</div>
								<p>Lorem ipsum dolor sit amet consectetur adipisicing elit</p>
							</li>
							<li class="block">
								<div class="cf">
									<a href="#" class="link">http://bit.ly/9m2iMT#</a>
									<span class="time">9 min ago</span>
								</div>
								<p>Lorem ipsum dolor sit amet consectetur adipisicing elit</p>
							</li>
						</ul>
					</div>
					<div class="column col-3">
						<h4>Latest Blog Post</h4>
						<ul class="blog-blocks">
							<li class="block">
								<p>Lorem ipsum dolor sit amet consectetur adipisicing elit</p>
								<span class="date">January 12, 2014</span>
							</li>
							<li class="block">
								<p>Lorem ipsum dolor sit amet consectetur adipisicing elit</p>
								<span class="date">January 12, 2014</span>
							</li>
							<li class="block">
								<p>Lorem ipsum dolor sit amet consectetur adipisicing elit</p>
								<span class="date">January 12, 2014</span>
							</li>
						</ul>
					</div>
					<div class="column">
						<h4>Get in Touch</h4>
						<p>Wanto to learn more about AppKIX? Complete your details and we’ll get in touch with you.</p>
						<strong class="phone">1-222-333-4444</strong>
					</div>
					<div class="column col-form">
						<form action="#" class="form-subscribe">
							<input type="text" placeholder="Full Name">
							<input type="text" placeholder="Company">
							<input type="email" placeholder="Email address">
							<input type="text" placeholder="Phone">
							<textarea placeholder="Message"></textarea>
							<input type="submit" value="Subscribe Now">
						</form>
					</div>
				</div>
			</div>
			<div class="footer-bottom">
				<div class="center-wrap-1300">
					<p>Copyright  &copy; 2014 AppKIX. All Rights Reserved.</p>
					<ul>
						<li><a href="#">Terms of Use</a></li>
						<li><a href="#">Privacy Policy</a></li>
						<li><a href="#">Contact Us</a></li>
					</ul>
				</div>
			</div>
		</footer>
	</div>
<?php wp_footer(); ?>
</body>
</html>