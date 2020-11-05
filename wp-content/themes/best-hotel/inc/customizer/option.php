<?php
/**
 * Theme Options
 *
 * @package Best_Hotel
 */

$default = best_hotel_get_default_theme_options();

// Add Panel.
$wp_customize->add_panel(
	'theme_option_panel',
	array(
		'title'    => esc_html__( 'Theme Options', 'best-hotel' ),
		'priority' => 100,
	)
);

// Header Section.
$wp_customize->add_section(
	'section_header',
	array(
		'title' => esc_html__( 'Header Options', 'best-hotel' ),
		'panel' => 'theme_option_panel',
	)
);

// Setting show_site_title.
$wp_customize->add_setting(
	'theme_options[show_site_title]',
	array(
		'default'           => $default['show_site_title'],
		'sanitize_callback' => 'best_hotel_sanitize_checkbox',
	)
);
$wp_customize->add_control(
	'theme_options[show_site_title]',
	array(
		'label'   => esc_html__( 'Show Site Title', 'best-hotel' ),
		'section' => 'section_header',
		'type'    => 'checkbox',
	)
);

// Setting show_site_tagline.
$wp_customize->add_setting(
	'theme_options[show_site_tagline]',
	array(
		'default'           => $default['show_site_tagline'],
		'sanitize_callback' => 'best_hotel_sanitize_checkbox',
	)
);
$wp_customize->add_control(
	'theme_options[show_site_tagline]',
	array(
		'label'   => esc_html__( 'Show Site Tagline', 'best-hotel' ),
		'section' => 'section_header',
		'type'    => 'checkbox',
	)
);

// Setting book_button_text.
$wp_customize->add_setting(
	'theme_options[book_button_text]',
	array(
		'default'           => $default['book_button_text'],
		'sanitize_callback' => 'sanitize_text_field',
	)
);
$wp_customize->add_control(
	'theme_options[book_button_text]',
	array(
		'label'   => esc_html__( 'Book Button Text', 'best-hotel' ),
		'section' => 'section_header',
		'type'    => 'text',
	)
);

// Setting book_button_url.
$wp_customize->add_setting(
	'theme_options[book_button_url]',
	array(
		'default'           => $default['book_button_url'],
		'sanitize_callback' => 'esc_url_raw',
	)
);
$wp_customize->add_control(
	'theme_options[book_button_url]',
	array(
		'label'   => esc_html__( 'Book Button URL', 'best-hotel' ),
		'section' => 'section_header',
		'type'    => 'text',
	)
);

// Blog Section.
$wp_customize->add_section(
	'section_blog',
	array(
		'title' => esc_html__( 'Blog Options', 'best-hotel' ),
		'panel' => 'theme_option_panel',
	)
);

// Setting blog_title.
$wp_customize->add_setting(
	'theme_options[blog_title]',
	array(
		'default'           => $default['blog_title'],
		'sanitize_callback' => 'sanitize_text_field',
	)
);
$wp_customize->add_control(
	'theme_options[blog_title]',
	array(
		'label'   => esc_html__( 'Blog Title', 'best-hotel' ),
		'section' => 'section_blog',
		'type'    => 'text',
	)
);

// Setting show_content.
$wp_customize->add_setting(
	'theme_options[show_content]',
	array(
		'default'           => $default['show_content'],
		'sanitize_callback' => 'best_hotel_sanitize_select',
	)
);
$wp_customize->add_control(
	'theme_options[show_content]',
	array(
		'label'   => esc_html__( 'Show Content', 'best-hotel' ),
		'section' => 'section_blog',
		'type'    => 'select',
		'choices'  => array(
			'short' => esc_html__( 'Excerpt', 'best-hotel' ),
			'full'  => esc_html__( 'Full', 'best-hotel' ),
		),
	)
);

// Setting excerpt_length.
$wp_customize->add_setting(
	'theme_options[excerpt_length]',
	array(
		'default'           => $default['excerpt_length'],
		'sanitize_callback' => 'absint',
	)
);
$wp_customize->add_control(
	'theme_options[excerpt_length]',
	array(
		'label'   => esc_html__( 'Excerpt Length', 'best-hotel' ),
		'section' => 'section_blog',
		'type'    => 'text',
	)
);

// Setting read_more_text.
$wp_customize->add_setting(
	'theme_options[read_more_text]',
	array(
		'default'           => $default['read_more_text'],
		'sanitize_callback' => 'sanitize_text_field',
	)
);
$wp_customize->add_control(
	'theme_options[read_more_text]',
	array(
		'label'   => esc_html__( 'Read More Text', 'best-hotel' ),
		'section' => 'section_blog',
		'type'    => 'text',
	)
);

// Footer Section.
$wp_customize->add_section(
	'section_footer',
	array(
		'title' => esc_html__( 'Footer Options', 'best-hotel' ),
		'panel' => 'theme_option_panel',
	)
);

// Setting copyright_message.
$wp_customize->add_setting(
	'theme_options[copyright_message]',
	array(
		'default'           => $default['copyright_message'],
		'sanitize_callback' => 'best_hotel_sanitize_textarea_content',
	)
);
$wp_customize->add_control(
	'theme_options[copyright_message]',
	array(
		'label'   => esc_html__( 'Copyright Text', 'best-hotel' ),
		'section' => 'section_footer',
		'type'    => 'textarea',
	)
);

// Color Section.
$wp_customize->add_section(
	'section_color',
	array(
		'title' => esc_html__( 'Color Options', 'best-hotel' ),
		'panel' => 'theme_option_panel',
	)
);

$color_defaults = best_hotel_get_default_colors();
$color_options = best_hotel_get_color_theme_settings_options();

if ( ! empty( $color_options )) {
	foreach ( $color_options as $key => $col ) {
		$wp_customize->add_setting(
			'theme_options[' . $key . ']',
			array(
				'default'           => $color_defaults[ $key ],
				'sanitize_callback' => 'sanitize_hex_color',
			)
		);
		$wp_customize->add_control(
			'theme_options[' . $key . ']',
			array(
				'label'   => $col['label'],
				'section' => 'section_color',
				'type'    => 'color',
				'settings' => 'theme_options[' . $key . ']',
			)
		);
	}
}

