<?php
/**
 * Load files
 *
 * @package Best_Hotel
 */

// Load TGM.
require_once trailingslashit( get_template_directory() ) . 'lib/tgm/class-tgm-plugin-activation.php';
require_once trailingslashit( get_template_directory() ) . 'inc/plugins.php';

// Load theme core functions.
require_once trailingslashit( get_template_directory() ) . 'inc/core.php';

// Custom template tags for this theme.
require_once trailingslashit( get_template_directory() ) . 'inc/template-tags.php';

// Helper functions.
require_once trailingslashit( get_template_directory() ) . 'inc/theme-helpers.php';

// Functions attached to core hooks.
require_once trailingslashit( get_template_directory() ) . 'inc/hook-core.php';

// Functions related to colors.
require_once trailingslashit( get_template_directory() ) . 'inc/color.php';

// Functions attached to custom hooks.
require_once trailingslashit( get_template_directory() ) . 'inc/theme-functions.php';

// Functions to add metabox.
require_once trailingslashit( get_template_directory() ) . 'inc/metabox.php';

// Customizer additions.
require_once trailingslashit( get_template_directory() ) . 'inc/customizer.php';

// Admin page.
require_once trailingslashit( get_template_directory() ) . 'inc/admin-page.php';

// Demo import.
require_once trailingslashit( get_template_directory() ) . 'inc/demo.php';

if ( defined( 'ELEMENTOR_VERSION' ) ) {
	// Load Elementor.
	require_once trailingslashit( get_template_directory() ) . 'inc/et-custom.php';
	require_once trailingslashit( get_template_directory() ) . 'inc/elementor.php';
}
