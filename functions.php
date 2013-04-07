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
wpcom_vip_load_plugin( 'easy-custom-fields' );
 
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


function event_init() {
	register_post_type( 'event', array(
		'hierarchical'        => false,
		'public'              => true,
		'show_in_nav_menus'   => true,
		'show_ui'             => true,
		'supports'            => array( 'title', 'editor', 'custom-fields', 'thumbnail', 'author', 'excerpt', 'comments', 'page-attributes' ),
		'has_archive'         => true,
		'query_var'           => true,
		'rewrite'             => true,
		'labels'              => array(
			'name'                => __( 'Event', 'fg' ),
			'singular_name'       => __( 'Event', 'fg' ),
			'add_new'             => __( 'Add new event', 'fg' ),
			'all_items'           => __( 'Events', 'fg' ),
			'add_new_item'        => __( 'Add new event', 'fg' ),
			'edit_item'           => __( 'Edit event', 'fg' ),
			'new_item'            => __( 'New event', 'fg' ),
			'view_item'           => __( 'View event', 'fg' ),
			'search_items'        => __( 'Search events', 'fg' ),
			'not_found'           => __( 'No event found', 'fg' ),
			'not_found_in_trash'  => __( 'No event found in trash', 'fg' ),
			'parent_item_colon'   => __( 'Parent event', 'fg' ),
			'menu_name'           => __( 'Event', 'fg' ),
		),
	) );

}
add_action( 'init', 'event_init' );

function event_updated_messages( $messages ) {
	global $post;

	$permalink = get_permalink( $post );

	$messages['event'] = array(
		0 => '', // Unused. Messages start at index 1.
		1 => sprintf( __('event updated. <a target="_blank" href="%s">View event</a>', 'fg'), esc_url( $permalink ) ),
		2 => __('Custom field updated.', 'fg'),
		3 => __('Custom field deleted.', 'fg'),
		4 => __('Event updated.', 'fg'),
		/* translators: %s: date and time of the revision */
		5 => isset($_GET['revision']) ? sprintf( __('Event restored to revision from %s', 'fg'), wp_post_revision_title( (int) $_GET['revision'], false ) ) : false,
		6 => sprintf( __('Event published. <a href="%s">View event</a>', 'fg'), esc_url( $permalink ) ),
		7 => __('Event saved.', 'fg'),
		8 => sprintf( __('Event submitted. <a target="_blank" href="%s">Preview event</a>', 'fg'), esc_url( add_query_arg( 'preview', 'true', $permalink ) ) ),
		9 => sprintf( __('Event scheduled for: <strong>%1$s</strong>. <a target="_blank" href="%2$s">Preview event</a>', 'fg'),
		// translators: Publish box date format, see http://php.net/date
		date_i18n( __( 'M j, Y @ G:i' ), strtotime( $post->post_date ) ), esc_url( $permalink ) ),
		10 => sprintf( __('Event draft updated. <a target="_blank" href="%s">Preview Event</a>', 'fg'), esc_url( add_query_arg( 'preview', 'true', $permalink ) ) ),
	);

	return $messages;
}
add_filter( 'post_updated_messages', 'event_updated_messages' );

$field_data = array (
	'advanced_testgroup' => array (
		'fields' => array(
			'StartTime'		=> array(),
			'EndTime'		=> array(),
			'Date'			=> array(),
			'Location'		=> array(),
	),
	'title'		=> 'Event Meta',
	'context'	=> 'side',
	'pages'		=> array( 'event' ),
	),
);

$easy_cf = new Easy_CF($field_data);

function fg_upcoming_events() {

	$args = array(
		'posts_per_page'	=> 2,
		'no_found_rows' 	=> true,
		'post_type'			=> 'event'
	);

	$the_query = new WP_Query( $args );
	
	while ( $the_query->have_posts() ) : $the_query->the_post(); ?>

	<h5><a href="<?php the_permalink(); ?>"><?php the_title( ); ?></a></h5>
	<?php
		$meta = get_post_meta(get_the_ID(), 'StartTime');
		if ( !empty( $meta[0] ) ) {
			echo '<ul class="unstyled"><li>' . $meta[0];
		}
		echo ' &mdash; ';
		$endtime = get_post_meta(get_the_ID(), 'EndTime');
		if ( !empty( $endtime[0] ) ) {
			echo $endtime[0];
		}
		$date = get_post_meta( get_the_ID(), 'Date' );
		if ( !empty( $date[0] )) {
			echo ', ' . $date[0] . '</li>';
		}
		$loc = get_post_meta(get_the_ID(), 'Location');
		if (!empty($loc[0])) {
			echo '<li>' . $loc[0] . '</li>';
		}
	?>
	
	<li><a href="<?php the_permalink(); ?>">More Information</a></li>
	</ul>

	<?php endwhile; wp_reset_postdata();
}