<?php
/*
Template Name: About Us
*/
get_header(); ?>

<?php if (have_posts()) : while (have_posts()) : the_post();

$thumb_id = get_post_thumbnail_id($post->ID);
$thumb_thumb_url_array = wp_get_attachment_image_src($thumb_id, 'jmvillas-medium', true);
$thumb_medium_url_array = wp_get_attachment_image_src($thumb_id, 'jmvillas-huge', true);
$thumb_thumb_url = $thumb_thumb_url_array[0];
$thumb_medium_url = $thumb_medium_url_array[0];

?>

<header class="destination--header">
	<figure>
		<picture>
			<source srcset="<?php echo $thumb_thumb_url; ?>" media="(max-width: 400px)">
			<img srcset="<?php echo $thumb_medium_url; ?>" src="<?php echo $thumb_medium_url; ?>" alt="<?php the_title(); ?>">
		</picture>
		<figcaption class="wrap">
			<h1>
				<?php the_title(); ?>
			</h1>
		</figcaption>
	</figure>
</header>


<!-- GET IMAGE FOR TOP OF PAGE -->

<div id="content" class="clean">

	<div class="content--breadcrumb wrap">
		<?php the_breadcrumb(); ?>
	</div>
	<div class="wrap">
		  <div class="page--content">
                
                    <?php the_content(); ?>
        
          </div> <!-- end article section -->
	</div>

</div> <!-- end #content -->

<?php endwhile;
endif; ?>

<div style="clear: both;"></div>

<?php include (TEMPLATEPATH . '/page-templates/plan_your_trip.php' ); ?>

<?php get_footer(); ?>
