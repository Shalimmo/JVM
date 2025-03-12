<?php get_header(); ?>

<?php if (have_posts()) : while (have_posts()) : the_post();

// All Custom Fields
$gallery = get_field("gallery");
$place = get_field("place");
$description_short = get_field("description_short");
$description_full = get_field("description_full");
$bedding_details = get_field("bedding_details");
$amenities = get_field("amenities");
$rates_conditions = get_field("rates_conditions");
$rates_table = get_field("rates_table");
$rates = get_field("rates");
$special_offers = get_field("special_offers");
$more_info = get_field("more_info");
$map_location = get_field("map_location");
$zoom = get_field("zoom");
$map_id = get_field("map_id");
$posts = get_field("related_villas");
$average_price = get_field("average_price");
$capacity = get_field("capacity");
$price_range = get_field("price_range");
$field = get_field_object("amenities_icons");
$value = $field["value"];
$choices = $field["choices"];
$royal = get_field("royal");
$first = get_field("first_gallery_photo");
$second = get_field("second_gallery_photo");
$calendar = get_field("calendar_availability");

?>

<div class="slider__home">
    <div class="header-img-container">    
        <?php if ( has_post_thumbnail() ) {
        $image = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'jmvillas-huge' );
        $image_thumb = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'jmvillas-thumb' ); ?>
        <a href="<?php echo $first; ?>" data-fancybox="galleries">
            <img class="header-single" src="<?php echo $image[0]; ?>" srcset="<?php echo $image[0]; ?>, <?php echo $image_thumb[0]; ?> 376w" width="100%" />
        </a>
        <?php } else { ?>
        <img src="<?php bloginfo('stylesheet_directory'); ?>/images/img-journey-mexico-header.jpg" />
        <?php } ?>
    </div>        
</div>    

<!-- GET IMAGE FOR TOP OF PAGE -->

