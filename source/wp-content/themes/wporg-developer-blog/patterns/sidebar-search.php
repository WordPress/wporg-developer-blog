<?php
/**
 * Title: Search sidebar
 * Slug: wporg-developer-blog/sidebar-search
 */

?>
<!-- wp:group {"style":{"spacing":{"blockGap":"var:preset|spacing|30"}},"layout":{"type":"constrained"}} -->
<div class="wp-block-group">
	<!-- wp:query-title {"type":"search","fontSize":"heading-2","fontFamily":"inter","style":{"typography":{"fontStyle":"normal","fontWeight":"600"}}} /-->

	<!-- wp:search {"label":"<?php esc_html_e( 'Search', 'wporg' ); ?>","showLabel":false,"placeholder":"<?php esc_html_e( 'Type your search keyword', 'wporg' ); ?>","width":100,"widthUnit":"%","buttonText":"<?php esc_html_e( 'Search', 'wporg' ); ?>","buttonPosition":"button-inside","buttonUseIcon":true,"query":{"post_type":"post"}} /-->
</div>
<!-- /wp:group -->
