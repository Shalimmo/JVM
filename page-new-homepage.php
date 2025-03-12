 <?php
/*
Template Name: New Homepage
*/
get_header(); ?>

<?php

// All Custom Fields
$featured = get_field("featured_and_specials");

?>

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
	$slides = get_posts($args);
?>

<?php if (count($slides) > 0) { ?>
	<div class="slider__home">
		<div class="js-slider__home">
		<?php foreach ($slides as $slide) {
			$image = get_field("image", $slide->ID);
			$link = get_field("link", $slide->ID);
			$title = get_field("title", $slide->ID);
			$h3 = get_field("h3", $slide->ID);
			$offer = get_field("offer", $slide->ID);
			$link_offer = get_field ("link_offer", $slide->ID);


			if ($image) {
			?>

			<figure>
				<?php if ($link) { ?>
				<a href="<?php echo $link; ?>" title="<?php echo $title; ?>">
				<?php } ?>
					<img src="<?php echo $image['sizes'][ 'jmvillas-huge' ];?> " alt="<?php echo $title; ?>">
				<?php if ($link) { ?>
				</a>
				<?php } ?>
				<figcaption class="wrap slider--header">
				<h3>
				<?php echo $h3; ?>
				</h3>
				<?php if ($offer) { ?>
				<a class="orng" href="<?php echo $link_offer; ?>" title="<?php echo $title; ?>"><div class="soffer">
				<?php echo $offer; ?>
				</div></a>
				<?php } ?>
				</figcaption>

			</figure>

			<?php
			}
		wp_reset_postdata(); } ?>

		</div>
	</div>

<?php } else { ?>

	<p>No slides now!</p>

<?php } ?>

<div id="content" class="homepage">

	<div id="inner-content" class="content--inner wrap"  role="main">
        

		<section class="content--section section__home">
		<article>
<?php the_content(); ?>
</article>
	<article>
<?php
				if ( $featured )
				{ ?>
				<div class="villa--related">

					<header class="villa--related--header">
						<div class="wrap">
							<h2>
								FEATURED and LIMITED SPECIALS
							</h2>
						</div>
					</header>

					<section class="villa--related--content wrap">

						<div class="js-villa--related">
						<?php
						foreach( $featured as $post): ?>
						<?php setup_postdata($post);

						$thumb_id = get_post_thumbnail_id($post->ID);
						$desc = get_field("description_short", $post->ID);
						$thumb_thumb_url_array = wp_get_attachment_image_src($thumb_id, 'jmvillas-thumb', true);
						$thumb_thumb_url = $thumb_thumb_url_array[0];
						?>

						<article class="villasArchive">

							<a href="<?php the_permalink(); ?>">

								<figure role="group" aria-labelledby="caption" class="destinationsArchive--fig">

									<picture>
										<source srcset="<?php echo $thumb_thumb_url; ?>" media="(max-width: 400px)">
										<img srcset="<?php echo $thumb_thumb_url; ?>" alt="<?php the_title(); ?>">
									</picture>

									<figcaption class="destinationsArchive--figcap">

										<h2 class="destinationsArchive--titulo">
											<?php the_title(); ?>
											<?php echo $desc; ?>
										</h2>

										<div class="destinationsArchive__hover">

											<span class="destinationsArchive__hover--add jmv-add"></span>
											<span class="destinationsArchive__hover--readMore">[ read more ]</span>

										</div>

									</figcaption>

								</figure>

							</a>

						</article>

						<?php endforeach; ?>
						<?php wp_reset_postdata(); ?>
						</div>

					</section>
				</div>

				<?php
				}
				?>
	</article>

		</section>

	</div> <!-- end #inner-content -->

</div> <!-- end #content -->

<div style="clear: both;"></div>
    <?php include (TEMPLATEPATH . '/page-templates/plan_your_trip.php' ); ?>
<?php get_footer(); ?>