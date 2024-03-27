<?php
/**
 * Title: All posts sidebar
 * Slug: wporg-developer-blog/sidebar-all-posts
 */

?>
<!-- wp:group {"style":{"spacing":{"blockGap":"var:preset|spacing|30"}},"layout":{"type":"constrained"}} -->
<div class="wp-block-group">
	<!-- wp:heading {"level":1,"fontSize":"heading-2","style":{"typography":{"fontStyle":"normal","fontWeight":"600"}}} -->
	<h1 class="wp-block-heading has-heading-2-font-size" style="font-weight: 600"><?php esc_html_e( 'All posts', 'wporg' ); ?></h1>
	<!-- /wp:heading -->

	<!-- wp:search {"label":"<?php esc_html_e( 'Search', 'wporg' ); ?>","showLabel":false,"placeholder":"<?php esc_html_e( 'Type your search keyword', 'wporg' ); ?>","width":100,"widthUnit":"%","buttonText":"<?php esc_html_e( 'Search', 'wporg' ); ?>","buttonPosition":"button-inside","buttonUseIcon":true,"query":{"post_type":"post"}} /-->
</div>
<!-- /wp:group -->
