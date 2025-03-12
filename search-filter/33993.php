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
	
	<p style="text-align:center; margin-bottom:0;font-family:'lato';margin-top:12px;"><?php echo $query->found_posts; ?> Villa(s) Found in Merida & Yucatan<p/>
	<div id="inner-content" class="content--inner wrap"  role="main">
	<section class="content--page archive__villas">
	<?php
	while ($query->have_posts())
	{
		
		$query->the_post();
		
		?>
		<article class="villasArchive">
					<a href="<?php the_permalink(); ?>">
					<figure role="group" aria-labelledby="caption" class="destinationsArchive--fig">
						<?php the_favorites_button($post_id, $site_id); ?>
						<picture>
							<source srcset="<?php the_post_thumbnail_url('jmvillas-thumb');?>" media="(max-width: 400px)">
							<img srcset="<?php the_post_thumbnail_url('jmvillas-thumb');?>" alt="<?php the_title(); ?>">
						</picture>
						<?php if ( has_term( 'haciendas', 'Collections') and has_term('large-groups', 'Collections')) {?>	
							<a class="allinclusivewrap" href="/large-groups"><span class="groupsleft"><span class="tooltiptext">Large groups collection</span></span></a>
							<a class="haciendaswrap" href="/haciendas"><span class="haciendas"><span class="tooltiptext">Haciendas collection</span></span></a>
							<?php } elseif ( has_term( 'golf', 'Collections' ) ) { ?>
							<a class="golfwrap" href="/golf"><span class="golf"><span class="tooltiptext">Golf collection</span></span></a>
							<?php } elseif ( has_term( 'tennis', 'Collections')) {?>	
							<a class="tenniswrap" href="/tennis"><span class="tennis"><span class="tooltiptext">Tennis collection</span></span></a>
							<?php } elseif ( has_term( 'yoga-wellness', 'Collections')) {?>	
							<a class="yogawrap" href="/yoga-wellness"><span class="yoga"><span class="tooltiptext">Yoga & Wellness collection</span></span></a>
							<?php } elseif ( has_term( 'all-inclusive', 'Collections')) {?>	
							<a class="allinclusivewrap" href="/all-inclusive"><span class="allinclusive"><span class="tooltiptext">All inclusive collection</span></span></a>
							<?php } elseif ( has_term( 'large-groups', 'Collections')) {?>	
							<a class="allinclusivewrap" href="/large-groups"><span class="groups"><span class="tooltiptext">Large groups collection</span></span></a>
							<?php } elseif ( has_term( 'celebrity', 'Collections')) {?>	
							<a class="allinclusivewrap" href="/celebrity"><span class="celebrity"><span class="tooltiptext">Celebrity collection</span></span></a>
							<?php } elseif ( has_term( 'all-inclusive', 'Collections')) {?>	
							<a class="allinclusivewrap" href="/all-inclusive"><span class="allinclusive"><span class="tooltiptext">All inclusive collection</span></span></a>
						<?php } elseif ( has_term( 'haciendas', 'Collections')) {?>	
							<a class="haciendaswrap" href="/haciendas"><span class="haciendas"><span class="tooltiptext">Haciendas collection</span></span></a>
							<?php } ?>
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
							<p class="rside" style="font-family:'lato';font-size:15px;"><p class="rside" style="font-family:'lato';font-size:16px;"><sup>From&nbsp;</sup><strong><?php if (get_field('average_price')) {echo get_field('average_price');} ?></strong> /nt</p>
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