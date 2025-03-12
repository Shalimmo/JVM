<?php get_header(); ?>

<?php if (have_posts()) : while (have_posts()) : the_post();

// All Custom Fields
$gallery = get_field("gallery");
$place = get_field("place");
$description_short = get_field("description_short");
$description_full = get_field("description_full");
$bedding_details = get_field("bedding_details");
$amenities = get_field("amenities");
$rates_conditions = get_field("rates_conditions");
$rates_table = get_field("rates_table");
$rates = get_field("rates");
$special_offers = get_field("special_offers");
$more_info = get_field("more_info");
$map_location = get_field("map_location");
$posts = get_field("related_villas");
$average_price = get_field("average_price");
$capacity = get_field("capacity");
$price_range = get_field("price_range");
$amenities_icons = get_field("amenities_icons");

?>

<?php if ( $gallery ) { ?>

	<div class="slider__home">
		<div class="js-slider__villa">
		<?php foreach ($gallery as $image) {
			$medium = $image['sizes']['jmvillas-medium'];
			$full = $image['sizes']['jmvillas-full'];

			$width = $image['sizes'][ 'jmvillas-full-width' ];
			$height = $image['sizes'][ 'jmvillas-full-height' ];
			$relacion = $width / $height;
			$horiz_media = ( $relacion < 2.19 && $relacion > 1.5) ? "horizontal_mediana" : "" ;
			$horiz_media = ( $relacion <= 1.5 ) ? "vertical" : $horiz_media ;
			?>

			<figure >
				<a <?php echo $fondo = ( $horiz_media != "" ) ? "style='background-image: url(" . $full . ");'" : "" ; ?> href="<?php echo $full; ?>" target="_blank" class="js-strip " data-strip-group="villa">
					<picture>
						<source srcset="<?php echo $medium; ?>" media="(max-width: 400px)">
						<img srcset="<?php echo $full; ?>" src="<?php echo $full; ?>" alt="<?php the_title(); ?>" class="<?php echo $horiz_media; ?>">
					</picture>
				</a>
			</figure>

			<?php
			
		} ?>

		</div>

		<div class="wrap slider--header js-slider--header">
			<h1>
				<?php the_title(); ?>
			</h1>
		</div>
	</div>

<?php } else { ?>

	<div class="encabezado__titulo">
		<div class="wrap">
			<h1>
				<?php the_title(); ?>
			</h1>
		</div>
	</div>

<?php } ?>


<!-- GET IMAGE FOR TOP OF PAGE -->

<div id="content" class="clean">

	<div class="content--breadcrumb wrap">
		<?php the_breadcrumb(); ?>
	</div>

	<div id="inner-content" class="content--inner"  role="main">

		<section class="content--villa">

			<article class="villa">

				<header class="villa--header wrap">
					<div class="villa--header--txt">
						<h2>
							<?php the_title(); ?>
						</h2>
						<?php 
						if ( $place )
						{ ?>
							<h3><?php echo $place; ?></h3>
						<?php
						}
						?>
					</div>
				</header>

				<div class="villa--content wrap">

					<div class="js-villa--content fix-m">

						<?php
						if ( $description_short )
						{ ?>
							<div class="villa--subcontent">
							<div class="villa--capacity">
								<p><?php echo $capacity; ?></p>
								<p class="rr"><?php echo $price_range; ?></p>
							</div>
							<div class="villa--sharing">
								<p>SHARE THIS VILLA</p>
								<p class="rrr"><a href="#map-dest">VIEW ON A MAPs</a></p>
							</div>
							</div>

						<div class="villa--block fix-n">

							<?php the_content(); ?>

							<?php
							if ( $description_full )
							{
							?>
							<div class="villa--descripcion__full js-villa--descripcion__full">
								<?php
									echo $description_full;?>

															<?php

							if(in_array("Pool", $amenities_icons )){
							?>
							<div class="amenities"><img src="<?php echo get_bloginfo('url'); ?>/wp/wp-content/uploads/2015/07/view-map-pointer.png" ></div>
							<?
							}

							?>
								
							</div>
							
							<?php
							}
							?>
						</div>
						<?php
						}
						?>


			
						<div class="villa--planner fix-n">
						<?php include (TEMPLATEPATH . '/page-templates/plan_your_trip_side.php' ); ?>
						</div>	

						

					</div>
					

				</div>

				<div id="customize">
    		<h2>CUSTOMIZE YOUR VILLA HOLIDAY</h2>
    		<p>Let us help you create a complete vacation experience by adding unique experiences to your stay</p>
					<?php echo do_shortcode('[new_royalslider id="3"]')?>

				</div>

				<?php
						if ( $map_location)
						{
						?>
		
				<div class="villa--related" id="map-dest">
					<header class="villa--related--header">
						<div class="wrap">
						<h2><?php echo the_title(); ?> location</h2>
						</div>
					</header>
					<section class="villa--related--content wrap">
							<?php echo $map_location; ?>
					</section>					
				</div>
						<?php
							}
							?>		
						

				<?php
				if ( $posts )
				{ ?>
				<div class="villa--related">

					<header class="villa--related--header">
						<div class="wrap">
							<h2>
								You may also like
							</h2>
						</div>
					</header>

					<section class="villa--related--content wrap">

						<div class="js-villa--related">
						<?php
						foreach( $posts as $post): ?>
						<?php setup_postdata($post);

						$thumb_id = get_post_thumbnail_id($post->ID);
						$thumb_thumb_url_array = wp_get_attachment_image_src($thumb_id, 'jmvillas-thumb', true);
						
						$thumb_thumb_url = $thumb_thumb_url_array[0];
						?>

						<article class="villasArchive">

							

								<figure role="group" aria-labelledby="caption" class="destinationsArchive--fig">

									<picture>
										<source srcset="<?php echo $thumb_thumb_url; ?>" media="(max-width: 400px)">
										<img srcset="<?php echo $thumb_thumb_url; ?>" alt="<?php the_title(); ?>">
									</picture>

								</figure>
									<div class="destinationsArchive--figcap">

										<h2 class="destinationsArchive--titulo">
											<a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
										</h2>

									</div>

							

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

		</section> <!-- end .content--villa -->
			  
	</div> <!-- end #inner-content -->
</div> <!-- end #content -->

<?php endwhile;
endif; ?>

<div style="clear: both;"></div>

<?php get_footer(); ?>
