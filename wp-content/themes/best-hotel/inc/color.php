<?php
/**
 * Color implementation
 *
 * @package Best_Hotel
 */

/**
 * Add custom styles.
 *
 * @return void
 */
function best_hotel_add_custom_styles() {
	$default = best_hotel_get_default_colors();
	$color_options = best_hotel_get_color_theme_settings_options();
	$custom_style = '';
	$required_colors = array();

	if ( ! empty( $color_options ) ) {
		foreach ( $color_options as $key => $val ) {
			$option_value = best_hotel_get_option( $key );
			if ( ! empty( $option_value ) && $default[ $key ] !== $option_value ) {
				$required_colors[ $key ] = $option_value;
			}
		}
	}

	if ( empty( $required_colors ) ) {
		return;
	}

	foreach ( $required_colors as $key => $color ) {
		switch ( $key ) {
			case 'color_primary':
				$custom_style .= '
					button, 
					.button, 
					input[type="button"], 
					input[type="reset"], 
					input[type="submit"],
					.comment-reply-link,
					.branding-button,
					.read-more-btn,
					.slick-arrow,
					#secondary form input[type="submit"],
					#secondary .widget .widget-title:after,
					.scrollup {background:' . esc_attr( $color ) . '}' . "\n";

				$custom_style .= '
					a,
					.main-navigation ul li a:hover,
					.main-navigation ul li.menu-item-has-children ul.sub-menu li a:hover,
					#footer-navigation ul li a:hover,
					#footer-widgets ul li:hover a,
					#footer-widgets ul li:hover,
					#footer-widgets ul li:hover:before {color:' . esc_attr( $color ) . '}' . "\n";
				break;
			case 'color_secondary':
				$custom_style .= '#custom-header{background:' . esc_attr( $color ) . '}' . "\n";
				$custom_style .= '#footer-widgets .widget-title{color:' . esc_attr( $color ) . '}' . "\n";
				break;
			default:
				break;
		}

		if ( ! empty( $custom_style ) ) {
			echo '<style type="text/css">';
			echo $custom_style; // phpcs:ignore WordPress.Security.EscapeOutput
			echo '</style>';
		}
	}

}

add_filter( 'wp_head', 'best_hotel_add_custom_styles', 11 );
