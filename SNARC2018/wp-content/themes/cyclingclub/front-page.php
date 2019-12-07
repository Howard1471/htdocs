<?php
/**
 * The template for displaying all pages
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site may use a
 * different template.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package cyclingclub
 */

get_header(); ?>
<div class="wrap trim-background-color">
	<div class="row">
		<div id="primary" class="content-area">
			<main id="main" class="site-main">
	
				<?php
				while ( have_posts() ) : the_post();
	
					get_template_part( 'template-parts/content', 'front-page' );
	
				endwhile; // End of the loop.
				?>
				
			</main><!-- #main -->
		</div><!-- #primary -->
	</div>
</div>
	
<?php $child_pages = cyclingclub_get_all_child_pages($post->ID); ?>
	
	<?php if ($child_pages) { ?>
		<div class="wrap accent-background-colour">
		
			<div class="row thirds-grid-container">
		
				<?php foreach( $child_pages as $post ) : setup_postdata($post);
					
					get_template_part( 'template-parts/content', 'child-page' );
					
				endforeach;  wp_reset_postdata(); ?>
			
			</div>
		
		</div>
	<?php } ?>
	
<?php get_footer(); ?>
