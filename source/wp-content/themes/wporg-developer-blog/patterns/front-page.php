<?php
/**
 * Title: Front page content
 * Slug: wporg-developer-blog/front-page
 */

?>
<!-- wp:group {"align":"full","style":{"spacing":{"padding":{"right":"var:preset|spacing|edge-space","left":"var:preset|spacing|edge-space"}}},"backgroundColor":"charcoal-2","className":"has-white-color has-charcoal-2-background-color has-text-color has-background has-link-color","layout":{"type":"constrained"}} -->
<div class="wp-block-group alignfull has-white-color has-charcoal-2-background-color has-text-color has-background has-link-color" style="padding-right:var(--wp--preset--spacing--edge-space);padding-left:var(--wp--preset--spacing--edge-space)">
	<!-- wp:group {"align":"wide","style":{"spacing":{"padding":{"top":"var:preset|spacing|40","bottom":"var:preset|spacing|40"},"blockGap":"var:preset|spacing|30"}},"layout":{"type":"flex","flexWrap":"wrap","verticalAlignment":"bottom"}} -->
	<div class="wp-block-group alignwide" style="padding-top:var(--wp--preset--spacing--40);padding-bottom:var(--wp--preset--spacing--40)">
		<!-- wp:heading {"level":1,"style":{"typography":{"fontSize":"50px","fontStyle":"normal","fontWeight":"400"}},"fontFamily":"eb-garamond"} -->
		<h1 class="wp-block-heading has-eb-garamond-font-family" style="font-size:50px;font-style:normal;font-weight:400"><?php esc_html_e( 'Developer Blog', 'wporg' ); ?></h1>
		<!-- /wp:heading -->

		<!-- wp:paragraph {"style":{"typography":{"lineHeight":"2.3"}},"textColor":"white"} -->
		<p class="has-white-color has-text-color" style="line-height:2.3"><?php esc_html_e( '/Empowering WordPress builders', 'wporg' ); ?></p>
		<!-- /wp:paragraph -->
	</div>
	<!-- /wp:group -->
</div>
<!-- /wp:group -->

<!-- wp:group {"style":{"spacing":{"padding":{"right":"var:preset|spacing|edge-space","left":"var:preset|spacing|edge-space"}}},"backgroundColor":"light-grey-2","layout":{"type":"constrained"}} -->
<div class="wp-block-group has-light-grey-2-background-color has-background" style="padding-right:var(--wp--preset--spacing--edge-space);padding-left:var(--wp--preset--spacing--edge-space)">
	<!-- wp:query {"queryId":4,"query":{"perPage":"1","pages":"1","offset":0,"postType":"post","order":"desc","orderBy":"date","author":"","search":"","exclude":[],"sticky":"only","inherit":false},"align":"wide"} -->
	<div class="wp-block-query alignwide">
		<!-- wp:post-template -->
			<!-- wp:group {"style":{"spacing":{"padding":{"top":"var:preset|spacing|40","bottom":"var:preset|spacing|40"}}},"layout":{"type":"constrained","justifyContent":"left","contentSize":"800px"}} -->
			<div class="wp-block-group" style="padding-top:var(--wp--preset--spacing--40);padding-bottom:var(--wp--preset--spacing--40)">
				<!-- wp:heading -->
					<h2 class="wp-block-heading screen-reader-text"><?php esc_html_e( 'Featured post', 'wporg' ); ?></h2>
				<!-- /wp:heading -->
				<!-- wp:post-title {"level":3,"isLink":true,"fontSize":"heading-2","fontFamily":"inter","style":{"spacing":{"margin":{"top":"0"}},"typography":{"fontStyle":"normal","fontWeight":"600"}}} /-->


				<!-- wp:post-excerpt /-->

				<!-- wp:group {"style":{"spacing":{"blockGap":"var:preset|spacing|10"}},"className":"is-style-post-meta","layout":{"type":"flex","flexWrap":"wrap"}} -->
				<div class="wp-block-group is-style-post-meta">
					<!-- wp:post-author-name {"isLink":true,"fontSize":"small"} /-->

					<!-- wp:post-date /-->

					<!-- wp:post-terms {"term":"post_tag"} /-->
				</div>
				<!-- /wp:group -->
			</div>
			<!-- /wp:group -->
		<!-- /wp:post-template -->
	</div>
	<!-- /wp:query -->
