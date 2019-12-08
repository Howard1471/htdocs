<?php
/*  This code adds a category type */

//add_action( 'init', 'cppt_custom_post_types' ); 
function cppt_custom_post_types() { 
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
