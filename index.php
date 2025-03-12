<?php get_header(); ?>
			
<?php if (have_posts()) : while (have_posts()) : the_post();

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

    <div class="content--breadcrumb wrap">
        <?php the_breadcrumb(); ?>
    </div>

    <div id="inner-content" class="content--inner wrap"  role="main">

        <section class="content--page">

            <article class="page">

                <header class="page--header">
                            
                    <h1><?php the_title(); ?></h1>
            
                </header> <!-- end article header -->
        
                <div class="page--content">
                
                    <?php the_content(); ?>
        
                </div> <!-- end article section -->

                <div class="page--search">
	
					    <p><?php get_search_form(); ?></p>
		
					</div>

                <footer class="page--footer">
                
                </footer> <!-- end article footer -->

            </article>

        </section> <!-- end .content--page -->

        <aside class="sidebar sidebar__home">
            <?php get_sidebar(); ?>
        </aside> <!-- end #inner-content -->
              
    </div> <!-- end #inner-content -->
</div> <!-- end #content -->

<?php endwhile;
endif; ?>

<div style="clear: both;"></div>

<?php include (TEMPLATEPATH . '/page-templates/plan_your_trip.php' ); ?>

<?php get_footer(); ?>