<?php get_header(); ?>

<?php if (have_posts()) : while (have_posts()) : the_post();

// All Custom Fields
$number_of_days	= get_field("number_of_days");
$itinerary_galley = get_field("itinerary_galley");
$posts = get_field("related_itineraries");
$ideas_gallery = get_field("vacation_ideas_gallery");

?>


	<div class="slider__home">
		<div class="header-img-container">	

<?php if ( has_post_thumbnail() ) {
$image = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'jmvillas-huge' ); ?>

<img class="header-single" src="<?php echo $image[0]; ?>" width="100%" />
<?php } else { ?>
<img src="<?php bloginfo('stylesheet_directory'); ?>/images/img-journey-mexico-header.jpg" />
<?php } ?>
</div>		
	</div>

<!-- GET IMAGE FOR TOP OF PAGE -->

<div id="content" class="clean">
	<div style="max-width:1024px;margin:0 auto; display:block;padding-top:5px;">
	<div class="content--breadcrumb" style="display:inline-block;">
		<ul class="content--breadcrumb--list"><li>Home</li><li><a href="<?php bloginfo('home'); ?>/vacation-ideas">Vacation Ideas</a></li></ul>
	</div>

	</div>

	<div id="inner-content" class="content--inner"  role="main">

		<section class="content--villa">

			<article class="villa">

				<header class="villa--header wrap">
					<div class="villa--header--txt">
						<h2>
							<?php the_title(); ?>
						</h2>
							<h3>SAMPLE ITINERARY</h3>
						
					</div>
				</header>

				<div class="villa--content wrap">

						<?php
						if ( $number_of_days )
						{ ?>
							<div class="villa--subcontent">
							<div class="villa--capacity">
								<p>Destination: <?php echo strip_tags (    get_the_term_list( get_the_ID(), 'Region', "",", " )); ?></p>

								<p class="rr" style="font-weight:normal !important;">Vacation days: <?php echo $number_of_days; ?></p>
							</div>
							<div class="villa--sharing">
								<?php
					wp_reset_postdata();
					include (TEMPLATEPATH . '/page-templates/social_share.php' ); ?>
							</div>
							</div>

						<div class="itinerary-content">

							<?php the_content(); ?>
						</div>
						<?php
						}
						?>


			
						<div class="sideform-content">
						<div class="plan side" id="plan-your-trip">

					<header class="plan--header header-side">
					<div class="wrap">
						<h2>
						START PLANNING YOUR TRIP
						</h2>
					</div>
					</header>

					<?php echo do_shortcode( '[contact-form-7 id="26670" title="Booking side"]' ); ?>
					<div class="form-footer">
		<table>
			<tr>
				<td><img src="https://villas.journeymexico.com/wp/wp-content/uploads/2016/06/eagle.png"></td>
				<td><p class="inquire">TO INQUIRE ABOUT<br>PLEASE CALL<br><strong>1-800-474-1629</strong></p></td>
			</tr>	
		</table>
		</div>
							</div>
						</div>	

						

					

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
						if ( $ideas_gallery)
						{
						?>
				<div id="customize" style="border-top:none !important;margin-top:0 !important;">
							<h2 style="margin-bottom:24px !important;padding-top:0 !important;margin-top:0 !important;">RECOMMENDED VILLAS</h2>
							<?php echo do_shortcode($ideas_gallery); ?>	
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
<script type="text/javascript">
var j = jQuery.noConflict();
j(document).ready(function(){
j('.venobox_custom').venobox({frameheight: '582px'});   
});
</script>
<?php get_footer(); ?>