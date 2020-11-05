<?php
/**
 * Theme functions
 *
 * @package Best_Hotel
 */

if ( ! function_exists( 'best_hotel_customize_banner_title' ) ) :

	/**
	 * Customize banner title.
	 *
	 * @since 1.0.0
	 *
	 * @param string $title Title.
	 * @return string Modified title.
	 */
	function best_hotel_customize_banner_title( $title ) {

		if ( is_home() ) {
			$title = best_hotel_get_option( 'blog_title' );
		} elseif ( is_singular() ) {
			$title = single_post_title( '', false );
		} elseif ( is_category() || is_tag() ) {
			$title = single_term_title( '', false );
		} elseif ( is_archive() ) {
			$title = strip_tags( get_the_archive_title() );
		} elseif ( is_search() ) {
			$title = sprintf( esc_html__( 'Search Results for: %s', 'best-hotel' ),  get_search_query() );
		} elseif ( is_404() ) {
			$title = esc_html__( '404!', 'best-hotel' );
		}

		return $title;
	}

endif;

add_filter( 'best_hotel_filter_banner_title', 'best_hotel_customize_banner_title' );
