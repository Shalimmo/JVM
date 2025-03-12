<?php get_header(); ?>
<header class="destination--header">
	<figure>
		<picture>
			<source srcset="https://villas.journeymexico.com/wp/wp-content/uploads/2016/06/archive-villa-casa-tita-2000x450.jpg" media="(max-width: 400px)">
			<img srcset="https://villas.journeymexico.com/wp/wp-content/uploads/2016/06/archive-villa-casa-tita-2000x450.jpg" alt="<?php the_title(); ?>">
		</picture>
	</figure>
</header>

<div id="content" class="clean">



	<div id="inner-content" class="content--inner wrap"  role="main">

		<section class="content--page">
						<?php if (have_posts()) : while (have_posts()) : the_post();
				?>
			
						 
						<!-- POST ITEM -->
						<div class="trip">
						<div class="destinations-Archive">
						<?php if ( has_post_thumbnail() ) { ?>
						<a href="<?php the_permalink(); ?>" alt="<?php the_title(); ?>" title="<?php the_title(); ?>">
							<?php the_post_thumbnail('jmvillas-thumb');?>
						</a>
						<?php } else { ?>
						<a href="<?php the_permalink(); ?>"><img width="125" height="125" src="<?php bloginfo('template_directory'); ?>/images/img-placeholder-itinerary.jpg" alt="<?php the_title(); ?>" title="<?php the_title(); ?>" /></a>
						<?php } ?>
						</div>
						
						<div class="destinations-Archive-Content">
						<h3><a href="<?php the_permalink() ?>" rel="bookmark" title="<?php the_title_attribute(); ?>"><?php the_title(); ?></a></h3>
						<?php $postid = get_the_ID(); ?>
						

							 <!-- POSTED BY -->
							<div class="post-meta" style="padding: 5px 0;">
								<div class="details-Archive">
								<p>
								<?php if (get_field('capacity')) {echo get_field('capacity');} ?>
								</p>
								<p class="a-right">
								<?php if (get_field('average_price')) {echo get_field('average_price');} ?>
								</p>
								</div>  
															
								<div style="clear: both;"></div>
							</div>
							<?php
							$excerpt = get_the_excerpt();
							if ( $excerpt )
							{
								echo $excerpt;
							}
							else
							{
								$description_full = get_field("description_full");
								echo limit_text($description_full, 50);
							}
							?>
							<a href="<?php the_permalink() ?>" rel="bookmark" title="<?php the_title_attribute(); ?>">See villa &gt;&gt;</a>
					
							</div>
															
						<div style="clear: both;"></div>
						
						 
						
						</div>

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