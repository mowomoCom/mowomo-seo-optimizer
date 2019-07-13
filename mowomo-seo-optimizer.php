<?php
/**
 * Plugin Name: mowomo Seo Optimizer
 * Description: Plugin created by mowomo to optimize the SEO of the different sections of your web
 * Version:     1.0.0
 * Author:      mowomo
 * Author URI:  mowomo.com
 * License:     GNU GPL 3
 * Text Domain: mwm
 * Domain Path: /languages
 * WC requires at least: 5.0.0
 * WC tested up to: 5.2.2.
 * 
 * This source file is subject to the GNU GENERAL PUBLIC LICENSE (GPL 3.0)
 * that is bundled with this package in the file LICENSE.txt.
 * It is also available through the world-wide-web at this URL:
 * http://www.gnu.org/licenses/gpl-3.0.txt.
 */

// Detects if the plugin has been entered directly.
if (!defined('ABSPATH')) {
    exit;
}

// Define constants.
if (defined('MWM_VERSION')) {
    return;
} else {
    define('MWM_VERSION', '1.0.0');
}
if (!defined('MWM_FILE')) {
    define('MWM_FILE', __FILE__);
}
if (!defined('MWM_URL')) {
    define('MWM_URL', plugins_url('/', MWM_FILE));
}
if (!defined('MWM_DIR')) {
    define('MWM_DIR', plugin_dir_path(MWM_FILE));
}
if (!defined('MWM_INIT')) {
    define('MWM_INIT', dirname(plugin_basename(MWM_FILE)));
}
if (!defined('MWM_ASS')) {
    define('MWM_ASS', MWM_URL.'assets/');
}
if (!defined('MWM_INC')) {
    define('MWM_INC', MWM_DIR.'includes/');
}
if (!defined('MWM_TPL')) {
    define('MWM_TPL', MWM_DIR.'templates/');
}

// Check if exists the function 'mwm_seo_optimizer_constructor'.
if (!function_exists('mwm_seo_optimizer_constructor')) {
    /**
     * Load de plugin.
     *
     * @version 1.0.0
     */
    function mwm_seo_optimizer_constructor()
    {
        // Load textdomain
        load_plugin_textdomain('mwm', false, MWM_INIT.'/languages/');

        // Load includes
        require_once MWM_INC.'class.mwm-seo-optimizer.php';
        require_once MWM_INC.'class.mwm-seo-optimizer-schema.php';
        require_once MWM_INC.'functions.mwm-seo-optimizer.php';

        // Let's start the game =)
        mwm_seo_optimizer();
    }
    add_action('plugins_loaded', 'mwm_seo_optimizer_constructor');
}
