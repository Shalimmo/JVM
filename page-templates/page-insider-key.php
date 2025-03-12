<?php
/*
Template Name: LP - Insider Key
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

?>

<?php endwhile;
endif; ?>
<header class="header-image insider--h">
	<figure style="background:none;">
		<picture>
			<source srcset="<?php echo $thumb_thumb_url; ?>" media="(max-width: 387px)">
			<source srcset="<?php echo $thumb_big_url; ?>" media="(max-width: 1023px)">
			<source srcset="<?php echo $thumb_original_url; ?>" media="(min-width: 1024px)">
			<img src="<?php echo $thumb_original_url ?>" width="100%" alt="<?php echo $image_alt ?>">
		</picture>
		<figcaption class="wrap insider-d">
			<h1>
				<?php the_title(); ?>
			</h1>
			<p class="p1"><span class="s1">Unlock the information and secrets to some of Mexico’s most sought-after destinations and lesser known gems! Here on our blog, we leave you the keys to access insider information that make Villas by Journey Mexico the leading authority in luxury villas rentals in Mexico.
			<span></p>
		</figcaption>
	</figure>
</header>


<!-- GET IMAGE FOR TOP OF PAGE -->

<div id="content" class="clean">

	<div class="content--breadcrumb wrap">
		<?php the_breadcrumb(); ?>
	</div>
	<div class="wrap insidersub-h"><h2>LATEST INSIGHTS AND STORIES</h2></div>
	<div id="inner-content" class="content--inner wrap"  role="main">
	
<section class="content--archive archive__insider">
	<?php the_content(); ?>
</section>

	</div> <!-- end #inner-content -->
</div> <!-- end #content -->



<div style="clear: both;"></div>

<?php get_footer(); ?>
