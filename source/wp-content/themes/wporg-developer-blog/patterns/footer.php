<?php
/**
 * Title: Footer content
 * Slug: wporg-developer-blog/footer
 */

?>
<!-- wp:group {"style":{"elements":{"link":{"color":{"text":"var:preset|color|white"}}},"border":{"top":{"color":"var:preset|color|black-opacity-15"},"right":{"color":"var:preset|color|black-opacity-15"},"bottom":{"color":"var:preset|color|white-opacity-15","width":"1px"},"left":{"color":"var:preset|color|black-opacity-15"}},"spacing":{"padding":{"top":"var:preset|spacing|40","bottom":"var:preset|spacing|40","left":"var:preset|spacing|edge-space","right":"var:preset|spacing|edge-space"}}},"backgroundColor":"charcoal-2","textColor":"white","className":"wporg-front-page-footer","layout":{"type":"constrained"}} -->
<div class="wp-block-group wporg-front-page-footer has-white-color has-charcoal-2-background-color has-text-color has-background has-link-color" style="border-top-color:var(--wp--preset--color--black-opacity-15);border-right-color:var(--wp--preset--color--black-opacity-15);border-bottom-color:var(--wp--preset--color--white-opacity-15);border-bottom-width:1px;border-left-color:var(--wp--preset--color--black-opacity-15);padding-top:var(--wp--preset--spacing--40);padding-right:var(--wp--preset--spacing--edge-space);padding-bottom:var(--wp--preset--spacing--40);padding-left:var(--wp--preset--spacing--edge-space)">
	<!-- wp:columns {"align":"wide","style":{"spacing":{"blockGap":{"top":"var:preset|spacing|50","left":"var:preset|spacing|60"}}}} -->
	<div class="wp-block-columns alignwide">
		<!-- wp:column {"style":{"spacing":{"blockGap":"var:preset|spacing|20"}}} -->
		<div class="wp-block-column">
			<!-- wp:heading {"style":{"typography":{"fontStyle":"normal"}},"fontSize":"large"} -->
			<h2 class="wp-block-heading has-large-font-size" style="font-style:normal"><?php esc_html_e( 'Have an idea for a new post?', 'wporg' ); ?></h2>
			<!-- /wp:heading -->

			<!-- wp:columns {"style":{"spacing":{"blockGap":{"top":"var:preset|spacing|30","left":"var:preset|spacing|40"}}}} -->
			<div class="wp-block-columns">
				<!-- wp:column -->
				<div class="wp-block-column">
					<!-- wp:group {"style":{"spacing":{"blockGap":"var:preset|spacing|10"}},"layout":{"type":"default"}} -->
					<div class="wp-block-group">
						<!-- wp:heading {"level":3,"style":{"elements":{"link":{"color":{"text":"var:preset|color|blueberry-2"}}},"typography":{"fontStyle":"normal","fontWeight":"700"}},"textColor":"blueberry-2","fontSize":"normal","fontFamily":"inter"} -->
						<h3 class="wp-block-heading has-blueberry-2-color has-text-color has-link-color has-inter-font-family has-normal-font-size" style="font-style:normal;font-weight:700"><a href="https://developer.wordpress.org/news/how-to-contribute/"><?php esc_html_e( 'Learn how to contribute', 'wporg' ); ?></a></h3>
						<!-- /wp:heading -->

						<!-- wp:paragraph {"fontSize":"normal"} -->
						<p class="has-normal-font-size"><?php esc_html_e( 'Share your knowledge with fellow WordPress developers.', 'wporg' ); ?></p>
						<!-- /wp:paragraph -->
					</div>
					<!-- /wp:group -->
				</div>
				<!-- /wp:column -->

				<!-- wp:column -->
				<div class="wp-block-column">
					<!-- wp:group {"style":{"spacing":{"blockGap":"var:preset|spacing|10"}},"layout":{"type":"default"}} -->
					<div class="wp-block-group">
						<!-- wp:heading {"level":3,"style":{"elements":{"link":{"color":{"text":"var:preset|color|blueberry-2"}}}},"textColor":"blueberry-2","fontSize":"normal","fontFamily":"inter"} -->
						<h3 class="wp-block-heading has-blueberry-2-color has-text-color has-link-color has-inter-font-family has-normal-font-size"><a href="https://developer.wordpress.org/news/tips-and-guidelines-for-writers/"><?php esc_html_e( 'Review tips and guidelines', 'wporg' ); ?></a></h3>
						<!-- /wp:heading -->

						<!-- wp:paragraph -->
						<p><?php esc_html_e( 'Everything you need to know about writing for the Blog.', 'wporg' ); ?></p>
						<!-- /wp:paragraph -->
					</div>
					<!-- /wp:group -->
				</div>
				<!-- /wp:column -->
			</div>
			<!-- /wp:columns -->
		</div>
		<!-- /wp:column -->

		<!-- wp:column {"style":{"spacing":{"blockGap":"var:preset|spacing|20"}}} -->
		<div class="wp-block-column">
			<!-- wp:heading {"style":{"typography":{"fontStyle":"normal"}},"fontSize":"large"} -->
			<h2 class="wp-block-heading has-large-font-size" style="font-style:normal;"><?php esc_html_e( 'Subscribe to the Blog', 'wporg' ); ?></h2>
			<!-- /wp:heading -->

			<!-- wp:jetpack/subscriptions {"subscribePlaceholder":"Email Address","showSubscribersTotal":true,"borderRadius":2,"borderWeight":0,"className":"wp-block-jetpack-subscriptions wp-block-jetpack-subscriptions__supports-newline is-style-compact","style":{"spacing":{"padding":{"right":"0","left":"0"}}}} /-->
		</div>
		<!-- /wp:column -->
	</div>
	<!-- /wp:columns -->
</div>
<!-- /wp:group -->
