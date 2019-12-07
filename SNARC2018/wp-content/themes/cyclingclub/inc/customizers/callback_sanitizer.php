<?php

if ( ! function_exists( 'cyclingclub_sanitize_hex_color' ) ) {
	/**
	 * Sanitize Hex color.
	 *
	 * Note: sanitize_hex_color_no_hash() can also be used here, depending on whether
	 * or not the hash prefix should be stored/retrieved with the hex color value.
	 *
	 * - Sanitization: hex_color
	 * - Control:      text, WP_Customize_Color_Control.
	 *
	 * @since  1.0.0
	 * @param  string               $hex_color HEX color to sanitize.
	 * @param  WP_Customize_Setting $setting   Setting instance.
	 * @return string                          The sanitized Hex color if not null. Otherwise,
	 *                                         the setting default.
	 */
	function cyclingclub_sanitize_hex_color( $hex_color, $setting ) {
		// Sanitize $input as a hex value with hash.
		$hex_color = sanitize_hex_color( $hex_color );
		// Return hex value or default value.
		if ( $hex_color ) {
			return $hex_color;
		} else {
			return $setting->default;
		}
	}
}
