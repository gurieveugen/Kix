<?php
/*
 * @package WordPress
 * Template Name: Development Page
*/
?>
<?php get_header(); ?>


<div class="visual">
	<div class="visual-holder" style="background-image: url(<?php echo TDU; ?>/images/img-11.jpg);background-position:50% 0;background-size: cover;background-repeat:no-repeat;">
		<div class="center-wrap">
			<div class="text">
				<div class="holder">
					<h3>AppKIX... Also Make Apps</h3>
					<p>AppKIX will work with you to make your app idea come to life. <br>Our creative team will provide feedback on your app idea and present you with several design templates to work with. We then build and test your app so it is ready to release to the market. </p>
					<a href="#" class="btn-blue">Contact us and let’s get started </a>
				</div>
			</div>
		</div>
	</div>
</div>
<section id="main">
	<div class="center-wrap">
		<h1>Get In Touch</h1>
		<div class="form-app">
			<?php echo do_shortcode('[contact-form-7 id="96" title="Untitled"]'); ?>
			<!-- <div class="two-columns">
				<div class="column">
					<label>Username*</label>
					<input type="text" placeholder="Fullname">
					<label>Phone Number*</label>
					<input type="text" placeholder="Phone number">
					<label>Location</label>
					<input type="text" placeholder="Location">
				</div>
				<div class="column">
					<label>Your Email*</label>
					<input type="email" placeholder="Email Address">
					<label>Your Age</label>
					<input type="text" placeholder="Age">
					<label>Platform*</label>
					<div class="select">
						<select>
							<option value="iPhone App">iPhone App</option>
							<option value="iPhone App1">iPhone App1</option>
							<option value="iPhone App2">iPhone App2</option>
							<option value="iPhone App3">iPhone App3</option>
							<option value="iPhone App4">iPhone App4</option>
						</select>
					</div>
				</div>
			</div>
			<label>Tell Us About Your App idea*</label>
			<textarea placeholder="Write details here"></textarea>
			<input type="submit" value="Submit Your App">  -->
		</div>
	</div>
</section>


<?php get_footer(); ?>
