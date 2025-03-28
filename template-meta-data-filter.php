<?php 
if (!defined('ABSPATH')) {
    exit('No direct access allowed');
}
?>
<?php
/*
  Template Name: Template MetaData Filter
 */

if (class_exists('MetaDataFilterPage')) {
    wp_enqueue_style('meta_data_filter_front', MetaDataFilterCore::get_application_uri() . 'css/front.css');
    wp_enqueue_script('meta_data_filter_widget', MetaDataFilterCore::get_application_uri() . 'js/front.js', ['jquery'], null, true);
}

get_header();
?>

<!-- - - - - - - - - - - - Entry - - - - - - - - - - - - - - -->
<div id="mdf_output">
    <?php if (have_posts()) : while (have_posts()) : the_post(); ?>
            <?php
            the_content();
            wp_reset_postdata(); // Use wp_reset_postdata instead of wp_reset_query
        endwhile;
    endif;    
    ?>
</div>
<!-- - - - - - - - - - - - end Entry - - - - - - - - - - - - - - -->

<?php
get_footer();
?>
