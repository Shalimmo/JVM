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
	
	<div id="inner-content" class="wrap"  role="main">
		<h3 style="font-weight:600;color#333;font-size:24px;margin:26px 0 26px 0;text-align: center;">OTHER AVAILABLE VILLAS</h3>
	<section class="content--page archive__villas">
		
	<?php
	while ($query->have_posts())
	{
		
		$query->the_post();
		
		?>
		<?php
		$festive = get_field('festive');
		if( $festive && in_array('thumbnail', $festive) ): ?>
		
			<article class="villasArchive">
					<a href="<?php the_permalink(); ?>">
					<figure role="group" aria-labelledby="caption" class="destinationsArchive--fig">

						<picture>
							<source srcset="<?php the_post_thumbnail_url('jmvillas-thumb');?>" media="(max-width: 400px)">
							<img srcset="<?php the_post_thumbnail_url('jmvillas-thumb');?>" alt="<?php the_title(); ?>">
						</picture>
					</figure>
					</a>
					<div class="destinationsArchive--figcap">

							<h3 class="destinationsArchive--titulo">
								<a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
							</h3>
							<div>
							<p class="lside" style="font-family:'lato';font-size:15px;">
								<?php if (get_field('description_short')) {echo get_field('description_short');} ?>
							</p>
							<p class="rside" style="font-family:'lato';font-size:15px;"><p class="rside" style="font-family:'lato';font-size:16px;"><sup>From&nbsp;</sup><strong><?php if (get_field('average_price')) {echo get_field('average_price');} ?></strong></p>
							</div>

					</div>	

			</article>
		
		<?php endif; ?>

		<?php
	}
	?>
</section>
	<section>
				<table class="othervillas">
					<tr><th colspan="6">OTHER VILLAS</th></tr>
					<tr><th>&nbsp;</th><th>&nbsp;</th><th>&nbsp;</th><th>&nbsp;</th><th>Christmas</th><th>New Year</th></tr>
	<?php
	while ($query->have_posts())
	{
		
		$query->the_post();
		
		?>

		<?php
		$festive = get_field('festive');
		$festive_open = get_field('festive_open');
		if( $festive && in_array('onlytext', $festive) ): ?>
<tr>
<td>
	<h3 class="destinationsArchive--titulo">
								<a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
								
							</h3>
</td>
<td>
	<?php echo the_terms( $post->ID, 'Destinations', ' ', ', ', ' ' ); ?>
</td>
<td><p style="font-family:'lato';font-size:14px;">
								<?php if (get_field('description_short')) {echo get_field('description_short');} ?>
							</p></td>
							<td><p class="rside" style="font-family:'lato';font-size:15px;"><p style="font-family:'lato';font-size:16px;"><sup>From&nbsp;</sup><strong><?php if (get_field('festive_minimum_price')) {echo get_field('festive_minimum_price');} ?></strong></p></td>
<?php if ( $festive_open && in_array('christmas', $festive_open) ): ?><td style="background:#bbeea6;">
		<p>Open</p> 
</td> <? else: ?> <td><p>Booked</p></td><?php endif; ?>
<?php if ( $festive_open && in_array('newyears', $festive_open) ): ?><td style="background:#bbeea6;">
		<p>Open</p>
</td> <? else: ?> <td><p>Booked</p></td><?php endif; ?>
</tr>

		
		<?php endif; ?>
		
		<?php
	}
	?></table>
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