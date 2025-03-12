<?php
/*
Template Name: Special Offer
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
$special_offer = get_field("special_offer");

?>

<header class="header-image">
	<figure>
		<picture>
			<source srcset="<?php echo $thumb_thumb_url; ?>" media="(max-width: 387px)">
			<source srcset="<?php echo $thumb_big_url; ?>" media="(max-width: 1023px)">
			<source srcset="<?php echo $thumb_original_url; ?>" media="(min-width: 1024px)">
			<img src="<?php echo $thumb_original_url ?>" width="100%" alt="<?php echo $image_alt ?>">
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
			'posts_per_page' => -1,
			'paged' => $paged,
			'order' => 'DESC',
			'orderby' => 'meta_value',
			'meta_query' => array(
				'relation' => 'OR',
				array(
					'key'    => 'offer',
					'value'    => '"special"',
					'compare' => 'LIKE'
				),
				array(
					'key'    => 'offer',
					'value'    => '"exclusive"',
					'compare' => 'LIKE'
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
			$special_o_desc = get_field("special_o_desc", $villa->ID);
			$thumb_id = get_post_thumbnail_id($villa->ID);
			$thumb_thumb_url_array = wp_get_attachment_image_src($thumb_id, 'jmvillas-thumb', true);
			$thumb_thumb_url = $thumb_thumb_url_array[0];
			$exclusive_offer = get_field("exclusive_offer", $villa->ID);

			?>

			<article class="villasArchive">
					<a href="<?php echo $permalink; ?>">
					<figure role="group" aria-labelledby="caption" class="destinationsArchive--fig">
						<picture>
							<?php if ( $exclusive_offer ) : ?>
							<p class="exoffer">Exclusive offer</p>
							<?php endif; ?>
							<source srcset="<?php echo $thumb_thumb_url; ?>" media="(max-width: 400px)">
							<img srcset="<?php echo $thumb_thumb_url; ?>" alt="<?php echo $el_titulo; ?>">
						</picture>
						<div class="s-offer">
							<p><?php echo $special_o_desc; ?></p>	
							</div>

						

					</figure>
					</a>
					<div class="destinationsArchive--figcap">

							<h2 class="destinationsArchive--titulo">
								<a href="<?php echo $permalink; ?>"><?php echo $el_titulo; ?></a>
							</h2>
							<div>
							<p class="destfont"><?php echo strip_tags (    get_the_term_list( $villa->ID, 'Destinations', "",", " )); ?></p>
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

		//Quitar comentarios y cambiar -1 en posts_per_page para activar paginacion
	/*	$args = array(
			'post_type' => 'villas',
			'order' => 'ASC',
			'orderby' => 'title',
			'posts_per_page' => -1,
			'paged' => $paged,
			'meta_query' => array(
				array(
					'key'    => 'special_offer',
					'compare'    => '==',
					'value'    => '1',
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
		}*/

		?>

		</section> <!-- end .content--archive -->
			  
	</div> <!-- end #inner-content -->
</div> <!-- end #content -->

<?php endwhile;
endif; ?>

<div style="clear: both;"></div>
<div class="plan" style="background:#fff !important;">
	<header class="plan--header">
		<div class="wrap" style="padding-top:12px;">
			<h2 style="font-weight:normal;margin-top:0;">
				Contact Us
			</h2>
			<p style="font-family:'lato';font-size:16px;">
				Tell us a bit about what you are looking for, and we will follow up to discuss ideas  
			</p>
		</div>
	</header>
	<div class="plan--content wrap">
<?php echo do_shortcode( '[contact-form-7 id="26686" title="Boooking footer"]' ); ?>
	</div>
</div>
<?php get_footer(); ?>