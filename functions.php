<?php

/** Tell WordPress to run theme_setup() when the 'after_setup_theme' hook is run. */

if ( ! function_exists( 'theme_setup' ) ):

function theme_setup() {

	/* This theme uses post thumbnails (aka "featured images")
	*  all images will be cropped to thumbnail size (below), as well as
	*  a square size (also below). You can add more of your own crop
	*  sizes with add_image_size. */
	add_theme_support( 'post-thumbnails' );
	set_post_thumbnail_size(120, 90, true);
	add_image_size('sponsor', 158, 70, false);
	add_image_size('square', 150, 150, true);
	add_image_size('larger-square', 220, 220, true);
	add_image_size('largest-square', 315, 315, true);
	add_image_size('small-profile', 176, 132, array( 'center', 'top' ) );
	add_image_size('card', 311, 332, true);
	add_image_size('card-home', 600, 332, true);
	add_image_size('testimonial', 295, 295, true);
	add_image_size('resource', 812, 528, true);


	// Add default posts and comments RSS feed links to head
	add_theme_support( 'automatic-feed-links' );

	/* This theme uses wp_nav_menu() in one location.
	* You can allow clients to create multiple menus by
  * adding additional menus to the array. */
	
	register_nav_menus( array(
		'primary' => 'Primary Navigation',
		'support' => 'Support Menu'
	) );

	/*
	 * Switch default core markup for search form, comment form, and comments
	 * to output valid HTML5.
	 */
	add_theme_support( 'html5', array(
		'search-form', 'comment-form', 'comment-list', 'gallery', 'caption'
	) );


}
endif;

add_action( 'after_setup_theme', 'theme_setup' );

//include menu walker
require get_template_directory() .  '/inc/wp_bootstrap_navwalker.php';

//include ajax function
require get_template_directory() .  '/inc/blog-load-more.php';


/* Add all our JavaScript files here.
We'll let WordPress add them to our templates automatically instead
of writing our own script tags in the header and footer. */

function dayshiftdigital_theme_scripts() {

	//Don't use WordPress' local copy of jquery, load our own version from a CDN instead
wp_deregister_script('jquery');
  wp_enqueue_script(
  	'jquery',
  	"http" . ($_SERVER['SERVER_PORT'] == 443 ? "s" : "") . "://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js",
  	false, //dependencies
  	null, //version number
  	false //load in footer
  );

	wp_enqueue_script(
		'flickity',
		"http" . ($_SERVER['SERVER_PORT'] == 443 ? "s" : "") . "://unpkg.com/flickity@2/dist/flickity.pkgd.min.js",
		array( 'jquery'), //dependencies
		null, //version number
		true //load in footer
	);
	wp_enqueue_script(
		'flickity-fade',
		"http" . ($_SERVER['SERVER_PORT'] == 443 ? "s" : "") . "://unpkg.com/flickity-fade@1/flickity-fade.js",
		array( 'jquery'), //dependencies
		null, //version number
		true //load in footer
	);

	wp_enqueue_script(
		'swiper',
		"http" . ($_SERVER['SERVER_PORT'] == 443 ? "s" : "") . "://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js",
		false, //dependencies
		null, //version number
		true //load in footer
	);

	wp_enqueue_script(
		'rellax',
		"http" . ($_SERVER['SERVER_PORT'] == 443 ? "s" : "") . "://cdn.jsdelivr.net/gh/dixonandmoe/rellax@master/rellax.min.js",
		false, //dependencies
		null, //version number
		true //load in footer
	);

	wp_enqueue_script(
		'isotope',
		"http" . ($_SERVER['SERVER_PORT'] == 443 ? "s" : "") . "://unpkg.com/isotope-layout@3/dist/isotope.pkgd.min.js",
		false, //dependencies
		null, //version number
		true //load in footer
	);

	wp_enqueue_script(
		'cookie',
		"http" . ($_SERVER['SERVER_PORT'] == 443 ? "s" : "") . "://cdn.jsdelivr.net/npm/cookieconsent@3/build/cookieconsent.min.js",
		false, //dependencies
		null, //version number
		true //load in footer
	);

	wp_enqueue_script(
		'scripts', //handle
		get_template_directory_uri() . '/js/main.min.js', //source
		array( 'jquery', 'flickity' ), //dependencies
		null, // version number
		true //load in footer
	);
}

