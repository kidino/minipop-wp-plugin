<?php
/*
 * Plugin Name:       Minipop Pop-up
 * Plugin URI:        https://iszuddinismail.com/minipop
 * Description:       Minipop Pop-up is a simple WordPress plugin that displays an image as a pop-up on your homepage with the lightbox effect. You can select an image for desktop and mobile screen, with URL for the click destination, and an option to turn the pop-up on or off.
 * Version:           1.0.2
 * Requires at least: 5.2
 * Requires PHP:      7.2
 * Author:            Iszuddin Ismail
 * Author URI:        https://iszuddinismail.com/
 * License:           GPL v2 or later
 * License URI:       https://www.gnu.org/licenses/gpl-2.0.html
 */

// -- ACTION HOOKS ----

add_action('wp_footer', 'minipop_iszuddin_frontend_code');
add_action('wp_enqueue_scripts', 'minipop_iszuddin_enqueue_jquery');
add_action('admin_menu', 'minipop_iszuddin_admin_menu');
add_action('admin_enqueue_scripts', 'minipop_iszuddin_enqueue_admin_scripts');

// -- FUNCTIONS ----

// Add menu item to admin sidebar
function minipop_iszuddin_admin_menu() {
    add_menu_page(
        'Minipop Pop-up',   // Page title
        'Minipop Pop-up',   // Menu title
        'manage_options', // Capability (who can access)
        'minipop-popup',    // Menu slug
        'minipop_iszuddin_admin_page', // Callback function to display page content
        'dashicons-editor-expand', // Icon
        60                 // Position in the menu
    );
}

// Enqueue scripts and styles for the admin area
function minipop_iszuddin_enqueue_admin_scripts() {
    wp_enqueue_media();
    wp_enqueue_script('minipop-iszuddin-admin-script', plugin_dir_url(__FILE__) . 'admin-script.js', array('jquery'), '1.0', true);
}

// Callback function to display the custom page content
function minipop_iszuddin_admin_page() {
    // Process form submission
    if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['submit'])) {

        if ( ! isset( $_POST['_wpnonce'] ) || ! wp_verify_nonce( $_POST['_wpnonce'], 'minipop-nonce' ) ) {
            die( 'Security check' );
        }
    

        // Handle form data here

        // Update the option in the options table

        $on_off = $_POST['minipop_iszuddin_toggle'] ?? '0';

        update_option('minipop_iszuddin_toggle', $on_off);

        update_option('minipop_iszuddin_desktop_popup', sanitize_text_field($_POST['minipop_iszuddin_desktop_popup']));
        update_option('minipop_iszuddin_mobile_popup', sanitize_text_field($_POST['minipop_iszuddin_mobile_popup']));
        update_option('minipop_iszuddin_desktop_url', sanitize_text_field($_POST['minipop_iszuddin_desktop_url']));
        update_option('minipop_iszuddin_mobile_url', sanitize_text_field($_POST['minipop_iszuddin_mobile_url']));

        echo '<div class="updated"><p>Settings has been updated.</p></div>';
    }

    // Display admin page
    include_once(plugin_dir_path(__FILE__) . 'admin_page.php');

}

// add pop-up code at the footer on the homepage
function minipop_iszuddin_frontend_code() {
    // Set default value
    $on_off = get_option('minipop_iszuddin_toggle', '0');
    $current_language = 'ms';
    $desktop_url = '#';
    $mobile_url = '#';

    // get value pop-up values from Option API
    $mobile_popup = get_option('minipop_iszuddin_mobile_popup', '');
    $desktop_popup = get_option('minipop_iszuddin_desktop_popup', '');
    $desktop_url = get_option('minipop_iszuddin_desktop_url', '');
    $mobile_url = get_option('minipop_iszuddin_mobile_url', '');

    // display pop-up on the homepage
    if( ($on_off == '1') && ($mobile_popup != '') && ($desktop_popup != '') ) {
        include_once(plugin_dir_path(__FILE__) . 'frontend_footer_code.php');
    }

}

// add jquery on the homepage
function minipop_iszuddin_enqueue_jquery() {
    wp_enqueue_script('jquery');
}
