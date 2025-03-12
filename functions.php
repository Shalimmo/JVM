<?php
/*
Author: Eddie Machado
URL: htp://themble.com/bones/

This is where you can drop your custom functions or
just edit things like thumbnail sizes, header images, 
sidebars, comments, ect.
*/

/************* INCLUDE NEEDED FILES ***************/

/*
1. library/bones.php
	- head cleanup (remove rsd, uri links, junk css, ect)
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
					this is the new responsive optimized comment image. It used the new HTML5 data-attribute to display comment gravatars on larger screens only. What this means is that on larger posts, mobile sites don't have a ton of requests for comment images. This makes load time incredibly fast! If you'd like to change it back, just replace it with the regular wordpress gravatar call:
					echo get_avatar($comment,$size='32',$default='<path_to_url>' );
				*/ 
				?>
				<!-- custom gravatar call -->
				<?php
					// create variable
					$bgauthemail = get_comment_author_email();
				?>
				<img data-gravatar="http://www.gravatar.com/avatar/<?php echo md5($bgauthemail); ?>?s=32" class="load-gravatar avatar avatar-48 photo" height="32" width="32" src="<?php echo get_template_directory_uri(); ?>/library/images/nothing.gif" />
				<!-- end custom gravatar call -->
				<?php printf(__('<cite class="fn">%s</cite>', 'bonestheme'), get_comment_author_link()) ?>
				<time datetime="<?php echo comment_time('Y-m-j'); ?>"><a href="<?php echo htmlspecialchars( get_comment_link( $comment->comment_ID ) ) ?>"><?php comment_time(__('F jS, Y', 'bonestheme')); ?> </a></time>
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
	<input class="sbox" style="background: #ebebeb; color: #333; padding: 7px; margin: 0; border: 0;" type="text" value="' . get_search_query() . '" name="s" id="s" placeholder="'.esc_attr__('Search Journey Mexico...','bonestheme').'" />
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

  $share_result =  '<div id="social-tt" class="social-button-wrapper"><a href="https://twitter.com/share" class="twitter-share-button" data-count="horizontal" data-url="'.$url.'" data-via="journeymexico"></a></div>';

  // $share_result = '';

  // $share_result = $share_result.'<div id="social-fb" class="fb-like social-button" data-href="'.$url.'" data-send="false" data-layout="button_count" data-width="450" data-show-faces="true"></div>';

  $share_result = $share_result.'<div id="btn-fb" class="social-button-wrapper"><div id="social-fb" class="fb-like social-button" data-href="'.$url.'" data-colorscheme="light" data-layout="button_count" data-action="like" data-show-faces="true" data-send="false"></div></div>';

  $share_result = $share_result.'<div id="btn-fbshare" class="social-button-wrapper"><div class="fb-share-button" data-href="'.$url.'" data-width="65" data-type="button"></div></div>';

  $share_result = $share_result.'<div id="btn-gplus" class="social-button-wrapper"><div id="social-google" class="social-button"><div class="g-plusone" data-size="medium" data-href="'.$url.'"></div></div></div>';

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
		echo "<footer class=\"page-navigation\"><ul class=\"bones_page_navi\"><li><span>Page ".$paged." of ".$pages." </span></li>";
		if($paged > 2 && $paged > $range+1 && $showitems < $pages) echo "<li class=\"bpn-prev-link\"><a href='".get_pagenum_link(1)."'>&laquo; First</a></li>";
		if($paged > 1 && $showitems < $pages) echo "<li class=\"bpn-prev-link\"><a href='".get_pagenum_link($paged - 1)."'>&lsaquo; Next</a></li>";

		for ($i=1; $i <= $pages; $i++)
		{
			if (1 != $pages &&( !($i >= $paged+$range+1 || $i <= $paged-$range-1) || $pages <= $showitems ))
			{
				echo ($paged == $i)? "<li class=\"bpn-current\"><span class=\"current\">".$i."</span></li>":"<li class=\"bpn-inactive\"><a href='".get_pagenum_link($i)."' class=\"desactivada\">".$i."</a></li>";
			}
		}

		if ($paged < $pages && $showitems < $pages) echo "<li class=\"bpn-next-link\"><a href=\"".get_pagenum_link($paged + 1)."\">Next &rsaquo;</a></li>";
		if ($paged < $pages-1 &&  $paged+$range-1 < $pages && $showitems < $pages) echo "<li class=\"bpn-last-page-link\"><a href='".get_pagenum_link($pages)."'>Last &raquo;</a></li>";
		echo "</ul></footer>\n";
	}
}


