<?php
namespace BestHotelElementorAddons\Widgets;

use Elementor\Widget_Base;
use Elementor\Controls_Manager;
use Elementor\Group_Control_Image_Size;

if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly

/**
 * Elementor Posts Grid
 *
 * @since 1.0.0
 */
class Posts_Grid extends Widget_Base {

	/**
	 * Retrieve the widget name.
	 *
	 * @since 1.0.0
	 *
	 * @access public
	 *
	 * @return string Widget name.
	 */
	public function get_name() {
		return 'posts-grid';
	}

	/**
	 * Retrieve the widget title.
	 *
	 * @since 1.0.0
	 *
	 * @access public
	 *
	 * @return string Widget title.
	 */
	public function get_title() {
		return esc_html__( 'Posts Grid', 'best-hotel' );
	}

	/**
	 * Retrieve the widget icon.
	 *
	 * @since 1.0.0
	 *
	 * @access public
	 *
	 * @return string Widget icon.
	 */
	public function get_icon() {
		return 'eicon-posts-ticker';
	}

	/**
	 * Retrieve the list of categories the widget belongs to.
	 *
	 * Used to determine where to display the widget in the editor.
	 *
	 * Note that currently Elementor supports only one category.
	 * When multiple categories passed, Elementor uses the first one.
	 *
	 * @since 1.0.0
	 *
	 * @access public
	 *
	 * @return array Widget categories.
	 */
	public function get_categories() {
		return [ 'theme-custom' ];
	}

	/**
	 * Retrieve the list of scripts the widget depended on.
	 *
	 * Used to set scripts dependencies required to run the widget.
	 *
	 * @since 1.0.0
	 *
	 * @access public
	 *
	 * @return array Widget scripts dependencies.
	 */
	public function get_script_depends() {
		return [];
	}

	/**
	 * Register the widget controls.
	 *
	 * Adds different input fields to allow the user to change and customize the widget settings.
	 *
	 * @since 1.0.0
	 *
	 * @access protected
	 */
	protected function _register_controls() {
		$this->start_controls_section(
			'section_content',
			[
				'label' => esc_html__( 'Content', 'best-hotel' ),
			]
		);

		$this->add_responsive_control(
			'columns',
			[
				'label' => __( 'Columns', 'best-hotel' ),
				'type' => Controls_Manager::SELECT,
				'default' => '3',
				'tablet_default' => '2',
				'mobile_default' => '1',
				'options' => [
					'1' => '1',
					'2' => '2',
					'3' => '3',
					'4' => '4',
				],
				'prefix_class' => 'elementor-grid%s-',
				'frontend_available' => true,
				'selectors' => [
					'.elementor-msie {{WRAPPER}} .elementor-portfolio-item' => 'width: calc( 100% / {{SIZE}} )',
				],
			]
		);

		$this->add_control(
			'posts_per_page',
			[
				'label' => __( 'Posts Per Page', 'best-hotel' ),
				'type' => Controls_Manager::NUMBER,
				'default' => 3,
			]
		);

		$this->add_group_control(
			Group_Control_Image_Size::get_type(),
			[
				'name'         => 'post_thumbnail',
				'exclude'      => [ 'custom' ],
				'default'      => 'large',
				'prefix_class' => 'post-thumbnail-size-',
			]
		);

		$this->add_control(
			'show_excerpt',
			[
				'label' => __( 'Excerpt', 'best-hotel' ),
				'type' => Controls_Manager::SWITCHER,
				'label_on' => __( 'Show', 'best-hotel' ),
				'label_off' => __( 'Hide', 'best-hotel' ),
				'default' => 'yes',
				'return_value' => 'yes',
				'separator' => 'before',
			]
		);

		$this->add_control(
			'excerpt_length',
			[
				'label' => __( 'Excerpt Length', 'best-hotel' ),
				'type' => Controls_Manager::NUMBER,
				'default' => 25,
				'condition' => [
					'show_excerpt' => 'yes',
				],
			]
		);

		$this->add_control(
			'read_more_text',
			[
				'label' => __( 'Read More Text', 'best-hotel' ),
				'type' => Controls_Manager::TEXT,
				'default' => __( 'Read More', 'best-hotel' ),
			]
		);

		$this->end_controls_section();
	}

