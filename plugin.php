<?php
/**
 * Plugin Name: HighlightJS WP
 * Plugin URI: https://github.com/AdrienPoupa/HighlightJS-WP
 * Description: HighlightJS WordPress Integration
 * Version: 1.0.0
 * Author: Adrien Poupa
 * Author URI: https://adrien.poupa.fr
 * License: GPL-2.0+
 * License URI: http://www.gnu.org/licenses/gpl-2.0.txt
 *
 * This program is free software; you can redistribute it and/or modify it under the terms of the GNU
 * General Public License version 2, as published by the Free Software Foundation.  You may NOT assume
 * that you can use any other version of the GPL.
 *
 * This program is distributed in the hope that it will be useful, but WITHOUT ANY WARRANTY; without
 * even the implied warranty of MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.
 *
 */

 // Prevent direct access
if ( ! defined( 'WPINC' ) ) {
	die;
}

add_action( 'wp_enqueue_scripts', 'hjswp_enqueue_wphighlightjs' );

/**
 * Load HighlightJS
 */
function hjswp_enqueue_wphighlightjs() {
	// Enable the plugin only for singular posts
	if ( ! is_singular() ) {
		return;
	}

	wp_enqueue_style( 'highlightjs-css', '//cdn.jsdelivr.net/gh/highlightjs/cdn-release@latest/build/styles/default.min.css' );

	wp_enqueue_script( 'highlightjs', '//cdn.jsdelivr.net/gh/highlightjs/cdn-release@latest/build/highlight.min.js', '', 'latest', true );

	wp_add_inline_script( 'highlightjs', 'hljs.initHighlightingOnLoad();' );
}
