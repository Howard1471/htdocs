/**
 * File customizer.js.
 *
 * Theme Customizer enhancements for a better user experience.
 *
 * Contains handlers to make Theme Customizer preview reload changes asynchronously.
 */

( function( $ ) {

	// Site title and description.
	wp.customize( 'blogname', function( value ) {
		value.bind( function( to ) {
			$( '.site-title a' ).text( to );
		} );
	} );
	wp.customize( 'blogdescription', function( value ) {
		value.bind( function( to ) {
			$( '.site-description' ).text( to );
		} );
	} );

	// Header text color.
	wp.customize( 'header_textcolor', function( value ) {
		value.bind( function( to ) {
			if ( 'blank' === to ) {
				$( '.site-title, .site-description' ).css( {
					'clip': 'rect(1px, 1px, 1px, 1px)',
					'position': 'absolute'
				} );
			} else {
				$( '.site-title, .site-description' ).css( {
					'clip': 'auto',
					'position': 'relative'
				} );
				$( '.site-title a, .site-description' ).css( {
					'color': to
				} );
			}
		} );
	} );

	// Header Nav Footer.
	wp.customize( 'header_background', function( value ) {
		
		value.bind( function( to ) {
			$('.accent-background-colour').css({
				'background': to
			});
		} );
	} );
	
	// Accent color.
	wp.customize( 'accent_color', function( value ) {
		
		value.bind( function( to ) {
			var style, el;

            style = '<style type="text/css" class="hover-styles">.main-navigation li:hover > a, .button:hover, #comments a.comment-reply-link, #comments button, #comments input[type="button"], #comments input[type="reset"], #comments input[type="submit"] { background:' + to + '; } #footer-menu li a:hover, .site-info a, a {color:' + to + ';}#footer-menu {border-bottom-color:' + to + ';}article, input[type="text"], input[type="email"], input[type="url"], input[type="password"], input[type="search"], input[type="number"], input[type="tel"], input[type="range"], input[type="date"], input[type="month"], input[type="week"], input[type="time"], input[type="datetime"], input[type="datetime-local"], input[type="color"], textarea, #secondary .widget  {border-left-color:' + to + ';}</style>'; // build the style element
            
            console.log(style);
            el =  $( '.hover-styles' ); // look for a matching style element that might already be there

            // add the style element into the DOM or replace the matching style element that is already there
            if ( el.length ) {
                el.replaceWith( style ); // style element already exists, so replace it
            } else {
                $( 'head' ).append( style ); // style element doesn't exist so add it
            }


			$('.trim-background-color').css({
				'background': to
			});
			

                			
		} );
	} );
	
	
} )( jQuery );
