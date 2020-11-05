<?php

/* 	Smartia Theme's Single Page to display Single Page or Post
	Copyright: 2012-2017, D5 Creation, www.d5creation.com
	Based on the Simplest D5 Framework for WordPress
	Since Smartia 2.0
*/


get_header(); ?>
<div id="content">
          
		  <?php if ( have_posts() ) while ( have_posts() ) : the_post(); ?>
          
            <h1 class="page-title"><?php the_title(); ?></h1>
             <?php _e('Posted by','d5-smartia'); ?>: <b><?php the_author_posts_link() ?></b> | <?php _e('Posted on','d5-smartia'); ?>: <b><?php the_time('F j, Y'); ?></b>
 			<div class="entrytext"><?php the_post_thumbnail(); ?>
 			<?php d5smartia_content(); ?>
 			<div class="clear"> </div>
 			<?php  wp_link_pages( array( 'before' => '<div class="page-link"><span>' . __('Pages','d5-smartia'). ': </span>', 'after' => '</div>' ) ); ?>
 			<div class="postmetadata"><?php _e('Posted in','d5-smartia'); ?> <?php the_category(', ') ?> | <?php edit_post_link(__('Edit','d5-smartia'), '', ' | '); ?>  <?php comments_popup_link(__('No Comments','d5-smartia') . ' &#187;', __('One Comment','d5-smartia') . ' &#187;', '% ' . __('Comments','d5-smartia') . ' &#187;'); ?> <?php the_tags('<br />' .  __('Tags','d5-smartia') . ': ', ', ', '<br />'); ?></div>
 			</div>
 			<br />
			<div class="floatleft"><?php previous_post_link('&laquo; %link'); ?></div>
			<div class="floatright"><?php next_post_link('%link &raquo;'); ?></div><br /><br />
            <?php if ( is_attachment() ): ?>
            <div class="floatleft"><?php previous_image_link( false, '&laquo; ' . __('Previous Image','d5-smartia') ); ?></div>
			<div class="floatright"><?php next_image_link( false,  __('Next Image','d5-smartia') . ' &raquo;' ); ?></div> 
            <?php endif; ?>
          	<div class="content-ver-sep"></div><br />
			<?php endwhile;?>
          	            
          <!-- End the Loop. -->          
        	
			<?php if (d5smartia_get_option ('cpost', '' ) != '1' ): comments_template('', true); endif;?>
            
</div>			
<?php get_sidebar(); ?>
<?php get_footer(); ?>