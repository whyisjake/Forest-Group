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
	wp_enqueue_style( 'bootstrap', get_stylesheet_directory_uri() . '/css/style.css' );
}

add_action( 'wp_enqueue_scripts', 'fg_enqueue_scripts' );