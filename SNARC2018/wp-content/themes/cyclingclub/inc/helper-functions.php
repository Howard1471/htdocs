<?php
/**
 * Functions which enhance the theme by hooking into WordPress
 *
 * @package cyclingclub
 */

/**
 * Return all child pages in an array.
 * @param   $post_id      $post->ID the post id of the parent page, this will return all child pages of that parent
 * @return  $child_pages
 */
function cyclingclub_get_all_child_pages($post_id) {
	
	// Set up the objects needed
	$my_wp_query = new WP_Query();
	$all_wp_pages = $my_wp_query->query(array('post_type' => 'page', 'posts_per_page' => '-1'));
	
	// Filter through all pages and find Portfolio's children
	$child_pages = get_page_children( $post_id, $all_wp_pages );
	
	return $child_pages;
	
}
