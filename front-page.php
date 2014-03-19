<?php
/**
 * @package WordPress
 * @subpackage Base_Theme
 */
?>

<?php get_header(); ?>


<?php 
$items = $GLOBALS['slider']->getItems(); 

?>
<section id="about_appKIX" class="slider">
	<div class="slides cf">
		<?php
		foreach ($items as $key => $value) 
		{
			if($value->images)
			{
				?>
				<div class="slide active" style="background-image: url(<?php echo $value->images['full']; ?>);">
					<div class="center-wrap">
						<div class="text cf">
							<div class="holder">
								<h3><?php echo $value->post_title; ?></h3>
								<p class="gray-text"><?php echo $value->post_content; ?></p>
								<a href="<?php echo $value->meta['learn_more']; ?>" class="btn-blue">Learn More</a>
							</div>
						</div>
					</div>
				</div>
				<?php	
			}
		}
		?>
		<!-- <div class="slide active" style="background-image: url(<?php echo TDU; ?>/images/img-1.jpg);">
			<div class="center-wrap">
				<div class="text cf">
					<div class="holder">
						<h3>About AppKIX</h3>
						<p><span class="row">A powerful end to end mobile marketing platform connecting your business</span><span class="row">to your customers using iBeacons and proximity smartphone marketing.</span></p>
						<a href="#" class="btn-blue">Learn More</a>
					</div>
				</div>
			</div>
		</div>
		<div class="slide" style="background-image: url(<?php echo TDU; ?>/images/img-2.jpg);">
			<div class="center-wrap">
				<div class="text cf">
					<div class="holder">
						<h3>Track - Target - Capture</h3>
						<p><span class="row">Deliver the right message to the right customer at the right time. Deliver</span><span class="row">content to any smartphone using iBeacons and location based marketing.</span></p>
						<a href="#" class="btn-blue">Learn More</a>
					</div>
				</div>
			</div>
		</div>
		<div class="slide" style="background-image: url(<?php echo TDU; ?>/images/img-3.jpg);">
			<div class="center-wrap">
				<div class="text cf">
					<div class="holder">
						<h3>Powerful Insights</h3>
						<p><span class="row">Launch campaigns with the ability to optimise in real time.</span><span class="row">Get deep analytical insights such as traffic flows, dwell times,</span><span class="row">number of visits and even competitor visits.</span></p>
						<a href="#" class="btn-blue">Learn More</a>
					</div>
				</div>
			</div>
		</div>
		<div class="slide" style="background-image: url(<?php echo TDU; ?>/images/img-4.jpg);">
			<div class="center-wrap">
				<div class="text cf">
					<div class="holder">
						<h3>iBeacon Technology</h3>
						<p><span class="row">Place our small wireless iBeacons anywhere to deliver personalised content</span> <span class="row">to customers as they walk in the door and move around your venue.</span></p>
						<a href="#" class="btn-blue">Learn More</a>
					</div>
				</div>
			</div>
		</div> -->
	</div>
</section>
<script type="text/javascript">
	jQuery(function(){
		$('.slider').flexslider({
			selector: ".slides > .slide",
			animation: "slide",
			slideshow: false,
			controlNav: true,
			directionNav: false,
			slideshowSpeed: 7000,
			animationSpeed: 600
		});
	});
</script>
<section id="why_use_appKIX" class="section s1 gray">
	<div class="center-wrap">
		<div class="text">
			<h2>Why Use AppKIX?</h2>
			<p>The AppKIX mobile marketing platform enables shopping centres, retailers and venues to send highly targeted, location based content to smartphones through your mobile app. </p>
		</div>
		<div class="four-columns">
			<div class="column">
				<div class="image">
					<img src="<?php echo TDU; ?>/images/ico-1.png" alt="image description">
				</div>
				<h4>Drive Foot Traffic</h4>
				<p>Send engaging mobile phone messages that  customers want to receive as they enter or leave virtual zones inside or around your business.	</p>
			</div>
			<div class="column">
				<div class="image">
					<img src="<?php echo TDU; ?>/images/ico-2.png" alt="image description">
				</div>
				<h4>Increase Engagement</h4>
				<p>Send welcome messages, provide information, promote offers, promote loyalty, provide social media sharing opportunities, build your brand all in real time.</p>
			</div>
			<div class="column">
				<div class="image">
					<img src="<?php echo TDU; ?>/images/ico-3.png" alt="image description">
				</div>
				<h4>Boost Your Sales</h4>
				<p>Send the right message to your customers at the right time. Boost your sales with targeted messages at or near the point of purchase to influence behaviour. </p>
			</div>
			<div class="column">
				<div class="image">
					<img src="<?php echo TDU; ?>/images/ico-4.png" alt="image description">
				</div>
				<h4>Get Powerful Insights</h4>
				<p>Monitor which campaigns work best, study traffic flows and  dwell times, count the number of visits. Track, target and capture your audience. </p>
			</div>
		</div>
	</div>
