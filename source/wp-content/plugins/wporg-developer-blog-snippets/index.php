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
		$lang_tax  = 'coding-lang';
		$api_tax   = 'api';

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
			'template'     => [
				[
					'core/paragraph',
					[
						'placeholder' => __( 'Describe your use case for this snippet', 'wporg' )
					],
				],
				[ 'core/code' ],
				[
					'core/heading',
					[
						'level'   => 2,
						'content' => 'Relevant links',
					],
				],
				[ 'core/list' ],
				[
					'core/paragraph',
					[
						'align'   => 'right',
						'content' => '<em>Please add props here</em>'
					],
				],
			],
		];

		register_post_type( $post_type, $cpt_args );

		// Register the coding lang taxonomy
		$lang_tax_args = [
			'public'       => true,
			'labels'       => [
				'name'          => _x( 'Coding languages', 'taxonomy general name', 'wporg' ),
				'singular_name' => _x( 'Coding language', 'taxonomy singular name', 'wporg' ),
				'add_new_item'  => __( 'Add New Coding language', 'wporg' ),
				'not_found'     => __( 'No Coding languages found', 'wporg' ),
			],
			'show_in_rest' => true,
		];
		register_taxonomy( $lang_tax, $post_type, $lang_tax_args );

		// Register the API taxonomy
		$api_tax_args = [
			'public'       => true,
			'labels'       => [
				'name'          => _x( 'APIs', 'taxonomy general name', 'wporg' ),
				'singular_name' => _x( 'API', 'taxonomy singular name', 'wporg' ),
				'add_new_item'  => __( 'Add New API', 'wporg' ),
				'not_found'     => __( 'No APIs found', 'wporg' ),
			],
			'show_in_rest' => true,
		];
		register_taxonomy( $api_tax, $post_type, $api_tax_args );
	}
);

// Filter snippets title to be prefixed.
add_filter(
	'the_title',
	function( $title, $post_id ) {
		if ( 'snippets' === get_post_type( $post_id ) ) {
			return __( 'Snippet: ', 'wporg' ) . $title;
		}
		return $title;
	},
	10,
	2
);

// Add the snippets post type to the main RSS feed.
add_filter(
	'request',
	function( $query_vars ) {
		$post_type = 'snippets';
		if ( isset( $query_vars['feed'] ) && ! isset( $query_vars['post_type'] ) ) {
			$query_vars['post_type'] = [ 'post', $post_type ];
		}
		return $query_vars;
	}
);
