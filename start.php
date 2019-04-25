<?php
/* @title theme.fails.us
 * @description Change theme for fails.us
 * @author Henry Kroll www.thenerdshow.com
 * @license GPL2
 */

function theme_fails_us_init() {
    // change the default header_logo
    elgg_register_plugin_hook_handler('view', 'page/elements/header_logo', 'logo_fails_us');
    elgg_register_plugin_hook_handler('view', 'page/elements/body', 'header_fails_us');
    elgg_register_css('fails.us.css', elgg_get_simplecache_url('css/fails.us.css'));
}

function header_fails_us($hook, $type, $vars, $params) {
   $script = '<div class="elgg-heading" style="position:absolute;top:55px;right:5px;"><script src="https://thenerdshow.com/social/mediaIcons.js?button0=&amp;button1=&amp;button2=&amp;button3=&amp;button4=&amp;button5=&amp;button12=&amp;button13=&amp;url13=//youtube.com/themanyone"></script></div>';
   // $vars = preg_replace('#(<div.*?header">)(.*?)(</div>)#',"$1 $script $2$3", $vars);
   $vars = $script.$vars;
   return $vars;
}
function logo_fails_us($hook, $type, $vars, $params) {
   // change default site colors
   elgg_load_css('fails.us.css');
   $url = "https://fails.us/file/view/741/get-your-share-buttonfailsus";
   // insert our icon
   $img = elgg_get_simplecache_url('images/fu32.png');
   return str_replace('-site"><a', '-site"><a href="'.$url
   .'"><img src="'.$img.'"></a><a', $vars);
}

// register for the init, system event when our plugin start.php is loaded
elgg_register_event_handler('init', 'system', 'theme_fails_us_init');
?>
