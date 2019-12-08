<?php
/* Custom Post type to support news items */

add_action( 'init', 'cptt_custom_post_types' ); 
function cptt_custom_post_types() { 
   register_post_type( 'News', 
     array( 
       'labels' => array( 
         'name' => __( 'News' ), 
         'singular_name' => __( 'News' ) 
       ), 
       'public' => true, 
       'has_archive' => true, 
       'supports' => array( 'title', 'editor', 'thumbnail' ), 
       'menu_icon' => 'dashicons-laptop' 
     ) 
   ); 
} 
