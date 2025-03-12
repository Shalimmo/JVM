<?php
/* Bones Custom Post Type Example
This page walks you through creating 
a custom post type and taxonomies. You
can edit this one or copy the following code 
to create another one. 

I put this in a separate file so as to 
keep it organized. I find it easier to edit
and change things if they are concentrated
in their own file.

Developed by: Eddie Machado
URL: http://themble.com/bones/
*/


// let's create the function for the custom type
function custom_post_example() { 

	// creating (registering) the custom type 
	register_post_type( 'villas', /* (http://codex.wordpress.org/Function_Reference/register_post_type) */
	
		// let's now add all the options for this post type
		array('labels' => array(
			'name' => __('Villas', 'bonestheme'), /* This is the Title of the Group */
			'singular_name' => __('Villa', 'bonestheme'), /* This is the individual type */
			'all_items' => __('All Villas', 'bonestheme'), /* the all items menu item */
			'add_new' => __('Add New', 'bonestheme'), /* The add new menu item */
			'add_new_item' => __('Add New Villa', 'bonestheme'), /* Add New Display Title */
			'edit' => __( 'Edit', 'bonestheme' ), /* Edit Dialog */
			'edit_item' => __('Edit Villa', 'bonestheme'), /* Edit Display Title */
			'new_item' => __('New Villa', 'bonestheme'), /* New Display Title */
			'view_item' => __('View Villa', 'bonestheme'), /* View Display Title */
			'search_items' => __('Search Villa', 'bonestheme'), /* Search Custom Type Title */ 
			'not_found' =>  __('Nothing found in the Database.', 'bonestheme'), /* This displays if there are no entries yet */ 
			'not_found_in_trash' => __('Nothing found in Trash', 'bonestheme'), /* This displays if there is nothing in the trash */
			'parent_item_colon' => ''
			), /* end of arrays */
			'description' => __( 'This is the example of Villa', 'bonestheme' ), /* Custom Type Description */
			'public' => true,
			'publicly_queryable' => true,
			'exclude_from_search' => false,
			'show_ui' => true,
			'query_var' => true,
			'menu_position' => 8, /* this is what order you want it to appear in on the left hand side menu */ 
			'menu_icon' => 'dashicons-palmtree', /* the icon for the custom post type menu */
			'rewrite'   => array( 'slug' => 'villa', 'with_front' => false, ), /* you can specify its url slug */
			'has_archive' => true, /* you can rename the slug here */
			'capability_type' => 'post',
			'hierarchical' => true,
			/* the next one is important, it tells what's enabled in the post editor */
			'supports' => array( 'title', 'editor', 'author', 'thumbnail', 'excerpt', 'trackbacks', 'comments', 'revisions')
		) /* end of options */
	); /* end of register post type */

	register_post_type( 'slides', /* (http://codex.wordpress.org/Function_Reference/register_post_type) */
	
		// let's now add all the options for this post type
		array('labels' => array(
			'name' => __('Slides', 'bonestheme'),
			'singular_name' => __('Slide', 'bonestheme'),
			'all_items' => __('All Slides', 'bonestheme'),
			'add_new' => __('Add New', 'bonestheme'),
			'add_new_item' => __('Add New Slide', 'bonestheme'),
			'edit' => __( 'Edit', 'bonestheme' ),
			'edit_item' => __('Edit Slide', 'bonestheme'),
			'new_item' => __('New Slide', 'bonestheme'),
			'view_item' => __('View Slide', 'bonestheme'),
			'search_items' => __('Search Slide', 'bonestheme'),
			'not_found' =>  __('Nothing found in the Database.', 'bonestheme'),
			'not_found_in_trash' => __('Nothing found in Trash', 'bonestheme'),
			'parent_item_colon' => ''
			), /* end of arrays */
			'description' => __( 'This is the example of a Slide', 'bonestheme' ), /* Custom Type Description */
			'public' => true,
			'publicly_queryable' => true,
			'exclude_from_search' => false,
			'show_ui' => true,
			'query_var' => true,
			'menu_position' => 8,
			'menu_icon' => 'dashicons-images-alt2',
			'rewrite'   => array( 'slug' => 'slide', 'with_front' => false ),
			'has_archive' => false,
			'exclude_from_search' => true,
			'capability_type' => 'post',
			'hierarchical' => false,
			'supports' => array( 'title')
		)
	); /* end of register post type */
// creating (registering) the custom type 
	register_post_type( 'insider-key', /* (http://codex.wordpress.org/Function_Reference/register_post_type) */
	
		// let's now add all the options for this post type
		array('labels' => array(
			'name' => __('Insider Key', 'bonestheme'), /* This is the Title of the Group */
			'singular_name' => __('Insider Key', 'bonestheme'), /* This is the individual type */
			'all_items' => __('All Posts', 'bonestheme'), /* the all items menu item */
			'add_new' => __('Add New', 'bonestheme'), /* The add new menu item */
			'add_new_item' => __('Add New Post', 'bonestheme'), /* Add New Display Title */
			'edit' => __( 'Edit', 'bonestheme' ), /* Edit Dialog */
			'edit_item' => __('Edit Post', 'bonestheme'), /* Edit Display Title */
			'new_item' => __('New Post', 'bonestheme'), /* New Display Title */
			'view_item' => __('View Post', 'bonestheme'), /* View Display Title */
			'search_items' => __('Search Post', 'bonestheme'), /* Search Custom Type Title */ 
			'not_found' =>  __('Nothing found in the Database.', 'bonestheme'), /* This displays if there are no entries yet */ 
			'not_found_in_trash' => __('Nothing found in Trash', 'bonestheme'), /* This displays if there is nothing in the trash */
			'parent_item_colon' => ''
			), /* end of arrays */
			'description' => __( 'This is the example of a Post', 'bonestheme' ), /* Custom Type Description */
			'public' => true,
			'publicly_queryable' => true,
			'exclude_from_search' => false,
			'show_ui' => true,
			'query_var' => true,
			'menu_position' => 8, /* this is what order you want it to appear in on the left hand side menu */ 
			'menu_icon' => get_stylesheet_directory_uri() . '/library/images/custom-post-icon.png', /* the icon for the custom post type menu */
			'rewrite'   => array( 'slug' => 'insider-key', 'with_front' => false, ), /* you can specify its url slug */
			'has_archive' => false, /* you can rename the slug here */
			'capability_type' => 'post',
			'hierarchical' => true,
			'taxonomies' => array('post_tag','category'),
			/* the next one is important, it tells what's enabled in the post editor */
			'supports' => array( 'title', 'editor', 'author', 'thumbnail', 'excerpt', 'trackbacks', 'comments', 'revisions')
		) /* end of options */
	); /* end of register post type */
// creating (registering) the custom type 
	register_post_type( 'vacation-ideas', /* (http://codex.wordpress.org/Function_Reference/register_post_type) */
	
		// let's now add all the options for this post type
		array('labels' => array(
			'name' => __('Vacation Ideas', 'bonestheme'), /* This is the Title of the Group */
			'singular_name' => __('Vacation Ideas', 'bonestheme'), /* This is the individual type */
			'all_items' => __('All Posts', 'bonestheme'), /* the all items menu item */
			'add_new' => __('Add New', 'bonestheme'), /* The add new menu item */
			'add_new_item' => __('Add New Post', 'bonestheme'), /* Add New Display Title */
			'edit' => __( 'Edit', 'bonestheme' ), /* Edit Dialog */
			'edit_item' => __('Edit Post', 'bonestheme'), /* Edit Display Title */
			'new_item' => __('New Post', 'bonestheme'), /* New Display Title */
			'view_item' => __('View Post', 'bonestheme'), /* View Display Title */
			'search_items' => __('Search Post', 'bonestheme'), /* Search Custom Type Title */ 
			'not_found' =>  __('Nothing found in the Database.', 'bonestheme'), /* This displays if there are no entries yet */ 
			'not_found_in_trash' => __('Nothing found in Trash', 'bonestheme'), /* This displays if there is nothing in the trash */
			'parent_item_colon' => ''
			), /* end of arrays */
			'description' => __( 'This is the example of a Post', 'bonestheme' ), /* Custom Type Description */
			'public' => true,
			'publicly_queryable' => true,
			'exclude_from_search' => false,
			'show_ui' => true,
			'query_var' => true,
			'menu_position' => 8, /* this is what order you want it to appear in on the left hand side menu */ 
			'menu_icon' => get_stylesheet_directory_uri() . '/library/images/custom-post-icon.png', /* the icon for the custom post type menu */
			'rewrite'   => array( 'slug' => 'vacation-ideas', 'with_front' => false, ), /* you can specify its url slug */
			'has_archive' => true, /* you can rename the slug here */
			'capability_type' => 'post',
			'hierarchical' => true,
			'taxonomies' => array('post_tag','region'),
			/* the next one is important, it tells what's enabled in the post editor */
			'supports' => array( 'title', 'editor', 'author', 'thumbnail', 'excerpt', 'trackbacks', 'comments', 'revisions')
		) /* end of options */
	); /* end of register post type */
	
	/* this adds your post categories to your custom post type */
	//register_taxonomy_for_object_type('category', 'itinerary');
	/* this adds your post tags to your custom post type */
	//register_taxonomy_for_object_type('post_tag', 'itinerary');
	
} 

	// adding the function to the Wordpress init
	add_action( 'init', 'custom_post_example');
	
	/*
	for more information on taxonomies, go here:
	http://codex.wordpress.org/Function_Reference/register_taxonomy
	*/
	
	// now let's add custom categories (these act like categories)
	register_taxonomy( 'Destinations', 
		array('villas'), /* if you change the name of register_post_type( 'itinerary', then you have to change this */
		array('hierarchical' => true,     /* if this is true, it acts like categories */             
			'labels' => array(
				'name' => __( 'Destinations', 'bonestheme' ), /* name of the custom taxonomy */
				'singular_name' => __( 'Destination', 'bonestheme' ), /* single taxonomy name */
				'search_items' =>  __( 'Search Destinations', 'bonestheme' ), /* search title for taxomony */
				'all_items' => __( 'All Destinations', 'bonestheme' ), /* all title for taxonomies */
				'parent_item' => __( 'Parent Destinations', 'bonestheme' ), /* parent title for taxonomy */
				'parent_item_colon' => __( 'Parent Destinations:', 'bonestheme' ), /* parent taxonomy title */
				'edit_item' => __( 'Edit Destinations', 'bonestheme' ), /* edit custom taxonomy title */
				'update_item' => __( 'Update Destinations', 'bonestheme' ), /* update title for taxonomy */
				'add_new_item' => __( 'Add New Destination', 'bonestheme' ), /* add new title for taxonomy */
				'new_item_name' => __( 'New Destination', 'bonestheme' ) /* name title for taxonomy */
			),
			'show_admin_column' => true, 
			'show_ui' => true,
			'query_var' => true,
			'rewrite' => array( 'slug' => 'destinations','with_front' => false ),
		)
	);   
	register_taxonomy( 'Collections', 
		array('villas'), /* if you change the name of register_post_type( 'itinerary', then you have to change this */
		array('hierarchical' => true,     /* if this is true, it acts like categories */             
			'labels' => array(
				'name' => __( 'Collections', 'bonestheme' ), /* name of the custom taxonomy */
				'singular_name' => __( 'Collection', 'bonestheme' ), /* single taxonomy name */
				'search_items' =>  __( 'Search Collections', 'bonestheme' ), /* search title for taxomony */
				'all_items' => __( 'All Collections', 'bonestheme' ), /* all title for taxonomies */
				'parent_item' => __( 'Parent Collections', 'bonestheme' ), /* parent title for taxonomy */
				'parent_item_colon' => __( 'Parent Collections:', 'bonestheme' ), /* parent taxonomy title */
				'edit_item' => __( 'Edit Collections', 'bonestheme' ), /* edit custom taxonomy title */
				'update_item' => __( 'Update Collections', 'bonestheme' ), /* update title for taxonomy */
				'add_new_item' => __( 'Add New Collection', 'bonestheme' ), /* add new title for taxonomy */
				'new_item_name' => __( 'New Collection', 'bonestheme' ) /* name title for taxonomy */
			),
			'show_admin_column' => true, 
			'show_ui' => true,
			'query_var' => true,
			'rewrite' => array( 'slug' => 'collections','with_front' => false ),
		)
	); 

