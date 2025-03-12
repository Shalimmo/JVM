<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
<!-- Google Analytics Content Experiment code -->
<script>function utmx_section(){}function utmx(){}(function(){var
k='122549362-1',d=document,l=d.location,c=d.cookie;
if(l.search.indexOf('utm_expid='+k)>0)return;
function f(n){if(c){var i=c.indexOf(n+'=');if(i>-1){var j=c.
indexOf(';',i);return escape(c.substring(i+n.length+1,j<0?c.
length:j))}}}var x=f('__utmx'),xx=f('__utmxx'),h=l.hash;d.write(
'<sc'+'ript src="'+'http'+(l.protocol=='https:'?'s://ssl':
'://www')+'.google-analytics.com/ga_exp.js?'+'utmxkey='+k+
'&utmx='+(x?x:'')+'&utmxx='+(xx?xx:'')+'&utmxtime='+new Date().
valueOf()+(h?'&utmxhash='+escape(h.substr(1)):'')+
'" type="text/javascript" charset="utf-8"><\/sc'+'ript>')})();
</script><script>utmx('url','A/B');</script>
<!-- End of Google Analytics Content Experiment code -->

	<!-- Google Tag Manager -->
<script>(function(w,d,s,l,i){w[l]=w[l]||[];w[l].push({'gtm.start':
new Date().getTime(),event:'gtm.js'});var f=d.getElementsByTagName(s)[0],
j=d.createElement(s),dl=l!='dataLayer'?'&l='+l:'';j.async=true;j.src=
'https://www.googletagmanager.com/gtm.js?id='+i+dl;f.parentNode.insertBefore(j,f);
})(window,document,'script','dataLayer','GTM-N3GXP9');</script>
<!-- End Google Tag Manager -->
		<meta charset="<?php bloginfo( 'charset' ); ?>">

		<!-- mobile meta (hooray!) -->
		<meta name="HandheldFriendly" content="True">
		<meta name="MobileOptimized" content="320">
		<meta name="viewport" content="width=device-width, initial-scale=1.0"/>
		<title><?php wp_title(''); ?></title>

		<link rel="apple-touch-icon" href="<?php echo get_template_directory_uri(); ?>/library/images/apple-icon-touch.png">
		<link rel="icon" href="<?php echo get_template_directory_uri(); ?>/favicon.png">
		<!--[if IE]>
			<link rel="shortcut icon" href="<?php echo get_template_directory_uri(); ?>/favicon.ico">
		<![endif]-->
		<!-- or, set /favicon.ico for IE10 win -->
		<meta name="msapplication-TileColor" content="#f01d4f">
		<meta name="msapplication-TileImage" content="<?php echo get_template_directory_uri(); ?>/library/images/win8-tile-icon.png">

        <link rel="pingback" href="<?php bloginfo('pingback_url'); ?>">

		<!--[if lt IE 9]>
		<script src="<?php echo get_template_directory_uri(); ?>/js/html5.js" type="text/javascript"></script>
		<![endif]-->
	
    	<!-- FACEBOOK THUMB -->
      <meta property="og:title" content="<?php the_title(); ?>" />
		<meta property="og:type" content="article" />
		<meta property="og:url" content="<?php the_permalink(); ?>" />
		<meta property="og:site_name" content="Journey Mexico" />

        <link href='https://fonts.googleapis.com/css?family=Montserrat:400,700' rel='stylesheet' type='text/css'>
        <link href='https://fonts.googleapis.com/css?family=Raleway:400,300,600,800' rel='stylesheet' type='text/css'>
        <link rel="stylesheet" href="<?php bloginfo('stylesheet_directory'); ?>/style-journeymexico.css" media="screen">
		
		<script src='https://www.google.com/recaptcha/api.js'></script>
		<!-- wordpress head functions -->
		<?php wp_head(); ?>
		<!-- end of wordpress head -->
<!-- Facebook Pixel Code -->
<script>
!function(f,b,e,v,n,t,s){if(f.fbq)return;n=f.fbq=function(){n.callMethod?
n.callMethod.apply(n,arguments):n.queue.push(arguments)};if(!f._fbq)f._fbq=n;
n.push=n;n.loaded=!0;n.version='2.0';n.queue=[];t=b.createElement(e);t.async=!0;
t.src=v;s=b.getElementsByTagName(e)[0];s.parentNode.insertBefore(t,s)}(window,
document,'script','//connect.facebook.net/en_US/fbevents.js');

fbq('init', '213057309029752');
fbq('track', "PageView");</script>
<noscript><img height="1" width="1" style="display:none"
src="https://www.facebook.com/tr?id=213057309029752&ev=PageView&noscript=1"
/></noscript>
<!-- End Facebook Pixel Code -->
</head>

	<body <?php body_class();?> >
<!-- Google Tag Manager (noscript) -->
<noscript><iframe src="https://www.googletagmanager.com/ns.html?id=GTM-N3GXP9"
height="0" width="0" style="display:none;visibility:hidden"></iframe></noscript>
<!-- End Google Tag Manager (noscript) -->
			<div id="container">
        
        <a class="link-home" href="<?php bloginfo('home'); ?>"></a>

			<header class="header" id="banner" role="banner">

				<div id="inner-header" class="clearfix">

					<!-- WRAP -->
               <div class="wrap">
						<div id="sub-nav">
							<div class="sub-nav-right">               
						<p id="header-contact">CONTACT US</p>&nbsp;&nbsp;&nbsp;&nbsp;<p id="header-phone">1 800 513 1587</p></div>
                    <div style="clear: both;">&nbsp;</div>
                	</div>
                </div> <!-- end #inner-header -->

					<div class="rwd"><div class="lgo"><a href="<?php echo home_url(); ?>" rel="nofollow"><span><?php bloginfo('name'); ?></span></a></div></div>

					<nav role="navigation" style="position: relative;">
                    
						<div class="menu_container">
							<a id="logo_link" href="<?php bloginfo('home'); ?>"></a>
							<?php
							get_search_form(); ?>

							<?php wp_nav_menu( array('menu' => 'main-nav', 'container' => false, 'menu_class' => 'main_menu', 'exclude' => '63,65,19557,20325,20165,20252,20267,22280,8805,15240,8268,20471,8,14,26128', 'sort_column' => '9,12,21564,21588' )); ?>
	                  <div style="clear: both;"></div>
                  </div>

					</nav>
               </div>
               <!-- end WRAP-->

			</header> <!-- end header -->
            
