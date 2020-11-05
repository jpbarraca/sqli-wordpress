<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Best_Hotel
 */

?>
	<?php if( !is_page_template('elementor_header_footer') ){ ?>
		</div> <!-- .inner-wrapper -->
		</div> <!-- .container -->
	<?php } ?>
	</div><!-- #content -->

	<footer id="colophon" class="site-footer">
		<div class="container">
			<?php if( has_custom_logo() || has_nav_menu('menu-2') ){ ?>
			<div class="footer-up">
				<div class="footer-up-content">
					<?php if( has_custom_logo() ){ ?>
						<div class="footer-logo">
							<?php the_custom_logo(); ?>
						</div>
					<?php } ?>

					<?php
					wp_nav_menu( array(
						'theme_location' => 'menu-2',
						'depth'          => 1,
						'menu_id'        => 'footer-menu',
						'container'      => 'div',
						'container_id'   => 'footer-navigation',
						'fallback_cb'    => false,
					) );
					?>
				</div>
			</div>

			<?php } ?>

			<?php get_template_part( 'template-parts/footer-widgets' ); ?>
		</div>

		<div class="footer-site-info">
			<div class="container">
				<?php $copyright_message = best_hotel_get_option( 'copyright_message' ); ?>
				<?php if ( ! empty( $copyright_message ) ) : ?>
					<div class="credits">
						<?php echo wp_kses_post( $copyright_message ); ?>
					</div><!-- .credits -->
				<?php endif; ?>

				<?php
				$powered_message = esc_html__( 'Powered by WordPress', 'best-hotel' ) . ' | ' . sprintf( esc_html__( 'Theme: Best Hotel by %1$sLumber Themes%2$s', 'best-hotel' ), '<a href="https://lumberthemes.com/">', '</a>' );
				?>
				<?php if ( ! empty( $powered_message ) ) : ?>
					<div class="site-info">
						<?php echo wp_kses_post( $powered_message ); ?>
					</div><!-- .site-info -->
				<?php endif; ?>
			</div>
		</div>
	</footer><!-- #colophon -->
</div><!-- #page -->

<a href="#page" class="scrollup" id="btn-scrollup">&#8593;</a>
<?php wp_footer(); ?>

</body>
</html>
