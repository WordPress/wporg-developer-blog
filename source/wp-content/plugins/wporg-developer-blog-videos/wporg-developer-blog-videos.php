<?php
/**
 * Plugin Name: Developer Blog Videos
 * Plugin URI:  https://github.com/WordPress/wporg-developer-blog
 * Description: Adds Video content for the developer blog.
 * Version: 1.0.0
 * Author: WordPress.org
 * Author URI: https://wordpress.org/
 * License:      GPL2
 * License URI:  https://www.gnu.org/licenses/gpl-2.0.html
 * Text Domain: wporg
 */

/**
 * Register the CPT for Developer Hours
 */
add_action(
	'init',
	function() {
		// Register the custom post type.
		$cpt_args = [
			'labels'       => [
				'name'          => _x( 'Videos', 'Post type general name', 'wporg' ),
				'singular_name' => _x( 'Video', 'Post type singular name', 'wporg' ),
				'add_new'       => __( 'Add new Video', 'wporg' ),
			],
			'taxonomies'   => [ 'category' ],
			'public'       => true,
			'has_archive'  => true,
			'hierarchical' => false,
			'show_in_rest' => true,
			'menu_icon'    => 'dashicons-format-video',
			'supports'     => [ 'title', 'editor', 'author', 'thumbnail' ],
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
		];

		register_post_type( 'videos', $cpt_args );
	}
);


/*
 * Sets the post types that can appear on the homepage.
 */
add_action(
	'pre_get_posts',
	function( $query ) {
		if ( ! is_admin() && $query->is_main_query() && ( $query->is_home || $query->is_front_end ) ) {
			$target_types = array( 'post', 'videos' );
			$query->set( 'post_type', $target_types );
		}
	}
);

// Add the dev-blog-videos post type to the main RSS feed.
add_filter(
	'request',
	function( $query_vars ) {
		if ( isset( $query_vars['feed'] ) && ! isset( $query_vars['post_type'] ) ) {
			$query_vars['post_type'] = [ 'post', 'snippets', 'videos' ];
		}
		return $query_vars;
	}
);

