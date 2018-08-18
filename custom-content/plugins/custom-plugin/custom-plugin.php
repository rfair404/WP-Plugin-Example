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

/**
 * Adds foo to the site title.
 *
 * @param string $output the incoming title.
 * @return string the filtered title.
 */
function wppe_convert_title( $output ) {
	return sprintf( '%s - %s', $output, 'foo' );
}

/**
 * Get a post's permalink, then run it through special filters and trigger
 * the 'special_action' action hook.
 *
 * @param int $post_id The post ID being linked to.
 * @return str|bool    The permalink or a boolean false if $post_id does
 *                     not exist.
 */
function wppe_permalink_function( $post_id ) {
	$permalink = get_permalink( absint( $post_id ) );
	$permalink = apply_filters( 'special_filter', $permalink );

	do_action( 'special_action', $permalink );

	return $permalink;
}
