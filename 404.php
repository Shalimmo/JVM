<?php get_header(); ?>

<?php
$default_header = get_field("default_header", 'option');
$thumb_thumb_url = $default_header['sizes']['jmvillas-medium'];
$thumb_medium_url = $default_header['sizes']['jmvillas-full'];
?>

<header class="content--header">
    <figure>
        <picture>
            <source srcset="<?php echo esc_url($thumb_thumb_url); ?>" media="(max-width: 400px)">
            <img srcset="<?php echo esc_url($thumb_medium_url); ?>" alt="<?php the_title_attribute(); ?>">
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
                            
                    <h1><?php _e("Epic 404 - Article Not Found", "bonestheme"); ?></h1>
            
                </header> <!-- end article header -->
        
                <div class="page--content">
                
                    <p><?php _e("The Villa you were looking for was not found, but maybe try looking again!", "bonestheme"); ?></p>
        
                </div> <!-- end article section -->

                <div class="page--search">
    
                    <p><?php get_search_form(); ?></p>
        
                </div> <!-- end search section -->
            
                <footer class="page--footer">
                
                    <p></p>
                
                </footer> <!-- end article footer -->

            </article>

        </section> <!-- end .content--page -->

        <aside class="sidebar sidebar__home">
            <?php get_sidebar(); ?>
        </aside> <!-- end #inner-content -->
              
    </div> <!-- end #inner-content -->
</div> <!-- end #content -->

<?php get_footer(); ?>
