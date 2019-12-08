/* 
2  Theme Name:   Custom Post Type Template Example 
3  Theme URI:    http://danielpataki.com 
4  Description:  An example theme that utilizes custom post type templates 
5  Author:       Daniel Pataki 
6  Author URI:   http://danielpataki.com 
7  Template:     CPPT 
8  Version:      1.0.0 
9 */ 
<?php 
  
add_action( 'wp_enqueue_scripts', 'cptt_assets' ); 
function cptt_assets() { 
    wp_enqueue_style( 'parent-style', get_template_directory_uri() . '/style.css' ); 
    wp_enqueue_style( 'child-style', get_stylesheet_directory_uri() . '/style.css', array( 'parent-style' )); 
} 



?>