<?php
/**
 * Title: Footer content
 * Slug: wporg-developer-blog/post-meta
 * Inserter: hidden
 */

?>
<!-- wp:group {"style":{"spacing":{"blockGap":"var:preset|spacing|10"}},"className":"remove-row-gap","layout":{"type":"flex","flexWrap":"wrap"}} -->
<div class="wp-block-group remove-row-gap">
	
	<!-- wp:group {"style":{"spacing":{"blockGap":"0.25rem"}},"layout":{"type":"flex","flexWrap":"nowrap"},"fontSize":"small"} -->
	<div class="wp-block-group has-small-font-size">
		<!-- wp:paragraph -->
		<p><?php esc_html_e( 'By', 'wporg' ); ?></p>
		<!-- /wp:paragraph -->

		<!-- wp:post-author-name {"isLink":true} /-->
	</div>
	<!-- /wp:group -->
	
	<!-- wp:paragraph -->
	<p>·</p>
	<!-- /wp:paragraph -->
	
	<!-- wp:post-date /-->
	
	<!-- wp:paragraph -->
	<p>·</p>
	<!-- /wp:paragraph -->
	
	<!-- wp:post-terms {"term":"category"} /-->
	
</div>
<!-- /wp:group -->