// Quitar opción de editar de los posts
//function remove_editor_menu() {
//	remove_action('admin_menu', '_add_themes_utility_last', 101);
//}
//add_action('_admin_menu', 'remove_editor_menu', 1);


// Logo personalizado para login
function login_css() {
	wp_enqueue_style( 'login_css', get_template_directory_uri() . '/login.css' );
}
add_action('login_head', 'login_css');

// Link personalizado para login
function wpc_url_login(){
	return "http://www.jmvillas.com/"; // your URL here
}
add_filter('login_headerurl', 'wpc_url_login');

// Footer personalizado para el admin
function remove_footer_admin () {
	echo "JM Villas Admin";
} 
add_filter('admin_footer_text', 'remove_footer_admin');

// Editar el menú admin
function revcon_change_post_label() {
	global $menu;
	global $submenu;
	$menu[5][0] = 'News';
	$submenu['edit.php'][5][0] = 'News';
	$submenu['edit.php'][10][0] = 'Add News';
	$submenu['edit.php'][15][0] = 'Categories';
	$submenu['edit.php'][16][0] = 'News tags';

	// Remover menús
	// remove_menu_page('link-manager.php');
	// remove_menu_page('edit-comments.php');
	// remove_menu_page('tools.php');

	// Remover submenús
	// remove_submenu_page('themes.php','customize.php');
	// remove_submenu_page('themes.php','theme-editor.php');
	// remove_submenu_page('plugins.php','plugin-install.php');
	// remove_submenu_page('plugins.php','plugin-editor.php');
	// remove_submenu_page('options-general.php','options-discussion.php');

}
add_action( 'admin_menu', 'revcon_change_post_label' );

// Editar el post de Entradas
function revcon_change_post_object() {
	global $wp_post_types;
	$labels = &$wp_post_types['post']->labels;
	$labels->name = 'News';
	$labels->singular_name = 'News';
	$labels->add_new = 'Add news';
	$labels->add_new_item = 'Add new news';
	$labels->edit_item = 'Edit news';
	$labels->new_item = 'News';
	$labels->view_item = 'View news';
	$labels->search_items = 'Search news';
	$labels->not_found = 'News not found in the Database';
	$labels->not_found_in_trash = 'News not found in Trash';
	$labels->all_items = 'All news';
	$labels->menu_name = 'News';
	$labels->name_admin_bar = 'News';
}
add_action( 'init', 'revcon_change_post_object' );

// Reordenar el menú
/*function custom_menu_order($menu_ord) {
    if (!$menu_ord) return true;
    return array(
        'index.php', // Dashboard
        'separator1', // First separator
        'edit.php?post_type=page', // Pages
        'edit.php?post_type=villas', // Post CPT
        'edit.php?post_type=slides', // Post CPT
        'upload.php', // Media
        'separator2', // Second separator
        'themes.php', // Appearance
        'options-general.php', // Settings
        'separator3', // Second separator
        'edit.php', // Posts (News)
        'plugins.php', // Plugins
        'users.php', // Users
        // 'link-manager.php', Links
        // 'edit-comments.php', Comments
        // 'tools.php', Tools
        'separator-last', // Last separator
    );
}
*/

//add_filter('custom_menu_order', 'custom_menu_order'); // Activate custom_menu_order
//add_filter('menu_order', 'custom_menu_order');

// action
add_action('pre_get_posts', 'my_pre_get_posts');

