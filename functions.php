<?php
/*
Author: Eddie Machado
URL: htp://themble.com/bones/

This is where you can drop your custom functions or
just edit things like thumbnail sizes, header images, 
sidebars, comments, etc.
*/

/************* INCLUDE NEEDED FILES ***************/

/*
1. library/bones.php
	- head cleanup (remove rsd, uri links, junk css, etc)
	- enqueueing scripts & styles
	- theme support functions
	- custom menu output & fallbacks
	- related post function
	- page-navi function
	- removing <p> from around images
	- customizing the post excerpt
	- custom google+ integration
	- adding custom fields to user profiles
*/
require_once('library/bones.php'); // if you remove this, bones will break
/*
2. library/custom-post-type.php
	- an example custom post type
	- example custom taxonomy (like categories)
	- example custom taxonomy (like tags)
*/
require_once('library/custom-post-type.php'); // you can disable this if you like
/*
3. library/admin.php
	- removing some default WordPress dashboard widgets
	- an example custom dashboard widget
	- adding custom login css
	- changing text in footer of admin
*/
// require_once('library/admin.php'); // this comes turned off by default
/*
4. library/translation/translation.php
	- adding support for other languages
*/
// require_once('library/translation/translation.php'); // this comes turned off by default


//Making jQuery Google API
function modify_jquery() {
  if (!is_admin()) {
	// comment out the next two lines to load the local copy of jQuery
	wp_deregister_script('jquery');
	wp_register_script('jquery', 'https://ajax.googleapis.com/ajax/libs/jquery/1.8.1/jquery.min.js', false, '1.8.1');
	wp_enqueue_script('jquery');

	wp_register_script('jquery-ui', 'https://ajax.googleapis.com/ajax/libs/jqueryui/1.10.3/jquery-ui.min.js', false, '1.10.3');
	wp_enqueue_script('jquery-ui');
  }
}
add_action('init', 'modify_jquery');


/************* THUMBNAIL SIZE OPTIONS *************/

// Thumbnail sizes
add_image_size( 'jmvillas-huge', 2000, 550, true );
add_image_size( 'jmvillas-full', 1200, 550, true );
add_image_size( 'jmvillas-big', 1020, 465, true );
add_image_size( 'jmvillas-medium', 803, 292, true );
add_image_size( 'jmvillas-thumb', 387, 268, true );
add_image_size( 'jmvillas-insider', 675, 300, true );

// function pw_add_image_sizes() {
//     add_image_size( 'jmex-small', 300, 205, true );
// }
// add_action( 'init', 'pw_add_image_sizes' );

// function pw_show_image_sizes($sizes) {
//     $sizes['jmex-small'] = __( 'JMEX Thumb', 'pippin' );
//     return $sizes;
// }
// add_filter('image_size_names_choose', 'pw_show_image_sizes');
/* 
to add more sizes, simply copy a line from above 
and change the dimensions & name. As long as you
upload a "featured image" as large as the biggest
set width or height, all the other sizes will be
auto-cropped.

To call a different size, simply change the text
inside the thumbnail function.

For example, to call the 300 x 300 sized image, 
we would use the function:
<?php the_post_thumbnail( 'bones-thumb-300' ); ?>
for the 600 x 100 image:
<?php the_post_thumbnail( 'bones-thumb-600' ); ?>

You can change the names and dimensions to whatever
you like. Enjoy!
*/

/************* ACTIVE SIDEBARS ********************/

