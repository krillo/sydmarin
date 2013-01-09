<?php

add_action('wp_dashboard_setup', 'hide_wp_welcome_panel' );
add_action('wp_dashboard_setup', 'remove_dashboard_widgets');

function hide_wp_welcome_panel(){
	if ( current_user_can( 'edit_theme_options' ) )
	$ah_clean_up_option = update_user_meta( get_current_user_id(), 'show_welcome_panel', false );
}

function remove_dashboard_widgets(){
	// Ta bort widgets i vänsterkolumnen
	remove_meta_box( 'dashboard_incoming_links', 'dashboard', 'normal' ); // Inkommande länkar
	remove_meta_box( 'dashboard_plugins', 'dashboard', 'normal' ); // Tillägg
	remove_meta_box( 'dashboard_recent_comments', 'dashboard', 'normal' ); // Senaste kommentarer
	remove_meta_box( 'dashboard_right_now', 'dashboard', 'normal' ); // Just nu
	// Ta bort widgets i högerkolumnen
	remove_meta_box( 'dashboard_primary', 'dashboard', 'side' ); // WordPress Blogg
	remove_meta_box( 'dashboard_quick_press', 'dashboard', 'side' ); // SnabbPress
	remove_meta_box( 'dashboard_recent_drafts', 'dashboard', 'side' ); // Senaste utkasten
	remove_meta_box( 'dashboard_secondary', 'dashboard', 'side' ); // Andra WordPressnyheter
}





/**
 * Add some custom posttypes for puffs on Varvstart and Båtstart
 */
add_action( 'init', 'create_post_type' );
function create_post_type() {
	register_post_type( 'varvspuff',
		array(
			'labels' => array(
				'name' => __( 'Varvspuffar' ),
				'singular_name' => __( 'Varvspuff' )
			),
		'public' => true,
		'has_archive' => false,
    'supports' => array('title','editor','thumbnail')
		)
	);
	register_post_type( 'batpuff',
		array(
			'labels' => array(
				'name' => __( 'Båtpuffar' ),
				'singular_name' => __( 'Båtpuff' )
			),
		'public' => true,
		'has_archive' => false,
    'supports' => array('title','editor','thumbnail')
		)
	);
}




if (function_exists('add_image_size')) {
/*  add_image_size('puff-img', 280, 130, true); //(cropped)
  add_image_size('page-img', 250, 250, true); //(cropped)
  add_image_size('post-puff-img', 200, 100, true); //(cropped)
  add_image_size('post-thumb-img', 70, 70, true); //(cropped)
  add_image_size('category-thumb-img', 90, 70, true); //(cropped)
  add_image_size('post-featured-img', 430, 320, true); //(cropped)
  add_image_size('category-list-img', 120, 80, true); //(cropped) */
}

add_theme_support('post-thumbnails'); //to be able to use "get_the_post_thumbnail"


/**
 * Enqueue some java scripts
 */
function sydmarin_scripts() {
  wp_deregister_script('jquery');
  wp_register_script('jquery', 'http://ajax.googleapis.com/ajax/libs/jquery/1.6/jquery.min.js');
  wp_enqueue_script('jquery');
  wp_register_script('jquery.flow.1.1.js', get_bloginfo('stylesheet_directory').'/js/jquery.flow.1.1.js');
  wp_enqueue_script( 'jquery.flow.1.1.js' );
  
  //wp_register_script('jquery.tinycarousel.min.js', get_bloginfo('stylesheet_directory').'/js/jquery.tinycarousel.min.js');
  //wp_enqueue_script( 'jquery.tinycarousel.min.js' );
}
add_action('wp_enqueue_scripts', 'sydmarin_scripts');


/**
 * add two menues
 */
function register_sydmarin_menus() {
  register_nav_menus(
    array( 'boat' => __( 'Båt' ), 'shipyard' => __( 'Varv' ))
  );
}
add_action( 'init', 'register_sydmarin_menus' );



/**
 * add debug info if on localhost
 */
function mu_debug_info() {
  if ($_SERVER['REMOTE_ADDR'] == '127.0.0.1') {
    echo '<!-- Server Debug Info from mu-debug-info plugin.';
    echo "\n\$_SERVER: "; var_dump($_SERVER);
    echo "\n\$_GET: "; var_dump($_GET);
    echo "\n\$_POST: "; var_dump($_POST);
    echo "\n\$_SESSION: "; var_dump($_SESSION);
    echo ' -->', "\n";
  }
}
add_action( 'wp_head', 'mu_debug_info' );
