<?php
/**
 * Plugin Name:     Custom Plugin
 * Plugin URI:      PLUGIN SITE HERE
 * Description:     PLUGIN DESCRIPTION HERE
 * Author:          YOUR NAME HERE
 * Author URI:      YOUR SITE HERE
 * Text Domain:     custom-plugin
 * Domain Path:     /languages
 * Version:         0.1.0
 *
 * @package         Custom_Plugin
 */

// Your code starts here.
add_filter( 'bloginfo', 'wppe_convert_title', 10, 1 );

function wppe_convert_title( $output ) {
    return sprintf( '%s - %s', $output,'foo' );
}