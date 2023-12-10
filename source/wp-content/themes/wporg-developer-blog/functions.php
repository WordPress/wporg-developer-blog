<?php

namespace WordPressdotorg\Theme\Developer_Blog;

/**
 * Actions and filters.
 */
add_action( 'wp_enqueue_scripts', __NAMESPACE__ . '\enqueue_assets' );
add_action( 'after_setup_theme', __NAMESPACE__ . '\editor_setup' );
add_filter( 'excerpt_length', __NAMESPACE__ . '\customize_excerpt_length', 10 );
add_filter( 'render_block_core/search', __NAMESPACE__ . '\search_block_add_search_action', 10, 2 );
add_filter( 'render_block_core/post-author-name', __NAMESPACE__ . '\author_name_block_update_link_to_profile_text', 10, 2 );
/**
 * Enqueue scripts and styles.
 */
function enqueue_assets() {
	// The parent style is registered as `wporg-parent-2021-style`, and will be loaded unless
	// explicitly unregistered. We can load any child-theme overrides by declaring the parent
	// stylesheet as a dependency.
	wp_enqueue_style(
		'wporg-developer-blog-style',
		get_stylesheet_uri(),
		array( 'wporg-parent-2021-style', 'wporg-global-fonts' ),
		filemtime( __DIR__ . '/style.css' )
	);
}

/**
 * Perform Editor-specific functions.
 */
function editor_setup() {

    // Enqueue editor styles.
    add_editor_style( 'style.css' );

	// Remove core block patterns.
	remove_theme_support( 'core-block-patterns' );

	// Register a custom pattern category.
	register_block_pattern_category(
		'developer-blog', 
		array( 'label' => __( 'Developer Blog' ) )
	);
}

/**
 * Filter the except length to 45 words. This is about 2.5 lines of 
 * text in the main query.
 *
 * @param int $length Excerpt length.
 * @return int (Maybe) modified excerpt length.
 */
function customize_excerpt_length( $length ) {
	return 45;
}

/**
 * Replace the search action url with the custom attribute.
 *
 * @param string $block_content The block content about to be appended.
 * @param array  $block         The block details.
 * @return string The filtered block content.
 */
function search_block_add_search_action( $block_content, $block ) {
	if ( ! empty( $block['attrs']['formAction'] ) ) {
		$block_content = str_replace(
			'action="' . esc_url( home_url( '/' ) ) . '"',
			'action="' . esc_url( $block['attrs']['formAction'] ) . '"',
			$block_content
		);
	}

	return $block_content;
}

/**
 * If the Author Name block has the display-view-profile-text class
 * and is linked, display the "View author profile" text instead
 * of the author's name. This is used on Author archives.
 */
function author_name_block_update_link_to_profile_text( $block_content, $block ) {
	if ( 
		$block['attrs']['isLink'] && 
		( isset( $block['attrs']['className'] ) && strpos( $block['attrs']['className'], 'display-view-profile-text') !== false )
	) {

		$pattern        = '/(<div[^>]*>.*<a[^>]*>).*?(<\/a>.*<\/div>)/is';
		$replacement    = '$1' . __( 'View author profile' ) . '<span aria-hidden="true">↗</span>$2';
		$updated_markup = preg_replace( $pattern, $replacement, $block_content );
	
		return $updated_markup;
	}

	return $block_content;
}