</div>
<!-- /wp:group -->

<!-- wp:group {"style":{"spacing":{"padding":{"right":"var:preset|spacing|edge-space","left":"var:preset|spacing|edge-space","top":"var:preset|spacing|20","bottom":"var:preset|spacing|20"}}},"layout":{"type":"constrained"}} -->
<div class="wp-block-group" style="padding-top:var(--wp--preset--spacing--20);padding-right:var(--wp--preset--spacing--edge-space);padding-bottom:var(--wp--preset--spacing--20);padding-left:var(--wp--preset--spacing--edge-space)">
	<!-- wp:columns {"align":"wide","style":{"spacing":{"blockGap":{"top":"var:preset|spacing|50","left":"var:preset|spacing|80"},"padding":{"top":"var:preset|spacing|40","bottom":"var:preset|spacing|40"}}}} -->
	<div class="wp-block-columns alignwide" style="padding-top:var(--wp--preset--spacing--40);padding-bottom:var(--wp--preset--spacing--40)">
		<!-- wp:column {"width":"300px"} -->
		<div class="wp-block-column" style="flex-basis:300px">
			<!-- wp:group {"style":{"dimensions":{"minHeight":"100%"}},"layout":{"type":"flex","orientation":"vertical","verticalAlignment":"space-between","justifyContent":"stretch"}} -->
			<div class="wp-block-group" style="min-height:100%">
				<!-- wp:group {"style":{"spacing":{"blockGap":"var:preset|spacing|30"}},"layout":{"type":"constrained"}} -->
				<div class="wp-block-group">
					<!-- wp:heading {"fontSize":"heading-2"} -->
					<h2 class="wp-block-heading has-heading-2-font-size"><?php esc_html_e( 'Latest posts', 'wporg' ); ?></h2>
					<!-- /wp:heading -->

					<!-- wp:search {"label":"<?php esc_html_e( 'Search', 'wporg' ); ?>","showLabel":false,"placeholder":"<?php esc_html_e( 'Type your search keyword', 'wporg' ); ?>","width":100,"widthUnit":"%","buttonText":"<?php esc_html_e( 'Search', 'wporg' ); ?>","buttonPosition":"button-inside","buttonUseIcon":true,"query":{"post_type":"post"}} /-->
				</div>
				<!-- /wp:group -->

				<!-- wp:paragraph -->
				<p><a href="all-posts/"><?php esc_html_e( 'View all posts', 'wporg' ); ?></a></p>
				<!-- /wp:paragraph -->
			</div>
			<!-- /wp:group -->
		</div>
		<!-- /wp:column -->

		<!-- wp:column -->
		<div class="wp-block-column">
			<!-- wp:query {"queryId":3,"query":{"perPage":"5","pages":0,"offset":0,"postType":"post","order":"desc","orderBy":"date","author":"","search":"","exclude":[],"sticky":"exclude","inherit":false}} -->
			<div class="wp-block-query">
				<!-- wp:post-template {"style":{"spacing":{"blockGap":"var:preset|spacing|50"}}} -->
					<!-- wp:group {"style":{"spacing":{"blockGap":"var:preset|spacing|20"}},"layout":{"type":"default"}} -->
					<div class="wp-block-group">
						<!-- wp:group {"style":{"spacing":{"blockGap":"var:preset|spacing|10"}},"layout":{"type":"default"}} -->
						<div class="wp-block-group">
							<!-- wp:post-title {"isLink":true,"fontSize":"heading-4","fontFamily":"inter","style":{"typography":{"fontStyle":"normal","fontWeight":"600"}}} /-->

							<!-- wp:pattern {"slug":"wporg-developer-blog/post-meta"} /-->
						</div>
						<!-- /wp:group -->

						<!-- wp:post-excerpt /-->
					</div>
					<!-- /wp:group -->
				<!-- /wp:post-template -->
			</div>
			<!-- /wp:query -->
		</div>
		<!-- /wp:column -->
	</div>
	<!-- /wp:columns -->
</div>
<!-- /wp:group -->

