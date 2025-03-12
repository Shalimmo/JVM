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
	<section class="content--page archive__villas">
		
	<?php
	while ($query->have_posts())
	{
		
		$query->the_post();
		
		?>
		<?php
		$thedate = get_the_date ( 'F j, Y', $insider->ID );
		$excerpt = get_the_excerpt( $insider->ID );?>
		
			<article class="insiderArchive">
					<a href="<?php the_permalink(); ?>">
					<figure role="group" aria-labelledby="caption" class="insiderArchive--fig">

						<picture>
							<source srcset="<?php the_post_thumbnail_url('jmvillas-insider');?>" media="(max-width: 400px)">
							<img srcset="<?php the_post_thumbnail_url('jmvillas-insider');?>" alt="<?php the_title(); ?>">
						</picture>
					</figure>
					</a>
					<div class="insiderArchive--figcap">
							<span><?php echo $thedate; ?></span>
							<h2 class="insiderArchive--title">
								<a href="<?php the_permalink(); ?>" class="title"><?php the_title(); ?></a>
							</h2>
							<div>
							<p class="insider-p">
								<?php
  							  echo substr($excerpt, 0, 330); ?>... <a href="<?php the_permalink(); ?>">Read more &raquo;</a>
							</p>
							
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