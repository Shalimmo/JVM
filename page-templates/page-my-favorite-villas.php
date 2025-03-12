<?php
/*
Template Name: My Favorite Villas
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
	<figure>
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
		</figcaption>
	</figure>
</div>
<!-- GET IMAGE FOR TOP OF PAGE -->

<div class="destinationp">
<div class="finder" style="background:#333;">
<article id="nond">
	<h2 style="margin-top:0;color:#fff;margin-bottom:12px;">GET HELP FINDING THE PERFECT VACATION VILLA !</h2>
		<?php echo do_shortcode('[sg_popup id=35960 event="click"]<button style="background:#ef8a0b;color:#fff; padding:7px 22px;border:none; margin-bottom:18px">TALK TO A MEXICO EXPERT</button>[/sg_popup]');?>
		</article>	
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

<div class="map-dest" id="map-dest" style="border-top:1px solid #999999;margin-top:40px;"><?php echo $destination_map_location; ?></div>
<div class="wrap"><?php echo $additional_information; ?></div>
<div class="useful-inf" style="border-top:0;"><?php echo $useful_information; ?></div>
<div class="plan" style="background:#fff !important;">
	<header class="plan--header">
		<div class="wrap" style="padding-top:12px;">
			<h2 style="margin-top:0;">
				Contact Us
			</h2>
			<p style="font-family:'lato';font-size:16px;">
				Tell us a bit about what you are looking for, and we will follow up to discuss ideas  
			</p>
		</div>
	</header>
	<div class="plan--content wrap">
<?php echo do_shortcode( '[contact-form-7 id="33840" title="Booking footer luxury"]'); ?>
	</div>
</div>
<?php get_footer(); ?>