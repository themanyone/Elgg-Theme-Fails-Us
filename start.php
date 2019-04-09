<?php
/* @title theme.fails.us
 * @description Change theme for fails.us
 * @author Henry Kroll www.thenerdshow.com
 * @license GPL2
 */
function theme_fails_us_init() {
    // change the default header_logo
    elgg_register_plugin_hook_handler('view', 'page/elements/header_logo', 'logo_fails_us');
    elgg_register_css('fails.us.css', elgg_get_simplecache_url('css/fails.us.css'));
}

function logo_fails_us($hook, $type, $vars, $params) {
   elgg_load_css('fails.us.css');
   // insert our icon
   $img = elgg_get_simplecache_url('images/fu32.png');
   return str_replace('-site"><a', '-site"><img src="'.$img.'"><a', $vars);
}

// register for the init, system event when our plugin start.php is loaded
elgg_register_event_handler('init', 'system', 'theme_fails_us_init');
?>
