<?php
/**
 * This source file is subject to the GNU GENERAL PUBLIC LICENSE (GPL 3.0)
 * that is bundled with this package in the file LICENSE.txt.
 * It is also available through the world-wide-web at this URL:
 * http://www.gnu.org/licenses/gpl-3.0.txt.
 */

/**
 * Detects if the plugin has been entered directly.
 *
 * @version 1.0.0
 */
if (!defined('ABSPATH') || !defined('MWM_VERSION')) {
    exit; // Exit if accessed directly.
}

// Check if exists the class 'mwm_seo_optimizer_post_data'.
if (!class_exists('mwm_seo_optimizer_post_data')) {
    /**
     * Implements the mwm_seo_optimizer_post_data class.
     *
     * @version 1.0.0
     */
    class mwm_seo_optimizer_post_data
    {
        /**
         * Constructor.
         *
         * Initialice plugin and registers actions and filters to be used
         *
         * @version 1.0.0
         */
        public function __construct()
        {
            add_action('add_meta_boxes', array($this, 'mwm_seo_optimizer_add_metaboxes'));
        }

        /**
         * Adding metabox.
         *
         * @version 1.0.0
         */
        public function mwm_seo_optimizer_add_metaboxes() {
            // Posts where the metabox will be shown
            $posts = array('post', 'page');

            // Adding metabox
            add_meta_box(
                'mwm-seo-optimizer-metabox',
                __('momowo Seo Optimizer', 'mwm'),
                array($this, 'mwm_seo_optimizer_add_metaboxes_callback'),
                $posts,
                'normal',
                'high'
            );
        }

        /**
         * Metabox callback.
         *
         * @version 1.0.0
         */
        public function mwm_seo_optimizer_add_metaboxes_callback() {
            global $post;
            // Nonce field to validate form request came from current site
            wp_nonce_field( basename( __FILE__ ), 'mwm_seo_optimizer_fields' );
            // Get the location data if it's already been entered
            $data = get_post_meta( $post->ID, 'mwm_seo_optimizator_data', true );
            // Output the field
            echo '<input type="text" name="mwm_seo_optimizator_data" value="' . esc_textarea( $data )  . '" class="widefat">';
        }
    }
}
