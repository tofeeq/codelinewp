<?php
/**
 *
 * @package unite-child
 */

function unite_child_enqueue_styles() {

	//as defined in unite theme functions.php
	$parent_style = "unite-style";

	wp_enqueue_style( $parent_style, get_template_directory_uri() . '/style.css' );

    wp_enqueue_style( 'unite-child-style',
        get_stylesheet_directory_uri() . '/style.css',
        [ $parent_style ],
        wp_get_theme()->get('Version')
    );
}

add_action( 'wp_enqueue_scripts', 'unite_child_enqueue_styles' );

/******************************************************
 *    				Custom functions 
 ******************************************************/

//all initialization hooks will go here 
function unite_init() {
	register_taxonomies_film();
	register_post_type_film();
}

add_action("init", "unite_init");

//register post type for films

function register_post_type_film() {
	//labels of post type
	$labels = array(
      'name'     		   => _x( 'Films', 'post type general name', 'film' ),
      'singular_name'      => _x( 'Film', 'post type singular name', 'film' ),
      'menu_name'          => _x( 'Films', 'admin menu', 'film' ),
      'name_admin_bar'     => _x( 'Films', 'add new on admin bar', 'film' ),
      'add_new'            => _x( 'Add New', 'Film', 'film' ),
      'add_new_item'       => __( 'Add New Film', 'film' ),
      'new_item'           => __( 'New Film', 'film' ),
      'edit_item'          => __( 'Edit Film', 'film' ),
      'view_item'          => __( 'View Film', 'film' ),
      'all_items'          => __( 'All Films', 'film' ),
      'search_items'       => __( 'Search Films', 'film' ),
      'not_found'          => __( 'No Film found.', 'film' ),
      'not_found_in_trash' => __( 'No Film found in Trash.', 'film' )
    );


    //register / update post type
    register_post_type( 'film',
      array(
        'labels' 				=>  $labels,
        'public' 				=> true,
        'publicly_queryable' 	=> true,
        'has_archive' 			=> true,
        'show_ui'            	=> true,
        'show_in_menu'       	=> true,
        'query_var'          	=> true,
        'rewrite'            	=> [ 'slug' => 'films' ],
        'capability_type'    	=> 'post',
        'has_archive'        	=> true,
        'hierarchical'       	=> false,
        'menu_position'      	=> null,
        'taxonomies'			=> ['genre', 'country', 'year', 'actor'],
        //'register_meta_box_cb' 	=> "film_metabox"
      )
    );

}