// Sidebars & Widgetizes Areas
function bones_register_sidebars() {
	
register_sidebar(array(
  'name' => __( 'Principal Sidebar' ),
  'id' => 'home-sidebar',
  'description' => __( 'Principal sidebar' ),
  'before_title' => '<h1>',
  'after_title' => '</h1>'
));

register_sidebar(array(
  'name' => __( 'Social Sidebar' ),
  'id' => 'social-sidebar',
  'description' => __( 'Social sidebar' ),
  'before_title' => '<h1>',
  'after_title' => '</h1>'
));

register_sidebar(array(
  'name' => __( 'Share Sidebar' ),
  'id' => 'share-sidebar',
  'description' => __( 'Share sidebar' ),
  'before_title' => '<h1>',
  'after_title' => '</h1>'
));
register_sidebar(array(
  'name' => __( 'Footer Sidebar' ),
  'id' => 'footer-sidebar',
  'description' => __( 'Footer sidebar' ),
  'before_title' => '<h1>',
  'after_title' => '</h1>'
));


	

	/* 
	to add more sidebars or widgetized areas, just copy
	and edit the above sidebar code. In order to call 
	your new sidebar just use the following code:
	
	Just change the name to whatever your new
	sidebar's id is, for example:
	
	register_sidebar(array(
		'id' => 'sidebar2',
		'name' => __('Sidebar 2', 'bonestheme'),
		'description' => __('The second (secondary) sidebar.', 'bonestheme'),
		'before_widget' => '<div id="%1$s" class="widget %2$s">',
		'after_widget' => '</div>',
		'before_title' => '<h4 class="widgettitle">',
		'after_title' => '</h4>',
	));
	
	To call the sidebar in your template, you can just copy
	the sidebar.php file and rename it to your sidebar's name.
	So using the above example, it would be:
	sidebar-sidebar2.php
	
	*/
} // don't remove this bracket!

/************* COMMENT LAYOUT *********************/
// Comment Layout
function bones_comments($comment, $args, $depth) {
   $GLOBALS['comment'] = $comment; ?>
	<li <?php comment_class(); ?>>
		<article id="comment-<?php comment_ID(); ?>" class="clearfix">
			<header class="comment-author vcard">
				<?php 
				/*
					this is the new responsive optimized comment image. It used the new HTML5 data-attribute to display comment gravatars on larger screens only. What this means is that on larger posts, mobile [...]
					echo get_avatar($comment,$size='32',$default='<path_to_url>' );
				*/ 
				?>
				<!-- custom gravatar call -->
				<?php
					// create variable
					$bgauthemail = get_comment_author_email();
				?>
				<img data-gravatar="http://www.gravatar.com/avatar/<?php echo md5($bgauthemail); ?>?s=32" class="load-gravatar avatar avatar-48 photo" height="32" width="32" src="<?php echo get_template_dire[...]
				<!-- end custom gravatar call -->
				<?php printf(__('<cite class="fn">%s</cite>', 'bonestheme'), get_comment_author_link()) ?>
				<time datetime="<?php echo comment_time('Y-m-j'); ?>"><a href="<?php echo htmlspecialchars( get_comment_link( $comment->comment_ID ) ) ?>"><?php comment_time(__('F jS, Y', 'bonestheme')); ?> [...]
				<?php edit_comment_link(__('(Edit)', 'bonestheme'),'  ','') ?>
			</header>
			<?php if ($comment->comment_approved == '0') : ?>
				<div class="alert info">
					<p><?php _e('Your comment is awaiting moderation.', 'bonestheme') ?></p>
				</div>
			<?php endif; ?>
			<section class="comment_content clearfix">
				<?php comment_text() ?>
			</section>
			<?php comment_reply_link(array_merge( $args, array('depth' => $depth, 'max_depth' => $args['max_depth']))) ?>
		</article>
	<!-- </li> is added by WordPress automatically -->
<?php
} // don't remove this bracket!

/************* SEARCH FORM LAYOUT *****************/

// Search Form
function bones_wpsearch($form) {
	$form = '<form role="search" method="get" id="searchform" action="' . home_url( '/' ) . '" >
	<label class="screen-reader-text" for="s">' . __(' ', 'bonestheme') . '</label>
	<input class="sbox" style="background: #ebebeb; color: #333; padding: 7px; margin: 0; border: 0;" type="text" value="' . get_search_query() . '" name="s" id="s" placeholder="'.esc_attr__('Search[...]
	<input title="Search" type="submit" id="searchsubmit" value="'. esc_attr__('') .'" />
	</form>';
	return $form;
} // don't remove this bracket!

