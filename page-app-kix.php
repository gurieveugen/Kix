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
		<div class="slide">
			<div class="slide-holder" style="background-image: url(<?php echo TDU; ?>/images/img-18.jpg);">
				<div class="center-wrap">
					<div class="text cf">
						<div class="holder">
							<h3>AppKIX for Shopping Centres</h3>
								<ul class="question-list">
									<li>Are you shoppers engaged? inspired?</li>
									<li>Are you connecting shoopers with content that interest them!</li>
									<li>How can you enhance the shopper experience?</li>
									<li>How can you get shoppers to return more often?</li>
								</ul>
							<a href="#" class="btn-blue">Get in Touch</a>
						</div>
					</div>
				</div>
			</div>
			<div class="slide-holder" style="background-image: url(<?php echo TDU; ?>/images/img-19.jpg);">
				<div class="center-wrap">
					<div class="text cf">
						<div class="holder">
							<h3>Start Connecting <br>With Your Shoppers</h3>
							<ul class="check-list">
								<li>Send welcome messages</li>
								<li>Provide relevant and timely information</li>
								<li>Promote retailer offers that can be redeemed in-store</li>
								<li>Increase shopper engagement and loyalty</li>
							</ul>
							<a href="#" class="btn-blue">Get in Touch</a>
						</div>
					</div>
				</div>
			</div>
		</div>
		<div class="slide">
			<div class="slide-holder" style="background-image: url(<?php echo TDU; ?>/images/img-20.jpg);">
				<div class="center-wrap">
					<div class="text cf">
						<div class="holder">
							<h3>AppKIX for Retailers</h3>
								<ul class="question-list">
									<li>Are you shoppers engaged? inspired?</li>
									<li>Are you connecting shoopers with content that interest them!</li>
									<li>How can you enhance the shopper experience?</li>
									<li>How can you get shoppers to return more often?</li>
								</ul>
							<a href="#" class="btn-blue">Get in Touch</a>
						</div>
					</div>
				</div>
			</div>
			<div class="slide-holder" style="background-image: url(<?php echo TDU; ?>/images/img-21.jpg);">
				<div class="center-wrap">
					<div class="text cf">
						<div class="holder">
							<h3>Start Connecting With <br>Your Customers</h3>
							<ul class="check-list">
								<li>Increase store traffic by delivering notifications as people walk past <br>your stores</li>
								<li>Influence in-sotre conversion by delivering targeted offers and content <br>as people browse your products</li>
								<li>Enhance the in-store experience by delivering value added features <br>such as product matching, product specs, loyalty and contactiess payments</li>
								<li>create and redeem offers, deals and loyalty programs in your store <br>with our retail iBeacon attached to your cash register</li>
							</ul>
							<a href="#" class="btn-blue">Get in Touch</a>
						</div>
					</div>
				</div>
			</div>
		</div>
		<div class="slide">
			<div class="slide-holder" style="background-image: url(<?php echo TDU; ?>/images/img-22.jpg);">
				<div class="center-wrap">
					<div class="text cf">
						<div class="holder">
							<h3>AppKIX for Venues</h3>
								<ul class="question-list">
									<li>Are you customers engaged? inspired?</li>
									<li>Are you connecting customers with content that interest them!</li>
									<li>How can you enhance the customers experience?</li>
									<li>How can you get customers to return more often?</li>
								</ul>
							<a href="#" class="btn-blue">Get in Touch</a>
						</div>
					</div>
				</div>
			</div>
			<div class="slide-holder" style="background-image: url(<?php echo TDU; ?>/images/img-23.jpg);">
				<div class="center-wrap">
					<div class="text cf">
						<div class="holder">
							<h3>Start Connecting With <br>Your Customers</h3>
							<ul class="check-list">
								<li>Install beacons next to points of interest and take your visitors on an <br>interactive self-guide tour</li>
								<li>Engage customers in your venue during the event</li>
								<li>Let others join in the conversation through social media participation <br>and engagement</li>
								<li>Use beacons to deliver powerful indoor mapping and directions</li>
							</ul>
							<a href="#" class="btn-blue">Get in Touch</a>
						</div>
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
<section class="section">
	<div class="center-wrap">
		<h2>The Customer Journey with AppKIX</h2>
		<div class="four-columns inner">
			<div class="column">
				<div class="image">
					<img src="<?php echo TDU; ?>/images/ico-10-1.png" alt="image description">
				</div>
				<div class="title-row">
					<h4>Download the App</h4>
				</div>
				<p>Customers download your whitelabelled app from the app store or Google Play store</p>
			</div>
			<div class="column">
				<div class="image">
					<img src="<?php echo TDU; ?>/images/ico-11-1.png" alt="image description">
				</div>
				<div class="title-row">
					<h4>Relevant User Notifications Macro</h4>
				</div>
				<p>Customers are notified when near your venue about offers or information relevant to them</p>
			</div>
			<div class="column">
				<div class="image">
					<img src="<?php echo TDU; ?>/images/ico-12.png" alt="image description">
				</div>
				<div class="title-row">
					<h4>Relevant User Notifications Micro</h4>
				</div>
				<p>Customers are notified when inside your venue about offers or information relevant to them</p>
			</div>
			<div class="column">
				<div class="image">
					<img src="<?php echo TDU; ?>/images/ico-13.png" alt="image description">
				</div>
				<div class="title-row">
					<h4>Great Engagements</h4>
				</div>
				<p>Customers receive offers or information based on their location when inside your venue</p>
			</div>
		</div>
	</div>
</section>

<?php get_footer(); ?>