add_action( 'wp_enqueue_scripts', 'dayshiftdigital_theme_scripts' );


/* Custom Title Tags */

function dayshiftdigital_theme_wp_title( $title, $sep ) {
	global $paged, $page;

	if ( is_feed() ) {
		return $title;
	}

	// Add the site name.
	$title .= get_bloginfo( 'name', 'display' );

	// Add the site description for the home/front page.
	$site_description = get_bloginfo( 'description', 'display' );
	if ( $site_description && ( is_home() || is_front_page() ) ) {
		$title = "$title $sep $site_description";
	}

	// Add a page number if necessary.
	if ( ( $paged >= 2 || $page >= 2 ) && ! is_404() ) {
		$title = "$title $sep " . sprintf( __( 'Page %s', 'dayshiftdigital_theme' ), max( $paged, $page ) );
	}

	return $title;
}
add_filter( 'wp_title', 'dayshiftdigital_theme_wp_title', 10, 2 );

/*
  Get our wp_nav_menu() fallback, wp_page_menu(), to show a home link.
 */
function dayshiftdigital_theme_page_menu_args( $args ) {
	$args['show_home'] = true;
	return $args;
}
add_filter( 'wp_page_menu_args', 'dayshiftdigital_theme_page_menu_args' );


/*
 * Sets the post excerpt length to 40 characters.
 */
function dayshiftdigital_theme_excerpt_length( $length ) {
	return 40;
}
add_filter( 'excerpt_length', 'dayshiftdigital_theme_excerpt_length' );

/*
 * Returns a "Continue Reading" link for excerpts
 */
function dayshiftdigital_theme_continue_reading_link() {
	return '...';
}

/**
 * Replaces "[...]" (appended to automatically generated excerpts) with an ellipsis and dayshiftdigital_theme_continue_reading_link().
 */
function dayshiftdigital_theme_auto_excerpt_more( $more ) {
	return ' &hellip;' . dayshiftdigital_theme_continue_reading_link();
}
add_filter( 'excerpt_more', 'dayshiftdigital_theme_auto_excerpt_more' );

/**
 * Adds a pretty "Continue Reading" link to custom post excerpts.
 */
function dayshiftdigital_theme_custom_excerpt_more( $output ) {
	if ( has_excerpt() && ! is_attachment() ) {
		$output .= dayshiftdigital_theme_continue_reading_link();
	}
	return $output;
}
add_filter( 'get_the_excerpt', 'dayshiftdigital_theme_custom_excerpt_more' );


/*
 * Register a single widget area.
 * You can register additional widget areas by using register_sidebar again
 * within dayshiftdigital_theme_widgets_init.
 * Display in your template with dynamic_sidebar()
 */
function dayshiftdigital_theme_widgets_init() {
	// Area 1, located at the top of the sidebar.
	register_sidebar( array(
		'name' => 'Primary Widget Area',
		'id' => 'primary-widget-area',
		'description' => 'The primary widget area',
		'before_widget' => '<li id="%1$s" class="widget-container %2$s">',
		'after_widget' => '</li>',
		'before_title' => '<h3 class="widget-title">',
		'after_title' => '</h3>',
	) );

}

add_action( 'widgets_init', 'dayshiftdigital_theme_widgets_init' );

/**
 * Removes the default styles that are packaged with the Recent Comments widget.
 */
function dayshiftdigital_theme_remove_recent_comments_style() {
	global $wp_widget_factory;
	remove_action( 'wp_head', array( $wp_widget_factory->widgets['WP_Widget_Recent_Comments'], 'recent_comments_style' ) );
}
add_action( 'widgets_init', 'dayshiftdigital_theme_remove_recent_comments_style' );


if ( ! function_exists( 'dayshiftdigital_theme_posted_on' ) ) :
/**
 * Prints HTML with meta information for the current post—date/time and author.
 */
function dayshiftdigital_theme_posted_on() {
	printf('<span class="%1$s">Posted on</span> %2$s <span class="meta-sep">by</span> %3$s',
		'meta-prep meta-prep-author',
		sprintf( '<a href="%1$s" title="%2$s" rel="bookmark"><span class="entry-date">%3$s</span></a>',
			get_permalink(),
			esc_attr( get_the_time() ),
			get_the_date()
		),
		sprintf( '<span class="author vcard"><a class="url fn n" href="%1$s" title="%2$s">%3$s</a></span>',
			get_author_posts_url( get_the_author_meta( 'ID' ) ),
			sprintf( esc_attr( 'View all posts by %s'), get_the_author() ),
			get_the_author()
		)
	);
}
endif;

