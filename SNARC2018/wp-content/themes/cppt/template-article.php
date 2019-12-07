<?php 
/* 
Template Name: News Article 
Template Post Type: News 
*/ 

?>


<?php get_header(); ?>

<?php get_sidebar(); ?>

<h1><?php the_title() ?></h1>
'template-parts/game/content', 'review' 
<?php get_template_part( 'content', get_post_format() ); ?>

<?php get_sidebar('right'); ?>