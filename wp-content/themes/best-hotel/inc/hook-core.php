<?php
/**
 * Functions which enhance the theme by hooking into WordPress
 *
 * @package Best_Hotel
 */

/**
 * Adds custom classes to the array of body classes.
 *
 * @param array $classes Classes for the body element.
 * @return array
 */
function best_hotel_body_classes( $classes ) {
	// Adds a class of hfeed to non-singular pages.
	if ( ! is_singular() ) {
		$classes[] = 'hfeed';
	}

	// Adds a class of no-sidebar when there is no sidebar present.
	if ( ! is_active_sidebar( 'sidebar-1' ) ) {
		$classes[] = 'no-sidebar';
	}

	return $classes;
}

add_filter( 'body_class', 'best_hotel_body_classes' );

/**
 * Add a pingback url auto-discovery header for single posts, pages, or attachments.
 */
function best_hotel_pingback_header() {
	if ( is_singular() && pings_open() ) {
		printf( '<link rel="pingback" href="%s">', esc_url( get_bloginfo( 'pingback_url' ) ) );
	}
}

add_action( 'wp_head', 'best_hotel_pingback_header' );

if ( ! function_exists( 'best_hotel_implement_excerpt_length' ) ) :

	/**
	 * Implement excerpt length.
	 *
	 * @since 1.0.0
	 *
	 * @param int $length The number of words.
	 * @return int Excerpt length.
	 */
	function best_hotel_implement_excerpt_length( $length ) {
		if ( is_admin() ) {
			return $length;
		}

		$excerpt_length = best_hotel_get_option( 'excerpt_length' );

		if ( absint( $excerpt_length ) > 0 ) {
			$length = absint( $excerpt_length );
		}

		return $length;
	}

endif;

add_filter( 'excerpt_length', 'best_hotel_implement_excerpt_length', 999 );

if ( ! function_exists( 'best_hotel_implement_read_more' ) ) :

	/**
	 * Implement read more in excerpt.
	 *
	 * @since 1.0.0
	 *
	 * @param string $more The string shown within the more link.
	 * @return string The excerpt.
	 */
	function best_hotel_implement_read_more( $more ) {
		if ( is_admin() ) {
			return $more;
		}

		$read_more_text = best_hotel_get_option( 'read_more_text' );

		if ( ! empty( $read_more_text ) ) {
			$more = ' <a href="' . esc_url( get_permalink() ) . '" class="more-link">' . esc_html( $read_more_text ) . '</a>';
		}

		return $more;
	}

endif;

add_filter( 'excerpt_more', 'best_hotel_implement_read_more' );

if ( ! function_exists( 'best_hotel_content_more_link' ) ) :

	/**
	 * Implement read more in content.
	 *
	 * @since 1.0.0
	 *
	 * @param string $more_link Read More link element.
	 * @param string $more_link_text Read More text.
	 * @return string Link.
	 */
	function best_hotel_content_more_link( $more_link, $more_link_text ) {
		$read_more_text = best_hotel_get_option( 'read_more_text' );

		if ( ! empty( $read_more_text ) ) {
			$more_link = str_replace( $more_link_text, esc_html( $read_more_text ), $more_link );
		}

		return $more_link;
	}

endif;

add_filter( 'the_content_more_link', 'best_hotel_content_more_link', 10, 2 );
