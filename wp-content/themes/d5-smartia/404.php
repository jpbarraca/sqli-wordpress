<?php

/* 	Smartia Theme's 404 Error Page
	Copyright: 2012-2017, D5 Creation, www.d5creation.com
	Based on the Simplest D5 Framework for WordPress
	Since Smartia 2.0
*/

get_header(); ?>

<h1 class="page-title"><?php _e('Not Found', 'd5-smartia'); ?></h1>
<h3 class="arc-src"><span><?php _e('Apologies, but the page you requested could not be found. Perhaps searching will help.', 'd5-smartia'); ?></span></h3>

<?php get_search_form(); ?>
<p><a href="<?php echo home_url(); ?>" title="<?php _e('Browse the Home Page', 'd5-smartia'); ?>">&laquo; <?php _e('Or Return to the Home Page', 'd5-smartia'); ?></a></p><br /><br />

<?php get_footer(); ?>