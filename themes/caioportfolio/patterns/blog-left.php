<?php
 /**
  * Title: Blog Left
  * Slug: caioportfolio/blog-left
  * Inserter: no
  */
?>
<!-- wp:cover {"url":"<?php echo esc_url( get_stylesheet_directory_uri() );?>/assets/images/work.jpg","id":169,"dimRatio":70,"overlayColor":"black","isUserOverlayColor":true,"minHeight":232,"minHeightUnit":"px","tagName":"main","style":{"spacing":{"blockGap":"0","margin":{"top":"0","bottom":"0"}}},"layout":{"type":"constrained"}} -->
<main class="wp-block-cover" style="margin-top:0;margin-bottom:0;min-height:232px"><span aria-hidden="true" class="wp-block-cover__background has-black-background-color has-background-dim-70 has-background-dim"></span><img class="wp-block-cover__image-background wp-image-169" alt="" src="<?php echo esc_url( get_stylesheet_directory_uri() );?>/assets/images/work.jpg" data-object-fit="cover"/><div class="wp-block-cover__inner-container"><!-- wp:query-title {"type":"archive","textAlign":"center","style":{"typography":{"fontSize":"32px","fontStyle":"normal","fontWeight":"700"}}} /--></div></main>
<!-- /wp:cover -->

<!-- wp:group {"tagName":"main","style":{"spacing":{"margin":{"top":"var:preset|spacing|40","bottom":"var:preset|spacing|40"},"padding":{"right":"20px","left":"20px"}}},"layout":{"type":"constrained"}} -->
<main class="wp-block-group" style="margin-top:var(--wp--preset--spacing--40);margin-bottom:var(--wp--preset--spacing--40);padding-right:20px;padding-left:20px"><!-- wp:columns -->
<div class="wp-block-columns"><!-- wp:column {"width":"33.33%","style":{"spacing":{"padding":{"left":"0"}}}} -->
<div class="wp-block-column" style="padding-left:0;flex-basis:33.33%"><!-- wp:template-part {"slug":"sidebar","theme":"caioportfolio","area":"uncategorized"} /--></div>
<!-- /wp:column -->

<!-- wp:column {"width":"66.66%"} -->
<div class="wp-block-column" style="flex-basis:66.66%"><!-- wp:query {"queryId":37,"query":{"perPage":4,"pages":0,"offset":0,"postType":"post","order":"desc","orderBy":"date","author":"","search":"","exclude":[],"sticky":"","inherit":false},"layout":{"type":"default"}} -->
<div class="wp-block-query"><!-- wp:post-template {"layout":{"type":"grid","columnCount":2}} -->
<!-- wp:group {"style":{"spacing":{"padding":{"top":"0","bottom":"var:preset|spacing|20","left":"0px","right":"0px"}},"border":{"radius":"10px"}},"backgroundColor":"base","className":"post-block","layout":{"type":"default"}} -->
<div class="wp-block-group post-block has-base-background-color has-background" style="border-radius:10px;padding-top:0;padding-right:0px;padding-bottom:var(--wp--preset--spacing--20);padding-left:0px"><!-- wp:group {"style":{"spacing":{"blockGap":"0"}},"layout":{"type":"default"}} -->
<div class="wp-block-group"><!-- wp:post-featured-image {"isLink":true,"style":{"border":{"radius":"10px"},"spacing":{"margin":{"top":"0","bottom":"0","left":"0","right":"0"}}}} /-->

<!-- wp:group {"style":{"spacing":{"padding":{"right":"var:preset|spacing|20","left":"var:preset|spacing|20"}}},"layout":{"type":"default"}} -->
<div class="wp-block-group" style="padding-right:var(--wp--preset--spacing--20);padding-left:var(--wp--preset--spacing--20)"><!-- wp:group {"style":{"spacing":{"padding":{"top":"var:preset|spacing|10"}}},"layout":{"type":"flex","flexWrap":"nowrap"}} -->
<div class="wp-block-group" style="padding-top:var(--wp--preset--spacing--10)"><!-- wp:post-author {"showAvatar":false} /-->

<!-- wp:post-date /--></div>
<!-- /wp:group -->

<!-- wp:post-title {"isLink":true,"style":{"typography":{"fontSize":"21px","fontStyle":"normal","fontWeight":"700","lineHeight":"1.6"},"spacing":{"padding":{"top":"0"}},"elements":{"link":{"color":{"text":"var:preset|color|secondary"}}}},"textColor":"secondary"} /-->

<!-- wp:post-excerpt {"moreText":"Read More","excerptLength":10} /--></div>
<!-- /wp:group --></div>
<!-- /wp:group --></div>
<!-- /wp:group -->

<!-- wp:spacer {"height":"20px"} -->
<div style="height:20px" aria-hidden="true" class="wp-block-spacer"></div>
<!-- /wp:spacer -->
<!-- /wp:post-template -->

<!-- wp:query-pagination {"layout":{"type":"flex","justifyContent":"center"}} -->
<!-- wp:query-pagination-previous /-->

<!-- wp:query-pagination-numbers /-->

<!-- wp:query-pagination-next /-->
<!-- /wp:query-pagination -->

<!-- wp:query-no-results -->
<!-- wp:paragraph {"align":"center","placeholder":"Add text or blocks that will display when a query returns no results."} -->
<p class="has-text-align-center"> <?php echo esc_html__( 'No posts found', 'caioportfolio' ); ?> </p>
<!-- /wp:paragraph -->
<!-- /wp:query-no-results --></div>
<!-- /wp:query --></div>
<!-- /wp:column --></div>
<!-- /wp:columns --></main>
<!-- /wp:group -->