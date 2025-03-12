<?php
/*
Template Name: Homepage MX
*/
get_header('es'); ?>
<?php if (have_posts()) : while (have_posts()) : the_post();

$thumb_id = get_post_thumbnail_id($post->ID);
$thumb_original_url_array = wp_get_attachment_image_src($thumb_id, 'full', true);
$thumb_medium_url_array = wp_get_attachment_image_src($thumb_id, 'jmvillas-medium', true);
$thumb_big_url_array = wp_get_attachment_image_src($thumb_id, 'jmvillas-big', true);
$thumb_thumb_url_array = wp_get_attachment_image_src($thumb_id, 'jmvillas-thumb', true);
$image_alt = get_post_meta( $thumb_id, '_wp_attachment_image_alt', true);
$thumb_original_url = $thumb_original_url_array[0];
$thumb_medium_url = $thumb_medium_url_array[0];
$thumb_big_url = $thumb_big_url_array[0];
$thumb_thumb_url = $thumb_thumb_url_array[0];
$destination_map_location = get_field("destination_map_location");
$useful_information = get_field("useful_information");
$contact_form = get_field("contact_form");
$additional_information = get_field("additional_information");

?>
<?php endwhile;
endif; ?>

<div id="slideshow-home">
<?php echo do_shortcode('[new_royalslider id="296"]'); ?>
</div>
<div class="home-slider-search">
    <!--a href="http://www.travelandleisure.com/articles/best-villa-rental-agencies" target="_blank"><img src="https://villas.journeymexico.com/wp/wp-content/uploads/best-villa-rental-agency-2016-travel-and-leisure.png" alt="Best Villa Rental Agency 2016"></a-->
 <div class="searchfiltervillas">
		<h1>RENTA DE VILLAS EN MÉXICO</h1>
		<h3>RESERVA LA VILLA DE TUS SUEÑOS PARA TUS VACACIONES EN MÉXICO</h3>
	</div>
  </div>
<!-- GET IMAGE FOR TOP OF PAGE -->

<div class="destinationp">
<div class="finder" style="background:#333;">

</div>
	<div class="content--breadcrumb wrap">
		<?php the_breadcrumb(); ?>
	</div>
	<div class="main-d">
	<section>
	<?php the_content(); ?>
	</section>
	</div>
</div> <!-- end #content -->

<div style="clear: both;"></div>
<div class="plan" style="background:#ffffff !important;">
	<header class="plan--header">
		<div class="wrap" style="padding-top:12px;">
			<h2 style="font-weight:600;color:#333;margin-top:0;font-size:24px;">
				CONTÁCTANOS
			</h2>
			<p style="font-family:'lato';font-size:16px;">
				Cuéntanos un poco más sobre tus necesidades de viajes y nos pondremos en contacto algunas ideas.   
			</p>
		</div>
	</header>
	<div class="plan--content wrap" id="plan-your-trip">
<?php echo do_shortcode( '[contact-form-7 id="42463" title="Boooking footer es"]' ); ?>
	</div>
</div>
<?php get_footer(); ?>