function my_pre_get_posts( $query )
{
	// bail early if is in admin
	if( is_admin() )
	{
		return $query;
	}
	 if( ! $query->is_post_type_archive()) return;
	// get meta query
	$meta_query = $query->get('meta_query');

	if( isset( $_GET[ 'bedrooms' ] ) )
	{
		$bedrooms = explode(',', $_GET['bedrooms']);

    	$meta_query[] = array(
			'key'		=> 'bedrooms',
			'value'		=> $bedrooms,
			'compare'	=> 'IN',
		);
	}
	// update meta query
	$query->set('meta_query', $meta_query);
	return $query;
}

add_filter('pre_get_posts', 'query_post_type');
function query_post_type($query) {
  if(is_category() || is_tag()) {
    $post_type = get_query_var('post_type');
	if($post_type)
	    $post_type = $post_type;
	else
	    $post_type = array('nav_menu_item','post','villas');
    $query->set('post_type',$post_type);
	return $query;
    }
}

function limit_text($text, $limit)
{
	if (str_word_count($text, 0) > $limit)
	{
		$words = str_word_count($text, 2);
		$pos = array_keys($words);
		$text = substr($text, 0, $pos[$limit]) . '...';
	}
	return $text;
}
// test menu

/*function getMainMenu($menulocation){
  $locations = get_nav_menu_locations();
  $menuItems = wp_get_nav_menu_items( $locations[ $menulocation ] );
    if(empty($menuItems))
      return false;
    else{
      wp_nav_menu(array('theme_location' => $menulocation));
      return true;
    }
}*/

// Correo de salida de Wordpress
function new_mail_from($old) {
 return 'noreply@jmvillas.com';
}
add_filter('wp_mail_from', 'new_mail_from');

// Autor del correo de salida de Wordpress
function new_mail_from_name($old) {
 return 'Jm Villas';
}
add_filter('wp_mail_from_name', 'new_mail_from_name');


/**
 * Join posts and postmeta tables
 *
 * http://codex.wordpress.org/Plugin_API/Filter_Reference/posts_join
 */
function cf_search_join( $join ) {
    global $wpdb;

    if ( is_search() ) {    
        $join .=' LEFT JOIN '.$wpdb->postmeta. ' ON '. $wpdb->posts . '.ID = ' . $wpdb->postmeta . '.post_id ';
    }
    
    return $join;
}
add_filter('posts_join', 'cf_search_join' );
/**
 * Modify the search query with posts_where
 *
 * http://codex.wordpress.org/Plugin_API/Filter_Reference/posts_where
 */
function cf_search_where( $where ) {
    global $pagenow, $wpdb;
   
    if ( is_search() ) {
        $where = preg_replace(
            "/\(\s*".$wpdb->posts.".post_title\s+LIKE\s*(\'[^\']+\')\s*\)/",
            "(".$wpdb->posts.".post_title LIKE $1) OR (".$wpdb->postmeta.".meta_value LIKE $1)", $where );
    }

    return $where;
}
add_filter( 'posts_where', 'cf_search_where' );

/**
 * Prevent duplicates
 *
 * http://codex.wordpress.org/Plugin_API/Filter_Reference/posts_distinct
 */
function cf_search_distinct( $where ) {
    global $wpdb;

    if ( is_search() ) {
        return "DISTINCT";
    }

    return $where;
}
add_filter( 'posts_distinct', 'cf_search_distinct' );
// nav-menu-fix

/** template for rss page that pulls featured image of the post**/
function featuredtoRSS($content) {
global $post;
if ( has_post_thumbnail( $post->ID ) ){
$content = '<div>' . get_the_post_thumbnail( $post->ID, 'jmvillas-insider', array( 'style' => 'margin-bottom: 15px;width:582px!important;' ) ) . '</div>' . '<p>' . $content . '..</p>';
}
return $content;
}
 
add_filter('the_excerpt_rss', 'featuredtoRSS');
add_filter('the_content_feed', 'featuredtoRSS');

