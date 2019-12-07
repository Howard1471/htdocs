<?php


add_action( 'init', 'cptt_custom_post_types' ); 
function cptt_custom_post_types() { 
   register_post_type( 'game', 
     array( 
       'labels' => array( 
         'name' => __( 'Games' ), 
         'singular_name' => __( 'Game' ) 
       ), 
       'public' => true, 
       'has_archive' => true, 
       'supports' => array( 'title', 'editor', 'thumbnail' ), 
       'menu_icon' => 'dashicons-laptop' 
     ) 
   ); 
} 
