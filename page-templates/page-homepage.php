<?php
/*
Template Name: Homepage
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
<?php echo do_shortcode('[new_royalslider id="1"]'); ?>
</div>

<div id="content" class="homepage">

	<div id="inner-content" class="content--inner wrap"  role="main">
        

		<section class="content--section section__home">

	<div class="searchfiltervillas">
		<h2>FIND THE PERFECT MEXICAN VILLA</h2>
			<?php echo do_shortcode( '[searchandfilter id="33403"]' );?>
	</div>
		<article>
<?php the_content(); ?>
</article>


		</section>

	</div> <!-- end #inner-content -->

</div> <!-- end #content -->

<div style="clear: both;"></div>
<div class="plan" style="background:#ffffff !important;">
	<header class="plan--header">
		<div class="wrap" style="padding-top:12px;">
			<h2 style="font-weight:normal;marign-top:0;">
				Contact Us
			</h2>
			<p style="font-family:'lato';font-size:16px;">
				Tell us a bit about what you are looking for, and we will follow up to discuss ideas.
			</p>
		</div>
	</header>
	<div class="plan--content wrap" id="plan-your-trip">
<?php echo do_shortcode( '[contact-form-7 id="26686" title="Boooking footer"]' ); ?>
	</div>
</div>
<?php get_footer(); ?>