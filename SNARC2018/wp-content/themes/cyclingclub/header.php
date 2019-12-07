<?php
/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package cyclingclub
 */

?>
<!doctype html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="profile" href="http://gmpg.org/xfn/11">

	<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
<div id="page" class="site">
	<a class="skip-link screen-reader-text" href="#content"><?php esc_html_e( 'Skip to content', 'cyclingclub' ); ?></a>

	<header id="masthead" class="site-header accent-background-colour">
		
			<div class="site-branding">
				<?php
				the_custom_logo();
				if ( is_front_page() || is_home() ) : ?>
					<h1 class="site-title fade-animate-up"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></h1>
				<?php else : ?>
					<p class="site-title fade-animate-up"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></p>
				<?php
				endif;
	
				$description = get_bloginfo( 'description', 'display' );
				if ( $description || is_customize_preview() ) : ?>
					<p class="site-description fade-animate-up"><?php echo esc_html( $description ); ?></p>
				<?php
				endif; ?>
				
				<?php do_action( 'cyclingpro_login' ); ?>
				
			</div><!-- .site-branding -->

			<?php if ( is_front_page() || is_home()) { ?>
				<?php the_header_image_tag(); ?>
			<?php } ?>
			
			<div class="sticker-wrapper">
			<nav id="site-navigation" class="main-navigation accent-background-colour">
				<button class="menu-toggle" aria-controls="primary-menu" aria-expanded="false"><?php esc_html_e( 'Menu', 'cyclingclub' ); ?></button>
				<div class="row">
					<?php wp_nav_menu( array( 'theme_location' => 'menu-1', 'menu_id' => 'primary-menu') ); ?>
				</div>
			</nav><!-- #site-navigation -->
			</div>
		
		
	</header><!-- #masthead -->

	<div id="content" class="site-content secondary-background-colour">
