<?php

namespace WordPressdotorg\Theme\Developer_Blog;

/**
 * Actions and filters.
 */
add_action( 'wp_enqueue_scripts',       __NAMESPACE__ . '\enqueue_assets' );
add_action( 'wp_head',                  __NAMESPACE__ . '\output_head_tags', 2 );
add_filter( 'render_block_core/search', __NAMESPACE__ . '\search_block_add_search_action', 10, 2 );

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

	$desc = '';

	if ( is_singular() ) {
		$post = get_queried_object();
		if ( $post ) {
			$desc = $post->post_content;
		}
	}

	// Actually set field values for description.
	if ( ! empty( $desc ) ) {
		$desc = wp_strip_all_tags( $desc );
		$desc = str_replace( '&nbsp;', ' ', $desc );
		$desc = preg_replace( '/\s+/', ' ', $desc );

		// Trim down to <150 characters based on full words.
		if ( strlen( $desc ) > 150 ) {
			$truncated = '';
			$words = preg_split( "/[\n\r\t ]+/", $desc, -1, PREG_SPLIT_NO_EMPTY );

			while ( $words ) {
				$word = array_shift( $words );
				if ( strlen( $truncated ) + strlen( $word ) >= 141 ) { /* 150 - strlen( ' &hellip;' ) */
					break;
				}

				$truncated .= $word . ' ';
			}

			$truncated = trim( $truncated );

			if ( $words ) {
				$truncated .= '&hellip;';
			}

			$desc = $truncated;
		}

		$fields['description']    = $desc;
		$fields['og:description'] = $desc;
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
