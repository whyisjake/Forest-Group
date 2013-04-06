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

function fg_action_after_setup_theme() {

	add_theme_support('post-thumbnails' );
	//add_image_size( 'comment-thumb', 70, 70, true );
	
	// Content Width
	if ( ! isset( $content_width ) )
		$content_width = 620;

	// Custom Backgrounds
	add_theme_support( 'custom-background' );
	add_theme_support( 'automatic-feed-links' );
}
add_action( 'after_setup_theme', 'fg_action_after_setup_theme' );

function fg_get_weather() {

	$url = 'https://api.forecast.io/forecast/7be55cf6cb9f72bac545256af7ade238/38.4578,-122.6853';
	//$contents = wpcom_vip_file_get_contents( $url, 3, 900 );
	$contents = file_get_contents( $url );
	$json = json_decode($contents);

	echo '<h3>Right Now</h3>';
	echo '<div class="row">';
		echo '<div class="span1">';
			echo '<canvas id="icon1" width="60" height="60"></canvas>';
		echo '</div>';
		echo '<div class="span2">';
			echo '<span class="temp">' . intval( $json->currently->temperature ) . '&deg;</span>';
		echo '</div>';
	echo '</div>';
	echo '<h4>Next Hour</h3>';
	echo esc_html( $json->minutely->summary );
	echo '<h4>Next 24 Hours</h3>';
	echo esc_html( $json->hourly->summary );
	echo '<h4>Next Week</h3>';
	echo esc_html( $json->daily->summary );
	echo '
	<script>
		var skycons = new Skycons({"color": "#e2d8ba"});
		skycons.add("icon1", Skycons.' . esc_js( strtoupper( str_replace('-', '_', $json->currently->icon ) ) ) . ');
		skycons.play();
	</script>';
	
}


function events_init() {
	register_post_type( 'events', array(
		'hierarchical'        => false,
		'public'              => true,
		'show_in_nav_menus'   => true,
		'show_ui'             => true,
		'supports'            => array( 'title', 'editor', 'custom-fields', 'thumbnail', 'author', 'excerpt', 'comments', 'page-attributes' ),
		'has_archive'         => true,
		'query_var'           => true,
		'rewrite'             => true,
		'labels'              => array(
			'name'                => __( 'Events', 'fg' ),
			'singular_name'       => __( 'Events', 'fg' ),
			'add_new'             => __( 'Add new events', 'fg' ),
			'all_items'           => __( 'Events', 'fg' ),
			'add_new_item'        => __( 'Add new events', 'fg' ),
			'edit_item'           => __( 'Edit events', 'fg' ),
			'new_item'            => __( 'New events', 'fg' ),
			'view_item'           => __( 'View events', 'fg' ),
			'search_items'        => __( 'Search events', 'fg' ),
			'not_found'           => __( 'No events found', 'fg' ),
			'not_found_in_trash'  => __( 'No events found in trash', 'fg' ),
			'parent_item_colon'   => __( 'Parent events', 'fg' ),
			'menu_name'           => __( 'Events', 'fg' ),
		),
	) );

}
add_action( 'init', 'events_init' );

function events_updated_messages( $messages ) {
	global $post;

	$permalink = get_permalink( $post );

	$messages['events'] = array(
		0 => '', // Unused. Messages start at index 1.
		1 => sprintf( __('Events updated. <a target="_blank" href="%s">View events</a>', 'fg'), esc_url( $permalink ) ),
		2 => __('Custom field updated.', 'fg'),
		3 => __('Custom field deleted.', 'fg'),
		4 => __('Events updated.', 'fg'),
		/* translators: %s: date and time of the revision */
		5 => isset($_GET['revision']) ? sprintf( __('Events restored to revision from %s', 'fg'), wp_post_revision_title( (int) $_GET['revision'], false ) ) : false,
		6 => sprintf( __('Events published. <a href="%s">View events</a>', 'fg'), esc_url( $permalink ) ),
		7 => __('Events saved.', 'fg'),
		8 => sprintf( __('Events submitted. <a target="_blank" href="%s">Preview events</a>', 'fg'), esc_url( add_query_arg( 'preview', 'true', $permalink ) ) ),
		9 => sprintf( __('Events scheduled for: <strong>%1$s</strong>. <a target="_blank" href="%2$s">Preview events</a>', 'fg'),
		// translators: Publish box date format, see http://php.net/date
		date_i18n( __( 'M j, Y @ G:i' ), strtotime( $post->post_date ) ), esc_url( $permalink ) ),
		10 => sprintf( __('Events draft updated. <a target="_blank" href="%s">Preview events</a>', 'fg'), esc_url( add_query_arg( 'preview', 'true', $permalink ) ) ),
	);

	return $messages;
}
add_filter( 'post_updated_messages', 'events_updated_messages' );
