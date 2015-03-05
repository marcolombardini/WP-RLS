<?php
/*
 * Plugin Name: WP-RLS Real Estate Listings Syndicator
 * Plugin URI: https://github.com/marcolombardini/WP-RLS
 * Description: Creates an XML File so real estate professionals can syndicate listings from a WordPress powered website.
 * Author: Marco Lombardini
 * Author URI: http://marcolombardini.com
 * Version: 0.1
 * Contributors: Jason Murray, Javier Correa
 */

function do_feed_zillow() {
	load_template( ABSPATH . '/wp-content/plugins/wprls/zillow-template.php' );
}
function do_feed_streeteasy() {
	load_template( ABSPATH . '/wp-content/plugins/wprls/streeteasy-template.php' );
}
function do_feed_hotpads() {
	load_template( ABSPATH . '/wp-content/plugins/wprls/hotpads-template.php' );
}
function do_feed_padlister() {
	load_template( ABSPATH . '/wp-content/plugins/wprls/padlister-template.php' );
}


add_action( 'do_feed_zillow', 'do_feed_zillow', 10, 1 );
add_action( 'do_feed_streeteasy', 'do_feed_streeteasy', 10, 1 );
add_action( 'do_feed_hotpads', 'do_feed_hotpads', 10, 1 );
add_action( 'do_feed_padlister', 'do_feed_padlister', 10, 1 );