register_taxonomy( 'Resort Villas', 
		array('villas'), /* if you change the name of register_post_type( 'itinerary', then you have to change this */
		array('hierarchical' => true,     /* if this is true, it acts like categories */             
			'labels' => array(
				'name' => __( 'Resort Villas', 'bonestheme' ), /* name of the custom taxonomy */
				'singular_name' => __( 'Resort Villa', 'bonestheme' ), /* single taxonomy name */
				'search_items' =>  __( 'Search Resort Villas', 'bonestheme' ), /* search title for taxomony */
				'all_items' => __( 'Resort Villas', 'bonestheme' ), /* all title for taxonomies */
				'parent_item' => __( 'Parent Resort Villas', 'bonestheme' ), /* parent title for taxonomy */
				'parent_item_colon' => __( 'Parent Resort Villas:', 'bonestheme' ), /* parent taxonomy title */
				'edit_item' => __( 'Edit Resort Villas', 'bonestheme' ), /* edit custom taxonomy title */
				'update_item' => __( 'Update Resort Villas', 'bonestheme' ), /* update title for taxonomy */
				'add_new_item' => __( 'Add New Resort Villa', 'bonestheme' ), /* add new title for taxonomy */
				'new_item_name' => __( 'New Resort Villa', 'bonestheme' ) /* name title for taxonomy */
			),
			'show_admin_column' => true, 
			'show_ui' => true,
			'query_var' => true,
			'rewrite' => array( 'slug' => 'resort-villas','with_front' => false ),
		)
	);   

