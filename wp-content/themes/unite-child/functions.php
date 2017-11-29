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
      )
    );

}
