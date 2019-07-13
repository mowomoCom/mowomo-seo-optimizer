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

// Check if exists the class 'mwm_seo_optimizer_schema'.
if (!class_exists('mwm_seo_optimizer_schema')) {
    /**
     * Implements the mwm_seo_optimizer_schema class.
     *
     * @version 1.0.0
     */
    class mwm_seo_optimizer_schema
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
            
        }
    }
}
