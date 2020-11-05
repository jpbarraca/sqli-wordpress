<?php
/**
 * Core functions
 *
 * @package Best_Hotel
 */

if ( ! function_exists( 'best_hotel_get_option' ) ) :

	/**
	 * Get theme option.
	 *
	 * @since 1.0.0
	 *
	 * @param string $key Option key.
	 * @return mixed Option value.
	 */
	function best_hotel_get_option( $key ) {
		$default_options = best_hotel_get_default_theme_options();

		if ( empty( $key ) ) {
			return;
		}

		$default = ( isset( $default_options[ $key ] ) ) ? $default_options[ $key ] : '';
		$theme_options = get_theme_mod( 'theme_options', $default_options );
		$theme_options = array_merge( $default_options, $theme_options );
		$value = '';

		if ( isset( $theme_options[ $key ] ) ) {
			$value = $theme_options[ $key ];
		}

		return $value;
	}

endif;

if ( ! function_exists( 'best_hotel_get_default_theme_options' ) ) :

	/**
	 * Get default theme options.
	 *
	 * @since 1.0.0
	 *
	 * @return array Default theme options.
	 */
	function best_hotel_get_default_theme_options() {
		$defaults_options = array();

		// Header.
		$defaults_options['show_site_title']   = true;
		$defaults_options['show_site_tagline'] = true;
		$defaults_options['book_button_text']  = esc_html__( 'Book Now', 'best-hotel' );
		$defaults_options['book_button_url']   = '';


		// Blog.
		$defaults_options['blog_title']     = esc_html__( 'Blog', 'best-hotel' );
		$defaults_options['show_content']   = 'short';
		$defaults_options['excerpt_length'] = 40;
		$defaults_options['read_more_text'] = esc_html__( 'Read More', 'best-hotel' );

		// Footer.
		$defaults_options['copyright_message'] = esc_html__( 'Copyright &copy; All rights reserved.', 'best-hotel' );

		return apply_filters( 'best_hotel_default_theme_options', $defaults_options );
	}

endif;
