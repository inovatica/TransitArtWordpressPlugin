<?php

function ta_admine_header() {
    wp_register_style( 'transitart_admin_css', plugins_url('transitart/css/admin.css'), false, '1.0.0' );
    wp_enqueue_style( 'transitart_admin_css' );
    wp_enqueue_script( 'transitart_admin_script', plugins_url('transitart/js/transitart-main.js') );

}
add_action( 'admin_enqueue_scripts', 'ta_admine_header' );

function ta_get_template($name, $data = false) {
    if (file_exists(TA_PATH . 'html/' . $name . '.php')) {
        include(TA_PATH . 'html/' . $name . '.php');
    } else {
        echo '<h1>Missing HTML template</h1>';
    }
}

function addTransitartCss() {
    $path = plugins_url('transitart/css/');
    wp_enqueue_style('transitart.css', $path . 'transitart.css');
}

function addTransitartJs() {
    $path = plugins_url('transitart/js/');
    wp_enqueue_script('transitart.js', $path . 'optimized-module.js', array('jquery'), 1, false);
}

add_action('wp_head', 'addTransitartCss');
add_action('wp_head', 'addTransitartJs');


function ta_plugin_menu() {
    add_menu_page('TransitArt', 'TransitArt', 'administrator', 'ta_generate_page', 'ta_generate_page_display',  plugin_dir_url( __FILE__ )."images/transitart_icon.png");
}


function ta_generate_page_display() {
    ta_get_template('settings');
}


function ta_load_textdomain() {
    load_plugin_textdomain('transitart', false, dirname(plugin_basename(__FILE__)) . '/lang');
}

function transitart($att = null) {
    $class = $att['class'];
    $key = $att['demo'];

    $type = $att['t'];
    if (!$class) {
        $class = 'transitart';
    }
    if (!$key) {
        $key = 'lodz';
    }

    if (!$type) {
        $type = 'timetables';
    }

    if (get_bloginfo('language') == 'pl-PL') {
        $lang = 'pl';
    } else {
        $lang = 'en';
    }

    $ta_show_credits = get_option( 'ta_show_credits');

    $result = '
        <div class="' . $class . '">
        <div id="poloko-module" api-key="' . $key . '" lang="' . $lang . '" page="' . $type . '"><div ui-view></div></div>';
        if($ta_show_credits == 1) {
            echo '<div><b>Powered by <a href="http://transitart.io">transitart.io</a></b></div>';
        }
        echo '</div>';
    echo $result;
}

add_action('init', 'transitart_shortcode_button_init');
function transitart_shortcode_button_init() {
      if ( ! current_user_can('edit_posts') && ! current_user_can('edit_pages') && get_user_option('rich_editing') == 'true')
           return;
      add_filter("mce_external_plugins", "transitart_register_tinymce_plugin");
      add_filter('mce_buttons', 'transitart_add_tinymce_button');
}

function transitart_register_tinymce_plugin($plugin_array) {
    $plugin_array['transitart_button'] = plugins_url('transitart/js/transitart_tinymce_plugin.js');
    return $plugin_array;
}

function transitart_add_tinymce_button($buttons) {
    $buttons[] = "transitart_button";
    return $buttons;
}
add_shortcode('transitart', 'transitart');

?>