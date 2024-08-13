<?php
/**
 * Plugin Name:     Scrollbar  by webxapp
 * Description:     Scrollbar WXA is best vertical/horizontal scrollbars plugin.
 * Version:         1.2.1
 * Author:          WebXApp
 * Author URI:      https://webxapp.com/
 * Text Domain:     scrollbar-wxa
 * License: GNU/GPLv3 http://www.gnu.org/licenses/gpl-3.0.html
 */
if (!defined('WXACS_MAIN_FILE')) {
    define('WXACS_MAIN_FILE', plugin_basename(__FILE__));
}
if (!defined('WXACS_DIR')) {
    define('WXACS_DIR', dirname(__FILE__));
}
if (!defined('WXACS_URL')) {
    define('WXACS_URL', plugins_url(plugin_basename(dirname(__FILE__))));
}


if (!defined('WXACS_VERSION')) {
    define('WXACS_VERSION', "1.2.1");
}

if (!defined('WXACS_PLUGIN_MAIN_FILE')) {
    define('WXACS_PLUGIN_MAIN_FILE', __FILE__);
}
if (!defined('WXACS_PLUGIN_PREFIX')) {
    define('WXACS_PLUGIN_PREFIX', "wxacs");
}
if(!is_admin()){
    require_once ("wxacs_class.php");
    add_action('plugins_loaded', array('WXACS', 'get_instance'));
}

if (is_admin()) {
    require_once('wxacs_admin_class.php');
    add_action('plugins_loaded', array('WXACS_Admin', 'get_instance'));
    register_activation_hook(__FILE__, array('WXACS_Admin', 'global_activate'));
}