if ( ! function_exists( 'dayshiftdigital_theme_posted_in' ) ) :
/**
 * Prints HTML with meta information for the current post (category, tags and permalink).
 */
function dayshiftdigital_theme_posted_in() {
	// Retrieves tag list of current post, separated by commas.
	$tag_list = get_the_tag_list( '', ', ' );
	if ( $tag_list ) {
		$posted_in = 'This entry was posted in %1$s and tagged %2$s. Bookmark the <a href="%3$s" title="Permalink to %4$s" rel="bookmark">permalink</a>.';
	} elseif ( is_object_in_taxonomy( get_post_type(), 'category' ) ) {
		$posted_in = 'This entry was posted in %1$s. Bookmark the <a href="%3$s" title="Permalink to %4$s" rel="bookmark">permalink</a>.';
	} else {
		$posted_in = 'Bookmark the <a href="%3$s" title="Permalink to %4$s" rel="bookmark">permalink</a>.';
	}
	// Prints the string, replacing the placeholders.
	printf(
		$posted_in,
		get_the_category_list( ', ' ),
		$tag_list,
		get_permalink(),
		the_title_attribute( 'echo=0' )
	);
}
endif;

/* Get rid of junk! - Gets rid of all the crap in the header that you dont need */

function clean_stuff_up() {
	// windows live
	remove_action('wp_head', 'rsd_link');
	remove_action('wp_head', 'wlwmanifest_link');
	// wordpress gen tag
	remove_action('wp_head', 'wp_generator');
	// comments RSS
	remove_action( 'wp_head', 'feed_links_extra', 3 );
	remove_action( 'wp_head', 'feed_links', 3 );
}

add_action('init', 'clean_stuff_up');


/* Here are some utility helper functions for use in your templates! */

/* pre_r() - makes for easy debugging. <?php pre_r($post); ?> */
function pre_r($obj) {
	echo "<pre>";
	print_r($obj);
	echo "</pre>";
}

/* is_blog() - checks various conditionals to figure out if you are currently within a blog page */
function is_blog () {
	global  $post;
	$posttype = get_post_type($post );
	return ( ((is_archive()) || (is_author()) || (is_category()) || (is_home()) || (is_single()) || (is_tag())) && ( $posttype == 'post')  ) ? true : false ;
}

/* get_post_parent() - Returns the current posts parent, if current post if top level, returns itself */
function get_post_parents($post) {
	if ($post->post_parent) {
		return $post->post_parent;
	}
	else {
		return $post->ID;
	}
}


function remove_thumbnail_dimensions( $html, $post_id, $post_image_id ) {
    $html = preg_replace( '/(width|height)=\"\d*\"\s/', "", $html );
    return $html;
}

