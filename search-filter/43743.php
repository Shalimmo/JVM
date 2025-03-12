<?php
/**
 * Search & Filter Pro 
 *
 * Sample Results Template
 * 
 * @package   Search_Filter
 * @author    Ross Morsali
 * @link      http://www.designsandcode.com/
 * @copyright 2015 Designs & Code
 * 
 * Note: these templates are not full page templates, rather 
 * just an encaspulation of the your results loop which should
 * be inserted in to other pages by using a shortcode - think 
 * of it as a template part
 * 
 * This template is an absolute base example showing you what
 * you can do, for more customisation see the WordPress docs 
 * and using template tags - 
 * 
 * http://codex.wordpress.org/Template_Tags
 *
 */

$favorites = get_user_favorites();
if ( $favorites ) : // This is important: if an empty array is passed into the WP_Query parameters, all posts will be returned
$paged = ( get_query_var('paged') ) ? get_query_var('paged') : 1; // If you want to include pagination
$favorites_query = new WP_Query(array(
	'post_type' => 'villas', // If you have multiple post types, pass an array
	'posts_per_page' => -1,
	'ignore_sticky_posts' => true,
	'post__in' => $favorites,
	'paged' => $paged // If you want to include pagination, and have a specific posts_per_page set
));?>

	<div id="inner-content" class="content--inner wrap"  role="main">
	<section class="my-favorite-villas">
		<table class="myFavoriteVillas">
			<tr>
				<th>&nbsp;</th>
				<th><h3 style="font-weight:600;">Villa Name</h3></th>
				<th><h3 style="font-weight:600;">Price</h3></th>
				<th><h3 style="font-weight:600;">Guests</h3></th>
				<th><h3 style="font-weight:600;">Bedrooms</h3></th>
			</tr>
		
<?php if ( $favorites_query->have_posts() ) : while ( $favorites_query->have_posts() ) : $favorites_query->the_post(); {?>
			<tr > 
				<td class="myFavoriteVillasImg" >
				<a href="<?php the_permalink(); ?>">
					<figure role="group" aria-labelledby="caption" class="destinationsArchive--fig">
						<picture>
							<source srcset="<?php the_post_thumbnail_url('jmvillas-thumb');?>" media="(max-width: 400px)">
							<img srcset="<?php the_post_thumbnail_url('jmvillas-thumb');?>" alt="<?php the_title(); ?>">
						</picture>
						
					</figure>
					</a>
				</td>
				<td>
					<h3>
						<a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
					</h3>
				</td>
				<td>
					<p class="rside" style="font-family:'lato';font-size:15px;"><p style="font-family:'lato';font-size:16px;"><sup>From&nbsp;</sup><strong><?php if (get_field('average_price')) {echo get_field('average_price');} ?></strong> /nt</p>
				</td>
				<td>
					<p class="rside" style="font-family:'lato';font-size:15px;"><p style="font-family:'lato';font-size:16px;"><strong><?php if (get_field('no_of_guests')) {echo get_field('no_of_guests');} ?></strong></p>
				</td>
				<td>
					<p class="rside" style="font-family:'lato';font-size:15px;"><p style="font-family:'lato';font-size:16px;"><strong><?php if (get_field('bedrooms')) {echo get_field('bedrooms');} ?></strong></p>
				</td>
			</tr>			


	<?php }endwhile;?>
		</table>
	</section>
	</div>
	<?php

next_posts_link( 'Older Favorites', $favorites_query->max_num_pages );
previous_posts_link( 'Newer Favorites' );

endif; wp_reset_postdata();
else :
	echo '<h3>You do not have favorite villas.</h3>';
	// No Favorites
endif;
?>