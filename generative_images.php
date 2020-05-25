<?php
/*
 * 
 * @wordpress-plugin
 * Plugin Name:       _ANDYP - Generative Images
 * Plugin URI:        http://londonparkour.com
 * Description:       <strong>🔌PLUGIN</strong> | <em>ANDYP > Generative Images</em> | Builds up layers of an SVG to be exported into a post.
 * Version:           1.0.0
 * Author:            Andy Pearson
 * Author URI:        https://londonparkour.com
 * Domain Path:       /languages
 */

// ┌─────────────────────────────────────────────────────────────────────────┐
// │                         Use composer autoloader                         │
// └─────────────────────────────────────────────────────────────────────────┘
require_once __DIR__.'/vendor/autoload.php';

//  ┌─────────────────────────────────────────────────────────────────────────┐
//  │                              The ACF                                    │
//  └─────────────────────────────────────────────────────────────────────────┘
require __DIR__.'/src/acf/acf_admin_page.php'; 
require __DIR__.'/src/acf/acf_panel.php'; 

// ┌─────────────────────────────────────────────────────────────────────────┐
// │                           Kick off the program                          │
// └─────────────────────────────────────────────────────────────────────────┘
new \genimage\generate;