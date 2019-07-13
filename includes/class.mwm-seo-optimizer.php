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

// Check if exists the class 'mwm_seo_optimizer'.
if (!class_exists('mwm_seo_optimizer')) {
    /**
     * Implements the mwm_seo_optimizer class.
     *
     * @version 1.0.0
     */
    class mwm_seo_optimizer
    {
        /**
         * Single instance of the class.
         *
         * @var \mwm_seo_optimizer
         *
         * @version 1.0.0
         */
        protected static $instance;

        /**
         * Plugin schemas.
         *
         * @var \mwm_seo_optimizer_schemas
         *
         * @version 1.0.0
         */
        public $schemas;

        /**
         * Returns single instance of the class.
         *
         * @return \mwm_seo_optimizer
         *
         * @since 1.0.0
         */
        public static function get_instance()
        {
            if (is_null(self::$instance)) {
                self::$instance = new self();
            }

            return self::$instance;
        }

        /**
         * Constructor.
         *
         * Initialice plugin and registers actions and filters to be used
         *
         * @version 1.0.0
         */
        public function __construct()
        {
            // Adding schemas.
            $this->schemas = new mwm_seo_optimizer_schema();

            // Adding assets.
            add_action('wp_enqueue_scripts', array($this, 'mwm_enqueue_assets'));
        }

        /**
         * Enqueue scripts and styles.
         *
         * @version 1.0.0
         */
        public function mwm_enqueue_assets()
        {
            // Enqueuing assets
            wp_register_script('mwm_scripts', MWM_ASS.'js/scripts.js', array('jquery'), '1.0.0', true);
            wp_register_style('mwm_styles', MWM_ASS.'css/styles.min.css', array());
            wp_enqueue_script('mwm_scripts');
            wp_enqueue_style('mwm_styles');

            // Adding info to scripts
            wp_localize_script( 'mwm_scripts', 'mwmData', array(
                'ajaxUrl' => admin_url( 'admin-ajax.php' )
            ));
        }
    }
}

/**
 * Unique access to instance of mwm_seo_optimizer class.
 *
 * @return \mwm_seo_optimizer
 */
function mwm_seo_optimizer()
{
    return mwm_seo_optimizer::get_instance();
}
