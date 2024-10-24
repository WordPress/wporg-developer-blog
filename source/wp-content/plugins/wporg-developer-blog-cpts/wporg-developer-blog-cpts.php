<?php
/**
 * Plugin Name: Developer Blog CPTs
 * Plugin URI:  https://github.com/WordPress/wporg-developer-blog
 * Description: Manages all of the custom post types and taxonomies for the dev blog.
 * Version: 1.0.0
 * Author: WordPress.org
 * Author URI: https://wordpress.org/
 * License:      GPL2
 * License URI:  https://www.gnu.org/licenses/gpl-2.0.html
 * Text Domain: wporg
 */

/**
 * Register the post types and taxonomies.
 */
add_action(
	'init',
	function() : void {
		$custom_post_types = [
			// Snippets
			'snippets'        => [
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
				'supports'     => [ 'title', 'editor', 'author', 'thumbnail', 'excerpt', 'comments' ],
				'template'     => [
					[
						'core/paragraph',
						[
							'placeholder' => __( 'Describe your use case for this snippet', 'wporg' ),
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
							'content' => '<em>Please add props here</em>',
						],
					],
				],
			],
			'dev-blog-videos' => [
				'labels'       => [
					'name'          => _x( 'Videos', 'Post type general name', 'wporg' ),
					'singular_name' => _x( 'Video', 'Post type singular name', 'wporg' ),
					'add_new'       => __( 'Add new Video', 'wporg' ),
				],
				'taxonomies'   => [ 'category' ],
				'rewrite'      => [ 'slug' => 'videos' ],
				'public'       => true,
				'has_archive'  => true,
				'hierarchical' => false,
				'show_in_rest' => true,
				'menu_icon'    => 'dashicons-format-video',
				'supports'     => [ 'title', 'editor', 'author', 'thumbnail', 'excerpt', 'comments' ],
				'template'     => [
					[
						'core/embed',
						[
							'providerNameSlug' => 'youtube',
							'responsive'       => true,
						],
					],
					[
						'core/heading',
						[
							'level'   => 2,
							'content' => 'Relevant links',
						],
					],
					[ 'core/list' ],
					[
						'core/heading',
						[
							'level'   => 2,
							'content' => 'Transcript',
						],
					],
					[
						'core/paragraph',
						[
							'placeholder' => 'Add transcript',
						],
					],
					[
						'core/paragraph',
						[
							'align'   => 'right',
							'content' => '<em>Please add props here</em>',
						],
					],
				],
			],
		];

		// load the post types
		foreach ( $custom_post_types as $post_type => $config ) {
			register_post_type( $post_type, $config );
		}

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
		register_taxonomy( 'coding-lang', 'snippets', $lang_tax_args );

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
		register_taxonomy( 'api', 'snippets', $api_tax_args );
	}
);

// Filter snippets title to be prefixed.
add_filter(
	'the_title',
	function( $title, $post_id ) {
		if ( 'snippets' === get_post_type( $post_id ) ) {
			/*
			 * Translators: Prefix for all titles of Snippets.
			 */
			return sprintf( __( 'Snippet: %s', 'wporg' ), $title );
		}
		return $title;
	},
	10,
	2
);

// Add the custom post types to the main RSS feed.
add_filter(
	'request',
	function( $query_vars ) {
		if ( isset( $query_vars['feed'] ) && ! isset( $query_vars['post_type'] ) ) {
			$query_vars['post_type'] = [ 'post', 'snippets', 'dev-blog-videos' ];
		}
		return $query_vars;
	}
);
