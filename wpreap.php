<?php
/*
 * Plugin Name: WPREAP (WordPress Real Estate Aggregator Plugin)
 * Plugin URI: https://github.com/marcolombardini/wpreap
 * Description: This plugin is designed to create an XML File so real estate aggregators can syndicate listings from your WordPress powered website.
 * Author: Marco Lombardini
 * Author URI: http://marcolombardini.com
 * Author Email: marco.lombardini@gmail.com
 * Version: Beta 0.1
 * Version Date: 2/26/15
 */

function do_feed_zillow() {
	load_template( ABSPATH . '/wp-content/plugins/wpreap/zillow-template.php' );
}
function do_feed_streeteasy() {
	load_template( ABSPATH . '/wp-content/plugins/wpreap/streeteasy-template.php' );
}


add_action( 'do_feed_zillow', 'do_feed_zillow', 10, 1 );
add_action( 'do_feed_streeteasy', 'do_feed_streeteasy', 10, 1 );

