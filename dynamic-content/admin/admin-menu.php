<?php // DMC Admin Menu

// Exit if accessed directly
if (!defined('ABSPATH')) {
    exit;
}

function dmc_register_settings_page() {
    add_menu_page(
        'Dynamic Content',              // Page Title
        'Dynamic Content',              // Menu Title
        'manage_options',               // Capability
        'dmc-settings',                 // Menu Slug
        'dmc_settings_page_content',    // Callback Function
        'dashicons-info',               // Icon
        null                            // Menu Position
    );
}

add_action('admin_menu', 'dmc_register_settings_page');