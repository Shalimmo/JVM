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
	register_post_type( 'itinerary', /* (http://codex.wordpress.org/Function_Reference/register_post_type) */
	
	 	// let's now add all the options for this post type
		array('labels' => array(
			'name' => __('Itineraries', 'bonestheme'), /* This is the Title of the Group */
			'singular_name' => __('Itinerary', 'bonestheme'), /* This is the individual type */
			'all_items' => __('All Itineraries', 'bonestheme'), /* the all items menu item */
			'add_new' => __('Add New', 'bonestheme'), /* The add new menu item */
			'add_new_item' => __('Add New Itinerary', 'bonestheme'), /* Add New Display Title */
			'edit' => __( 'Edit', 'bonestheme' ), /* Edit Dialog */
			'edit_item' => __('Edit Itineraries', 'bonestheme'), /* Edit Display Title */
			'new_item' => __('New Itinerary', 'bonestheme'), /* New Display Title */
			'view_item' => __('View Itinerary', 'bonestheme'), /* View Display Title */
			'search_items' => __('Search Itinerary', 'bonestheme'), /* Search Custom Type Title */ 
			'not_found' =>  __('Nothing found in the Database.', 'bonestheme'), /* This displays if there are no entries yet */ 
			'not_found_in_trash' => __('Nothing found in Trash', 'bonestheme'), /* This displays if there is nothing in the trash */
			'parent_item_colon' => ''
			), /* end of arrays */
			'description' => __( 'This is the example of Itinerary', 'bonestheme' ), /* Custom Type Description */
			'public' => true,
			'publicly_queryable' => true,
			'exclude_from_search' => false,
			'show_ui' => true,
			'query_var' => true,
			'menu_position' => 8, /* this is what order you want it to appear in on the left hand side menu */ 
			'menu_icon' => get_stylesheet_directory_uri() . '/library/images/custom-post-icon.png', /* the icon for the custom post type menu */
			'rewrite'	=> array( 'slug' => 'itinerary', 'with_front' => false ), /* you can specify its url slug */
			'has_archive' => 'itinerary', /* you can rename the slug here */
			'capability_type' => 'post',
			'hierarchical' => false,
			/* the next one is important, it tells what's enabled in the post editor */
			'supports' => array( 'title', 'editor', 'author', 'thumbnail', 'excerpt', 'trackbacks', 'custom-fields', 'comments', 'revisions', 'sticky')
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
    	array('itinerary'), /* if you change the name of register_post_type( 'itinerary', then you have to change this */
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
    		'rewrite' => array( 'slug' => 'destination' ),
    	)
    );   
    

   



	// now let's add custom categories (these act like categories)
    register_taxonomy( 'Experiences', 
    	array('itinerary'), /* if you change the name of register_post_type( 'itinerary', then you have to change this */
    	array('hierarchical' => true,     /* if this is true, it acts like categories */             
    		'labels' => array(
    			'name' => __( 'Experiences', 'bonestheme' ), /* name of the custom taxonomy */
    			'singular_name' => __( 'Experience', 'bonestheme' ), /* single taxonomy name */
    			'search_items' =>  __( 'Search Experiences', 'bonestheme' ), /* search title for taxomony */
    			'all_items' => __( 'All Experiences', 'bonestheme' ), /* all title for taxonomies */
    			'parent_item' => __( 'Parent Experiences', 'bonestheme' ), /* parent title for taxonomy */
    			'parent_item_colon' => __( 'Parent Experiences:', 'bonestheme' ), /* parent taxonomy title */
    			'edit_item' => __( 'Edit Experiences', 'bonestheme' ), /* edit custom taxonomy title */
    			'update_item' => __( 'Update Experiences', 'bonestheme' ), /* update title for taxonomy */
    			'add_new_item' => __( 'Add Experience', 'bonestheme' ), /* add new title for taxonomy */
    			'new_item_name' => __( 'New Experience', 'bonestheme' ) /* name title for taxonomy */
    		),
    		'show_admin_column' => true, 
    		'show_ui' => true,
    		'query_var' => true,
    		'rewrite' => array( 'slug' => 'experience-mexico' ),
    	)
    );   
    

	// now let's add custom categories (these act like categories)
    register_taxonomy( 'Style', 
    	array('itinerary'), /* if you change the name of register_post_type( 'itinerary', then you have to change this */
    	array('hierarchical' => true,     /* if this is true, it acts like categories */             
    		'labels' => array(
    			'name' => __( 'Travel Styles', 'bonestheme' ), /* name of the custom taxonomy */
    			'singular_name' => __( 'Travel Style', 'bonestheme' ), /* single taxonomy name */
    			'search_items' =>  __( 'Search Travel Styles', 'bonestheme' ), /* search title for taxomony */
    			'all_items' => __( 'All Travel Styles', 'bonestheme' ), /* all title for taxonomies */
    			'parent_item' => __( 'ParentTravel Styles', 'bonestheme' ), /* parent title for taxonomy */
    			'parent_item_colon' => __( 'Parent Travel Styles:', 'bonestheme' ), /* parent taxonomy title */
    			'edit_item' => __( 'EditTravel Styles', 'bonestheme' ), /* edit custom taxonomy title */
    			'update_item' => __( 'Update Travel Styles', 'bonestheme' ), /* update title for taxonomy */
    			'add_new_item' => __( 'Add New Travel Style', 'bonestheme' ), /* add new title for taxonomy */
    			'new_item_name' => __( 'New Travel Style', 'bonestheme' ) /* name title for taxonomy */
    		),
    		'show_admin_column' => true, 
    		'show_ui' => true,
    		'query_var' => true,
    		'rewrite' => array( 'slug' => 'style' ),
    	)
    );   
    

	// now let's add custom categories (these act like categories)
    register_taxonomy( 'AccommStyle', 
    	array('hotels'), /* if you change the name of register_post_type( 'itinerary', then you have to change this */
    	array('hierarchical' => true,     /* if this is true, it acts like categories */             
    		'labels' => array(
    			'name' => __( 'Accomm Style', 'bonestheme' ), /* name of the custom taxonomy */
    			'singular_name' => __( 'Accomm Styles', 'bonestheme' ), /* single taxonomy name */
    			'search_items' =>  __( 'Search Accomm Styles', 'bonestheme' ), /* search title for taxomony */
    			'all_items' => __( 'All Accomm Styles', 'bonestheme' ), /* all title for taxonomies */
    			'parent_item' => __( 'Parent Accomm Styles', 'bonestheme' ), /* parent title for taxonomy */
    			'parent_item_colon' => __( 'Parent Accomm Styles:', 'bonestheme' ), /* parent taxonomy title */
    			'edit_item' => __( 'Edit Accomm Styles', 'bonestheme' ), /* edit custom taxonomy title */
    			'update_item' => __( 'Update Accomm Style', 'bonestheme' ), /* update title for taxonomy */
    			'add_new_item' => __( 'Add Accomm Style', 'bonestheme' ), /* add new title for taxonomy */
    			'new_item_name' => __( 'New Accomm Style', 'bonestheme' ) /* name title for taxonomy */
    		),
    		'show_admin_column' => true, 
    		'show_ui' => true,
    		'query_var' => true,
    		'rewrite' => array( 'slug' => 'accomm-style' ),
    	)
    );   
	

	// now let's add custom categories (these act like categories)
    register_taxonomy( 'Region', 
    	array('hotels'), /* if you change the name of register_post_type( 'itinerary', then you have to change this */
    	array('hierarchical' => true,     /* if this is true, it acts like categories */             
    		'labels' => array(
    			'name' => __( 'Region', 'bonestheme' ), /* name of the custom taxonomy */
    			'singular_name' => __( 'Region', 'bonestheme' ), /* single taxonomy name */
    			'search_items' =>  __( 'Search Regions', 'bonestheme' ), /* search title for taxomony */
    			'all_items' => __( 'All Regions', 'bonestheme' ), /* all title for taxonomies */
    			'parent_item' => __( 'Parent Regions', 'bonestheme' ), /* parent title for taxonomy */
    			'parent_item_colon' => __( 'Parent Regions:', 'bonestheme' ), /* parent taxonomy title */
    			'edit_item' => __( 'Edit Regions', 'bonestheme' ), /* edit custom taxonomy title */
    			'update_item' => __( 'Update Region', 'bonestheme' ), /* update title for taxonomy */
    			'add_new_item' => __( 'Add Region', 'bonestheme' ), /* add new title for taxonomy */
    			'new_item_name' => __( 'New Region', 'bonestheme' ) /* name title for taxonomy */
    		),
    		'show_admin_column' => true, 
    		'show_ui' => true,
    		'query_var' => true,
    		'rewrite' => array( 'slug' => 'hotels-by-region' ),
    	)
    );   
    
	// now let's add custom categories (these act like categories)
    register_taxonomy( 'Type', 
    	array('hotels'), /* if you change the name of register_post_type( 'itinerary', then you have to change this */
    	array('hierarchical' => true,     /* if this is true, it acts like categories */             
    		'labels' => array(
    			'name' => __( 'Type', 'bonestheme' ), /* name of the custom taxonomy */
    			'singular_name' => __( 'Types', 'bonestheme' ), /* single taxonomy name */
    			'search_items' =>  __( 'Search Types', 'bonestheme' ), /* search title for taxomony */
    			'all_items' => __( 'All Types', 'bonestheme' ), /* all title for taxonomies */
    			'parent_item' => __( 'Parent Types', 'bonestheme' ), /* parent title for taxonomy */
    			'parent_item_colon' => __( 'Parent Types:', 'bonestheme' ), /* parent taxonomy title */
    			'edit_item' => __( 'Edit Types', 'bonestheme' ), /* edit custom taxonomy title */
    			'update_item' => __( 'UpdateTypes', 'bonestheme' ), /* update title for taxonomy */
    			'add_new_item' => __( 'Add Types', 'bonestheme' ), /* add new title for taxonomy */
    			'new_item_name' => __( 'New Types', 'bonestheme' ) /* name title for taxonomy */
    		),
    		'show_admin_column' => true, 
    		'show_ui' => true,
    		'query_var' => true,
    		'rewrite' => array( 'slug' => 'types' ),
    	)
    );   
    
	
	// now let's add custom categories (these act like categories)
    register_taxonomy( 'YachtDestination', 
    	array('yachts'), /* if you change the name of register_post_type( 'itinerary', then you have to change this */
    	array('hierarchical' => true,     /* if this is true, it acts like categories */             
    		'labels' => array(
    			'name' => __( 'Yacht Destination', 'bonestheme' ), /* name of the custom taxonomy */
    			'singular_name' => __( 'Yacht Destination', 'bonestheme' ), /* single taxonomy name */
    			'search_items' =>  __( 'Search Yacht Destinations', 'bonestheme' ), /* search title for taxomony */
    			'all_items' => __( 'All Yacht Destinations', 'bonestheme' ), /* all title for taxonomies */
    			'parent_item' => __( 'Parent Yacht Destinations', 'bonestheme' ), /* parent title for taxonomy */
    			'parent_item_colon' => __( 'Parent Yacht Destinations:', 'bonestheme' ), /* parent taxonomy title */
    			'edit_item' => __( 'Edit Yacht Destinations', 'bonestheme' ), /* edit custom taxonomy title */
    			'update_item' => __( 'Update Yacht Destination', 'bonestheme' ), /* update title for taxonomy */
    			'add_new_item' => __( 'Add Yacht Destination', 'bonestheme' ), /* add new title for taxonomy */
    			'new_item_name' => __( 'New Yacht Destination', 'bonestheme' ) /* name title for taxonomy */
    		),
    		'show_admin_column' => true, 
    		'show_ui' => true,
    		'query_var' => true,
    		'rewrite' => array( 'slug' => 'yacht-destinations' ),
    	)
    );   
	
	
	// now let's add custom tags (these act like categories)
    register_taxonomy( 'trip_tag', 
    	array('itinerary'), /* if you change the name of register_post_type( 'itinerary', then you have to change this */
    	array('hierarchical' => false,    /* if this is false, it acts like tags */                
    		'labels' => array(
    			'name' => __( 'Trip Tags', 'bonestheme' ), /* name of the custom taxonomy */
    			'singular_name' => __( 'Trip Tag', 'bonestheme' ), /* single taxonomy name */
    			'search_items' =>  __( 'Search Trip Tags', 'bonestheme' ), /* search title for taxomony */
    			'all_items' => __( 'All Trip Tags', 'bonestheme' ), /* all title for taxonomies */
    			'parent_item' => __( 'Parent Trip Tag', 'bonestheme' ), /* parent title for taxonomy */
    			'parent_item_colon' => __( 'Parent Trip Tag:', 'bonestheme' ), /* parent taxonomy title */
    			'edit_item' => __( 'Edit Trip Tag', 'bonestheme' ), /* edit custom taxonomy title */
    			'update_item' => __( 'Update Trip Tag', 'bonestheme' ), /* update title for taxonomy */
    			'add_new_item' => __( 'Add New Trip Tag', 'bonestheme' ), /* add new title for taxonomy */
    			'new_item_name' => __( 'New Trip Tag Name', 'bonestheme' ) /* name title for taxonomy */
    		),
    		'show_admin_column' => true,
    		'show_ui' => true,
    		'query_var' => true,
    	)
    ); 
    
    /*
    	looking for custom meta boxes?
    	check out this fantastic tool:
    	https://github.com/jaredatch/Custom-Metaboxes-and-Fields-for-WordPress
    */
	

?>
