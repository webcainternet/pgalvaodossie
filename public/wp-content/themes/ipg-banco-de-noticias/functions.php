<?php

$dir = dirname(__FILE__);

$env = 'production';

$dev_paths = array(
    'bonjour',
    'astato',
    'titanium',
    'leonardo',
    '\/fe\/'
);
$dev_paths = implode('|', $dev_paths);
$dev_paths = '/(' . $dev_paths . ')/';

$staging_paths = array(
    'potassio'
);
$staging_paths = implode('|', $staging_paths);
$staging_paths = '/(' . $staging_paths . ')/';

$env = 'production';
if (preg_match($dev_paths, $dir) === 1) {
    $env = 'development';
} elseif (preg_match($staging_paths, $dir) === 1) {
    $env = 'staging';
}

$theme_version = wp_get_theme();
$theme_version = $theme_version->get('Version');

$fb_app_id = '1033193766704426';
if ($env == 'development') {
    $fb_app_id = '1033194093371060';
}


// constants
define('THEMELIB', TEMPLATEPATH . '/extension');
define('PATHS_INC', TEMPLATEPATH . '/includes');
define('PATHS_SVG', PATHS_INC . '/svg');
define('PATHS_PARTIALS', PATHS_INC . '/partials');
define('JQUERY_VERSION', '2.1.1');
define('THEME_VERSION', $theme_version);
define('ENV', $env);
define('FB_APP_ID', $fb_app_id);
define('COMPOSER', TEMPLATEPATH . '/vendor');

// Functions
require_once(THEMELIB . '/helpers.php');
require_once(THEMELIB . '/admin-pages.php');
require_once(THEMELIB . '/post-types.php');
require_once(THEMELIB . '/post-type-columns.php');
require_once(THEMELIB . '/custom-fields.php');
require_once(THEMELIB . '/custom-taxonomy.php');
require_once(THEMELIB . '/query-filters.php');
require_once(THEMELIB . '/shortcodes.php');
require_once(THEMELIB . '/ajax.php');
require_once(COMPOSER . '/autoload.php');

// Cleaning the wp_head()
remove_action('wp_head', 'rsd_link'); // Really Simple Discovery
remove_action('wp_head', 'wlwmanifest_link'); // Windows Live Writer
remove_action('wp_head', 'quoter_head'); // Quoter plugin
remove_action('wp_head', 'wp_forecast_css'); // wp-forecast plugin
remove_action('wp_head', array('K2Header', 'output_header_css')); // K2 custom header
remove_action('wp_head', 'wp_generator'); // Remove wp reference

// Adding thumb support and thumb sizes
if ( function_exists( 'add_theme_support' ) ) {
    add_theme_support( 'post-thumbnails' );

    // Default thumbnail size
    set_post_thumbnail_size( 700, 400, false );
}

// add plus image size
if ( function_exists( 'add_image_size' ) ) {
    //add_image_size('hl_mob', 396, 223, true);
    add_image_size('full_image', 1024, 600, false);
    add_image_size('quad_about', 212, 212, false);
    add_image_size('quad_single', 190, 190, false);
    add_image_size('search_result', 197, 250, false);
    add_image_size('search_single', 276, 158, false);
}

// Necessary to force custom post types nice urls to work
function my_rewrite_flush() {
  flush_rewrite_rules(false);
}
add_action('after_switch_theme', 'my_rewrite_flush');

function register_site_styles() {
    if (is_admin()) { return false; }

    $main_css = get_template_directory_uri();
    $main_css .= '/public/css/';
    $main_css .= (ENV == 'production') ? 'main.min.css' : 'main.css';
    wp_enqueue_style('main_css', $main_css, array(), THEME_VERSION);
}
add_action( 'wp_enqueue_scripts', 'register_site_styles' );

function register_admin_styles() {
    if (!is_admin()) { return false; }

    $main_css = get_template_directory_uri();
    $main_css .= '/public/css/';
    $main_css .= 'admin.css';
    wp_enqueue_style('admin_css', $main_css, array(), THEME_VERSION);

    if (isset($_GET['page'])) {
        if ($_GET['page'] == 'ipg-admin/ipg-admin-pages-busca.php') {
            wp_enqueue_media();
        }
    }

    $admin_js = get_template_directory_uri();
    $admin_js .= '/public/js/';
    $admin_js .= 'admin.js';
    wp_enqueue_script('admin_js', $admin_js, array('jquery', 'media-upload'), THEME_VERSION);
}
add_action( 'admin_init', 'register_admin_styles' );

function register_site_scripts() {
    if (is_admin()) { return false; }

    wp_deregister_script('jquery');
    wp_register_script('jquery', '', false, JQUERY_VERSION, true);

    $public_js_dir = get_template_directory_uri();
    $public_js_dir .= '/public/js/';

    $vendor_queue = array('jquery');
    $vendor_js = (ENV == 'production') ? 'vendor.min.js' : 'vendor.js';
    $vendor_js = $public_js_dir . $vendor_js;
    wp_enqueue_script('vendor_js', $vendor_js, $vendor_queue, THEME_VERSION, true);

    $main_queue = array('jquery', 'vendor_js');
    $main_js = (ENV == 'production') ? 'main.min.js' : 'main.js';
    $main_js = $public_js_dir . $main_js;
    wp_enqueue_script('main_js', $main_js, $main_queue, THEME_VERSION, true);

    $js_vars = array(
        'ajaxUrl' => get_bloginfo('url') . '/ajax',
        'env' => ENV,
        'homeUrl' => get_bloginfo('url')
    );
    wp_localize_script('main_js', 'phpVars', $js_vars);
}
add_action('wp_enqueue_scripts', 'register_site_scripts');

register_nav_menus(array(
    'header_menu' => 'Menu do header',
    'mobile_menu' => 'Menu do mobile',
    'footer_menu' => 'Menu do footer'
));
