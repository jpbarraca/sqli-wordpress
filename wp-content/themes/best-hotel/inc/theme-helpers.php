<?php
/**
 * Theme helpers
 *
 * @package Best_Hotel
 */

if ( ! function_exists( 'best_hotel_is_abc_active' ) ) :

	/**
	 * Check if ABC is active.
	 *
	 * @since 1.0.0
	 */
	function best_hotel_is_abc_active() {
		return function_exists( 'advanced_booking_calendar_install' ) ? true : false;
	}

endif;

if ( ! function_exists( 'best_hotel_primary_menu_fallback' ) ) :

	/**
	 * Primary menu fallback.
	 *
	 * @since 1.0.0
	 */
	function best_hotel_primary_menu_fallback() {
		echo '<ul>';
		echo '<li><a href="' . esc_url( home_url( '/' ) ) . '">' . esc_html__( 'Home', 'best-hotel' ) . '</a></li>';

		$qargs = array(
			'posts_per_page' => 4,
			'post_type'      => 'page',
			'orderby'        => 'name',
			'order'          => 'ASC',
		);

		$the_query = new WP_Query( $qargs );

		if ( $the_query->have_posts() ) {

			while ( $the_query->have_posts() ) {
				$the_query->the_post();
				the_title( '<li><a href="' . esc_url( get_permalink() ) . '">', '</a></li>' );
			}

			wp_reset_postdata();
		}

		echo '</ul>';
	}

endif;

if ( ! function_exists( 'best_hotel_get_the_excerpt' ) ) :

	/**
	 * Fetch excerpt from the post.
	 *
	 * @since 1.0.0
	 *
	 * @param int     $length      Excerpt length.
	 * @param WP_Post $post_object WP_Post instance.
	 * @return string Excerpt content.
	 */
	function best_hotel_get_the_excerpt( $length, $post_object = null ) {
		global $post;

		if ( is_null( $post_object ) ) {
			$post_object = $post;
		}

		$length = absint( $length );

		if ( 0 === $length ) {
			return;
		}

		$source_content = $post_object->post_content;

		if ( ! empty( $post_object->post_excerpt ) ) {
			$source_content = $post_object->post_excerpt;
		}

		$source_content = strip_shortcodes( $source_content );
		$trimmed_content = wp_trim_words( $source_content, $length, '&hellip;' );

		return $trimmed_content;
	}

endif;

if ( ! function_exists( 'best_hotel_posts_navigation' ) ) :

	/**
	 * Posts navigation.
	 *
	 * @since 1.0.0
	 */
	function best_hotel_posts_navigation() {
		the_posts_pagination();
	}

endif;

if ( ! function_exists( 'best_hotel_fonts_url' ) ) :

	/**
	 * Return fonts URL.
	 *
	 * @since 1.0.0
	 * @return string Font URL.
	 */
	function best_hotel_fonts_url() {
		$fonts_url = '';
		$fonts     = array();
		$subsets   = 'latin,latin-ext';

		/* translators: If there are characters in your language that are not supported by Roboto Condensed, translate this to 'off'. Do not translate into your own language. */
		if ( 'off' !== _x( 'on', 'Roboto Condensed font: on or off', 'best-hotel' ) ) {
			$fonts[] = 'Roboto Condensed:300,400,400i,700,700i';
		}

		if ( 'off' !== _x( 'on', 'Roboto font: on or off', 'best-hotel' ) ) {
			$fonts[] = 'Roboto:300,300i,400,400i,500,500i,700';
		}

		if ( $fonts ) {
			$fonts_url = add_query_arg( array(
				'family' => urlencode( implode( '|', $fonts ) ),
				'subset' => urlencode( $subsets ),
			), 'https://fonts.googleapis.com/css' );
		}

		return $fonts_url;
	}

endif;

if ( ! function_exists( 'best_hotel_render_breadcrumb' ) ) :

	/**
	 * Render breadcrumb.
	 *
	 * @since 1.0.0
	 */
	function best_hotel_render_breadcrumb() {
		if ( ! function_exists( 'breadcrumb_trail' ) ) {
			require_once trailingslashit( get_template_directory() ) . 'lib/breadcrumbs/breadcrumbs.php';
		}

		$breadcrumb_args = array(
			'container'   => 'div',
			'show_browse' => false,
			'show_title'  => true,
			'labels'      => array(
				'home' => esc_html__( 'Home', 'best-hotel' ),
			),
		);

		breadcrumb_trail( $breadcrumb_args );
	}

endif;

if ( ! function_exists( 'best_hotel_get_rooms' ) ) :

	/**
	 * Get rooms.
	 *
	 * @since 1.0.0
	 *
	 * @param array $args Arguments.
	 * @return array Room details.
	 */
	function best_hotel_get_rooms( $args = array() ) {
		global $wpdb;
		$output = array();

		if ( ! best_hotel_is_abc_active() ) {
			return $output;
		}

		$defaults = array (
			'number' => 3
			);

		$args = wp_parse_args( $args, $defaults );

		$rooms_result = $wpdb->get_results( $wpdb->prepare( "SELECT * FROM {$wpdb->prefix}abc_calendars ORDER by name LIMIT 0, %d ", absint( $args['number'] ) ), ARRAY_A );

		if ( ! empty( $rooms_result ) ) {
			foreach ( $rooms_result as $room ) {
				$item = array();

				$item['id']                 = $room['id'];
				$item['name']               = $room['name'];
				$item['slug']               = sanitize_title_with_dashes( $room['name'] );
				$item['price']              = $room['pricePreset'];
				$item['page_id']            = $room['infoPage'];
				$item['description']        = $room['infoText'];
				$item['max_units']          = $room['maxUnits'];
				$item['max_availabilities'] = $room['maxAvailabilities'];
				$item['min_stay']           = $room['minimumStayPreset'];
				$item['partly_booked']      = $room['partlyBooked'];

				$item['attachment_id'] = null;

				if ( ! empty( $item['page_id'] ) ) {
					$item['attachment_id'] = get_post_thumbnail_id( absint( $item['page_id'] ) );
				}

				$output[] = $item;
			}
		}

		return $output;
	}

endif;

if ( ! function_exists( 'best_hotel_get_default_colors' ) ) :

	/**
	 * Returns default colors.
	 *
	 * @since 1.0.0
	 *
	 * @return array Default color values.
	 */
	function best_hotel_get_default_colors() {
		$output = array();

		$output = array(
			'color_primary' 	=> '#FFB703',
			'color_secondary'   => '#6CBAF0',
			);

		return $output;
	}

endif;

if ( ! function_exists( 'best_hotel_get_color_theme_settings_options' ) ) :

	/**
	 * Returns color theme settings options.
	 *
	 * @since 1.0.0
	 *
	 * @return array Color options.
	 */
	function best_hotel_get_color_theme_settings_options() {
		$output = array(
			'color_primary' => array(
				'label' => esc_html__( 'Primary Color', 'best-hotel' ),
				),
			'color_secondary' => array(
				'label' => esc_html__( 'Secondary Color', 'best-hotel' ),
				),
			);

		return $output;
	}

endif;
