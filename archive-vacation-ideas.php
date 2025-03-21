<?php get_header(); ?>
<div class="header-image">
    <figure style="background:none;">
        <picture>
            <source srcset="https://villas.journeymexico.com/wp/wp-content/uploads/vacation-ideas-387x268.jpg" media="(max-width: 387px)">
            <source srcset="https://villas.journeymexico.com/wp/wp-content/uploads/vacation-ideas-1020x450.jpg" media="(max-width: 1023px)">
            <source srcset="https://villas.journeymexico.com/wp/wp-content/uploads/vacation-ideas.jpg" media="(min-width: 1024px)">
            <img src="https://villas.journeymexico.com/wp/wp-content/uploads/vacation-ideas.jpg" width="100%" alt="vacation ideas">
        </picture>
        <figcaption>
            <h1>
                VACATION IDEAS
            </h1>
        </figcaption>
    </figure>
</div>

<div id="content" class="clean">

    <div class="content--breadcrumb wrap">
        <ul class="content--breadcrumb--list"><li><a href="<?php bloginfo('home'); ?>/vacation-ideas">Home</a></li><li>Vacation Ideas</li></ul>
    </div>

    
    <div class="wrap insidersub-h"><h2>VACATION IDEAS FOR YOUR VILLA IN MEXICO</h2></div>
    <div id="inner-content" class="content--inner wrap"  role="main">

        <section class="content--archive archive__insider">
                        <?php if (have_posts()) : while (have_posts()) : the_post();
                
                $thumb_id = get_post_thumbnail_id($post->ID);
                $thumb_thumb_url_array = wp_get_attachment_image_src($thumb_id, 'jmvillas-insider', true);
                $thumb_thumb_url = $thumb_thumb_url_array[0];
                $excerpt = get_the_excerpt( $post->ID );
                ?>
                         <!-- POST ITEM -->
                        <article class="insiderArchive">
                            <a href="<?php the_permalink(); ?>">
                            <figure role="group" aria-labelledby="caption" class="insiderArchive--fig">
                        <picture>
                                <source srcset="<?php echo esc_url($thumb_thumb_url); ?>" media="(max-width: 400px)">
                                <img srcset="<?php echo esc_url($thumb_thumb_url); ?>" alt="<?php the_title_attribute(); ?>">
                            </picture>
                        
                        
                    </figure>
                    </a>
                    <div class="insiderArchive--figcap">
                                <div>
                                <p class="lside"><?php echo strip_tags (    get_the_term_list( get_the_ID(), 'Region', "",", " )); ?></p>
                                <p class="rside">Vacation days: <?php if (get_field('number_of_days')) {echo get_field('number_of_days');} ?></p>
                                </div>
                                <h2 class="insiderArchive--title" style="margin-top:0 !important; padding-top:0 !important; padding-bottom:0 !important;">
                                    <a href="<?php the_permalink(); ?>"class="title"><?php the_title(); ?></a>
                                </h2>
                                <div>
                                <p class="lside"><?php
                                  echo substr($excerpt, 0, 330); ?>... <a href="<?php the_permalink(); ?>">See more &raquo;</a></p>
                                
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
