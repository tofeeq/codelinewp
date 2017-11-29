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