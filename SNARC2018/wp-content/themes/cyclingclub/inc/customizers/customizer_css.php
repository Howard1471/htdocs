<?php
	
function cyclingclub_customize_css() {
	
    ?>
         <style type="text/css">
	         .accent-background-colour {
		         background: <?php echo get_theme_mod( 'header_background' ) ; ?>;
	         }
			.trim-background-color,
			.main-navigation li:hover > a,
			.button:hover {
			    background: <?php echo get_theme_mod( 'accent_color' ); ?>;
			}
			.main-navigation li:hover > a,
			.button:hover,
			#comments a.comment-reply-link,
			#comments button,
			#comments input[type="button"],
			#comments input[type="reset"],
			#comments input[type="submit"] {
				background:<?php echo get_theme_mod( 'accent_color' ); ?>;	 
			}
			#footer-menu li a:hover,
			.site-info a {
				color:<?php echo get_theme_mod( 'accent_color' ); ?>;	 
			}
			#footer-menu {
				border-bottom-color:<?php echo get_theme_mod( 'accent_color' ); ?>;
			}
			article,
			input[type="text"],
			input[type="email"],
			input[type="url"],
			input[type="password"],
			input[type="search"],
			input[type="number"],
			input[type="tel"],
			input[type="range"],
			input[type="date"],
			input[type="month"],
			input[type="week"],
			input[type="time"],
			input[type="datetime"],
			input[type="datetime-local"],
			input[type="color"],
			textarea,
			#secondary .widget  {
				border-left-color:<?php echo get_theme_mod( 'accent_color' ); ?>;
			}
         </style>
    <?php
}
add_action( 'wp_head', 'cyclingclub_customize_css');