//function for homepage slider, reponsive images with srcset, link on favorites
function newrs_add_resp_img_variable($m, $slide_data, $options) {

    $m->addHelper('responsive_image_tag', function() use ($slide_data) {

            $attachment_id = 0;
            if (is_object($slide_data) && isset($slide_data->ID) ) {
                if ( get_post_type($slide_data) === 'attachment' ) {
                    $attachment_id = $slide_data->ID;
                } else {
                    $featured_image_id = get_post_thumbnail_id($slide_data->ID);
                    if ($featured_image_id) {
                         $attachment_id = $featured_image_id;
                    }
                }
            } else if( isset($slide_data['image']) && isset($slide_data['image']['attachment_id']) ) {
                $attachment_id = $slide_data['image']['attachment_id'];
            }

            if( $attachment_id ) {
                $att_src = wp_get_attachment_image_url( $attachment_id, 'full' );
                $att_srcbig = wp_get_attachment_image_url( $attachment_id, 'jmvillas-full' );
                $att_srcmed = wp_get_attachment_image_url( $attachment_id, 'jmvillas-thumb' );
                $att_srcset = wp_get_attachment_image_srcset( $attachment_id, 'full' );
                $att_alt = get_post_meta( $attachment_id, '_wp_attachment_image_alt', true );
                return '<img src="'.$att_src.'" data-rsBigImg="'.$att_srcbig.'" srcset="'.$att_srcbig.', '.$att_srcmed.' 415w'.'" alt="'.$att_alt.'" width="100%"/>';
            }

            return '{{image_tag}}';
    } );
    	// this only brings the image size in 387x268
      $m->addHelper('responsive_image_tag_2', function() use ($slide_data) {

            $attachment_id = 0;
            if (is_object($slide_data) && isset($slide_data->ID) ) {
                if ( get_post_type($slide_data) === 'attachment' ) {
                    $attachment_id = $slide_data->ID;
                } else {
                    $featured_image_id = get_post_thumbnail_id($slide_data->ID);
                    if ($featured_image_id) {
                         $attachment_id = $featured_image_id;
                    }
                }
            } else if( isset($slide_data['image']) && isset($slide_data['image']['attachment_id']) ) {
                $attachment_id = $slide_data['image']['attachment_id'];
            }

            if( $attachment_id ) {
                $att_srcmed = wp_get_attachment_image_url( $attachment_id, 'jmvillas-thumb' );
                $att_alt = get_post_meta( $attachment_id, '_wp_attachment_image_alt', true );
                return '<img src="'.$att_srcmed.'" alt="'.$att_alt.'" width="100%"/>';
            }

            return '{{image_tag}}';
    } );
      // end this only brings the image size in 387x268
}
add_filter('new_rs_slides_renderer_helper','newrs_add_resp_img_variable', 10, 4);

