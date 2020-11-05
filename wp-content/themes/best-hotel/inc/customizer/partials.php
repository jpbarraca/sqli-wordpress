<?php
/**
 * Customizer partials
 *
 * @package Best_Hotel
 */

/**
 * Render the site title for the selective refresh partial.
 *
 * @return void
 */
function best_hotel_customize_partial_blogname() {
	bloginfo( 'name' );
}

/**
 * Render the site tagline for the selective refresh partial.
 *
 * @return void
 */
function best_hotel_customize_partial_blogdescription() {
	bloginfo( 'description' );
}
