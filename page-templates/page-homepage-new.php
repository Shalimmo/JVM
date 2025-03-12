<?php
/*
Template Name: Homepage New
*/
get_header(); ?>

<?php
	$args = array(
		'post_type' => 'slides',
		'posts_per_page' => -1,
		'order' => 'DESC',
		'order_by' => 'date',
		'post_status' => 'publish',
		'tax_query' => array(
			array(
				'taxonomy' => 'Sections',
				'field'    => 'slug',
				'terms'    => 'home',
			),
		),
	);
?>

<div id="slideshow-home">
<?php echo do_shortcode('[new_royalslider id="281"]'); ?>
</div>
<div class="home-slider-search">
    <!--a href="http://www.travelandleisure.com/articles/best-villa-rental-agencies" target="_blank"><img src="https://villas.journeymexico.com/wp/wp-content/uploads/best-villa-rental-agency-2016-travel-and-leisure.png" alt="Best Villa Rental Agency 2016"></a-->
 <div class="searchfiltervillas">
		<h1>LUXURY VILLA RENTALS IN MEXICO</h1>
		<h3>SECURE YOUR DREAM VACATION IN PARADISE</h3>
			<?php echo do_shortcode( '[searchandfilter id="33403"]' );?>
	</div>
  </div>
<div style="clear:both;margin:0 !important;padding-top:0;" class="homepage">

	<div id="inner-content" class="content--inner"  role="main">
        

		<section class="content--section section__home">

	<!--div class="searchfiltervillas">
		<h2>FIND THE PERFECT MEXICAN VILLA</h2>
			<?php echo do_shortcode( '[searchandfilter id="33403"]' );?>
	</div-->
		<article style="background:#f2f2f2;">
<?php the_content(); ?>
</article>


		</section>

	</div> <!-- end #inner-content -->

</div> <!-- end #content -->
<div style="clear: both;"></div>
<div class="plan" style="background:#ffffff !important;">
	<header class="plan--header">
		<div class="wrap" style="padding-top:12px;">
			<h2 style="font-weight:600;color:#333;marign-top:0;font-size:24px;">
				GET IN TOUCH
			</h2>
			<p style="font-family:'lato';font-size:16px;">
				Tell us a bit about what you are looking for, and we will follow up to discuss ideas  
			</p>
		</div>
	</header>
	<div class="plan--content wrap" id="plan-your-trip">
<?php echo do_shortcode( '[contact-form-7 id="26686" title="Booking footer"]' ); ?>
	</div>
</div>
<?php get_footer(); ?>