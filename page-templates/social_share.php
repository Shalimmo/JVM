<div id="fb-root"></div>
<script>
(function(d, s, id) {
	var js, fjs = d.getElementsByTagName(s)[0];
	if (d.getElementById(id)) return;
	js = d.createElement(s); js.id = id;
	js.src = "//connect.facebook.net/en_US/sdk.js#xfbml=1&version=v2.4&appId=438148999724937";
	fjs.parentNode.insertBefore(js, fjs);
}(document, 'script', 'facebook-jssdk'));
// (function(d){
// 	var f = d.getElementsByTagName('SCRIPT')[0], p = d.createElement('SCRIPT');
// 	p.type = 'text/javascript';
// 	p.async = true;
// 	p.src = '//assets.pinterest.com/js/pinit.js';
// 	f.parentNode.insertBefore(p, f);
// }(document));
</script>

<div class="sidebar--social">

	<?php
	$direccion = home_url(add_query_arg(array(),$wp->request));
	$image_url = wp_get_attachment_url( get_post_thumbnail_id($post->ID) );
	$content = get_the_content();
	$resumen = substr($content, 0, 20);

	$default_logo = get_field("default_header", 'option');
	$default_logo_url = $default_logo['sizes']['jmvillas-huge'];

	$la_image = ( $image_url ) ? $image_url : $default_logo_url ;

	?>

		<a class="js-fb_popup" href="http://www.facebook.com/sharer.php?s=100&amp;p[title]=<?php the_title();?>&amp;p[summary]=<?php echo $resumen;?>&amp;p[url]=<?php echo $direccion; ?>&amp;p[images][0]=<?php echo $la_image;?>">
			SHARE
		</a>

		</div>