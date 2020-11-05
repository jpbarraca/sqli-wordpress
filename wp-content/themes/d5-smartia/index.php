<?php 
/* 	Smartia Theme's Index Page to hsow Blog Posts
	Copyright: 2012-2017, D5 Creation, www.d5creation.com
	Based on the Simplest D5 Framework for WordPress
	Since Smartia 2.0
*/

get_header(); ?>
<div id="content">
<?php if (have_posts()) : while (have_posts()) : the_post();?>
<div <?php post_class(); ?> id="post-<?php the_ID(); ?>">
 <h2 class="post-title"><a href="<?php the_permalink(); ?>"><?php the_title();?></a></h2>
 <?php echo  __('Posted by', 'd5-smartia'); ?>: <b><?php the_author_posts_link() ?></b> | <?php echo  __('Posted on', 'd5-smartia'); ?>: <b><?php the_time('F j, Y'); ?></b>
 <div class="entrytext"><?php the_post_thumbnail(); ?>
 <?php d5smartia_content(); ?>
 <div class="clear"> </div>
 <?php  wp_link_pages( array( 'before' => '<div class="page-link"><span>' . __('Pages', 'd5-smartia'). ': </span>', 'after' => '</div>' ) ); ?>
 <div class="postmetadata"><?php echo  __('Posted in', 'd5-smartia'); ?> <?php the_category(', ') ?> | <?php edit_post_link(__('Edit','d5-smartia'), '', ' | '); ?>  <?php comments_popup_link(__('No Comments', 'd5-smartia') . ' &#187;', __('One Comment', 'd5-smartia') . ' &#187;', '% ' . __('Comments', 'd5-smartia') . ' &#187;'); ?> <?php the_tags('<br />' .  __('Tags', 'd5-smartia') . ': ', ', ', '<br />'); ?></div>
 </div></div>
 <div class="content-ver-sep"></div><br />
 <?php endwhile; ?>

<div id="page-nav">
<div class="alignleft"><?php previous_posts_link('&laquo;  ' . __('Previous Entries', 'd5-smartia') ) ?></div>
<div class="alignright"><?php next_posts_link(__('Next Entries', 'd5-smartia') .' &raquo;') ?></div>
</div>
  
 
 <?php else: ?>
 
 <h1 class="arc-post-title"><?php  _e('Sorry, we could not find anything that matched your search.','d5-smartia'); ?></h1>
		
		<h3 class="arc-src"><span><?php _e('You Can Try Another Search...','d5-smartia'); ?></span></h3>
		<?php get_search_form(); ?>
		<p><a href="<?php echo home_url(); ?>" title="<?php _e('Browse the Home Page', 'd5-smartia'); ?>">&laquo; <?php _e('Or Return to the Home Page', 'd5-smartia'); ?></a></p><br /><br />
		 
<?php endif; ?>
 
</div>

<?php get_sidebar(); ?>
<?php get_footer(); ?>