/*Zoho API*/
add_action('wpcf7_mail_sent', function ($cf7) {
    // Run code after the email has been sent
    /*  $client_id = '1000.8T55HMLEDO5763AT58KXT7ECL3NCFD';
$client_secret = 'b2f806433e181fdbf6a6bf1486aa519b1d48c63e8f';
$access_token = '1000.7dd53e6df9a4b3a64b0ff8455cdfda80.b0c1a34f0659ce7526d0bf48ad5f6852';
$refresh_token = '1000.2723f26c99ec08515b417d40524ce5eb.92da5aa93b03c0062458dff8fef5dd8d';
 
$curl = 'https://accounts.zoho.com/oauth/v2/token?refresh_token='.$refresh_token.'&client_id='.$client_id.'&client_secret='.$client_secret.'&grant_type=refresh_token';
 
$ch = curl_init($curl);
$headers = array(
'Content-Type: application/json',
);
curl_setopt($ch, CURLOPT_VERBOSE, 1);//standard i/o streams
curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, FALSE);// Turn off the server and peer verification
curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, FALSE);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);//Set to return data to string ($response)
curl_setopt($ch, CURLOPT_POST, 1);//Regular post
curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
$response = curl_exec($ch);
 
$response = json_decode( $response );*/
 
//echo '<pre>'; print_r( $response ); echo '</pre>';
//echo isset( $response->access_token ) ? $response->access_token : '';

//error_reporting(E_ALL);
//ini_set('display_errors','On');

 $sAccessToken = get_option( 'access_token' );


header('Content-Type: text/plain');
 $submission = WPCF7_Submission::get_instance();
 $data = $submission->get_posted_data();
  $wpcf7 = WPCF7_ContactForm::get_current();

    //$form_id = $wpcf7->id;
   $cformid= $wpcf7->id;
//print_r($submission);

if($cformid==26686){
   // echo 'hello1';
     //print_r($data);
        //suppose you have a field which name is 'email' then you can access it by using following statement.
        $email =  $data['your-email-f'];
         $first_name =  $data['your-first-name-f'];
          $last_name =  $data['your-last-name-f'];
          $phone=$data['your-phone-f'];
          $travel_dates=$data['travel-dates-f'];
          $travel_dates_end=$data['travel-dates-end-f'];
          $flexible =$data['flexible'];
          $budget=$data['budget-f'];
          $adults=$data['adults'];
          $children=$data['children'];
          $destination=$data['destination-f'];
          $preferences=$data['preferences-f'];
          $ideas=$data['textarea-284'];
           $blog=$data['opt-in-blog'];
            $optinnl=$data['opt-in-nl'];
          $page_url =$data['page-url'];
           
         
          

//$sAccessToken = $response->access_token; // change me
$sJSON = json_encode(array(
    'First_Name' => $first_name,
    'Last_Name' =>  $last_name,
    'Lead_Status' =>'Unassigned',
    'Email' => $email,
    'Phone' => $phone,
    'Lead_Source1' => 'Home URL',
    'Travel_Date' => $travel_dates,
    'Check_Out' => $travel_dates_end,
    'Flexible_Dates1' => $flexible[0],
    'Total_Trip_Budgets' => $budget[0],
    'Number_of_Adults' => $adults[0],
    'Number_of_Children_Ages' => $children[0],
    'Destinationm' => $destination,
    'Preferences' => $preferences[0],
    'Additional_comments_special_requests_more_detail'=> $ideas,
     'News_Letter' =>$optinnl[0],
     'Blog' => $blog[0],
       'Itinerary_link'=>   $page_url,
         'Type'=> 'FAST BOOK',
    'Branch'=> 'JM-Journey Mexico'
       
  ));
  $sJSON = str_replace('{','[{',$sJSON);
  $sJSON = str_replace('}','}]',$sJSON);
  $sJSON = '{"data":' . $sJSON . '}';
//echo "SENDING: $sJSON\n";
$sURL = 'https://www.zohoapis.com/crm/v2/Leads';
$sResponse = @ file_get_contents($sURL,false,stream_context_create(array('http'=>array(
  'ignore_errors' => TRUE, // critical if you want to see errors in response instead of empty on error
  'method' => 'POST',
  'header' => array(
    'Content-Type: application/json',
    "Authorization: Zoho-oauthtoken $sAccessToken",
    'cache-control: no-cache'
  ),
  'content' => $sJSON
))));
//echo "$sResponse\n";
$arrayData = json_decode($sResponse, true);
$lead_id = $arrayData['data'][0]['details']['id'];



$url = 'https://www.zohoapis.com/crm/v6/Leads/'.$lead_id.'/actions/add_tags';
    $headers = [
        'Authorization: Zoho-oauthtoken ' . $sAccessToken,
        'Content-Type: application/json'
    ];


    $sJSON = [ 
    "tags" => [
       [
            "name" => "Journey Mexico web page",
            "id"=> "5652577000002366007",
            "color_code"=> null
        ],
         [
            "name" => "Villla Inq Plan your Trip",
            "id"=> "5652577000003769032",
            "color_code"=> null
        ]
    ]
];



    $ch = curl_init($url);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
    curl_setopt($ch, CURLOPT_POST, true);
    curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($sJSON));

    $response = curl_exec($ch);
    
    //print_r($response);
    curl_close($ch);
}

elseif($cformid==33724){
    
    //echo 'hello2';
        //suppose you have a field which name is 'email' then you can access it by using following statement.
        $email =  $data['your-email-f'];
         $first_name =  $data['your-first-name-f'];
          $last_name =  $data['your-last-name-f'];
          $phone=$data['your-phone-f'];
          $travel_dates=$data['travel-dates-f'];
          $travel_dates_end=$data['travel-dates-end-f'];
          $flexible =$data['flexible'];
          $budget=$data['budget-f'];
        
          $adults=$data['adults'];
          $children=$data['children'];
          $destination=$data['destination-f'];
          $preferences=$data['preferences-f'];
          $optinnl=$data['opt-in-nl'];
          $optblog=$data['opt-in-blog'];
          $page_url =$data['page-url'];
          
         
          

//$sAccessToken = $response->access_token; // change me
$sJSON = json_encode(array(
    'First_Name' => $first_name,
    'Last_Name' =>  $last_name,
    'Email' => $email,
    'Phone' => $phone,
    'Lead_Source1' => 'Talk to our Villa expert',
    'Travel_Date' => $travel_dates,
    'Check_Out' => $travel_dates_end,
   'Flexible_Dates1' => $flexible[0],
'Total_Trip_Budgets' => $budget[0],
    'Number_of_Adults' => $adults[0],
    'Number_of_Children_Ages' => $children[0],
    'Destinationm' => $destination,
    'Preferences' => $preferences[0],
    'News_Letter' =>$optinnl[0],
     'Blog' => $optblog[0],
     'Lead_Status' =>'Unassigned',
       'Itinerary_link'=>   $page_url,
         'Type'=> 'FAST BOOK',
    'Branch'=> 'JM-Journey Mexico'
    
   
  ));
  $sJSON = str_replace('{','[{',$sJSON);
  $sJSON = str_replace('}','}]',$sJSON);
  $sJSON = '{"data":' . $sJSON . '}';
//echo "SENDING: $sJSON\n";
$sURL = 'https://www.zohoapis.com/crm/v2/Leads';
$sResponse = @ file_get_contents($sURL,false,stream_context_create(array('http'=>array(
  'ignore_errors' => TRUE, // critical if you want to see errors in response instead of empty on error
  'method' => 'POST',
  'header' => array(
    'Content-Type: application/json',
    "Authorization: Zoho-oauthtoken $sAccessToken",
    'cache-control: no-cache'
  ),
  'content' => $sJSON
))));


$arrayData = json_decode($sResponse, true);
$lead_id = $arrayData['data'][0]['details']['id'];



$url = 'https://www.zohoapis.com/crm/v6/Leads/'.$lead_id.'/actions/add_tags';
    $headers = [
        'Authorization: Zoho-oauthtoken ' . $sAccessToken,
        'Content-Type: application/json'
    ];


    $sJSON = [ 
    "tags" => [
        [
            "name" => "Journey Mexico web page",
            "id"=> "5652577000002366007",
            "color_code"=> null
        ],
         [
            "name" => "Villa Talk to a Expert",
            "id"=> "5652577000004953002",
            "color_code"=> null
        ],
    ]
];



    $ch = curl_init($url);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
    curl_setopt($ch, CURLOPT_POST, true);
    curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($sJSON));

    $response = curl_exec($ch);
    
    //print_r($response);
    curl_close($ch);


}

