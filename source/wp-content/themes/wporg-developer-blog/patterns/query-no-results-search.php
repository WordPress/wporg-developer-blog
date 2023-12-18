<?php
/**
 * Title: No results message (search)
 * Slug: wporg-developer-blog/query-no-results-search
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
				__( 'View <a href="%s">all posts</a> or try a new search.', 'wporg' ),
				'/all-posts'
			)
		); ?>	
	</p>
	<!-- /wp:paragraph -->
</div>
<!-- /wp:group -->