?>
<?php
add_filter( 'default_content', 'my_editor_content', 10, 2 );
function my_editor_content( $content, $post ) {
	switch( $post->post_type ) {
		case 'itinerary':
			$content = '
			
			<h2>Itinerary headline</h2>
			<img title="Journey Mexico" alt="Journey Mexico" class="alignright thumb-intinerary" src="/wp-content/themes/journeymexico/images/img-placeholder-itinerary.jpg">Descriptive text here
						
		[spoiler title="Highlights" open="true" style="1"]
		<h4>title</h4>
		content
		[/spoiler]
		
		[spoiler title="Dates & Prices" style="1"]
		<h4>title</h4>
		content
		[/spoiler]
		
		[spoiler title="Itinerary" style="1"]
		<h2 class="itinerary-day">Day</h2>
		content
		[/spoiler]
		
		[spoiler title="Testimonials" style="1"]
		<h4>title</h4>
		content
		[/spoiler]
		
	[gallery size="large" ids="605"]

	';
	break;
	
	case 'hotels':
	$content = '
			
	[column size="3-4"]
	content here
	[/column]
	
	[column size="1-4" last="1"]
	<strong>Amenities</strong>
	list here
	[/column]

	';
  break;
} 
	return $content;

}
?>
<?php function twentyeleven_enqueue() {
	if (is_singular()) {
		//wp_enqueue_script('jquery');
		wp_enqueue_script('jquery-cycle', get_template_directory_uri() . '/scripts/jquery.cycle.js');
		wp_enqueue_script('post-format-gallery', get_template_directory_uri() . '/scripts/gallery.js');
	}
}
?>
<?php 
function fjarrett_custom_taxonomy_dropdown( $taxonomy ) {
	$terms = get_terms( $taxonomy );
	if ( $terms ) {
		printf( '<option value="#">Filter by Region...</option>', $term->slug, $term->name ); 

		foreach ( $terms as $term ) {
			printf( '<option value="../../hotels-by-region/%s">%s</option>', $term->slug, $term->name ); 
		}
	}
}
?>
<?php if (function_exists('st_makeEntries')){ add_shortcode('sharethis', 'st_makeEntries'); } ?>
<?php function custom_excerpt_length( $length ) {
return 20;
}
add_filter( 'excerpt_length', 'custom_excerpt_length', 20 );?>
<?php
function cut_string_using_last($character, $string, $side, $keep_character=true) {
	$offset = ($keep_character ? 1 : 0);
	$whole_length = strlen($string);
	$right_length = (strlen(strrchr($string, $character)) - 1);
	$left_length = ($whole_length - $right_length - 1);
	switch($side) {
		case 'left':
			$piece = substr($string, 0, ($left_length + $offset));
			break;
		case 'right':
			$start = (0 - ($right_length + $offset));
			$piece = substr($string, $start);
			break;
		default:
			$piece = false;
			break;
	}
	return($piece);
}
?>
<?php
function sharing( $atts ){
// Get the url attribute when the shortcode is called
  extract( shortcode_atts(
	array(
	  'url' => 'https://villas.journeymexico.com',
	), $atts )
  );

  $share_result =  '<div id="social-tt" class="social-button-wrapper"><a href="https://twitter.com/share" class="twitter-share-button" data-count="horizontal" data-url="'.$url.'" data-via="journe[...]
  // $share_result = '';

  // $share_result = $share_result.'<div id="social-fb" class="fb-like social-button" data-href="'.$url.'" data-send="false" data-layout="button_count" data-width="450" data-show-faces="true"></d[...]
  $share_result = $share_result.'<div id="btn-fb" class="social-button-wrapper"><div id="social-fb" class="fb-like social-button" data-href="'.$url.'" data-colorscheme="light" data-layout="button[...]
  $share_result = $share_result.'<div id="btn-fbshare" class="social-button-wrapper"><div class="fb-share-button" data-href="'.$url.'" data-width="65" data-type="button"></div></div>';
  $share_result = $share_result.'<div id="btn-gplus" class="social-button-wrapper"><div id="social-google" class="social-button"><div class="g-plusone" data-size="medium" data-href="'.$url.'"></d[...]
  return $share_result;
}
add_shortcode('jmex_social_share','sharing');

