<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
        <!-- Google Tag Manager -->
        <script>(function(w,d,s,l,i){w[l]=w[l]||[];w[l].push({'gtm.start':
        new Date().getTime(),event:'gtm.js'});var f=d.getElementsByTagName(s)[0],
        j=d.createElement(s),dl=l!='dataLayer'?'&l='+l:'';j.async=true;j.src=
        'https://www.googletagmanager.com/gtm.js?id='+i+dl;f.parentNode.insertBefore(j,f);
        })(window,document,'script','dataLayer','GTM-MCN5DTS');</script>
        <!-- End Google Tag Manager -->

		<!-- mobile meta (hooray!) -->
		<meta name="HandheldFriendly" content="True">
		<meta name="MobileOptimized" content="320">
		<meta name="viewport" content="width=device-width, initial-scale=1.0"/>
		<title><?php wp_title(''); ?></title>

		<link rel="apple-touch-icon" sizes="120x120" href="https://villas.journeymexico.com/wp/wp-content/uploads/apple-touch-icon.png">
        <link rel="icon" type="image/png" sizes="32x32" href="<?php echo get_template_directory_uri(); ?>/library/images/favicon-32x32.png">
        <link rel="icon" type="image/png" sizes="16x16" href="<?php echo get_template_directory_uri(); ?>/library/images/favicon-16x16.png">
        <link rel="manifest" href="<?php echo get_template_directory_uri(); ?>/library/images/site.webmanifest">
        <link rel="mask-icon" href="<?php echo get_template_directory_uri(); ?>/library/images/safari-pinned-tab.svg" color="#5bbad5">
		<meta name="msapplication-TileColor" content="#f01d4f">
        <meta name="theme-color" content="#ffffff">
        
		<!-- icons & favicons (for more: http://www.jonathantneal.com/blog/understand-the-favicon/) 
		<link rel="apple-touch-icon" href="<?php echo get_template_directory_uri(); ?>/library/images/apple-icon-touch.png">
		<link rel="icon" href="<?php echo get_template_directory_uri(); ?>/favicon.png">
		<!--[if IE]>
		<![endif]-->
		<!-- or, set /favicon.ico for IE10 win 
		<meta name="msapplication-TileImage" content="<?php echo get_template_directory_uri(); ?>/library/images/win8-tile-icon.png">
        -->
        <link rel="shortcut icon" href="<?php echo get_template_directory_uri(); ?>/favicon.ico">
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
        <link href="https://fonts.googleapis.com/css?family=Lato:300,400,700" rel="stylesheet" type='text/css'>
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
        <noscript><iframe src="https://www.googletagmanager.com/ns.html?id=GTM-MCN5DTS"
        height="0" width="0" style="display:none;visibility:hidden"></iframe></noscript>
        <!-- End Google Tag Manager (noscript) -->
			<div id="container">
			<!--
        	<div style="background-color:#fff;"><img src="/wp/wp-content/themes/journeymexico/images/verified_user-24px.svg" style="width:20px;vertical-align: middle;display: inline-block;margin-left:30px;"><p style="padding-top: 10px;padding-left:5px;font-style:italic;display: inline-block;"><strong>Book with Confidence</strong> - We want you to be as confident as possible when planning your next Mexico villa vacation.<a href="/book-with-confidence"> Learn More >></a></p></div>
				-->
        <a class="link-home" href="<?php bloginfo('home'); ?>"></a>

			<header class="header" id="banner" role="banner">

				<div id="inner-header" class="clearfix">

					<!-- WRAP -->
               <div class="wrap">
						<div id="sub-nav">
							<div class="sub-nav-right">  
							<a href="/my-favorite-villas" style="color: #fff;margin: 0 5px 0 5px;background: #505050;padding: 5px 10px;"><i class="sf-icon-love" style="font-size:16px; padding: 0 5px 0;"></i><span>My Favorite villas</span></a>             
						<p id="header-contact">CONTACT US</p>&nbsp;&nbsp;&nbsp;&nbsp;<p id="header-phone"><a style="color: #fff" href="tel:+16198195111">+1 619 819 5111 </a></p></div>
                    <div style="clear: both;">&nbsp;</div>
                	</div>
                </div> <!-- end #inner-header -->

					<div class="rwd"><div class="lgo"><a href="<?php echo home_url(); ?>" rel="nofollow"><span><?php bloginfo('name'); ?></span></a></div></div>

					<nav role="navigation" id="navi" style="position: relative;">
                    
						<div class="menu_container">
							<a id="logo_link" href="<?php bloginfo('home'); ?>"></a>
							<?php
							get_search_form(); ?>

							<?php wp_nav_menu( array(
							'menu' => __( 'main' ), 
							'container' => false, 
							'menu_class' => 'main_menu'  )); ?>
                        <div style="clear: both;"></div>
                  </div>

					</nav>
               </div>
               <!-- end WRAP-->

			</header> <!-- end header -->
            
