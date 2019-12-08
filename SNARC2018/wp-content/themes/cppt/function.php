/* 
Theme Name:   Custom Post Type Template 
Theme URI:    http://danielpataki.com 
Description:  An example theme that utilizes custom post type templates 
Author:       Daniel Pataki 
Author URI:   http://danielpataki.com 
Template:     snarc 
Version:      1.0.0 
*/ 
<?php 
  
add_action( 'wp_enqueue_scripts', 'cppt_assets' ); 

function cppt_assets() { 

    wp_enqueue_style( 'parent-style', get_template_directory_uri() . '/snarc/style.css' ); 
    wp_enqueue_style( 'child-style', get_stylesheet_directory_uri() . 
			'/snarc/style.css', array( 'parent-style' )); 

} 



?>