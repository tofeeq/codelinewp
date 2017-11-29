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

//wordpress hooks

add_action("init", "unite_init");
add_action( 'save_post', 'save_film_meta' );


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
        'register_meta_box_cb' 	=> "film_metabox"
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
		'hierarchical'          => true,
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
		'hierarchical'          => true,
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
		'hierarchical'          => true,
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
		'hierarchical'          => true,
		'labels'                => $labels,
		'show_ui'               => true,
		'show_admin_column'     => true,
		'update_count_callback' => '_update_post_term_count',
		'query_var'             => true,
		'rewrite'               => array( 'slug' => 'actor' ),
	);

	register_taxonomy( 'actor', 'film', $args );
}

//add meta box for custom fields to films
function film_metabox() {
	add_meta_box('film_meta', 'Additonal Info', 'render_film_meta', 'film', 'normal', 'default');
}

//create html for input controls associated with films
function render_film_meta( $post ) {
	$ticket_price = esc_attr (
            get_post_meta( $post->ID, 'ticket_price', true )
        );

    $release_date = esc_attr (
            get_post_meta( $post->ID, 'release_date', true )
        );
    

    ?> 
      <style>
        .film-meta label {
          display: block;
        }
      </style>
      <div class="film-meta">
        <p>
          <label for="film_ticket_price">
              <?php _e( 'Ticket Price', 'film' ); ?>
          </label>
          <input type="text" id="film_ticket_price" name="film_ticket_price" value="<?php echo $ticket_price; ?>"  /> 
        </p>
        <p>
          <label for="film_release_date">
              <?php _e( 'Release Date', 'film' ); ?>
          </label>
          <input type="text" id="film_release_date" name="film_release_date" value="<?php echo $release_date; ?>" /> 
        </p>
      </div>
    <?php
}


//save the custom fields along with post

function save_film_meta( $post_id ) {
	$fields = [
		'film_ticket_price',
		'film_release_date'
	];

    foreach ($fields as $field) {

      if (array_key_exists($field, $_POST)) {

          $meta_field = str_replace("film_", "", $field);
          $post_value = $_POST[$field];

          update_post_meta(
              $post_id,
              $meta_field,
              $post_value
          );
      }
    }
}


/* ----------------------------------------------- */
//filter the films to show the taxonomies and custom fields on listing page

function film_archive_content_filter( $content ) {
	global $post;

	if ($post->post_type == 'film' && !is_single()) {

		$taxonomies = ['country', 'genre'];
	    $out = '<ul class="list-unstyled">';
	    foreach ($taxonomies as $taxonomy) {        
	        $out .= "<li>" . apply_filters('film_meta_key', $taxonomy) . ": ";
	        // get the terms related to post
	        $terms = get_the_terms( $post->ID, $taxonomy );
	        if ( !empty( $terms ) ) {
	            foreach ( $terms as $term )
	                $out .= apply_filters('film_meta_value', '<a href="' . get_term_link($term->slug, $taxonomy) . '">' . $term->name . '</a> ', $taxonomy);
	        }
	        $out .= "</li>";
	    }
	    $out .= "<li>" . apply_filters('film_meta_key', "ticket price") . ": ";
	    $out .= apply_filters('film_meta_value', get_post_meta($post->ID, 'ticket_price', 1), "ticket price");
	    $out .= '</li>';
	    $out .= "<li>" . apply_filters('film_meta_key', "release date") . ": ";
	    $out .= apply_filters('film_meta_value', get_post_meta($post->ID, 'release_date', 1), "release date");
	    $out .= '</li>';
	    $out .= "</ul>";

	    $content .= apply_filters('film_archive_meta', $out);
	}

	return $content;
}

add_filter( 'the_content', 'film_archive_content_filter' );


/* --------------- Filters ------------------------ */
function film_meta_key_filter( $content ) {
	return ucwords($content);
}
add_filter( 'film_meta_key', 'film_meta_key_filter' );
/* ----------------------------------------------- */
function film_meta_value_filter( $content, $taxonomy) {
	switch ($taxonomy) {
		case 'ticket price':
			return '$' . sprintf("%.2f", $content);	
		break;

		case 'release date':
			return date("l, F j, Y", strtotime($content));
		break;
	}
	return $content;
}

add_filter( 'film_meta_value', 'film_meta_value_filter', 10, 2 );

/* ----------------SHORT CODE-------------------- */
function shortcode_films() {
	//film_archive_content_filter
	$args = array(
		'numberposts' => 5,
		'offset' => 0,
		'orderby' => 'post_date',
		'order' => 'DESC',
		'post_type' => 'film',
		'post_status' => 'publish',
	);

	$recent_films = wp_get_recent_posts( $args, ARRAY_A );

	$out = '<div class="widget"><ul>';
	foreach ($recent_films as $film) {
		$out .= '<li>
					<a href="' .  get_post_permalink($film['ID']) . '">' . $film['post_title'] . '</a>
				</li>';	
	}
	$out .= "</ul></div>";
	return $out;
}

//add_filter('widget_text','do_shortcode');
add_shortcode( 'films', 'shortcode_films' );