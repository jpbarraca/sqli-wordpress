<?php
/* Smartia Theme's Footer Sidebar Area
	Copyright: 2012-2017, D5 Creation, www.d5creation.com
	Based on the Simplest D5 Framework for WordPress
	Since Smartia 2.0
*/

	if (   ! is_active_sidebar( 'sidebar-3'  )
		&& ! is_active_sidebar( 'sidebar-4' )
		&& ! is_active_sidebar( 'sidebar-5'  )
		&& ! is_active_sidebar( 'sidebar-6'  )
	)
		return;
		
	// If we get this far, we have widgets. Let do this.
?>
<div id="footer-sidebar" class="box90">
	<div id="footer-widgets">
		<div class="footer-widget"><?php if ( is_active_sidebar( 'sidebar-3' ) ) : dynamic_sidebar( 'sidebar-3' ); endif; ?></div>
		<div class="footer-widget"><?php if ( is_active_sidebar( 'sidebar-4' ) ) : dynamic_sidebar( 'sidebar-4' ); endif; ?></div>
		<div class="footer-widget"><?php if ( is_active_sidebar( 'sidebar-5' ) ) : dynamic_sidebar( 'sidebar-5' ); endif; ?></div>
		<div class="footer-widget"><?php if ( is_active_sidebar( 'sidebar-6' ) ) : dynamic_sidebar( 'sidebar-6' ); endif; ?></div>
	</div>
</div><!-- #footerwidget -->