<div id="content" class="clean">
    <div style="max-width:1200px;margin:0 auto; display:block;padding-top:5px;">
        <div class="view-gallery">
            <a href="<?php echo $second; ?>" data-fancybox="galleries" style="font-family:'Raleway';">
                <img src="https://villas.journeymexico.com/wp/wp-content/uploads/gallery-icon.png">
            </a>
            <a href="<?php echo $second; ?>" data-fancybox="galleries" style="font-family:'Raleway';">
                <p><strong>VIEW FULL GALLERY</strong></p></a>
        </div>
        <div class="content--breadcrumb" style="display:inline-block;">
            <?php the_breadcrumb(); ?>
        </div>
    </div>

    <div id="inner-content" class="content--inner"  role="main">

        <section class="content--villa">

            <article class="villa">

                <header class="villa--header wrap">
                    <div class="villa--header--txt">
                        <h1>
                            <?php the_title(); ?>
                        </h1>
                        <?php 
                        if ( $place )
                        { ?>
                            <h3><?php echo $place; ?></h3>
                        <?php
                        }
                        ?>
                    </div>
                </header>

                <div class="villa--content wrap">

                    <div class="js-villa--content fix-m">

                        <?php
                        if ( $description_short )
                        { ?>
                            <div class="villa--subcontent">
                                <div class="villa--capacity">
                                    <p><?php echo $capacity; ?></p>
                                    <p class="rr"><?php echo $price_range; ?></p>
                                </div>
                                <div class="villa--sharing">
                                    <?php
                                    wp_reset_postdata();
                                    include (TEMPLATEPATH . '/page-templates/social_share.php' ); ?>
                                    <p class="rrr"><a href="#map-dest">VIEW ON A MAP</a></p>
                                </div>
                            </div>

                            <div class="villa--block fix-n">

                                <?php the_content(); ?>
                                <div style="max-width:600px;width:100%;display:flex;">
                                    
                                <?php if($value)
                                {
                                    foreach($value as $v)
                                        {
                                        echo ' <div style="width:50%;"><img src="https://villas.journeymexico.com/wp/wp-content/uploads/2016/06/' . $v . '">' . $choices[ $v ] .'</div>' ;
                                        }
                                }
                                ?>
                                </div>
                            </div>
                            <?php
                        }
                        ?>

                        <div class="villa--planner fix-n">
                            <div class="plan side" id="plan-your-trip">

                                <header class="plan--header header-side">
                                    <div class="wrap">
                                        <h2>
                                        START PLANNING YOUR TRIP
                                        </h2>
                                    </div>
                                </header>

                                <?php echo do_shortcode( '[contact-form-7 id="26670" title="Booking side"]' ); ?>
                                <div class="form-footer">
                                    <table>
                                        <tr>
                                            <td><img src="https://villas.journeymexico.com/wp/wp-content/uploads/2016/06/eagle.png"></td>
                                            <td><p class="inquire">TO INQUIRE ABOUT<br>PLEASE CALL<br><strong><a href="tel:+16198195111">+1 619 819 5111</a></strong></p></td>
                                        </tr>    
                                    </table>
                                </div>
                            </div>
                        </div>    

                    </div>

                </div>

                <?php
                if ( $calendar)
                {
                ?>
                <div class="villa--related" id="map-dest">
                            
                    <header class="villa--related--header">
                        <div class="wrap">
                            <h2 style="padding-top:20px;">CALENDAR AVAILABILITY</h2>
                        </div>
                    </header>
                    <section class="villa--related--content wrap">
                        <?php echo do_shortcode(''.$calendar.''); ?>
                    </section>                    
                </div>
                <?php
                }
                ?>

                <div id="customize">
                    <h2>CUSTOMIZE YOUR VILLA HOLIDAY</h2>
                    <p>Let us help you create a complete vacation experience by adding unique experiences to your stay</p>
                    <?php echo do_shortcode( '[new_royalslider id="86"]' ); ?>
                </div>

                <?php
                if ( $map_location)
                {
                ?>
                <div class="villa--related" id="map-dest">
                            
                    <header class="villa--related--header">
                        <div class="wrap">
                            <h2><?php echo the_title(); ?> location</h2>
                        </div>
                    </header>
                    <section class="villa--related--content wrap">
                        <?php echo do_shortcode(''.$map_location.''); ?>
                    </section>                    
                </div>
                <?php
                }
                ?>            

                <?php
                if ( $posts )
                { ?>
                <div class="villa--related">

                    <header class="villa--related--header">
                        <div class="wrap">
                            <h2>
                                You may also like
                            </h2>
                        </div>
                    </header>

                    <section class="villa--related--content wrap">

                        <div class="js-villa--related">
                        <?php
                        foreach( $posts as $post): ?>
                        <?php setup_postdata($post);

                        $thumb_id = get_post_thumbnail_id($post->ID);
                        $thumb_thumb_url_array = wp_get_attachment_image_src($thumb_id, 'jmvillas-thumb', true);
                        
                        $thumb_thumb_url = $thumb_thumb_url_array[0];
                        ?>

                        <article class="villasArchive">

                            <figure role="group" aria-labelledby="caption" class="destinationsArchive--fig">

                                <picture>
                                    <source srcset="<?php echo $thumb_thumb_url; ?>" media="(max-width: 400px)">
                                    <img srcset="<?php echo $thumb_thumb_url; ?>" alt="<?php the_title(); ?>">
                                </picture>

                            </figure>
                                <div class="destinationsArchive--figcap">

                                    <h2 class="destinationsArchive--titulo">
                                        <a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
                                    </h2>

                                </div>

                        </article>

                        <?php endforeach; ?>
                        <?php wp_reset_postdata(); ?>
                        </div>

                    </section>
                </div>

                <?php
                }
                ?>
            </article>

        </section> <!-- end .content--villa -->
              
    </div> <!-- end #inner-content -->
</div> <!-- end #content -->
<?php endwhile;
endif; ?>

<div style="clear: both;"></div>
<?php get_footer(); ?>
