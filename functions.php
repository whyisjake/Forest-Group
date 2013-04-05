<?php
/**
 *
 * Forest Group Functions
 * @package    forestgroup
 * @license    http://opensource.org/licenses/gpl-license.php  GNU Public License
 * @author     Jake Spurlock <jspurlock@makermedia.com>
 *
 */
 
function fg_enqueue_scripts() {
	wp_enqueue_script( 'bootstrap', get_stylesheet_directory_uri() . '/js/bootstrap.js', array( 'jquery' ), false, true );
	wp_enqueue_script( 'skycons', get_stylesheet_directory_uri() . '/_inc/skycons/skycons.js' );
	wp_enqueue_style( 'bootstrap', get_stylesheet_directory_uri() . '/css/bootstrap.css' );
}

add_action( 'wp_enqueue_scripts', 'fg_enqueue_scripts' );

function make_action_after_setup_theme() {

	add_theme_support('post-thumbnails' );
	//add_image_size( 'comment-thumb', 70, 70, true );
	
	// Content Width
	if ( ! isset( $content_width ) )
		$content_width = 620;

	// Custom Backgrounds
	add_theme_support( 'custom-background' );
	add_theme_support( 'automatic-feed-links' );
}
add_action( 'after_setup_theme', 'make_action_after_setup_theme' );