// Our custom post type function
function create_posttype() {
 
    register_post_type( 'agenda',
    // CPT Options
        array(
            'labels' => array(
                'name' => __( 'Agenda' ),
				'singular_name' => __( 'Agenda' ),
				'all_items' => __( "All Events")
            ),
            'supports' => array(
				'page-attributes' /* This will show the post parent field */,
				'title',
				'editor',
				'thumbnail',
				'custom-fields'
            
        	),
			'taxonomies'            => array(),
			'hierarchical'          => true,
			'public'                => true,
			'show_ui'               => true,
			'show_in_menu'          => true,
			'menu_position'         => 5,
			'menu_icon'             => 'dashicons-calendar',
			'show_in_admin_bar'     => true,
			'show_in_nav_menus'     => true,
			'can_export'            => true,
			'has_archive'           => false,
			'exclude_from_search'   => false,
			'publicly_queryable'    => true,
			// 'capability_type'       => 'post',
            'rewrite' => array('slug' => 'agenda'),
        )
    );


register_post_type( 'speakers',
    // CPT Options
        array(
            'labels' => array(
                'name' => __( 'Speakers' ),
				'singular_name' => __( 'Speaker' ),
				'all_items' => __( "All Speakers")
            ),
            'supports' => array(
				'title',
				'editor',
				'thumbnail',
				'custom-fields'
            
        	),
			
			'hierarchical'          => false,
			'public'                => true,
			'show_ui'               => true,
			'show_in_menu'          => true,
			'menu_position'         => 6,
			'menu_icon'             => 'dashicons-groups',
			'show_in_admin_bar'     => true,
			'show_in_nav_menus'     => true,
			'can_export'            => true,
			'has_archive'           => false,
			'exclude_from_search'   => false,
			'publicly_queryable'    => true,
            'rewrite' => array('slug' => 'speakers'),
        )
	);

register_post_type( 'sponsors',
    // CPT Options
        array(
            'labels' => array(
                'name' => __( 'Sponsors' ),
				'singular_name' => __( 'Sponsor' ),
				'all_items' => __( "All Sponsors")
            ),
            'supports' => array(
				'title',
				'editor',
				'thumbnail',
				'custom-fields'
            
        	),
			
			'hierarchical'          => false,
			'public'                => true,
			'show_ui'               => true,
			'show_in_menu'          => true,
			'menu_position'         => 7,
			'menu_icon'             => 'dashicons-star-filled',
			'show_in_admin_bar'     => true,
			'show_in_nav_menus'     => true,
			'can_export'            => true,
			// 'has_archive'           => true,
			'exclude_from_search'   => false,
			'publicly_queryable'    => true,
            'rewrite' => array('slug' => 'sponsor'),
        )
    );
}

// Hooking up our function to theme setup
add_action( 'init', 'create_posttype' );



//create tracks custom taxonomy when it fires
add_action( 'init', 'create_tracks_taxonomy', 10 );
 
//create a custom taxonomy name it topics for your posts
 
function create_tracks_taxonomy() {
 
// Add new taxonomy, make it hierarchical like categories
 
  $labels = array(
    'name' => _x( 'Tracks', 'taxonomy general name' ),
    'singular_name' => _x( 'Track Type', 'taxonomy singular name' ),
    'search_items' =>  __( 'Search Track Types' ),
    'all_items' => __( 'All Track Types' ),
    'parent_item' => __( 'Parent Track Type' ),
    'parent_item_colon' => __( 'Parent Track Type:' ),
    'edit_item' => __( 'Edit Track Type' ), 
    'update_item' => __( 'Update Track Type' ),
    'add_new_item' => __( 'Add New Track Type' ),
    'new_item_name' => __( 'New Track Type Name' ),
    'menu_name' => __( 'Tracks' ),
  );    
 

  register_taxonomy('track_types',array('agenda'), array(
    'hierarchical' => true,
    'labels' => $labels,
	'show_ui' => true,
	'public' => true,
    'show_admin_column' => true,
	'query_var' => true,
    'rewrite' => array( 'slug' => 'track' ),
  ));
 
}


//create sponsor custom taxonomy when it fires
add_action( 'init', 'create_sponsor_level_taxonomy', 11 );
 
//create a custom taxonomy name it topics for your posts
 
function create_sponsor_level_taxonomy() {
 
// Add new taxonomy, make it hierarchical like categories
 
  $labels = array(
    'name' => _x( 'Sponsor Levels', 'taxonomy general name' ),
    'singular_name' => _x( 'Sponsor Level', 'taxonomy singular name' ),
    'search_items' =>  __( 'Search Sponsor Levels' ),
    'all_items' => __( 'All Sponsor Levels' ),
    'parent_item' => __( 'Parent Level Type' ),
    'parent_item_colon' => __( 'Parent Level Type:' ),
    'edit_item' => __( 'Edit Level Type' ), 
    'update_item' => __( 'Update Level Type' ),
    'add_new_item' => __( 'Add New Level Type' ),
    'new_item_name' => __( 'New Level Type Name' ),
    'menu_name' => __( 'Levels' ),
  );    
 

  register_taxonomy('sponsor_levels',array('sponsors'), array(
    'hierarchical' => true,
    'labels' => $labels,
	'show_ui' => true,
	'public' => true,
    'show_admin_column' => true,
	'query_var' => true,
    'rewrite' => array( 'slug' => 'level' ),
  ));
 
}

// Adding Time to Columns

add_filter('manage_agenda_posts_columns' , 'mysite_add_columns');

