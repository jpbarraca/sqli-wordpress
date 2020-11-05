<?php

/* 	Smartia Theme's Header
	Copyright: 2012-2017, D5 Creation, www.d5creation.com
	Based on the Simplest D5 Framework for WordPress
	Since Smartia 2.0
*/
?><!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
<meta charset="<?php bloginfo( 'charset' ); ?>" />
<meta name="viewport" content="width=device-width" />
<link rel="profile" href="http://gmpg.org/xfn/11" />
<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>" />
<?php
wp_head(); ?>
</head>
<body <?php body_class(); ?> >
<div id="site-container">
	<div id ="header">
		<div id="top-menu-con" class="box100">
			<div id="top-menu-items" class="box90 flexcenteralign">
				<?php if(has_nav_menu('top-menu')): ?><nav id="top-menu" class="flexcenter"><?php wp_nav_menu( array( 'theme_location' => 'top-menu' )); ?></nav><?php endif; 
				$contactn = d5smartia_get_option('contactnumber', '012-345-6789');
				$extranum = d5smartia_get_option('extra-num', 'info@example.com');
				if ($contactn):?><div class="connumber flexcenter"><?php echo  esc_html($contactn); ?></div><?php  endif;	
				if ($extranum): ?><div class="extranumber flexcenter"><?php echo esc_html($extranum); ?></div><?php endif;
				?>			
				<?php get_search_form(); ?>
				<div id="social" class="flexcenter">
					<?php
						$fblink = d5smartia_get_option('fb_link', '#');
						$twlink = d5smartia_get_option('tw_link', '#');
						$linlink = d5smartia_get_option('lin_link', '#');
						$ytubelink = d5smartia_get_option('ytube_link', '#');
						$bloglink = d5smartia_get_option('blog_link', '#');
						if($fblink) echo '<a href="'.esc_url($fblink) .'" class="social-link fb-link" target="_blank"></a>';
						if($twlink) echo '<a href="'.esc_url($twlink) .'" class="social-link tw-link" target="_blank"></a>';
						if($linlink) echo '<a href="'.esc_url($linlink) .'" class="social-link lin-link" target="_blank"></a>';
						if($ytubelink) echo '<a href="'.esc_url($ytubelink) .'" class="social-link ytube-link" target="_blank"></a>';
						if($bloglink) echo '<a href="'.esc_url($bloglink) .'" class="social-link blog-link" target="_blank"></a>';
					?>				
				</div>
			</div>
		</div>        
      	<div id ="header-content" class="box90">
      		<div id="bannerleftad" class="bannerad">
      			<img src="<?php echo esc_url(d5smartia_get_option('adcodel',get_template_directory_uri() . '/images/bannerad.jpg')); ?>" />
      		</div>
      		<!-- Site Titele and Description Goes Here -->
			<div id="titledes">     		
        		<a class="logotitle" href="<?php echo esc_url( home_url( '/' ) ); ?>"><?php if ( get_header_image() !='' ): ?><img class="site-logo" src="<?php header_image(); ?>"/><?php else: ?><h1 class="site-title"><?php echo bloginfo( 'name' ); ?></h1><?php endif; ?></a>     
				<h2 class="site-title-des"><?php bloginfo( 'description' ); ?>
     		</div>
      		<div id="bannerrightad" class="bannerad">
      			<img src="<?php echo esc_url(d5smartia_get_option('adcoder',get_template_directory_uri() . '/images/bannerad.jpg')); ?>" />
      		</div>        
       	</div><!-- header-content -->
              
        <!-- Site Main Menu Goes Here -->
        <div id="mobile-menu"><?php echo __('Main Menu','d5-smartia'); ?></div>         
        <nav id="main-menu-con">
			<?php if ( has_nav_menu( 'main-menu' ) ) :  wp_nav_menu( array( 'theme_location' => 'main-menu', 'menu_class' => 'main-menu-items' )); else: wp_page_menu(); endif; ?>
        </nav>
        <div class="clear"></div>
      
      </div><!-- header -->
      <div class="clear"></div>
      
<div id="slide-container" class="slideback box100 smartsld"><div id="slideandshadow" class="slidesize box100"><div id="slidecon" class="smartslider"><div class="box_skitter box_skitter_large"><ul> <?php foreach (range(1, 3) as $sinumber) { ?><li><img src="<?php echo esc_url(d5smartia_get_option('slide-image-' . $sinumber,  get_template_directory_uri() . '/images/slides/(' . $sinumber . ').jpg')); ?>" class="fade" /></a><div class="label_text"><?php echo '<h3>' . esc_textarea(d5smartia_get_option('slide-image-' . $sinumber . '-title', 'Slide Image ' . $sinumber .' Title | Welcome to D5 Smartia Theme, Visit D5 Creation for Details')). '</h3>'; echo esc_textarea(d5smartia_get_option('slide-image-' . $sinumber . '-description', 'You can use D5 Smartia for Black and White looking Smart Blogging, Personal or Corporate Websites.  This is a Sample Description and you can change these from Samrtia Options')); ?></div></li>
<?php } ?></ul></div ></div ></div > <!-- slide --></div> <!-- slide-container -->
<div class="clear"></div>

<div id="container">