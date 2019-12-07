<?php
/**
 * Functions which enhance the theme by hooking into WordPress
 *
 * @package cyclingclub
 */

/**
 * Adds custom classes to the array of body classes.
 *
 * @param array $classes Classes for the body element.
 * @return array
 */
function cyclingclub_body_classes( $classes ) {
	// Adds a class of hfeed to non-singular pages.
	if ( ! is_singular() ) {
		$classes[] = 'hfeed';
	}

	return $classes;
}
add_filter( 'body_class', 'cyclingclub_body_classes' );

/**
 * Add a pingback url auto-discovery header for singularly identifiable articles.
 */
function cyclingclub_pingback_header() {
	if ( is_singular() && pings_open() ) {
		echo '<link rel="pingback" href="', esc_url( get_bloginfo( 'pingback_url' ) ), '">';
	}
}
add_action( 'wp_head', 'cyclingclub_pingback_header' );

/**
 * Modifies the more tag when dropped into the post content.
 */
function cyclingclub_modify_read_more_link() {
	if(!is_admin()) {
		return '<a class="button" href="' . esc_url(get_permalink()) . '">Read more&hellip;</a>';
	}
}
add_filter( 'the_content_more_link', 'cyclingclub_modify_read_more_link' );

/**
 * Modifies get_header_image_tag to include a wrapper.
 */
function cyclingclub_header_image_tag_wrapper($html, $header, $attr) {
	
	$html = '<div class="mood-image image-fade-in">'.$html.'</div>';		
	return $html;
	
}
add_filter( 'get_header_image_tag', 'cyclingclub_header_image_tag_wrapper', 10, 3 );

/**
 * Modifies comment date.
 */
function cyclingclub_comment_date($date, $d, $comment) {
	
	return date('M, Y', strtotime($date));

}
add_filter( 'get_comment_date', 'cyclingclub_comment_date', 10, 3 );

/**
 * Add a class to the custom logo hook.
 */
function cyclingclub_change_logo_class( $html ) {
    $html = str_replace( 'custom-logo-link', 'custom-logo-link fade-animate-up', $html );
    return $html;
}
add_filter( 'get_custom_logo', 'cyclingclub_change_logo_class' );

