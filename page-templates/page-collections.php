<?php
/*
Template Name: Collections
*/
get_header(); ?>
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

<div class="header-image">
	<figure id="gray">
		<picture>
			<source srcset="<?php echo $thumb_thumb_url; ?>" media="(max-width: 387px)">
			<source srcset="<?php echo $thumb_big_url; ?>" media="(max-width: 1023px)">
			<source srcset="<?php echo $thumb_original_url; ?>" media="(min-width: 1024px)">
			<img src="<?php echo $thumb_original_url ?>" width="100%" alt="<?php echo $image_alt ?>">
		</picture>
		<figcaption>
			<h1>
				<?php the_title(); ?>
			</h1>
			<span>VILLA COLLECTIONS</span>
		</figcaption>
	</figure>
</div>
<!-- GET IMAGE FOR TOP OF PAGE -->

<div class="destinationp">
	<div class="main-d">
	<section>
	<?php the_content(); ?>
	</section>
	</div>
</div> <!-- end #content -->

<div style="clear: both;"></div>
<div class="wrap"><?php echo $additional_information; ?></div>
<div class="plan" style="background:#fff !important;">
	<header class="plan--header">
		<div class="wrap" style="padding-top:12px;">
			<h2 style="font-weight:600;color:#333;margin-top:0;">
				Get in Touch
			</h2>
			<p style="font-family:'lato';font-size:16px;">
				Tell us a bit about what you are looking for, and we will follow up to discuss ideas  
			</p>
		</div>
	</header>
	<div class="plan--content wrap" id="plan-your-trip">
<?php echo do_shortcode( '[contact-form-7 id="26686" title="Boooking footer"]' ); ?>
	</div>
</div>
<?php get_footer(); ?>