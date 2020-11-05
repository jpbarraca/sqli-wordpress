<?php
/**
 * Custom admin page
 *
 * @package Best_Hotel
 */

/**
 * Register custom admin page.
 *
 * @since 1.0.0
 */
function best_hotel_admin_menu_page() {
	$theme = wp_get_theme( get_template() );

	add_theme_page(
		esc_html__( 'Theme Info', 'best-hotel' ),
		esc_html__( 'Theme Info', 'best-hotel' ),
		'manage_options',
		'best-hotel',
		'best_hotel_render_admin_page'
	);
}

add_action( 'admin_menu', 'best_hotel_admin_menu_page' );

/**
 * Render admin page.
 *
 * @since 1.0.0
 */
function best_hotel_render_admin_page() {
	$theme = wp_get_theme( get_template() );
	?>
	<div class="wrap lt-wrap">
		<h1><?php echo esc_html( $theme->display( 'Name' ) ); ?></h1>
		<div class="row-half">
			<div class="col item-details">
				<?php echo wp_kses_post( $theme->display( 'Description' ) ); ?>
				<p><?php esc_html_e( 'Version', 'best-hotel' ); ?>:&nbsp;<?php echo esc_html( $theme->display( 'Version' ) ); ?></p>
			</div><!-- .col -->
			<div class="col item-img">
				<a href="<?php echo esc_url( $theme->display( 'ThemeURI' ) ); ?>" target="_blank"><img src="<?php echo esc_url( $theme->get_screenshot() ); ?>" alt="<?php echo esc_attr( $theme->display( 'Name' ) ); ?>" /></a>
			</div><!-- .col -->
		</div><!-- .row-half -->

		<div class="row-quarter">
			<div class="col">
				<h3><i class="dashicons dashicons-admin-customizer"></i><?php esc_html_e( 'Theme Options', 'best-hotel' ); ?></h3>
				<p><?php esc_html_e( 'Theme uses Customizer API for theme options which will help you preview your changes live and fast.', 'best-hotel' ); ?></p>
				<p><a class="button button-primary" href="<?php echo esc_url( wp_customize_url() ); ?>" ><?php esc_html_e( 'Customize', 'best-hotel' ); ?></a></p>
			</div><!-- .col -->

			<div class="col">
				<h3><i class="dashicons dashicons-book-alt"></i><?php esc_html_e( 'Plugins', 'best-hotel' ); ?></h3>
				<p><?php esc_html_e( 'Theme is powered by Elementor page builder plugin and smoothly integrates Advanced Booking Calender.', 'best-hotel' ); ?></p>
				<p><a class="button button-primary" href="<?php echo esc_url( admin_url( 'themes.php?page=tgmpa-install-plugins') ); ?>"><?php esc_html_e( 'Install Plugins', 'best-hotel' ); ?></a></p>
			</div><!-- .col -->

			<div class="col">
				<h3><i class="dashicons dashicons-admin-network"></i><?php esc_html_e( 'Demo Content', 'best-hotel' ); ?></h3>
				<p><?php esc_html_e( 'To import demo content, One Click Demo Import plugin should be installed and activated. Demo content files can be downloaded from our site.', 'best-hotel' ); ?></p>
				<p><a href="https://lumberthemes.com/themes/best-hotel/" target="_blank"><?php esc_html_e( 'Visit Page', 'best-hotel' ); ?></a></p>
			</div><!-- .col -->

			<div class="col">
				<h3><i class="dashicons dashicons-sos"></i><?php esc_html_e( 'Help &amp; Support', 'best-hotel' ); ?></h3>
				<p><?php esc_html_e( 'If you have any question/feedback regarding theme, please post in the support forum.', 'best-hotel' ); ?></p>
				<p><a href="https://wordpress.org/support/theme/best-hotel/" target="_blank"><?php esc_html_e( 'Get Support', 'best-hotel' ); ?></a></p>
			</div><!-- .col -->

		</div><!-- .row-quarter -->
	</div><!-- .lt-wrap -->
	<?php
}

/**
 * Load admin scripts and styles.
 *
 * @since 1.0.0
 *
 * @param string $hook Page hook.
 */
function best_hotel_load_admin_scripts( $hook ) {
	if ( 'appearance_page_best-hotel' === $hook ) {
		$min = defined( 'SCRIPT_DEBUG' ) && SCRIPT_DEBUG ? '' : '.min';
		wp_enqueue_style( 'best-hotel-admin', get_template_directory_uri() . '/css/admin-page' . $min . '.css', false, BEST_HOTEL_VERSION );
	}
}

add_action( 'admin_enqueue_scripts', 'best_hotel_load_admin_scripts' );