<!-- wp:group {"style":{"spacing":{"padding":{"right":"var:preset|spacing|edge-space","left":"var:preset|spacing|edge-space"}}},"backgroundColor":"light-grey-2","layout":{"type":"constrained"}} -->
<div class="wp-block-group has-light-grey-2-background-color has-background" style="padding-right:var(--wp--preset--spacing--edge-space);padding-left:var(--wp--preset--spacing--edge-space)">
	<!-- wp:columns {"align":"wide","style":{"spacing":{"padding":{"top":"var:preset|spacing|40","bottom":"var:preset|spacing|40"},"blockGap":{"top":"var:preset|spacing|50","left":"var:preset|spacing|60"}}}} -->
	<div class="wp-block-columns alignwide" style="padding-top:var(--wp--preset--spacing--40);padding-bottom:var(--wp--preset--spacing--40)">
		<!-- wp:column {"style":{"spacing":{"blockGap":"var:preset|spacing|30"}}} -->
		<div class="wp-block-column">
			<!-- wp:heading {"fontSize":"heading-2"} -->
			<h2 class="wp-block-heading has-heading-2-font-size"><?php esc_html_e( 'Latest dev notes', 'wporg' ); ?></h2>
			<!-- /wp:heading -->

			<!-- wp:paragraph -->
			<p><?php esc_html_e( 'Stay up-to-date with the latest changes in WordPress with the official dev notes, which are published for each release.', 'wporg' ); ?></p>
			<!-- /wp:paragraph -->

			<!-- wp:rss {"feedURL":"https://make.wordpress.org/core/tag/dev-notes/feed/","itemsToShow":4,"displayAuthor":true,"displayDate":true} /-->

			<!-- wp:paragraph -->
			<p><a href="https://make.wordpress.org/core/tag/dev-notes/"><?php esc_html_e( 'View all dev notes', 'wporg' ); ?></a></p>
			<!-- /wp:paragraph -->
		</div>
		<!-- /wp:column -->

		<!-- wp:column {"style":{"spacing":{"blockGap":"var:preset|spacing|30"}}} -->
		<div class="wp-block-column">
			<!-- wp:heading {"fontSize":"heading-2"} -->
			<h2 class="wp-block-heading has-heading-2-font-size"><?php esc_html_e( 'Educational resources', 'wporg' ); ?></h2>
			<!-- /wp:heading -->

			<!-- wp:paragraph -->
			<p>
				<?php echo wp_kses_post(
					sprintf(
						/* translators: %s: url for Learn WordPress */
						__( 'On <a href="%s">Learn WordPress</a> you find courses and video tutorials that complement the developer documentation. Here are a few.', 'wporg' ),
						'https://learn.wordpress.org/'
					)
				); ?>	
			</p>
			<!-- /wp:paragraph -->

			<!-- wp:group {"style":{"spacing":{"blockGap":"10px"}},"layout":{"type":"constrained"}} -->
			<div class="wp-block-group">
				<!-- wp:paragraph -->
				<p><a href="https://learn.wordpress.org/course/introduction-to-block-development-build-your-first-custom-block/"><?php esc_html_e( 'Introduction to Block Development: Build your first custom block', 'wporg' ); ?></a></p>
				<!-- /wp:paragraph -->

				<!-- wp:paragraph -->
				<p><a href="https://learn.wordpress.org/course/using-the-wordpress-data-layer/"><?php esc_html_e( 'Using the WordPress Data Layer', 'wporg' ); ?></a></p>
				<!-- /wp:paragraph -->

				<!-- wp:paragraph -->
				<p><a href="https://learn.wordpress.org/course/a-developers-guide-to-block-themes-part-1/"><?php esc_html_e( 'Developers Guide to Block Themes (Part 1)', 'wporg' ); ?></a></p>
				<!-- /wp:paragraph -->

				<!-- wp:paragraph -->
				<p><a href="https://learn.wordpress.org/course/a-developers-guide-to-block-themes-part-2/"><?php esc_html_e( 'A Developers Guide to Block Themes  (Part 2)', 'wporg' ); ?></a></p>
				<!-- /wp:paragraph -->
			</div>
			<!-- /wp:group -->

			<!-- wp:paragraph -->
			<p>
				<?php echo wp_kses_post(
					sprintf(
						/* translators: %s: url for online workshops */
						__( 'See also the <a href="%s">calendar of online workshops</a>. You\'ll find events for developers are happening every week.', 'wporg' ),
						'https://learn.wordpress.org/online-workshops/'
					)
				); ?>	
			</p>
			<!-- /wp:paragraph -->
		</div>
		<!-- /wp:column -->
	</div>
	<!-- /wp:columns -->
</div>
<!-- /wp:group -->
