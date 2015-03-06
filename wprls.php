<?php
/*
 * Plugin Name: WP-RLS Real Estate Listings Syndicator
 * Plugin URI: https://github.com/marcolombardini/WP-RLS
 * Description: Only use if your are comfortable editing PHP files and are familar with your theme 
 * Author URI: http://marcolombardini.com
 * Version: 0.1
 * Contributors: Jason Murray, Javier Correa
 */


add_action( 'admin_menu', 'wprls_add_admin_menu' );
add_action( 'admin_init', 'wprls_settings_init' );
 
 
function wprls_add_admin_menu(  ) { 
 
	add_options_page( 'WPRLS', 'Real Estate Listing Syndicator', 'manage_options', 'wprls', 'wprls_options_page' );
 
}
 
function wprls_settings_init(  ) { 
 
	register_setting( 'pluginPage', 'wprls_settings' );
 
	add_settings_section(
		'wprls_pluginPage_section', 
		__( 'Broker/Firm Settings Page', 'wprls' ), 
		'wprls_settings_section_callback', 
		'pluginPage'
	);
 
	add_settings_field( 
		'wprls_firm_name', 
		__( 'Company or Firm Name:', 'wprls' ), 
		'wprls_firm_name_render', 
		'pluginPage', 
		'wprls_pluginPage_section' 
	);
 
	add_settings_field( 
		'wprls_firm_contact', 
		__( 'Principal Broker:', 'wprls' ), 
		'wprls_firm_contact_render', 
		'pluginPage', 
		'wprls_pluginPage_section' 
	);
 
	add_settings_field( 
		'wprls_firm_phone', 
		__( 'Main Phone Number:', 'wprls' ), 
		'wprls_firm_phone_render', 
		'pluginPage', 
		'wprls_pluginPage_section' 
	);
 
	add_settings_field( 
		'wprls_firm_email', 
		__( 'Main Email Address:', 'wprls' ), 
		'wprls_firm_email_render', 
		'pluginPage', 
		'wprls_pluginPage_section' 
	);
 
	add_settings_field( 
		'wprls_firm_id', 
		__( 'Broker or Firm ID:', 'wprls' ), 
		'wprls_firm_id_render', 
		'pluginPage', 
		'wprls_pluginPage_section' 
	);
 
	add_settings_field( 
		'wprls_firm_test', 
		__( 'Test:', 'wprls' ), 
		'wprls_firm_test_render', 
		'pluginPage', 
		'wprls_pluginPage_section' 
	);
 
 
}
 
	
 
function wprls_firm_name_render(  ) { 
 
	$options = get_option( 'wprls_settings' );
	?>
	<input type='text' name='wprls_settings[wprls_firm_name]' value='<?php echo $options['wprls_firm_name']; ?>'>
	<?php
 
}
 
 
function wprls_firm_contact_render(  ) { 
 
	$options = get_option( 'wprls_settings' );
	?>
	<input type='text' name='wprls_settings[wprls_firm_contact]' value='<?php echo $options['wprls_firm_contact']; ?>'>
	<?php
 
}
 
 
function wprls_firm_phone_render(  ) { 
 
	$options = get_option( 'wprls_settings' );
	?>
	<input type='text' name='wprls_settings[wprls_firm_phone]' value='<?php echo $options['wprls_firm_phone']; ?>'>
	<?php
 
}
 
 
function wprls_firm_email_render(  ) { 
 
	$options = get_option( 'wprls_settings' );
	?>
	<input type='text' name='wprls_settings[wprls_firm_email]' value='<?php echo $options['wprls_firm_email']; ?>'>
	<?php
 
}
 
 
function wprls_firm_id_render(  ) { 
 
	$options = get_option( 'wprls_settings' );
	?>
	<input type='text' name='wprls_settings[wprls_firm_id]' value='<?php echo $options['wprls_firm_id']; ?>'>
	<?php
 
}
 
function wprls_firm_test_render(  ) { 
 
	$options = get_option( 'wprls_settings' );
	?>
	<input type='text' name='wprls_settings[wprls_firm_test]' value='<?php echo $options['wprls_firm_test']; ?>'>
	<?php
 
}
 
 
function wprls_settings_section_callback(  ) { 
 
	echo __( 'When syndicating feeds to aggregators you will need, for some, basic information about your brokerage or firm. <p>A few require that you have a Broker or Firm ID, others let you create your own. If you already have a ID, use that as your default', 'wprls' );
 
}
 
 
function wprls_options_page(  ) { 
 
	?>
	<form action='options.php' method='post'>
		
		<h2>WPRLS Real Estate Listing Syndicator</h2>
		
		<?php
		settings_fields( 'pluginPage' );
		do_settings_sections( 'pluginPage' );
		submit_button();
		?>
		
	</form>
	<?php
 
}

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
