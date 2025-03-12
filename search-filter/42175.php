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

if ( $query->have_posts() )
{
	?>
	
	<h2 style="margin-top:30px;margin-bottom: 20px;">VILLAS EN LOS CABOS</h2>
	<div id="inner-content" class="content--inner wrap"  role="main">
	<section class="content--page archive__villas">
	<?php
	while ($query->have_posts())
	{
		
		$query->the_post();
		
		?>
		<article class="villasArchive">
					
					<figure role="group" aria-labelledby="caption" class="destinationsArchive--fig">

							<?php $royalslider = get_field('royal'); ?>
							<?php echo do_shortcode( $royalslider );?>
							
									
					</figure>
					
					<div class="destinationsArchive--figcap">

							<h3 class="destinationsArchive--titulo" style="font-weight: 600;">
								<?php the_title(); ?>
							</h3>
							<div>
							<p class="lside" style="font-family:'lato';font-size:15px;">
								<?php if (get_field('description_short')) {echo get_field('bedrooms') . " Hab. / " . get_field('no_of_guests') . " Huéspedes";} ?>
							</p>
							<p class="rside" style="font-family:'lato';font-size:15px;"><p class="rside" style="font-family:'lato';font-size:16px;"><sup>Desde&nbsp;</sup><strong><?php if (get_field('average_price')) {echo get_field('average_price') . " USD/noche";} ?></strong></p>
							</div>

					</div>	

			</article>
		<?php
	}
	?>
</section>
</div>
	
	<div class="pagination">
		<?php
			/* example code for using the wp_pagenavi plugin */
			if (function_exists('wp_pagenavi'))
			{
				echo "<br />";
				wp_pagenavi( array( 'query' => $query ) );
			}
		?>
	</div>
	<?php
}
else
{
	echo "No Results Found";
}
?>