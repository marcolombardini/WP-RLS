<?php


function do_feed_myxml() {
	load_template( ABSPATH . '/wp-content/plugins/wpxml2aggregator/streeteasy-template.php' );
}

function do_feed_zillow() {
	load_template( ABSPATH . '/wp-content/plugins/wpxml2aggregator/zillow-template.php' );
}

add_action( 'do_feed_myxml', 'do_feed_streeteasy’, 10, 1 );
add_action( 'do_feed_zillow', 'do_feed_zillow', 10, 1 );

