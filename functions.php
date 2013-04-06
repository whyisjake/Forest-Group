<?php
/**
 *
 * Forest Group Functions
 * @package    forestgroup
 * @license    http://opensource.org/licenses/gpl-license.php  GNU Public License
 * @author     Jake Spurlock <jspurlock@makermedia.com>
 *
 */

/*
 * Bring in WordPress.com plugins. Because we can...
 */

require_once( WP_CONTENT_DIR . '/themes/vip/plugins/vip-init.php' );
 
function fg_enqueue_scripts() {
	wp_enqueue_script( 'bootstrap', get_stylesheet_directory_uri() . '/js/bootstrap.js', array( 'jquery' ), false, true );
	wp_enqueue_script( 'skycons', get_stylesheet_directory_uri() . '/_inc/skycons/skycons.js' );
	wp_enqueue_style( 'bootstrap', get_stylesheet_directory_uri() . '/css/bootstrap.css' );
	wp_enqueue_script( 'typekit', '//use.typekit.net/aec6xbl.js' );
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

function fg_get_weather() {

	$url = 'https://api.forecast.io/forecast/7be55cf6cb9f72bac545256af7ade238/38.4578,-122.6853';
	//$contents = wpcom_vip_file_get_contents( $url, 3, 900 );
	$contents = file_get_contents( $url );
	$json = json_decode($contents);

	echo '<h3>Right Now</h3>';
	echo '<canvas id="icon1" width="64" height="64"></canvas> ' . intval( $json->currently->temperature );
	echo '<h3>Next Hour</h3>';
	echo esc_html( $json->minutely->summary );
	echo '<h3>Next 24 Hour</h3>';
	echo esc_html( $json->hourly->summary );
	echo '<h3>Next Week</h3>';
	echo esc_html( $json->daily->summary );
	echo '<script>
		var skycons = new Skycons({"color": "grey"});
		skycons.add("icon1", Skycons.' . esc_js( strtoupper( $json->currently->icon ) ). ');
		skycons.play();
	</script>';
	
}