<?php
/**
 * Plugin recommendations
 *
 * @package Best_Hotel
 */

if ( ! function_exists( 'best_hotel_register_recommended_plugins' ) ) :

	/**
	 * Register recommended plugins.
	 *
	 * @since 1.0.0
	 */
	function best_hotel_register_recommended_plugins() {
		$plugins = array(
			array(
				'name' => esc_html__( 'Advanced Booking Calendar', 'best-hotel' ),
				'slug' => 'advanced-booking-calendar',
			),
			array(
				'name' => esc_html__( 'Elementor', 'best-hotel' ),
				'slug' => 'elementor',
			),
			array(
				'name' => esc_html__( 'One Click Demo Import', 'best-hotel' ),
				'slug' => 'one-click-demo-import',
			),
		);

		$config = array();

		tgmpa( $plugins, $config );
	}

endif;

add_action( 'tgmpa_register', 'best_hotel_register_recommended_plugins' );
