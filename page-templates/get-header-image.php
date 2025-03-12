<div class="header-img-container">	
<?php if ( has_post_thumbnail() ) {
$image = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'single-post-thumbnail' ); ?>
<img class="header-single" src="<?php echo $image[0]; ?>" width="100%" />
<?php } else { ?>
<img src="<?php bloginfo('stylesheet_directory'); ?>/images/img-journey-mexico-header.jpg" />
<?php } ?>
</div>