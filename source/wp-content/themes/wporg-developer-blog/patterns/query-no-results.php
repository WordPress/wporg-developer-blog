<?php
/**
 * Title: No results message (default)
 * Slug: wporg-developer-blog/query-no-results
 */

?>
<!-- wp:group {"style":{"spacing":{"blockGap":"var:preset|spacing|20","padding":{"top":"10px","bottom":"10px"}}},"layout":{"type":"constrained"}} -->
<div class="wp-block-group" style="padding-top:10px;padding-bottom:10px">
	<!-- wp:heading {"fontSize":"heading-3"} -->
	<h2 class="wp-block-heading has-heading-3-font-size"><?php esc_html_e( 'No results found', 'wporg' ); ?></h2>
	<!-- /wp:heading -->

	<!-- wp:paragraph -->
	<p>
		<?php echo wp_kses_post(
			sprintf(
				/* translators: %s: url to view all posts */
				__( 'View <a href="%s">all posts</a> or try a search.', 'wporg' ),
				'/all-posts'
			)
		); ?>	
	</p>
	<!-- /wp:paragraph -->

	<!-- wp:search {"label":"<?php esc_html_e( 'Search', 'wporg' ); ?>","showLabel":false,"placeholder":"<?php esc_html_e( 'Type your search keyword', 'wporg' ); ?>","width":100,"widthUnit":"%","buttonText":"<?php esc_html_e( 'Search', 'wporg' ); ?>","buttonPosition":"button-inside","buttonUseIcon":true,"query":{"post_type":"post"}} /-->
</div>
<!-- /wp:group -->
