<?php
/**
 * Plugin Name: Developer Blog Snippets
 * Plugin URI:  https://github.com/WordPress/wporg-developer-blog
 * Description: Custom post type and taxonomy to introduce snippets to the developer blog.
 * Version: 1.0.0
 * Author: WordPress.org
 * Author URI: https://wordpress.org/
 * License:      GPL2
 * License URI:  https://www.gnu.org/licenses/gpl-2.0.html
 * Text Domain: wporg
 */

/**
 * Register the CPT and tax for snippets.
 */
add_action(
	'init',
	function() : void {
		$post_type = 'snippets';
		$tax       = 'coding-lang';

		// Register the custom post type.
		$cpt_args = [
			'labels'       => [
				'name'          => _x( 'Snippets', 'Post type general name', 'wporg' ),
				'singular_name' => _x( 'Snippet', 'Post type singular name', 'wporg' ),
				'add_new'       => __( 'Add New Snippet', 'wporg' ),
			],
			'public'       => true,
			'has_archive'  => true,
			'hierarchical' => false,
			'show_in_rest' => true,
			'menu_icon'    => 'dashicons-editor-code',
			'supports'     => [ 'title', 'editor', 'author', 'thumbnail' ],
		];

		register_post_type( $post_type, $cpt_args );

		// Register the custom taxonomy
		$tax_args = [
			'public'       => true,
			'labels'       => [
				'name'          => _x( 'Coding languages', 'taxonomy general name', 'wporg' ),
				'singular_name' => _x( 'Coding language', 'taxonomy singular name', 'wporg' ),
				'add_new_item'  => __( 'Add New Coding language', 'wporg' ),
				'not_found'     => __( 'No Coding languages found', 'wporg' ),
			],
			'show_in_rest' => true,
		];
\
		register_taxonomy( $tax, $post_type, $tax_args );

	}
);