//register taxonomies for the films
function register_taxonomies_film() {

	//register genre

	$labels = array(
		'name'                       => _x( 'Genre', 'taxonomy general name', 'film' ),
		'singular_name'              => _x( 'Genre', 'taxonomy singular name', 'film' ),
		'search_items'               => __( 'Search Genres', 'film' ),
		'popular_items'              => __( 'Popular Genres', 'film' ),
		'all_items'                  => __( 'All Genres', 'film' ),
		'parent_item'                => null,
		'parent_item_colon'          => null,
		'edit_item'                  => __( 'Edit Genre', 'film' ),
		'update_item'                => __( 'Update Genre', 'film' ),
		'add_new_item'               => __( 'Add New Genre', 'film' ),
		'new_item_name'              => __( 'New Genre Name', 'film' ),
		'separate_items_with_commas' => __( 'Separate Genres with commas', 'film' ),
		'add_or_remove_items'        => __( 'Add or remove Genre', 'film' ),
		'choose_from_most_used'      => __( 'Choose from the most used Genres', 'film' ),
		'not_found'                  => __( 'No Genre found.', 'film' ),
		'menu_name'                  => __( 'Genres', 'film' ),
	);

	$args = array(
		'hierarchical'          => false,
		'labels'                => $labels,
		'show_ui'               => true,
		'show_admin_column'     => true,
		'update_count_callback' => '_update_post_term_count',
		'query_var'             => true,
		'rewrite'               => array( 'slug' => 'genre' ),
	);

	register_taxonomy( 'genre', 'film', $args );

	//register country

	$labels = array(
		'name'                       => _x( 'Country', 'taxonomy general name', 'film' ),
		'singular_name'              => _x( 'Country', 'taxonomy singular name', 'film' ),
		'search_items'               => __( 'Search countries', 'film' ),
		'popular_items'              => __( 'Popular countries', 'film' ),
		'all_items'                  => __( 'All countries', 'film' ),
		'parent_item'                => null,
		'parent_item_colon'          => null,
		'edit_item'                  => __( 'Edit Country', 'film' ),
		'update_item'                => __( 'Update Country', 'film' ),
		'add_new_item'               => __( 'Add New Country', 'film' ),
		'new_item_name'              => __( 'New Country Name', 'film' ),
		'separate_items_with_commas' => __( 'Separate Countries with commas', 'film' ),
		'add_or_remove_items'        => __( 'Add or remove Country', 'film' ),
		'choose_from_most_used'      => __( 'Choose from the most used Countries', 'film' ),
		'not_found'                  => __( 'No Country found.', 'film' ),
		'menu_name'                  => __( 'Countries', 'film' ),
	);

	$args = array(
		'hierarchical'          => false,
		'labels'                => $labels,
		'show_ui'               => true,
		'show_admin_column'     => true,
		'update_count_callback' => '_update_post_term_count',
		'query_var'             => true,
		'rewrite'               => array( 'slug' => 'country' ),
	);

	register_taxonomy( 'country', 'film', $args );

	//register country

	$labels = array(
		'name'                       => _x( 'Year', 'taxonomy general name', 'film' ),
		'singular_name'              => _x( 'Year', 'taxonomy singular name', 'film' ),
		'search_items'               => __( 'Search Years', 'film' ),
		'popular_items'              => __( 'Popular Years', 'film' ),
		'all_items'                  => __( 'All Years', 'film' ),
		'parent_item'                => null,
		'parent_item_colon'          => null,
		'edit_item'                  => __( 'Edit Year', 'film' ),
		'update_item'                => __( 'Update Year', 'film' ),
		'add_new_item'               => __( 'Add New Year', 'film' ),
		'new_item_name'              => __( 'New Year Name', 'film' ),
		'separate_items_with_commas' => __( 'Separate Year with commas', 'film' ),
		'add_or_remove_items'        => __( 'Add or remove Year', 'film' ),
		'choose_from_most_used'      => __( 'Choose from the most used Year', 'film' ),
		'not_found'                  => __( 'No Year found.', 'film' ),
		'menu_name'                  => __( 'Years', 'film' ),
	);

	$args = array(
		'hierarchical'          => false,
		'labels'                => $labels,
		'show_ui'               => true,
		'show_admin_column'     => true,
		'update_count_callback' => '_update_post_term_count',
		'query_var'             => true,
		'rewrite'               => array( 'slug' => 'year' ),
	);

	register_taxonomy( 'year', 'film', $args );

	//register country

	$labels = array(
		'name'                       => _x( 'Actor', 'taxonomy general name', 'film' ),
		'singular_name'              => _x( 'Actor', 'taxonomy singular name', 'film' ),
		'search_items'               => __( 'Search Actors', 'film' ),
		'popular_items'              => __( 'Popular Actors', 'film' ),
		'all_items'                  => __( 'All Actors', 'film' ),
		'parent_item'                => null,
		'parent_item_colon'          => null,
		'edit_item'                  => __( 'Edit Actor', 'film' ),
		'update_item'                => __( 'Update Actor', 'film' ),
		'add_new_item'               => __( 'Add New Actor', 'film' ),
		'new_item_name'              => __( 'New Actor Name', 'film' ),
		'separate_items_with_commas' => __( 'Separate Actors with commas', 'film' ),
		'add_or_remove_items'        => __( 'Add or remove Actor', 'film' ),
		'choose_from_most_used'      => __( 'Choose from the most used Actors', 'film' ),
		'not_found'                  => __( 'No Actor found.', 'film' ),
		'menu_name'                  => __( 'Actors', 'film' ),
	);

	$args = array(
		'hierarchical'          => false,
		'labels'                => $labels,
		'show_ui'               => true,
		'show_admin_column'     => true,
		'update_count_callback' => '_update_post_term_count',
		'query_var'             => true,
		'rewrite'               => array( 'slug' => 'actor' ),
	);

	register_taxonomy( 'actor', 'film', $args );
}