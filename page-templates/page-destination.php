<?php
/*
Template Name: Destination
*/
get_header(); ?>

<?php if (have_posts()) : while (have_posts()) : the_post();

$thumb_id = get_post_thumbnail_id($post->ID);
$thumb_thumb_url_array = wp_get_attachment_image_src($thumb_id, 'jmvillas-medium', true);
$thumb_medium_url_array = wp_get_attachment_image_src($thumb_id, 'jmvillas-huge', true);
$thumb_thumb_url = $thumb_thumb_url_array[0];
$thumb_medium_url = $thumb_medium_url_array[0];
$destination_map_location = get_field("destination_map_location");
$useful_information = get_field("useful_information");
$contact_form = get_field("contact_form");

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

<div id="content" class="destinationp">
<article id="nond">
		<div class="sidebar--search js-sidebar--search">
	<h2>FIND THE PERFECT MEXICAN VILLA</h2>

	<input type="hidden" value="<?php bloginfo('home'); ?>" class="js-rs__home">
	<?php
	$terms = get_terms( 'Destinations' );
	if ( ! empty( $terms ) && ! is_wp_error( $terms ) )
	{
		echo '<select class="js-rs__destination">';
		echo '<option value="">Destination</option>';
		foreach ( $terms as $term ) {
			echo '<option value="' . $term->slug . '">' . $term->name . '</option>';
		}
		echo '</select>';
	}

	$values = $wpdb->get_col("SELECT meta_value
		FROM $wpdb->postmeta WHERE meta_key = 'bedrooms'" );
	$numbers = array_unique($values);
	sort($numbers);

	if( $numbers )
	{
		echo '<select class="js-rs__number">';
		echo '<option value="">Number of bedrooms</option>';
		foreach( $numbers as $k => $v )
		{
			echo '<option value="' . $v . '">' . $v . '</option>';
		}
		echo '</select>';
	}


	?>

	<a href="" class="js-refineSearch sidebar--search--btn">FIND YOUR VILLA</a>

</div>
		</article>	
	<div class="content--breadcrumb wrap noupper">
		<?php the_breadcrumb(); ?>
	</div>
	<div class="wrap main-d">
	<section><?php the_content(); ?></section>
	<section></section>
	<section>
	</div>
	<div id="inner-content" class="content--inner wrap"  role="main">

		<section class="content--archive archive__villas">

		<?php
		$paged = get_query_var( 'paged' ) ? get_query_var( 'paged' ) : 1;
		$el_slug = the_slug();
		$args = array(
			'post_type' => 'villas',
			'order' => 'ASC',
			'orderby' => 'title',
			'posts_per_page' => 15,
			'paged' => $paged,
			'tax_query' => array(
				array(
					'taxonomy' => 'Destinations',
					'field'    => 'slug',
					'terms'    => $el_slug,
				),
			),
		);

		$villas = get_posts($args);
		
		if (count($villas) > 0) {
			
			foreach ($villas as $villa) {

			$el_titulo = $villa->post_title;
			$permalink = get_permalink( $villa->ID );
			$the_description = get_field ("description_short", $villa->ID);
			$the_price = get_field ("average_price", $villa->ID);
			$thumb_id = get_post_thumbnail_id($villa->ID);
			$thumb_thumb_url_array = wp_get_attachment_image_src($thumb_id, 'jmvillas-thumb', true);
			
			$thumb_thumb_url = $thumb_thumb_url_array[0];

			?>

			<article class="villasArchive">
					<a href="<?php echo $permalink; ?>">
					<figure role="group" aria-labelledby="caption" class="destinationsArchive--fig">

						<picture>
							<source srcset="<?php echo $thumb_thumb_url; ?>" media="(max-width: 400px)">
							<img srcset="<?php echo $thumb_thumb_url; ?>" alt="<?php echo $el_titulo; ?>">
						</picture>

						

					</figure>
					</a>
					<div class="destinationsArchive--figcap">

							<h2 class="destinationsArchive--titulo">
								<a href="<?php echo $permalink; ?>"><?php echo $el_titulo; ?></a>
							</h2>
							<div>
							<p class="lside">
								<?php echo $the_description; ?>
							</p>
							<p class="rside"><?php echo $the_price; ?></p>
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
			'post_type' => 'villas',
			'order' => 'ASC',
			'orderby' => 'title',
			'posts_per_page' => -1,
			'paged' => $paged,
			'tax_query' => array(
				array(
					'taxonomy' => 'Destinations',
					'field'    => 'slug',
					'terms'    => $el_slug,
				),
			),
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

		</section> <!-- end .content--archive -->
			  
	</div> <!-- end #inner-content -->
</div> <!-- end #content -->

<?php endwhile;
endif; ?>

<div style="clear: both;"></div>
<div class="map-dest" id="map-dest"><?php echo $destination_map_location; ?></div>
<div class="useful-inf"><?php echo $useful_information; ?></div>
<div class="plan">
	<header class="plan--header">
		<div class="wrap">
			<h2>
				Plan your trip
			</h2>
			<p>
				Tell us a bit about what you are looking for, and we will follow up to discuss ideas  
			</p>
		</div>
	</header>
	<div class="plan--content wrap">
<?php echo $contact_form; ?>
	</div>
</div>
<?php get_footer(); ?>