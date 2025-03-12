<?php
/*
Template Name: Adwords Punta Mita
*/
get_header( 'puntamitaadwords' ); ?>

<?php if (have_posts()) : while (have_posts()) : the_post();

$thumb_id = get_post_thumbnail_id($post->ID);
$thumb_thumb_url_array = wp_get_attachment_image_src($thumb_id, 'jmvillas-medium', true);
$thumb_medium_url_array = wp_get_attachment_image_src($thumb_id, 'jmvillas-huge', true);
$thumb_thumb_url = $thumb_thumb_url_array[0];
$thumb_medium_url = $thumb_medium_url_array[0];

?>
<style>
#searchform {display: none;}
ul.main_menu {display: none;}
div.content--breadcrumb {display: none;}
div.page--content p {font-size: 16px;}
.page--content h2 {margin: 1.5em 0;}
.wrap {width: 97%;}
.destination--header {margin-top:0;}
p.lb {font-size: 16px; font-family: arial;}
div.page--content p{font-size: 16px; font-family: arial;}
p.third{font-size: 16px; font-family: arial;}
div#awards-press p {font-family: arial;}
div#awards-press h2 {font-weight: 600;}
</style>
<!--<header class="destination--header">
	<figure>
		<picture>
			<source srcset="<?php echo $thumb_thumb_url; ?>" media="(max-width: 400px)">
			<img srcset="<?php echo $thumb_medium_url; ?>" src="<?php echo $thumb_medium_url; ?>" alt="<?php the_title(); ?>">
		</picture>
	</figure>
</header>-->

<div>
	<div class="header-img-container">
		<img class="header-single" src="<?php echo $thumb_medium_url; ?>" alt="<?php the_title(); ?>" width="100%"/>
	</div>
</div>


<!-- GET IMAGE FOR TOP OF PAGE -->

<div id="content" class="clean">

	<div class="content--breadcrumb wrap">
		<?php the_breadcrumb(); ?>
	</div>
	<div class="wrap">
		  <div class="page--content">
                
                    <?php the_content(); ?>
        
          </div> <!-- end article section -->
	</div>

</div> <!-- end #content -->

<?php endwhile;
endif; ?>

<div style="clear: both;"></div>

<?php get_footer(); ?>
