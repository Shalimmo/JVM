<?php
/*
Template Name: LP - Experiences
*/
get_header(); ?>

<?php if (have_posts()) : while (have_posts()) : the_post();

$thumb_id = get_post_thumbnail_id($post->ID);
$thumb_thumb_url_array = wp_get_attachment_image_src($thumb_id, 'jmvillas-medium', true);
$thumb_medium_url_array = wp_get_attachment_image_src($thumb_id, 'jmvillas-huge', true);
$thumb_thumb_url = $thumb_thumb_url_array[0];
$thumb_medium_url = $thumb_medium_url_array[0];

?>

<header class="destination--header insider--h">
	<figure>
		<picture>
			<source srcset="<?php echo $thumb_thumb_url; ?>" media="(max-width: 400px)">
			<img srcset="<?php echo $thumb_medium_url; ?>" src="<?php echo $thumb_medium_url; ?>" alt="<?php the_title(); ?>">
		</picture>
		<figcaption class="wrap insider-d">
			<h1>
				<?php the_title(); ?>
			</h1>
			<p>
				<?php the_content(); ?>
			</p>
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
<?php
		$paged = get_query_var( 'paged' ) ? get_query_var( 'paged' ) : 1;
		$el_slug = the_slug();
		$args = array(
			'post_type' => 'itinerary',
			'orderby' => 'date',
			'posts_per_page' => 12,
			'paged' => $paged,
		);


		$itineraries = get_posts($args);
		
		if (count($insiders) > 0) {
			
			foreach ($itineraries as $itinerary) {

			$el_titulo = $itinerary->post_title;
			$permalink = get_permalink( $itinerary->ID );
			$excerpt = get_the_excerpt( $itinerary->ID );
			$author = get_the_author( $itinerary->ID );
			$thedate = get_the_date ( 'F j, Y', $itinerary->ID );
			$thumb_id = get_post_thumbnail_id($itinerary->ID);
			$thumb_thumb_url_array = wp_get_attachment_image_src($thumb_id, 'jmvillas-itinerary', true);	
			$thumb_thumb_url = $thumb_thumb_url_array[0];
			?>

			<article class="insiderArchive">
					<a href="<?php echo $permalink; ?>">
					<figure role="group" aria-labelledby="caption" class="insiderArchive--fig">

						<picture>
							<source srcset="<?php echo $thumb_thumb_url; ?>" media="(max-width: 400px)">
							<img srcset="<?php echo $thumb_thumb_url; ?>" alt="<?php echo $el_titulo; ?>">
						</picture>

						

					</figure>
					</a>
					<div class="insiderArchive--figcap">
							<span><?php echo $thedate; ?></span>
							<h2 class="insiderArchive--title">
								<a href="<?php echo $permalink; ?>" class="title"><?php echo $el_titulo; ?></a>
							</h2>
							<div>
							<p class="lside">
								 <?php
  							  echo substr($excerpt, 0, 330); ?>... <a href="<?php echo $permalink; ?>">Read more &raquo;</a>
							</p>
							</div>

					</div>	

			</article>

			<?php wp_reset_postdata(); } ?>

		<?php } else { ?>

			<h2>No Villas!</h2>


		<?php
			}

		//Consultamos todos los Profesores
		$args = array(
			'post_type' => 'itinerary',
			'order' => 'ASC',
			'orderby' => 'title',
			'posts_per_page' => -1,
			'paged' => $paged,
		);

		$query_max = get_posts( $args );
		
		//Calculamos las Paginas
		$pages = (int)((int)count($query_max) / 15);
		//Verificamos si es una division con residuo 0, si tiene residuo hay que aumentar en 1 el número de páginas
		if ((int)count($query_max) % 15) { $pages++; }
		
		if (function_exists("pagination")) {
			pagination($pages);
		}

		?>
</section>

	</div> <!-- end #inner-content -->
</div> <!-- end #content -->


<?php endwhile;
endif; ?>

<div style="clear: both;"></div>

<?php get_footer(); ?>
