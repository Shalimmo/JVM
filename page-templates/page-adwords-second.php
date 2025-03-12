<?php
/*
Template Name: Adwords Second
*/
get_header(); ?>

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
.title {display: inline-block;width: 100%;max-width: 600px; top: 70px;margin-right:50px;position: relative;vertical-align: top;z-index: 1;}
.title h1 {color: #fff; font-size: 38px;font-weight: 100;margin-bottom: 14px;}
.title p {color: #fff;}
.title span {color: #ef8a0b; font-size: 12px;}
.caboad {background-image: url('https://villas.journeymexico.com/wp/wp-content/uploads/cabo-villas-header-adw.jpg');background-size:contain;width:100%;height:450px;background-repeat:no-repeat;position: absolute;z-index: 1;}
.formcabo {width: 360px;position: relative;vertical-align: top;z-index: 2;display: inline-block;background: #333;}
.sub-main {display: block;margin: 0 auto; width: 100%; max-width: 1024px;margin-top: 35px;}
div#wpcf7-f31878-p31873-o1 {border: none; padding: 12px; color: #fff;font-size: 12px; font-family: arial;}
div#wpcf7-f31878-p31873-o1 textarea {height: 100px;}
</style>
<header class="destination--header caboad">
	
</header>
<div class="sub-main">
<div class="title">
		<h1>CABO LUXURY VILLA RENTALS</h1>
		<p>OUR MEXICO EXPERTS WILL MATCH THE PERFECT VILLA
FOR YOUR DREAM VACATION. ENQUIRE NOW, WE WILL TAKE IT FROM THERE</p>
		<span>IN-COUNTRY EXPERTS&nbsp;&nbsp;&nbsp;|&nbsp;&nbsp;&nbsp;BEST VILLA RENTAL AGENCY&nbsp;&nbsp;&nbsp;|&nbsp;&nbsp;&nbsp;MEXICO SPECIALISTS</span> 
	</div>
	<div class="formcabo">
		<?php echo do_shortcode('[contact-form-7 id="31878" title="Cabo Adwords"]'); ?>
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
