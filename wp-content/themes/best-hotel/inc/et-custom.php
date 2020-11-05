<?php
/**
 * Elementor customization
 *
 * @package Best_Hotel
 */

function best_hotel_add_elementor_widget_categories( $elements_manager ) {
	$elements_manager->add_category(
		'theme-custom',
		[
			'title' => esc_html__( 'Theme Custom', 'best-hotel' ),
			'icon' => 'fa fa-plug',
		]
	);
}

add_action( 'elementor/elements/categories_registered', 'best_hotel_add_elementor_widget_categories' );
