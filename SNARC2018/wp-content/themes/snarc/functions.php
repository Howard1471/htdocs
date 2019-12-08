<?php
/*
 *
 * @package WordPress
 * @subpackage snarc
 * @since snarc 1.0
 */

function load_css(){
wp_enqueue_style ('style.css', get_stylesheet_uri() );
//wp_enqueue_script('jquery');
}
add_action( 'wp_enqueue_scripts', 'load_css');

//Custom Menu(s)
function wpb_custom_new_menu() {
  register_nav_menu('visitor_menu',__( 'Visitor_Menu' ));
}
add_action( 'init', 'wpb_custom_new_menu' );

//Enable page content to be displayed
function can_include_content($pid){
	//$pid is the Page ID of the required page
	$page_in_question = get_post($pid);
	$content = $page_in_question->post_content;
	$content = apply_filters('the_content', $content);
	$content = str_replace(']]>', ']]>', $content);
	echo $content;
}
/**
 * Register our sidebars and widgetized areas.
 *
 */
function snarc_widgets_init() {

	register_sidebar( array(
		'name'          => 'Home left sidebar',
		'id'            => 'home_left_1',
		'before_widget' => '<div>',
		'after_widget'  => '</div>',
		'before_title'  => '<h2 class="rounded">',
		'after_title'   => '</h2>',
	) );


	register_sidebar( array(
		'name'          => 'Home right sidebar',
		'id'            => 'home_right_1',
		'before_widget' => '<div>',
		'after_widget'  => '</div>',
		'before_title'  => '<h2 class="rounded">',
		'after_title'   => '</h2>',
	) );

	register_sidebar( array(
		'name'          => 'Advert Panel',
		'id'            => 'advert_panel_1',
		'before_widget' => '<div>',
		'after_widget'  => '</div>',
		'before_title'  => '<h2 class="rounded">',
		'after_title'   => '</h2>',
	) );

}
add_action( 'widgets_init', 'snarc_widgets_init' );
?>

