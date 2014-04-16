<?php
/*
 * @package WordPress
 * Template Name: Contact Page
*/
?>
<?php get_header(); ?>
<div class="center-wrap">
	<div class="two-columns content">
		<div class="column">
			<h4>Get in Touch</h4>
			<p>Wanto to learn more about AppKIX? Complete your details and we’ll get in touch with you.</p>
			<strong class="phone">1-222-333-4444</strong>
		</div>
		<div class="column col-form">
			<?php echo do_shortcode('[contact-form-7 id="48" title="Contact Form"]'); ?>
		</div>
	</div>
</div>

