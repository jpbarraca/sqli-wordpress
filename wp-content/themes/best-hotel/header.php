<?php
/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Best_Hotel
 */

?>
<!doctype html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="profile" href="https://gmpg.org/xfn/11">
	<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
<?php
if ( function_exists( 'wp_body_open' ) ) {
	wp_body_open();
}
?>
<div id="page" class="site">
	<a class="skip-link screen-reader-text" href="#content"><?php esc_html_e( 'Skip to content', 'best-hotel' ); ?></a>

	<?php

	$enable_transparent_header = get_post_meta( absint( get_the_ID() ), 'enable_transparent_header', true );

	if( ( 'checked' === $enable_transparent_header ) ){
		$header_class = 'site-header transparent-header-enabled';
	}else{
		$header_class = 'site-header';
	} ?>

	<header id="masthead" class="<?php echo esc_attr( $header_class ); ?>">
		<div class="container">
			<div class="head-wrap">
				<div class="site-branding">
					<?php the_custom_logo(); ?>

					<?php
					$show_site_title   = best_hotel_get_option( 'show_site_title' );
					$show_site_tagline = best_hotel_get_option( 'show_site_tagline' );
					?>

					<?php if ( true === $show_site_title ) : ?>
						<?php if ( is_front_page() && is_home() ) : ?>
							<h1 class="site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></h1>
						<?php else : ?>
							<p class="site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></p>
						<?php endif; ?>
					<?php endif; ?>

					<?php if ( true === $show_site_tagline ) : ?>
						<?php
						$best_hotel_description = get_bloginfo( 'description', 'display' );
						if ( $best_hotel_description || is_customize_preview() ) :
							?>
							<p class="site-description"><?php echo $best_hotel_description; /* WPCS: xss ok. */ ?></p>
						<?php endif; ?>
					<?php endif; ?>
				</div><!-- .site-branding -->

				<div class="navigation-wrap">
					<button class="menu-toggle" aria-controls="main-navigation" aria-expanded="false" type="button">
						<span aria-hidden="true"><?php _e( 'Menu', 'best-hotel' ); ?></span>
						<span class="ticon" aria-hidden="true"></span>
					</button>

					<nav id="main-navigation" class="site-navigation primary-navigation" role="navigation">
						<?php
						wp_nav_menu( array(
							'theme_location' => 'menu-1',
							'container' => 'ul',
							'menu_id' => 'primary-menu',
							'menu_class' => 'primary-menu menu',
						) );
						?>
					</nav><!-- .site-navigation -->

					<?php
					$book_button_text = best_hotel_get_option( 'book_button_text' );
					$book_button_url  = best_hotel_get_option( 'book_button_url' );
					?>
					<?php if ( ! empty( $book_button_text ) && ! empty( $book_button_url ) ) : ?>
						<a href="<?php echo esc_url( $book_button_url ); ?>" class="branding-button"><?php echo esc_html( $book_button_text ); ?></a>
					<?php endif; ?>
				</div>
			</div>
		</div> <!-- .container -->

	</header><!-- #masthead -->

	<?php

	if (  !is_page_template('elementor_header_footer') ) {
		$banner = get_header_image();
		$banner_title = apply_filters( 'best_hotel_filter_banner_title', '' );
		$header_style = '';

		if ( ! empty( $banner ) ) {
			$header_style= 'background-image:url(' . esc_url( $banner ) . ')';
		}

		$extra_class = '';

		if ( is_page_template( 'tpl-room.php' ) && get_the_post_thumbnail_url( get_the_ID(), 'large' ) ) {
			$extra_class = 'room-image-enabled';
		}
		?>

		<div id="custom-header" style="<?php echo esc_attr( $header_style ); ?>" class="<?php echo esc_attr( $extra_class ); ?>">
			<?php if ( ! empty( $banner_title ) ) : ?>
				<div class="container"><h1 class="page-title"><?php echo esc_html( $banner_title ); ?></h1></div>
			<?php endif; ?>
		</div><!-- #custom-header -->

		<?php if ( is_page_template( 'tpl-room.php' ) ): ?>
			<?php
			$current_page_id = get_the_ID();
			$image_url = get_the_post_thumbnail_url( $current_page_id, 'large' );
			?>
			<?php if ( $image_url ) : ?>
				<div id="room-featured">
					<div class="container">
						<img src="<?php echo esc_url( $image_url ); ?>" alt="<?php the_title_attribute(); ?>" />
					</div><!-- .container -->
				</div><!-- #room-featured -->
			<?php endif; ?>
		<?php endif; ?>

	<?php } ?>

	<div id="content" class="site-content">

		<?php if( ! is_page_template('elementor_header_footer') ){ ?>

			<div class="container">

			<div class="inner-wrapper">

		<?php  }
