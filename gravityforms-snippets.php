<?php

/* --------------------------------------------------------------
* app/admin.php
-------------------------------------------------------------- */

/**
 * Add All Gravityforms Capabilities To Editor Role
 */
add_action('init', function () {
  $role = get_role('editor');
  $role -> add_cap('gform_full_access');
  // $role -> remove_cap('gform_full_access');
});

/* --------------------------------------------------------------
* app/filters.php
-------------------------------------------------------------- */

/**
 * Hide Gravityforms Spinner
 */
add_filter('gform_ajax_spinner_url', function () {
    return 'data:image/gif;base64,R0lGODlhAQABAIAAAAAAAP///yH5BAEAAAAALAAAAAABAAEAAAIBRAA7';
});

/**
 * Enable 'Hide labels' Option
 */
add_filter('gform_enable_field_label_visibility_settings', '__return_true');

/**
 * Set Tabindex to 0 On All Gravityforms
 */
add_filter('gform_tabindex', function () {
    return 0;
});

/**
 * Place Gravityforms jQuery In Footer
 */
add_filter('gform_cdata_open', function ($content = '') {
    $content = 'document.addEventListener("DOMContentLoaded", function() { ';
    return $content;
});
add_filter('gform_cdata_close', function ($content = '') {
    $content = ' }, false);';
    return $content;
});
add_filter('gform_init_scripts_footer', '__return_true');
