<?php 
/* 	Smartia Theme's Archive Page
	Copyright: 2012-2017, D5 Creation, www.d5creation.com
	Based on the Simplest D5 Framework for WordPress
	Since Smartia 2.0
*/

get_header(); ?>

<div id="content">
	<?php if (have_posts()) : ?>
		<?php $post = $posts[0]; // Hack. Set $post so that the_date() works. ?>
		<?php /* If this is a category archive */ if (is_category()) { ?>
		<h1 class="arc-post-title"><?php single_cat_title(); ?></h1><h3 class="arc-src"><?php _e('now browsing by category','d5-smartia'); ?></h3>
		<?php if(trim(category_description()) != "<br />" && trim(category_description()) != '') { ?>
		<div id="description"><?php echo category_description(); ?></div>
		<?php }?>
		<div class="clear">&nbsp;</div>
		<?php /* If this is a tag archive */ } elseif( is_tag() ) { ?>
		<h1 class="arc-post-title"><?php single_tag_title(); ?></h1><h3 class="arc-src"><?php _e('now browsing by tag','d5-smartia'); ?></h3>
		<div class="clear">&nbsp;</div>
		<div class="tagcloud"><?php wp_tag_cloud(''); ?></div>
		<div class="clear">&nbsp;</div>
		<?php /* If this is a daily archive */ } elseif (is_day()) { ?>
		<h1 class="arc-post-title"><?php echo get_the_date('l, F jS, Y'); ?></h1><h3 class="arc-src"><?php _e('now browsing by day','d5-smartia'); ?></h3>
		<div class="clear">&nbsp;</div>
		<?php /* If this is a monthly archive */ } elseif (is_month()) { ?>
		<h1 class="arc-post-title"><?php echo get_the_date('F, Y'); ?></h1><h3 class="arc-src"><?php _e('now browsing by month','d5-smartia'); ?></h3>
		<div class="clear">&nbsp;</div>
		<?php /* If this is a yearly archive */ } elseif (is_year()) { ?>
		<h1 class="arc-post-title"><?php echo get_the_date('Y'); ?></h1><h3 class="arc-src"><?php _e('now browsing by year','d5-smartia'); ?></h3>
		<div class="clear">&nbsp;</div>
		<?php /* If this is an author archive */ } elseif (is_author()) { ?>
		<h1 class="arc-post-title">Archives</h1><h3 class="arc-src"><?php _e('now browsing by author','d5-smartia'); ?></h3>
		<div class="clear">&nbsp;</div>
		<?php /* If this is a paged archive */ } elseif (isset($_GET['paged']) && !empty($_GET['paged'])) { ?>
		<h1 class="arc-post-title">Archives</h1><h3 class="arc-src"><?php _e('now browsing the general archives','d5-smartia'); ?></h3>
 	 	<?php } ?>

		<?php while (have_posts()) : the_post(); ?>
		
			<div <?php post_class(); ?>>
				<?php _e('Posted by','d5-smartia'); ?>: <b><?php the_author_posts_link() ?></b> | <?php _e('Posted on','d5-smartia'); ?>: <b><?php the_time('F j, Y'); ?></b>
                <h2 class="post-title"><a href="<?php the_permalink(); ?>"><?php the_title();?></a></h2>
				<div class="content-ver-sep"> </div>	
				<div class="entrytext"><?php the_post_thumbnail('thumbnail'); ?>
  <?php d5smartia_content(); ?>
				</div>
				<div class="clear"> </div>
                <div class="up-bottom-border">
				<p class="postmetadata"><?php _e('Posted in','d5-smartia'); ?> <?php the_category(', ') ?> | <?php edit_post_link(__('Edit','d5-smartia'), '', ' | '); ?>  <?php comments_popup_link(__('No Comments','d5-smartia') . ' &#187;', __('One Comment','d5-smartia') . ' &#187;', '% ' . __('Comments','d5-smartia') . ' &#187;'); ?> <?php the_tags('<br />' .  __('Tags','d5-smartia') . ': ', ', ', '<br />'); ?></p>
				</div>
            
		                
                </div><!--close post class-->
	
		<?php endwhile; ?>
			
	<div id="page-nav">
	<div class="alignleft"><?php previous_posts_link('&laquo;  ' . __('Previous Entries','d5-smartia') ) ?></div>
	<div class="alignright"><?php next_posts_link(__('Next Entries','d5-smartia') .' &raquo;') ?></div>
	</div>

	<?php else : ?>

		<h1 class="arc-post-title"><?php  _e('Sorry, we could not find anything that matched your search.','d5-smartia'); ?></h1>
		
		<h3 class="arc-src"><span><?php _e('You Can Try Another Search...','d5-smartia'); ?></span></h3>
		<?php get_search_form(); ?>
		<p><a href="<?php echo home_url(); ?>" title="<?php _e('Browse the Home Page', 'd5-smartia'); ?>">&laquo; <?php _e('Or Return to the Home Page', 'd5-smartia'); ?></a></p><br /><br />
		<div class="content-ver-sep"></div><br />

	<?php endif; ?>

</div><!--close content id-->

<?php get_sidebar(); ?>

<?php get_footer(); ?>