	/**
	 * Render the widget output on the frontend.
	 *
	 * Written in PHP and used to generate the final HTML.
	 *
	 * @since 1.0.0
	 *
	 * @access protected
	 */
	protected function render() {
		$settings = $this->get_settings_for_display();
		?>
		<div class="lumber-grid">
			<?php
			$columns_desktop = ( ! empty( $settings['columns'] ) ? 'lumber-grid-desktop-' . $settings['columns'] : 'lumber-grid-desktop-3' );

			$columns_tablet = ( ! empty( $settings['columns_tablet'] ) ? ' lumber-grid-tablet-' . $settings['columns_tablet'] : ' lumber-grid-tablet-2' );

			$columns_mobile = ( ! empty( $settings['columns_mobile'] ) ? ' lumber-grid-mobile-' . $settings['columns_mobile'] : ' lumber-grid-mobile-1' );
			?>
			<div class="lumber-grid-container elementor-grid <?php echo $columns_desktop.$columns_tablet.$columns_mobile.$grid_class; ?>">
				<?php
				$posts_per_page = ( ! empty( $settings['posts_per_page'] ) ?  $settings['posts_per_page'] : 3 );
				?>

				<?php
		        $query_args = array(
					'posts_per_page'      => absint( $posts_per_page ),
					'no_found_rows'       => true,
					'ignore_sticky_posts' => true,
					'post_type' => 'post',
					'post_status' => 'publish',
	        	);
				?>

				<?php
				$all_posts = new \WP_Query( $query_args );
				if ( $all_posts->have_posts() ) :
					while ( $all_posts->have_posts() ) :
						$all_posts->the_post();
						?>
				        <article id="post-<?php the_ID(); ?>" <?php post_class( 'lumber-post' ); ?>>

				            <div class="post-grid-inner">
				            	<a href="<?php the_permalink(); ?>">
					            	<?php if ( has_post_thumbnail() ) : ?>
						            	<?php the_post_thumbnail( esc_attr( $settings['post_thumbnail_size'] ) ); ?>
					            	<?php else: ?>
					            		<img src="<?php echo esc_url( get_template_directory_uri() . '/images/no-image-large.png' ); ?>" alt="<?php the_title_attribute(); ?>" />
					            	<?php endif; ?>
					            </a>

				                <div class="post-grid-text-wrap">
				               		<h3><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>

				               		<?php if ( 'yes' === $settings['show_excerpt'] ) : ?>
					               		<div class="post-excerpt">
					               			<?php
					               			$excerpt = best_hotel_get_the_excerpt( absint( $settings['excerpt_length'] ) );
					               			echo wp_kses_post( wpautop( $excerpt ) );
					               			?>
					               		</div><!-- .post-excerpt -->
				               		<?php endif; ?>

				                </div><!-- .post-grid-text-wrap -->

				                <?php if ( ! empty( $settings['read_more_text'] ) ) : ?>
					                <a class="read-more-btn" href="<?php the_permalink(); ?>"><?php echo esc_html( $settings['read_more_text'] ); ?></a>
				                <?php endif; ?>

				                <div class="post-meta">
				                	<span class="posted-on"><a href="<?php the_permalink(); ?>"><?php the_time( get_option('date_format') ); ?></a></span>
				                	<?php
				                	if ( comments_open( get_the_ID() ) ) {
				                		echo '<span class="comments-link">';
				                		comments_popup_link( '0 Comments', '1 Comments', '% Comments' );
				                		echo '</span>';
				                	}
				                	?>
				                </div><!-- .post-meta -->

				            </div><!-- .post-grid-inner -->

				        </article>

						<?php

					endwhile;

					wp_reset_postdata();
				endif;
				?>
			</div>
		</div><!-- .lumber-grid -->
		<?php
	}
}
