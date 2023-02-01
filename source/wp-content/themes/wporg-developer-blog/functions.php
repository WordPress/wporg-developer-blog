<?php

namespace WordPressdotorg\Theme\Developer_Blog;

/**
 * Actions and filters.
 */
add_action( 'wp_enqueue_scripts',       __NAMESPACE__ . '\enqueue_assets' );
add_action( 'wp_head',                  __NAMESPACE__ . '\output_head_tags', 2 );
add_filter( 'render_block_core/search', __NAMESPACE__ . '\search_block_add_search_action', 10, 2 );
add_filter( 'excerpt_length',           __NAMESPACE__ . '\customize_excerpt_length', 10 );

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
 * Outputs tags for the page head.
 */
function output_head_tags() {
	$fields = [
		// FYI: 'description' and 'og:description' are set further down.
		'og:title'       => wp_get_document_title(),
		'og:site_name'   => get_bloginfo( 'name' ),
		'og:url'         => home_url( '/' ),
		'twitter:title'  => wp_get_document_title(),
		'twitter:site'   => '@WordPress',
	];

	$excerpt = '';

	if ( is_singular() ) {
		$excerpt = get_the_excerpt();
	}

	if ( ! empty( $excerpt ) ) {
		$fields['description']    = $excerpt;
		$fields['og:description'] = $excerpt;
	}

	// Output fields.
	foreach ( $fields as $property => $content ) {
		$attribute = 0 === strpos( $property, 'og:' ) ? 'property' : 'name';
		printf(
			'<meta %s="%s" content="%s" />' . "\n",
			esc_attr( $attribute ),
			esc_attr( $property ),
			esc_attr( $content )
		);
	}
}

/**
 * Filter the except length to 20 words.
 *
 * @param int $length Excerpt length.
 * @return int (Maybe) modified excerpt length.
 */
function customize_excerpt_length( $length ) {
	return 20;
}
