<?php
/*
Template Name: Archive
*/
get_header(); ?>
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
        
            <?php if (is_category()) { ?>
                <h1 class="archive-title h2">
                    <span><?php _e("Posts in Category:", "bonestheme"); ?></span> <?php single_cat_title(); ?>
                </h1>
            
            <?php } elseif (is_tag()) { ?> 
                <h1 class="archive-title h2">
                    <span><?php _e("Villas Tagged:", "bonestheme"); ?></span> <?php single_tag_title(); ?>
                </h1>
            
            <?php } elseif (is_author()) { 
                global $post;
                $author_id = $post->post_author;
                ?>
                <h1 class="archive-title h2">
                    <span><?php _e("Posts By:", "bonestheme"); ?></span> <?php echo get_the_author_meta('display_name', $author_id); ?>
                </h1>
            <?php } elseif (is_day()) { ?>
                <h1 class="archive-title h2">
                    <span><?php _e("Daily Archives:", "bonestheme"); ?></span> <?php the_time('l, F j, Y'); ?>
                </h1>
        
            <?php } elseif (is_month()) { ?>
                <h1 class="archive-title h2">
                    <span><?php _e("Monthly Archives:", "bonestheme"); ?></span> <?php the_time('F Y'); ?>
                </h1>
            
            <?php } elseif (is_year()) { ?>
                <h1 class="archive-title h2">
                    <span><?php _e("Yearly Archives:", "bonestheme"); ?></span> <?php the_time('Y'); ?>
                </h1>
            <?php } elseif ( is_tax()) { ?>
                <h1 class="archive-titleh2">
                    <span><?php _e("Villas in", "bonestheme"); ?></span> <?php single_tag_title(); ?> 
                        <?php
                        if( isset( $_GET[ 'bedrooms' ] ) )
                        {
                            $fields = get_field_objects();

                            if( $fields )
                            {
                                foreach( $fields as $field_name => $field )
                                {
                                    if ($field['key'] === 'field_577e70114b470') {
                                            echo '<span> with</span>';
                                            echo '&nbsp;' . $field['value'] . '&nbsp;<span>bedrooms</span>';
                                    }
                                }
                            }
                        }
                        ?>
                </h1>
        
            <?php } else {

                if( isset( $_GET[ 'bedrooms' ] ) )
                {
                    echo '<h1 class="archive-titleh2">';
                        echo '<span>
