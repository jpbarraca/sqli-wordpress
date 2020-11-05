<?php
/* 	Smartia Theme's General Page to display all Pages
	Copyright: 2012-2017, D5 Creation, www.d5creation.com
	Based on the Simplest D5 Framework for WordPress
	Since Smartia 2.0
*/

 get_header(); ?>


	<div id="content">

		<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
		<div <?php post_class(); ?> id="post-<?php the_ID(); ?>">
		<?php if (!is_front_page()): ?><h1 class="page-title"><?php the_title(); ?></h1><?php endif; ?>
			<div class="entrytext">
 	<?php if (d5smartia_get_option('tpage', '1') != '1' ): ?><div class="thumb"><?php the_post_thumbnail(); ?></div><?php endif; ?>
 	<?php d5smartia_content(); ?>

	<?php wp_link_pages(array('before' => '<p><strong>' . __('Pages','d5-smartia'). ': </strong> ', 'after' => '</p>', 'next_or_number' => 'number')); ?>

			</div>
		</div>
        <?php endwhile; ?><div class="clear"> </div>
	<?php edit_post_link('Edit', '<p>', '</p>'); ?>
	<?php if (d5smartia_get_option ('cpage', '' ) != '1' ): comments_template('', true); endif;?>
	<?php else: ?>
		<p><?php _e('Sorry, no pages matched your criteria.','d5-smartia'); ?></p>
	<?php endif; ?>
	</div>

<?php get_sidebar(); ?>

<?php get_footer(); ?>