</section>
<section id="how_it_works" class="section">
	<div class="center-wrap">
		<div class="text">
			<h2>How Does AppKIX Work</h2>
			<p>AppKIX provides you with everything you need to create and deliver highly targeted location based content and offers through your mobile phone app. Getting started is simple. </p>
		</div>
		<div class="four-columns">
			<div class="column">
				<div class="image">
					<img src="<?php echo TDU; ?>/images/ico-5.png" alt="image description">
				</div>
				<h4>Set Up Beacons</h4>
				<p>AppKIX beacons are easy to install and deploy. The AppKIX dashboard configures and identifies each individual AppKIX beacon.</p>
			</div>
			<div class="column">
				<div class="image">
					<img src="<?php echo TDU; ?>/images/ico-6.png" alt="image description">
				</div>
				<h4>Integrate Our SDK</h4>
				<p>The AppKIX SDK seamlessly integrates with your existing mobile app. Use our API for more advanced configurations.</p>
			</div>
			<div class="column">
				<div class="image">
					<img src="<?php echo TDU; ?>/images/ico-7.png" alt="image description">
				</div>
				<h4>Launch Campaigns</h4>
				<p>Drag and drop video, text, audio or weblink files to deliver cool content to customers in or around your store or venue. Target customers using proximity marketing.</p>
			</div>
			<div class="column">
				<div class="image">
					<img src="<?php echo TDU; ?>/images/ico-8.png" alt="image description">
				</div>
				<h4>Analyse Results</h4>
				<p>View and analyse the most effective campaigns. Create precise target campaigns to specific customer profiles. </p>
			</div>
		</div>
	</div>
</section>
<section id="indoor_LBA" class="section gray">
	<div class="center-wrap">
		<div class="text">
			<h2>Indoor Location Based Mobile Marketing</h2>
			<p>Send messages to customers as they enter pre-determined virtual zones at the entry to your business or inside your business.<br>Message customers location relevant content, promotions and offers to help close the sale. </p>
		</div>
		<div class="text-center">
			<img src="<?php echo TDU; ?>/images/img-7.jpg" alt="image description">
		</div>
	</div>
</section>
<section id="outdoor_LBA" class="section">
	<div class="center-wrap">
		<div class="text">
			<h2>Outdoor Location Based Mobile Marketing</h2>
			<p>Drive more traffic to your business and away from competitors with proximity marketing. Send messages to customers as they enter pre-determined virtual zones around your business or around competitor businesses.</p>
		</div>
		<div class="text-center">
			<div class="image">
				<img src="<?php echo TDU; ?>/images/img-5.jpg" alt="image description">
			</div>
		</div>
	</div>
</section>
<section id="data_insights" class="section gray">
	<div class="center-wrap">
		<div class="text">
			<h2>Powerful Data Insights</h2>
			<p>See in real time how your advertising campaigns are working. Get smart about the offers you send out and build an understanding of what your customers want and when they want it. Tailor your campaigns to specific demographics and user groups. Track, target and capture your audience. </p>
		</div>
		<div class="text-center">
			<img src="<?php echo TDU; ?>/images/img-6.png" alt="image description">
		</div>
	</div>
</section>
<section class="section">
	<div class="center-wrap">
		<h2 class="section-title">Which Sector is Your Business in?</h2>
		<div class="three-box cf">
			<a href="#" class="box">
				<img src="<?php echo TDU; ?>/images/ico-9.png" alt="image description">
				<img src="<?php echo TDU; ?>/images/ico-9-active.png" class="active" alt="image description">
				<strong class="title">Shopping Centres</strong>
				<p>Connect with shoppoers in the moment, on the spot with compelling mobile messages. Provide information, maps, and offers.</p>
			</a>
			<a href="#" class="box">
				<img src="<?php echo TDU; ?>/images/ico-10.png" alt="image description">
				<img src="<?php echo TDU; ?>/images/ico-10-active.png" class="active" alt="image description">
				<strong class="title">Venues</strong>
				<p>Lorem ipsum dolor sit amet consectetur adipisicing elit euismod aliqqua dolorem</p>
			</a>
			<a href="#" class="box">
				<img src="<?php echo TDU; ?>/images/ico-11.png" alt="image description">
				<img src="<?php echo TDU; ?>/images/ico-11-active.png" class="active" alt="image description">
				<strong class="title">Retail</strong>
				<p>Lorem ipsum dolor sit amet consectetur adipisicing elit euismod aliqqua dolorem</p>
			</a>
		</div>
	</div>
</section>




<?php get_footer(); ?>