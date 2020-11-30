<?php
/*
 * 
 * @wordpress-plugin
 * Plugin Name:       _ANDYP - Pipeline - Generative Images
 * Plugin URI:        http://londonparkour.com
 * Description:       <strong>🤖 Pipeline</strong> | <em>Pipeline > Generative Images</em> | Builds up layers of an SVG to be exported into a post.
 * Version:           1.0.0
 * Author:            Andy Pearson
 * Author URI:        https://londonparkour.com
 * Domain Path:       /languages
 */


define( 'ANDYP_GENIMAGE_URL', plugins_url( '/', __FILE__ ) );
define( 'ANDYP_GENIMAGE_PATH', __DIR__ );


// ┌─────────────────────────────────────────────────────────────────────────┐
// │                         Use composer autoloader                         │
// └─────────────────────────────────────────────────────────────────────────┘
require_once __DIR__.'/vendor/autoload.php';

//  ┌─────────────────────────────────────────────────────────────────────────┐
//  │                              The ACF                                    │
//  └─────────────────────────────────────────────────────────────────────────┘
require __DIR__.'/src/acf/acf_init.php';

//  ┌─────────────────────────────────────────────────────────────────────────┐
//  │                            The Actions                                  │
//  └─────────────────────────────────────────────────────────────────────────┘
require __DIR__.'/src/wp_filters/filters_init.php';

// ┌─────────────────────────────────────────────────────────────────────────┐
// │                            Add shortcode                                │
// └─────────────────────────────────────────────────────────────────────────┘
new \genimage\shortcodes\genimage;