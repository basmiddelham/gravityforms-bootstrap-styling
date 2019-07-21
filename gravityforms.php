<?php

namespace App;

if (class_exists('GFCommon')) {
    /**
     * Hide Gravityforms Spinner
     */
    add_filter('gform_ajax_spinner_url', function () {
        return 'data:image/gif;base64,R0lGODlhAQABAIAAAAAAAP///yH5BAEAAAAALAAAAAABAAEAAAIBRAA7';
    });
    
    /**
     * Give Editors access to Gravityforms
     */
    add_action('admin_init', function () {
        $role = get_role('editor');
        $role->add_cap('gform_full_access');
        // $role->remove_cap('gform_full_access');
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
}
