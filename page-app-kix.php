<?php
/*
 * @package WordPress
 * Template Name: App Kix Page
*/
?>
<?php get_header(); ?>


<div class="slider-tabs">
	<div class="blue-box">
		<div class="center-wrap">
			<div class="text-center">
				<div class="tab-links">
					<a href="#" class="tab-link slide-1">Shopping Centres</a>
					<a href="#" class="tab-link slide-2">Retailers</a>
					<a href="#" class="tab-link slide-3">Venues</a>
				</div>
			</div>
		</div>
	</div>
	<div class="slides cycle cf">
		<div class="slide" style="background-image: url(<?php echo TDU; ?>/images/img-8.jpg);">
			<div class="center-wrap">
				<div class="text cf">
					<div class="holder">
						<h3>AppKIX for Shopping Centres</h3>
						<ul>
							<li>Send customized welcome messages</li>
							<li>Provide shoppers with interactive 3D mall maps</li>
							<li>Provide relevant and timely information</li>
							<li>Promote retailer offers that can be redeemed in-store</li>
						</ul>
						<a href="#" class="btn-blue">Get in Touch</a>
					</div>
				</div>
			</div>
		</div>
		<div class="slide" style="background-image: url(<?php echo TDU; ?>/images/img-9-1.jpg);">
			<div class="center-wrap">
				<div class="text cf">
					<div class="holder">
						<h3>AppKIX for Retailers</h3>
						<ul>
							<li>Increase store traffic by delivering notificationsas people walk past your stores</li>
							<li>Influence in-store cenversion by delivering targeted offers and content as people browse you products.</li>
							<li>Enhance the in-store experience by delivering value added features such as product matching, product specs, loyalty and contactless payments</li>
							<li>Create and redeem offers, deals and loyalty programs in your store with our retail iBeacon attached to your cash register.</li>
							<li>No more loyalty cards! Your card is kept in the AppKIX mobile wallet so your customer will always have your electronic loyalty card in their pocket.</li>
						</ul>
						<a href="#" class="btn-blue">Get in Touch</a>
					</div>
				</div>
			</div>
		</div>
		<div class="slide" style="background-image: url(<?php echo TDU; ?>/images/img-10.jpg);">
			<div class="center-wrap">
				<div class="text cf">
					<div class="holder">
						<h3>AppKIX for Venues</h3>
						<ul>
							<li>Install beacons next to points of interest and take your visitors on an interwactive self-guide tour.</li>
							<li>Let others join in the conversation through social media participation and engagement.</li>
							<li>Use beacons to deliver powerful indoor mapping and directions.</li>
						</ul>
						<a href="#" class="btn-blue">Get in Touch</a>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
<script type="text/javascript">
	jQuery(function(){
		var start_index = parseInt(location.hash.replace('#', ''));
		if(isNaN(start_index)) start_index = 0;
		
		jQuery('.slider-tabs .slides').cycle({ 
			fx:      'fade', 
			speed:    700, 
			timeout:  0,
			activePagerClass: 'active',
			pager:  '.tab-links',
			startingSlide: start_index,
			pagerAnchorBuilder: function(idx, slide) { 
				return '.tab-links a:eq(' + idx + ')'; 
			}
		});
		jQuery('#nav .slide-shopping-centres > a').click(function() {
			jQuery('.slider-tabs .tab-links .slide-1').trigger('click');
			return false;
		});
		jQuery('#nav .slide-retailers > a').click(function() {
			jQuery('.slider-tabs .tab-links .slide-2').trigger('click');
			return false;
		});
		jQuery('#nav .slide-venues > a').click(function() {
			jQuery('.slider-tabs .tab-links .slide-3').trigger('click');
			return false;
		});
		
	});
</script>


<?php get_footer(); ?>
