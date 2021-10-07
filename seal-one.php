<?php

/**
 * @package seal-plugin
 */

/*
Plugin Name: Seal-plugin-one
Description: we will see what it does 
Version:     1.0.0
Author:      Yunze Zhao
plugin URI: https://github.com/Yunzez/seal-plugin
License: GPLv2 or later
*/

define('WP_DEBUG', true);

// for safty 
if(! defined('ABSPATH')){
    die;
}

// debug to console
function debug_to_console($data) {
    $output = $data;
    if (is_array($output))
        $output = implode(',', $output);

    echo "<script>console.log('Debug Objects: " . $output . "' );</script>";
}


class PluginTestSeal {

    function __construct(){
        add_action('init',array($this, 'custom_post_type'));
        debug_toconsole('enter construct')
    }

    function activate(){
        flush_rewrite_rules();
    }

    function deactivate(){
        flush_rewrite_rules();
    }

    function uninstall(){

    }

    function custom_post_type(){
        register_post_type('book', ['public' => 'true', 'label' => 'test']);
    }
}
if(class_exists('PluginTestSeal')){
    $thetest = new PluginTestSeal();

}

register_activation_hook(__FILE__, array($thetest, 'activate'));

register_deactivation_hook(__FILE__, array($thetest, 'deactivate'));