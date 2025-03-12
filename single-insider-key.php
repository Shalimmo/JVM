<?php get_header(); ?>

<?php if (have_posts()) : while (have_posts()) : the_post();
//Custom Fields


$posts = get_field("related_posts");
?>

<!-- GET IMAGE FOR TOP OF PAGE -->

<div id="content" class="clean">
	<div id="inner-content" class="content--inner"  role="main">

		<section class="content--insider">

			<article>

				<div class="content-two-columns">

					<div class="content-main-insider">

						<h1>
							<?php the_title(); ?>
						</h1>
			
							<div class="social--insider">
								<span><?php the_date(); ?>. By <?php the_author(); ?> </span>
							<div class="ss-media"></div>
                                            
                <div style="clear: both;"></div>
							</div>

						<div class="post--insider">

							<?php the_content(); ?>
						</div>
						<div class="btmentries">
    				<img src="https://villas.journeymexico.com/wp/wp-content/themes/journeymexico/images/backarrow.png"><p><a href="https://villas.journeymexico.com/insider-key">See all entries</a></p>

						</div>

					</div>
			
					<div class="sidebar--insider">
						<div class="topentries">
							<a href="https://villas.journeymexico.com/insider-key" class="allentries">SEE ALL ENTRIES</a>
						</div>
						<div>
							<!-- Begin MailChimp Signup Form -->
<link href="//cdn-images.mailchimp.com/embedcode/classic-10_7.css" rel="stylesheet" type="text/css">
<style type="text/css">
	#mc_embed_signup{clear:left; font:14px 'Raleway',Helvetica,Arial,sans-serif; }
	#mc_embed_signup_scroll h2 {font-weight: normal; color:#fff;}
	/* Add your own MailChimp form style overrides in your site stylesheet or in this style block.
	   We recommend moving this block and the preceding CSS link to the HEAD of your HTML file. */
</style>
<div id="mc_embed_signup">
<form action="https://journeymexico.us2.list-manage.com/subscribe/post?u=e0b44376f23e762deb74ca5bb&amp;id=e781a0df7c" method="post" id="mc-embedded-subscribe-form" name="mc-embedded-subscribe-form" class="validate" target="_blank" novalidate>
    <div id="mc_embed_signup_scroll">
	<h2>Subscribe to Insider Key</h2>
<div class="mc-field-group">
	<label for="mce-FNAME">Name: </label>
	<input type="text" value="" name="FNAME" class="" id="mce-FNAME">
</div>
<div class="mc-field-group">
	<label for="mce-EMAIL">Email:  <span class="asterisk">*</span>
</label>
	<input type="email" value="" name="EMAIL" class="required email" id="mce-EMAIL">
	<p class="copywarn">We won't share your details with any third parties and you can unsubscribe at any time.</p>
</div>
	<div id="mce-responses" class="clear">
		<div class="response" id="mce-error-response" style="display:none"></div>
		<div class="response" id="mce-success-response" style="display:none"></div>
	</div>    <!-- real people should not fill this in and expect good things - do not remove this or risk form bot signups-->
    <div style="position: absolute; left: -5000px;" aria-hidden="true"><input type="text" name="b_e0b44376f23e762deb74ca5bb_e781a0df7c" tabindex="-1" value=""></div>
    <div class="clear"><input type="submit" value="Subscribe" name="subscribe" id="mc-embedded-subscribe" class="button"></div>
    </div>
</form>
</div>
<script type='text/javascript' src='//s3.amazonaws.com/downloads.mailchimp.com/js/mc-validate.js'></script><script type='text/javascript'>(function($) {window.fnames = new Array(); window.ftypes = new Array();fnames[1]='FNAME';ftypes[1]='text';fnames[0]='EMAIL';ftypes[0]='email';}(jQuery));var $mcj = jQuery.noConflict(true);</script>
<!--End mc_embed_signup-->
						</div>
						

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
					</div>	

						

					
					

				</div>
				

				
						
			</article>

		</section> <!-- end .content--villa -->
			  
	</div> <!-- end #inner-content -->
</div> <!-- end #content -->

<?php endwhile;
endif; ?>
<?php get_footer(); ?>