<?php

if ( ! function_exists('lrm_is_pro') ) {
    /**
     * Helper function to determine is PRO version installed
     * @since 1.20
     *
     * @param float $required_version
     *
     * @return bool
     */
    function lrm_is_pro($required_version = false)
    {
        if (!class_exists("LRM_Pro") || !defined('LRM_PRO_VERSION')) {
            return false;
        }
        if (!$required_version) {
            return true;
        }
        return version_compare(LRM_PRO_VERSION, $required_version, '>=');
    }
}

if ( ! function_exists('lrm_setting') ) {
    /**
     * Get single setting value
     * @uses   SettingsAPI Settings API class
     * @param  string $setting_slug setting section/group/field separated with /
     * @param  bool do_stripslashes
     * @return mixed           field value or null if name not found
     */
    function lrm_setting($setting_slug, $do_stripslashes = false)
    {
        return LRM_Settings::get()->setting($setting_slug, $do_stripslashes = false);
    }
}

/**
 * @param string $label
 * @param string $data
 *
 * @since 2.00
 */
function lrm_log($label, $data = '' ) {
    if ( $data && !is_string($data) ) {
        $data = print_r($data, true);
    }
    do_action( "plain_logger", $label, $data);
}