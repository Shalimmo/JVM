<?php get_header(); ?>
<header class="destination--header">
	<figure>
		<picture>
			<source srcset="https://villas.journeymexico.com/wp/wp-content/uploads/villa-diamante-punta-mita-1900x550.jpg" media="(max-width: 400px)">
			<img srcset="https://villas.journeymexico.com/wp/wp-content/uploads/villa-diamante-punta-mita-1900x550.jpg" alt="<?php the_title(); ?>">
		</picture>
	</figure>
</header>

<div id="contentarchive" class="destinationp">
	<div id="blackbar">
<div class="searchfiltervillas">
	<h3>FIND THE PERFECT MEXICAN VILLA</h3>
			<?php echo do_shortcode( '[searchandfilter id="33412"]' );?>
		</div>
</div>

	<div id="inner-content" class="content--inner wrap"  role="main">
		
		<section class="content--page archive__villas">
						<?php if (have_posts()) : while (have_posts()) : the_post();
				?>
						 
						<!-- POST ITEM -->
						<article class="villasArchive">
					<a href="<?php the_permalink(); ?>">
					<figure role="group" aria-labelledby="caption" class="destinationsArchive--fig">
						<picture>
							<source srcset="<?php the_post_thumbnail_url('jmvillas-thumb');?>" media="(max-width: 400px)">
							<img srcset="<?php the_post_thumbnail_url('jmvillas-thumb');?>" alt="<?php echo $el_titulo; ?>">
						</picture>
					</figure>
					</a>
					<div class="destinationsArchive--figcap">
							<h2 class="destinationsArchive--titulo">
								<a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
							</h2>
							<div>
							<p class="lside">
								<?php if (get_field('description_short')) {echo get_field('description_short');} ?>
							</p>
							<p class="rside"><?php if (get_field('average_price')) {echo get_field('average_price');} ?></p>
							</div>
					</div>	

			</article>

						

				<?php endwhile; ?>	
			
				 <?php if (function_exists('bones_page_navi')) { ?>
						<?php bones_page_navi(); ?>
					<?php } else { ?>
						<nav class="wp-prev-next">
							<ul class="clearfix">
								<li class="prev-link"><?php next_posts_link(__('&laquo; Older Entries', "bonestheme")) ?></li>
								<li class="next-link"><?php previous_posts_link(__('Newer Entries &raquo;', "bonestheme")) ?></li>
							</ul>
						</nav>
					<?php } ?>
			
				<?php else : ?>
			
					<article id="post-not-found" class="hentry clearfix">
						<header class="article-header">
							<h2>villas good archive</h2>
							<h2><?php _e("Oops, No Villas were found", "bonestheme"); ?>, Go back to <a href="/destinations">destinations</a></h2>
						</header>
					</article>
			
				<?php endif; ?>
		</section> <!-- end #content--page -->
	
	</div> <!-- end #inner-content -->
	
</div> <!-- end #content -->

<?php get_footer(); ?>
<style>
@media only screen and (max-width:900px){
div.responsiveSelectFullMenu {display:none !important;}
}
</style>