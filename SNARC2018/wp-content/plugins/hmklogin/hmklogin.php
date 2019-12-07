<?php


function hmklogin_on_activation() {

	if ( ! current_user_can( 'activate_plugins' ) ) return;

	add_option( 'hmklogin_posts_per_page', 10 );
	add_option( 'hmklogin_show_welcome_page', true );
}
register_activation_hook( __FILE__, 'hmklogin_on_activation' );

// do stuff on deactivation
function hmklogin_on_deactivation() {

	if ( ! current_user_can( 'activate_plugins' ) ) return;

	flush_rewrite_rules();
}
register_deactivation_hook( __FILE__, 'hmklogin_on_deactivation' );



?>