register_taxonomy( 'Region', 
		array('vacation-ideas'), /* if you change the name of register_post_type( 'itinerary', then you have to change this */
		array('hierarchical' => false,     /* if this is true, it acts like categories */             
			'labels' => array(
				'name' => __( 'Region', 'bonestheme' ), /* name of the custom taxonomy */
				'singular_name' => __( 'Region', 'bonestheme' ), /* single taxonomy name */
				'search_items' =>  __( 'Search Regions', 'bonestheme' ), /* search title for taxomony */
				'all_items' => __( 'All Regions', 'bonestheme' ), /* all title for taxonomies */
				'parent_item' => __( 'Parent Regions', 'bonestheme' ), /* parent title for taxonomy */
				'parent_item_colon' => __( 'Parent Regions:', 'bonestheme' ), /* parent taxonomy title */
				'edit_item' => __( 'Edit Regions', 'bonestheme' ), /* edit custom taxonomy title */
				'update_item' => __( 'Update Regions', 'bonestheme' ), /* update title for taxonomy */
				'add_new_item' => __( 'Add New Region', 'bonestheme' ), /* add new title for taxonomy */
				'new_item_name' => __( 'New Region', 'bonestheme' ) /* name title for taxonomy */
			),
			'show_admin_column' => true, 
			'show_ui' => true,
			'query_var' => true,
			'rewrite' => array( 'slug' => 'vacation-ideas','with_front' => false ),
		)
	);   

	register_taxonomy( 'Sections', 
		array('slides'), /* if you change the name of register_post_type( 'itinerary', then you have to change this */
		array('hierarchical' => true,     /* if this is true, it acts like categories */             
			'labels' => array(
				'name' => __( 'Sections', 'bonestheme' ), /* name of the custom taxonomy */
				'singular_name' => __( 'Section', 'bonestheme' ), /* single taxonomy name */
				'search_items' =>  __( 'Search Section', 'bonestheme' ), /* search title for taxomony */
				'all_items' => __( 'All Sections', 'bonestheme' ), /* all title for taxonomies */
				'parent_item' => __( 'Parent Section', 'bonestheme' ),
				'parent_item_colon' => __( 'Parent Section:', 'bonestheme' ), /* parent taxonomy title */
				'edit_item' => __( 'Edit Section', 'bonestheme' ), /* edit custom taxonomy title */
				'update_item' => __( 'Update Section', 'bonestheme' ), /* update title for taxonomy */
				'add_new_item' => __( 'Add Section', 'bonestheme' ), /* add new title for taxonomy */
				'new_item_name' => __( 'New Section', 'bonestheme' ) /* name title for taxonomy */
			),
			'show_admin_column' => true, 
			'show_ui' => true,
			'query_var' => true,
			'rewrite' => array( 'slug' => 'section', 'with_front' => false  ),
		)
	);
?>