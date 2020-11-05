<?php
/**
 * Custom Metabox for this theme.
 *
 * Eventually, some of the functionality here could be replaced by core features.
 *
 * @package Best_Hotel
 */


class Best_Hotel_Settings_Meta_Box {

    public function __construct() {

        if ( is_admin() ) {
            add_action( 'load-post.php',     array( $this, 'init_metabox' ) );
            add_action( 'load-post-new.php', array( $this, 'init_metabox' ) );
        }

    }

    public function init_metabox() {

        add_action( 'add_meta_boxes', array( $this, 'add_metabox'  )        );
        add_action( 'save_post',      array( $this, 'save_metabox' ), 10, 2 );

    }

    public function add_metabox() {

        add_meta_box(
            'best_hotel_settings',
            esc_html__( 'Best Hotel Settings', 'best-hotel' ),
            array( $this, 'render_metabox' ),
            array('page', 'post'),
            'side',
            'default'
        );

    }

    public function render_metabox( $post ) {

        // Add nonce for security and authentication.
        wp_nonce_field( 'best_hotel_disable_elements_nonce_action', 'best_hotel_disable_elements_nonce' );

        // Retrieve an existing value from the database.
        $enable_transparent_header          = get_post_meta( $post->ID, 'enable_transparent_header', true );

        // Set default values.
        if( empty( $enable_transparent_header ) ) $enable_transparent_header = '';

        // Form fields.
        echo '<div class="best-hotel-elements-disable-wrap">';

        // For disable title
        echo '<div class="disable-title">';
        echo '<label for="enable_transparent_header" class="enable_transparent_header_label">';
        echo '<input type="checkbox" id="enable_transparent_header" name="enable_transparent_header" class="enable_transparent_header_field" value="' . $enable_transparent_header . '" ' . checked( $enable_transparent_header, 'checked', false ) . '> ' . esc_html__( 'Enable Transparent Header', 'best-hotel' );
        echo '</label>';
        echo '</div>';

        echo '</div>'; /*.best-hotel-elements-disable-wrap*/

    }

    public function save_metabox( $post_id, $post ) {

        // Check if a nonce is set.
        if ( ! isset( $_POST['best_hotel_disable_elements_nonce'] ) )
            return;

        // Check if a nonce is valid.
        if ( ! wp_verify_nonce( $_POST['best_hotel_disable_elements_nonce'], 'best_hotel_disable_elements_nonce_action' ) )
            return;

        // Check if the user has permissions to save data.
        if ( ! current_user_can( 'edit_post', $post_id ) )
            return;

        // Check if it's not an autosave.
        if ( wp_is_post_autosave( $post_id ) )
            return;

        // Check if it's not a revision.
        if ( wp_is_post_revision( $post_id ) )
            return;

        // Sanitize user input.
        $enable_transparent_header_new      = isset( $_POST[ 'enable_transparent_header' ] ) ? 'checked' : '';

        // Update the meta field in the database.
        update_post_meta( $post_id, 'enable_transparent_header', $enable_transparent_header_new );

    }

}

new best_hotel_Settings_Meta_Box;