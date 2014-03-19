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
				<div class="text text-transparent cf">
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
				<div class="text text-transparent cf">
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
<section id="main">
	<div class="center-wrap">
		<h1>Frequently Asked Questions</h1>
		<div class="two-columns">
			<div class="column">
				<h3>What is AppKIX?</h3>
				<p>AppKIX is an end-to-end online mobile marketing platform that allows you to send personalised content to people as they move through your venue or store. Our cloud based web platform allows you to manage iBeacons, setup customised campaigns and offers in real time and analyse the results of your campaigns.</p>
				<h3>Does bluetooth need to be switched on for AppKIX to work?</h3>
				<p>Yes for a smartphone to recognise a beacon bluetooth needs to be switched on. When your app is downloaded bluetooth is automatically switched on in settings.</p>
				<h3>Which smartphones work with AppKIX?</h3>
				<p>All bluetooth 4.0 enabled devices talk with iBeacons including iPhone 4S and 5, iPad 3, Samsung Galaxy S III and Motorola Droid RAZR.</p>
			</div>
			<div class="column">
				<h3>What is an iBeacon?</h3>
				<p>An iBeacon is a small wireless device that broadcasts small radio signals. These signals talk to smartphones. Messages can be sent to the smartphone through an app. ibeacons can be attached to any surface and transmit signals up to 50 metres. iBeacons last up to 2 years on a single battery.</p>
				<br>
				<h3>Do people require an app to interact with AppKIX?</h3>
				<p>Yes for interactions to occur people must have downloaded your app that supports iBeacons.</p>
				<h3>What kind of applications can we use AppKIX for?</h3>
				<p>The AppKIX platform includes micro ( in-store ) marketing and macro ( out-of-store) proximity marketing,  and contactless offer redemption and loyalty redemption plus analytics.</p>
			</div>
		</div>
	</div>
</section>


<?php get_footer(); ?>
