<?php
/* 	Smartia Theme's Functions
	Copyright: 2012-2017, D5 Creation, www.d5creation.com
	Based on the Simplest D5 Framework for WordPress
	Since Smartia 2.0
*/  

function d5smartia_setup() {
	register_nav_menus( array( 'main-menu' => __('Main Menu','d5-smartia' ), 'top-menu' => __('Top Menu','d5-smartia' ) ) );
//	Set the content width based on the theme's Smartia and stylesheet.
	load_theme_textdomain( 'd5-smartia', get_template_directory() . '/languages' );	
	global $content_width;
	if ( ! isset( $content_width ) ) $content_width = 600;


// Load the D5 Framework Optios Page
	require_once ( trailingslashit(get_template_directory()) . 'inc/customize.php' );
	
	function d5smartia_about_page() { 
	add_theme_page( 'Smartia Options', 'Smartia Options', 'edit_theme_options', 'theme-about', 'd5smartia_theme_about' ); 
	}
	add_action('admin_menu', 'd5smartia_about_page');
	function d5smartia_theme_about() {  require_once ( trailingslashit(get_template_directory()) . 'inc/theme-about.php' ); }

	add_theme_support( "title-tag" );
	
// 	Tell WordPress for the Feed Link
	add_editor_style();
	add_theme_support( 'automatic-feed-links' );
	
// 	This theme uses Featured Images (also known as post thumbnails) for per-post/per-page Custom Header images
	if ( function_exists( 'add_theme_support' ) ) { 
	add_theme_support( 'post-thumbnails' );
	set_post_thumbnail_size( 600, 200, true );
	}
	
	// 	WordPress 3.4 Custom Header Support				
	$d5smartia_custom_header = array(
	'default-image'          => '',
	//'default-image'          => get_template_directory_uri() . '/images/logo.png',
	'random-default'         => false,
	'width'                  => 300,
	'height'                 => 90,
	'flex-height'            => false,
	'flex-width'             => false,
	'default-text-color'     => '000000',
	'header-text'            => false,
	'uploads'                => false,
	'wp-head-callback' 		 => '',
	'admin-head-callback'    => '',
	'admin-preview-callback' => ''
	);
	add_theme_support( 'custom-header', $d5smartia_custom_header );
			
		
// 	WordPress 3.4 Custom Background Support	
	$d5smartia_custom_background = array(
	'default-color'          => 'FFFFFF',
	'default-image'          => get_template_directory_uri() . '/images/background.png'
	);
	add_theme_support( 'custom-background', $d5smartia_custom_background );
	}
	add_action( 'after_setup_theme', 'd5smartia_setup' );
	

// 	Functions for adding script
	function smartia_enqueue_scripts() {
	wp_enqueue_style('d5smartia-style', get_stylesheet_uri(), false );
	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) { wp_enqueue_script( 'comment-reply' ); 	}
		
	wp_enqueue_script( 'd5smartia-html5', get_template_directory_uri().'/js/html5.js'); 
    wp_script_add_data( 'd5smartia-html5', 'conditional', 'lt IE 9' );
	
	wp_enqueue_script( 'd5smartia-menu-style', get_template_directory_uri(). '/js/menu.js', array( 'jquery' ) );
	wp_register_style('d5smartia-gfonts1', '//fonts.googleapis.com/css?family=Carrois+Gothic', false );
	wp_enqueue_style('d5smartia-gfonts1');
	wp_enqueue_script( 'd5smartia_skitter-easing', get_template_directory_uri() . '/js/jquery.easing.1.3.js', array( 'jquery' ) );
	wp_enqueue_style ('d5smartia_skitter-style', get_template_directory_uri() . '/css/skitter.styles.css' );
	wp_enqueue_script( 'd5smartia_skitter-main', get_template_directory_uri() . '/js/jquery.skitter.js', array( 'jquery' ) );
	}
	add_action( 'wp_enqueue_scripts', 'smartia_enqueue_scripts' );
	
	// 	Functions for adding script to Admin Area
	function d5smartia_admin_style() { wp_enqueue_style( 'd5smartia_admin_css', get_template_directory_uri() . '/inc/admin-style.css', false ); }
	add_action( 'admin_enqueue_scripts', 'd5smartia_admin_style' );