add_filter( 'the_content', 'remove_image_dimension', 10 );
function remove_image_dimension( $html ) {
	global $post;
	if ($post->post_type == 'post'){
	  $html = preg_replace( '/-\d+x\d+/', "", $html );
	}
	return $html;
}
function the_excerpt_max_charlength($charlength, $id=0) {
  global $post;
  if($id>0){
	$post = get_post($id);
  }
  setup_postdata( $post );
  $excerpt = get_the_excerpt();
  $charlength++;
  $result='';

  if ( mb_strlen( $excerpt ) > $charlength ) {
	$subex = mb_substr( $excerpt, 0, $charlength - 5 );
	$exwords = explode( ' ', $subex );
	$excut = - ( mb_strlen( $exwords[ count( $exwords ) - 1 ] ) );
	if ( $excut < 0 ) {
	  $result .= mb_substr( $subex, 0, $excut );
	} else {
	  $result .=  $subex;
	}
	// $result .=  '...';
  } else {
	$result .=  $excerpt;
  }
  return $result;
}

// Insertar Breadcrumb    
function the_breadcrumb() {
	global $post;
	echo '<ul class="content--breadcrumb--list">';
	if (!is_home()) {
		if (is_category() || is_single()) {
			echo '<li>';
			if ( the_category() ) {
				the_category(' </li><li> ');
			}
			else if ( is_tax() ) {
				is_tax(' </li><li> ');
			}
			else
			{
				$os_list = get_the_term_list( $post->ID, 'Destinations', '', ', ', '' );
				$dest = 9;
				echo '<a href="'. get_permalink($dest).'" title="'.get_the_title($dest).'">'.get_the_title($dest).'</a></li><li>';
				echo strtolower($os_list);
			}
			if (is_single()) {
				echo '</li><li>';
				the_title();
				echo '</li>';
			}
		} elseif ( is_page() ) {
			if($post->post_parent){
				$anc = get_post_ancestors( $post->ID );
				$title = get_the_title();
				foreach ( $anc as $ancestor ) {
					$output = '<li><a href="'.get_permalink($ancestor).'" title="'.get_the_title($ancestor).'">'.get_the_title($ancestor).'</a></li>';
				}
				echo $output;
				echo '<li>';
				echo $title;
				echo '</li>';
			} else {
				echo '<li>'.get_the_title().'</li>';
			}
		}
	}
	elseif (is_tag()) {single_tag_title();}
	elseif (isset($_GET['paged']) && !empty($_GET['paged'])) {echo "<li>JM Villas Archive"; echo'</li>';}
	elseif (is_search()) {echo"<li>Search results:"; echo'</li>';}
	echo '</ul>';
}

// Options ACF
add_filter('acf/options_page/settings', 'my_options_page_settings');
function my_options_page_settings ( $options )
{
	$options['title'] = __('JM Villas settings');
	$options['pages'] = array(
		__('General'),
		__('Sidebar'),
		__('Social'),
		__('Footer')
	);
	return $options;
}

function the_slug() {
	$post_data = get_post($post->ID, ARRAY_A);
	$slug = $post_data['post_name'];
	return $slug;
}

//Diferente template segun post number

function get_custom_post_type_template($single_template) {
     global $post;

     if ( is_single( array('42474','42553','42569')) ) {
          $single_template = get_stylesheet_directory() . '/single-villas-es.php';
     }
     return $single_template;
}
add_filter( 'single_template', 'get_custom_post_type_template' );

// Paginación
function pagination($pages = '', $range = 4)
{
	$showitems = ($range * 2)+1;  

	global $paged;
	if(empty($paged)) $paged = 1;

	if($pages == '')
	{
		global $wp_query;
		$pages = $wp_query->max_num_pages;
		if(!$pages)
		{
			$pages = 1;
		}
	}

	if(1 != $pages)
	{
		echo "<footer class=\"page-navigation\"><ul class=\"bones_page_navi\"><li><span>Page ".$paged." of ".$pages." </span></li
