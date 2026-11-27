<?php

namespace WordPressdotorg\Theme\Developer_Blog;

/**
 * Actions and filters.
 */
add_action( 'wp_enqueue_scripts', __NAMESPACE__ . '\enqueue_assets' );
add_action( 'after_setup_theme', __NAMESPACE__ . '\editor_setup' );
add_filter( 'excerpt_length', __NAMESPACE__ . '\customize_excerpt_length', 10 );
add_filter( 'render_block_core/search', __NAMESPACE__ . '\search_block_add_search_action', 10, 2 );
add_filter( 'render_block_core/post-author-name', __NAMESPACE__ . '\author_name_block_update_link_to_profile_text', 9, 2 );
add_filter( 'render_block_core/code', __NAMESPACE__ . '\code_block_add_line_breaks', 10, 1 );

// Enable Jetpack opengraph by default so we can customize it.
add_filter( 'jetpack_enable_open_graph', '__return_true' );
add_filter( 'jetpack_open_graph_tags', __NAMESPACE__ . '\custom_open_graph_tags', 15 ); // After social image generator on 12.
add_filter( 'jetpack_open_graph_image_default', __NAMESPACE__ . '\jetpack_open_graph_image_default', 11 );
add_filter( 'jetpack_twitter_cards_image_default', __NAMESPACE__ . '\jetpack_open_graph_image_default', 11 );

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

	// Preload the heading font(s).
	if ( is_callable( 'global_fonts_preload' ) ) {
		/* translators: Subsets can be any of cyrillic, cyrillic-ext, greek, greek-ext, vietnamese, latin, latin-ext. */
		$subsets = _x( 'Latin', 'Heading font subsets, comma separated', 'wporg' );
		// All headings.
		global_fonts_preload( 'EB Garamond, Inter', $subsets );
	}
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
		array( 'label' => __( 'Developer Blog', 'wporg' ) )
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
 * Replace breaks with new lines in all Code blocks on the front end.
 * This filter fixes an issue in the Code Syntax Highlighting Block.
 *
 * @param string $block_content The block content about to be filtered.
 * @return string The filtered block content.
 */
function code_block_add_line_breaks( $block_content ) {
	return str_ireplace(
		[ '<br>', '<br/>', '<br />' ],
		"\n",
		$block_content
	);
}

/**
 * If the Author Name block has the display-view-profile-text class
 * and is linked, display the "View author profile" text instead
 * of the author's name. This is used on Author archives.
 *
 * @param string $block_content The block content about to be appended.
 * @param array  $block         The block details.
 * @return string The filtered block content.
 */
function author_name_block_update_link_to_profile_text( $block_content, $block ) {
	if (
		$block['attrs']['isLink'] &&
		( isset( $block['attrs']['className'] ) && strpos( $block['attrs']['className'], 'display-view-profile-text' ) !== false )
	) {
		// Remove the filter which adds "By …".
		remove_filter( 'render_block_core/post-author-name', 'WordPressdotorg\Theme\Parent_2021\Gutenberg_Tweaks\render_author_prefix', 10, 2 );
		$pattern        = '/(<div[^>]*>.*<a[^>]*>).*?(<\/a>.*<\/div>)/is';
		$replacement    = '$1' . __( 'View author profile', 'wporg' ) . '<span aria-hidden="true">↗</span>$2';
		$updated_markup = preg_replace( $pattern, $replacement, $block_content );

		return $updated_markup;
	}
	if ( ! has_filter( 'render_block_core/post-author-name', 'WordPressdotorg\Theme\Parent_2021\Gutenberg_Tweaks\render_author_prefix' ) ) {
		// Add "By …" filter back, if it was unregistered.
		add_filter( 'render_block_core/post-author-name', 'WordPressdotorg\Theme\Parent_2021\Gutenberg_Tweaks\render_author_prefix', 10, 2 );
	}
	return $block_content;
}

/**
 * Add custom open-graph tags.
 *
 * @param array $tags Optional. Open Graph tags.
 *
 * @return array Filtered Open Graph tags.
 */
function custom_open_graph_tags( $tags = [] ) {
	// Use `name=""` for description.
	add_filter(
		'jetpack_open_graph_output',
		function( $html ) {
			return str_replace( '<meta property="description"', '<meta name="description"', $html );
		}
	);

	// Ensure all pages are using the default images.
	$tags['og:image'] = jetpack_open_graph_image_default();
	unset( $tags['og:image:width'] );
	unset( $tags['og:image:height'] );
	$tags['twitter:image'] = jetpack_open_graph_image_default();

	// Default values are OK, but fix the twitter title (uses page title otherwise).
	if ( is_front_page() ) {
		$tags['twitter:text:title']  = $tags['og:title'];
		return $tags;
	}

	// Default Jetpack values are OK.
	if ( ! is_singular() ) {
		return $tags;
	}

	$title = get_the_title();
	$desc = get_the_excerpt();
	$img_src = '';

	$image_id = get_post_thumbnail_id();
	if ( $image_id ) {
		list( $img_src, $img_width, $img_height ) = wp_get_attachment_image_src( $image_id, [ 1200, 1200 ] );
	}

	$tags['og:title']            = $title;
	$tags['twitter:text:title']  = $title;
	$tags['og:description']      = $desc;
	$tags['twitter:description'] = $desc;
	$tags['description']         = $desc;

	if ( $img_src ) {
		$tags['og:image'] = $img_src;
		$tags['twitter:image'] = $img_src;
		$tags['og:image:width'] = $img_width;
		$tags['og:image:height'] = $img_height;
	} else {
		$tags['og:image'] = jetpack_open_graph_image_default();
		unset( $tags['og:image:width'] );
		unset( $tags['og:image:height'] );
		$tags['twitter:image'] = jetpack_open_graph_image_default();
	}

	return $tags;
}

/**
 * Set a default image for og:image & twitter:image.
 */
function jetpack_open_graph_image_default() {
	return 'https://developer.wordpress.org/wp-content/themes/wporg-developer-blog/images/opengraph-image.png';
}