function mysite_add_columns( $columns ) {

  $columns = array(
    'cb'           => '<input type="checkbox" />',
    'title'        => 'Title',
	'start_date'   => 'Start Time',
	'taxonomy-track_types' => 'Track',
  );
  return $columns;
}

add_action( 'manage_agenda_posts_custom_column', 'mysite_custom_agenda_columns', 10, 2 );

function mysite_custom_agenda_columns( $column ) {

  global $post;
  $post_parent = $post->post_parent;
  if($post_parent == 0) {

  } else {
 
  	switch ( $column ) {
		case 'start_date':
		echo get_field( "start_time", $post->ID );
		break;

		// case 'end_date':
		//   echo get_field( "event_end_date", $post->ID );
		//   break;

		// case 'location':
		//   echo get_field( "location", $post->ID );
		//   break;
  	}
  }

}


// Setting Cookies to remember form work

add_action("gform_after_submission", "after_submission_handler", 10, 2);
function after_submission_handler($entry, $form) {

		foreach($form['fields'] as $field) {
			$inputs = $field->get_entry_inputs();
			$check = false;
			if ( is_array( $inputs ) ) {
				foreach ( $inputs as $input ) {
					$value = rgar( $entry, (string) $input['id'] );
					if($value == "Remember Me") {
						$check = true;
					}
				}
			} else {
				$value = rgar( $entry, (string) $field->id );
			}
		}

		if ($check) {

			$saveVars = array("name", "email", "company", "phone");
			foreach($form["fields"] as $field) {
					
					if( $field["allowsPrepopulate"] ){
							if( is_array($field["inputs"]) ){
									foreach($field["inputs"] as $sub){
											$val = $_POST["input_" . str_replace(".", "_", $sub["id"])];
											setcookie("gf_".$sub["name"], $val, time() + 31536000, COOKIEPATH, COOKIE_DOMAIN, false, true);
									}
							}else{
									$val = $_POST["input_" . $field["id"]];
									setcookie("gf_".$field["inputName"], $val, time() + 31536000, COOKIEPATH, COOKIE_DOMAIN, false, true);
							}
					}
			}
		}
}

add_filter("gform_pre_render", "add_auto_update_filters");

function add_auto_update_filters($form) {
        foreach($form["fields"] as $field){
                if( $field["allowsPrepopulate"] ){
                        if( is_array($field["inputs"]) ){
                                foreach($field["inputs"] as $sub){
                                        $fieldName = $sub["name"];
                                        add_filter("gform_field_value_" . $fieldName, function($fn) use ($fieldName){
                                                return $_COOKIE["gf_" . $fieldName];
                                        });
                                }
                        }else{
                                $fieldName = $field["inputName"];
                                add_filter("gform_field_value_" . $fieldName, function($fn) use ($fieldName){
                                        return $_COOKIE["gf_" . $fieldName];
                                });
                        }

                }
        }
        return $form;
}


add_filter( 'nav_menu_css_class' , 'add_post_type_to_menu' , 10, 4 );
function add_post_type_to_menu( $classes, $item, $args ) {

 	$classes[] = $item->type_label;
	$classes[] = $item->title;
 
    return $classes;
}

add_filter( 'nav_menu_css_class', 'wpse_menu_item_id_class', 10, 2 ); 
function wpse_menu_item_id_class( $classes, $item )
{
    if( isset( $item->object_id ) )
        $classes[] = sprintf( 'object-id-%d', $item->object_id );

    return $classes;
}


// Define path and URL to the ACF plugin.
define( 'ACF_PATH', get_stylesheet_directory() . '/vendors/acf/' );
define( 'ACF_URL', get_stylesheet_directory_uri() . '/vendors/acf/' );

// Include the ACF plugin.
include_once( ACF_PATH . 'acf.php' );

// Customize the url setting to fix incorrect asset URLs.
add_filter('acf/settings/url', 'my_acf_settings_url');
function my_acf_settings_url( $url ) {
    return ACF_URL;
}

// // (Optional) Hide the ACF admin menu item.
// add_filter('acf/settings/show_admin', 'my_acf_settings_show_admin');
// function my_acf_settings_show_admin( $show_admin ) {
//     return false;
// }

if( function_exists('acf_add_options_page') ) {
	
	acf_add_options_page(array(
		'page_title' 	=> 'Theme Options',
		'menu_title' 	=> 'Theme Options'
	));
	
}