// 	Functions for adding some custom code within the head tag of site
	function d5smartia_custom_code() {
	
?>
	
	<style type="text/css">
	.site-title a, 
	.site-title a:active, 
	.site-title a:hover {
	
	color: #<?php echo get_header_textcolor(); ?>;
	}
	</style>
	
	<?php 
	
	}
	
	add_action('wp_head', 'd5smartia_custom_code');

	
//	function tied to the excerpt_more filter hook.
	function d5smartia_excerpt_length( $length ) {
	global $d5smartiaExcerptLength;
	if ($d5smartiaExcerptLength) {
    return $d5smartiaExcerptLength;
	} else {
    return 50; //default value
    } }
	add_filter( 'excerpt_length', 'd5smartia_excerpt_length', 999 );
	
	function d5smartia_excerpt_more($more) {
       global $post;
	return '<a href="'. get_permalink($post->ID) . '" class="read-more">Read More ...</a>';
	}
	add_filter('excerpt_more', 'd5smartia_excerpt_more');

// Content Type Showing
	function d5smartia_content() {
	the_content('<span class="read-more">Read More ...</span>');
	}

//	Get our wp_nav_menu() fallback, wp_page_menu(), to show a home link
	function d5smartia_page_menu_args( $args ) {
	$args['show_home'] = true;
	return $args;
	}
	add_filter( 'wp_page_menu_args', 'd5smartia_page_menu_args' );


//	Registers the Widgets and Sidebars for the site
	function d5smartia_widgets_init() {

	register_sidebar( array(
		'name' => __('Primary Sidebar','d5-smartia'),
		'id' => 'sidebar-1',
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget' => "</aside>",
		'before_title' => '<h3 class="widget-title">',
		'after_title' => '</h3>',
	) );

	register_sidebar( array(
		'name' => __('Secondary Sidebar','d5-smartia'),
		'id' => 'sidebar-2',
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget' => "</aside>",
		'before_title' => '<h3 class="widget-title">',
		'after_title' => '</h3>',
	) );

	register_sidebar( array(
		'name' => __('Footer Area One','d5-smartia'),
		'id' => 'sidebar-3',
		'description' => __('An optional widget area for your site footer','d5-smartia'),
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget' => "</aside>",
		'before_title' => '<h3 class="widget-title">',
		'after_title' => '</h3>',
	) );

	register_sidebar( array(
		'name' => __('Footer Area Two','d5-smartia'),
		'id' => 'sidebar-4',
		'description' => __('An optional widget area for your site footer','d5-smartia'),
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget' => "</aside>",
		'before_title' => '<h3 class="widget-title">',
		'after_title' => '</h3>',
	) );

	register_sidebar( array(
		'name' => __('Footer Area Three','d5-smartia'),
		'id' => 'sidebar-5',
		'description' => __('An optional widget area for your site footer','d5-smartia'),
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget' => "</aside>",
		'before_title' => '<h3 class="widget-title">',
		'after_title' => '</h3>',
	) );
	
	register_sidebar( array(
		'name' => __('Footer Area Four','d5-smartia'),
		'id' => 'sidebar-6',
		'description' => __('An optional widget area for your site footer','d5-smartia'),
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget' => "</aside>",
		'before_title' => '<h3 class="widget-title">',
		'after_title' => '</h3>',
	) );
	}
	add_action( 'widgets_init', 'd5smartia_widgets_init' );
	
	add_filter('the_title', 'd5smartia_title');
	function d5smartia_title($title) {
        if ( '' == $title ) {
            return '(Untitled)';
        } else {
            return $title;
        }
    }
	
