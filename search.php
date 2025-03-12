<?php
/*
Template Name: Search Results
*/
get_header();

$default_header = get_field("default_header", 'option');
$thumb_thumb_url = $default_header['sizes']['jmvillas-medium'];
$thumb_medium_url = $default_header['sizes']['jmvillas-full'];

?>

<header class="content--header">
	 <figure>
		  <picture>
				<source srcset="<?php echo $thumb_thumb_url; ?>" media="(max-width: 400px)">
				<img srcset="<?php echo $thumb_medium_url; ?>" alt="<?php the_title(); ?>">
		  </picture>
	 </figure>
</header>    
				

<div id="content">
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
	<div id="inner-content" class="content--inner wrap"  role="main">


		<div id="main" class="content--page" role="main">

			<h1 class="archive-title" style="border-bottom: 2px solid #666; margin: 60px 0 0 0;"><span><?php _e('Search Results for:', 'bonestheme'); ?></span> <?php echo esc_attr(get_search_query()); ?></h1>

			<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
		
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
						<h1><?php _e("Sorry, No Results.", "bonestheme"); ?></h1>
					</header>
					<section class="entry-content">
						<div class="page--content">
							<p><?php _e("Try your search again!", "bonestheme"); ?></p>
						</div> <!-- end article section -->
						<div class="page--search">
							<p><?php get_search_form(); ?></p>
						</div> <!-- end search section -->
					</section>
					<footer class="article-footer">
						 <p></p>
					</footer>
				 </article>
		
			 <?php endif; ?>

		 </div> <!-- end #main -->
	
	
	</div> <!-- end #inner-content -->

</div> <!-- end #content -->

<?php get_footer(); ?>