elseif($cformid==26670){
    // echo 'hello3';
        //suppose you have a field which name is 'email' then you can access it by using following statement.
        $email =  $data['your-email'];
         $first_name =  $data['your-first-name'];
          $last_name =  $data['your-last-name'];
          $phone=$data['your-phone'];
          $travel_dates=$data['travel-dates'];
          $travel_dates_end=$data['travel-dates-end'];
          $flexible =$data['flexible'];
          $budget=$data['budget-f'];
          $adults=$data['adults'];
          $children=$data['children'];
          $destination=$data['destination-f'];
          $preferences=$data['preferences-f'];
          $ideas=$data['textarea-284'];
          $bedrooms=$data['bedrooms'];
          $opt_in_nl=$data['opt-in-nl'];
           $opt_in_blog=$data['opt-in-blog'];
             $villa_name=$data['villa-name'];
             $villaname=$data['villa-name'];
           
           $page_url =$data['page-url'];
          //$sAccessToken = $response->access_token; // change me
$sJSON = json_encode(array(
    'First_Name' => $first_name,
    'Last_Name' =>  $last_name,
    'Email' => $email,
    'Phone' => $phone,
    'Lead_Source1' => 'Villa (Template)',
    'Travel_Date' => $travel_dates,
    'Check_Out' => $travel_dates_end,
    'Flexible_Dates1' => $flexible[0],
    'Total_Trip_Budgets' => $budget[0],
    'Number_of_Adults' => $adults[0],
    'Number_of_Children_Ages' => $children[0],
    'Destinationm' => $destination,
    'Preferences' => $preferences[0],
    'Bedrooms' => $bedrooms[0],
    'News_Letter' => $opt_in_nl[0],
    'Blog' =>  $opt_in_blog[0],
    'Lead_Status' =>'Unassigned',
    'Villa_Name'=>$villaname,
    'Itinerary_link'=>   $page_url,
    'Type'=> 'FAST BOOK',
    'Branch'=> 'JM-Journey Mexico',
    'Department'=>'VI-Villas'
  ));
  $sJSON = str_replace('{','[{',$sJSON);
  $sJSON = str_replace('}','}]',$sJSON);
  $sJSON = '{"data":' . $sJSON . '}';
//echo "SENDING: $sJSON\n";
$sURL = 'https://www.zohoapis.com/crm/v2/Leads';
$sResponse = @ file_get_contents($sURL,false,stream_context_create(array('http'=>array(
  'ignore_errors' => TRUE, // critical if you want to see errors in response instead of empty on error
  'method' => 'POST',
  'header' => array(
    'Content-Type: application/json',
    "Authorization: Zoho-oauthtoken $sAccessToken",
    'cache-control: no-cache'
  ),
  'content' => $sJSON
))));

//echo "$sResponse\n";
$arrayData = json_decode($sResponse, true);
$lead_id = $arrayData['data'][0]['details']['id'];



$url = 'https://www.zohoapis.com/crm/v6/Leads/'.$lead_id.'/actions/add_tags';
    $headers = [
        'Authorization: Zoho-oauthtoken ' . $sAccessToken,
        'Content-Type: application/json'
    ];


    $sJSON = [ 
    "tags" => [
        [
            "name" => "Journey Mexico web page",
            "id"=> "5652577000002366007",
            "color_code"=> null
        ],
         [
            "name" => "Villa Inq- Nombre Villa",
            "id"=> "5652577000003769022",
            "color_code"=> null
        ],
    ]
];



    $ch = curl_init($url);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
    curl_setopt($ch, CURLOPT_POST, true);
    curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($sJSON));

    $response = curl_exec($ch);
    
    //print_r($response);
    curl_close($ch);
	
	}

});

function reorder_plugin_scripts() {
    // Deregister the original scripts
    wp_deregister_script('contact-form-7'); // Contact Form 7 script handle
    wp_deregister_script('search-filter-build.min.js'); // Search Filter Pro script handle (update this if necessary)

    // Enqueue Search Filter Pro script first (replace 'search-filter-pro' with the actual handle if different)
    wp_register_script('search-filter-pro', 
                       plugin_dir_url(__FILE__) . 'search-filter-pro%203/public/assets/js/search-filter-build.min.js', // Update with correct path
                       array('jquery'), 
                       null, 
                       true);
    wp_enqueue_script('search-filter-pro');

    // Re-register Contact Form 7 script with Search Filter Pro as a dependency
    wp_register_script('contact-form-7', 
                       plugin_dir_url(__FILE__) . 'path-to-contact-form-7.js', // Update with correct path
                       array('jquery', 'search-filter-pro'), 
                       null, 
                       true);
    wp_enqueue_script('contact-form-7');
}

add_action('wp_enqueue_scripts', 'reorder_plugin_scripts', 20);

