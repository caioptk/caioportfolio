<?php
/**
 * Title: Banner
 * Slug: caioportfolio/banner
 * Categories: caioportfolio
 * Keywords: banner
 */
?>
<!-- wp:cover {"url":"<?php echo esc_url( get_stylesheet_directory_uri() );?>/assets/images/banner.png","id":4883,"dimRatio":0,"isUserOverlayColor":true,"minHeight":650,"contentPosition":"center center","isDark":false,"tagName":"main","metadata":{"name":"Banner"},"style":{"spacing":{"padding":{"top":"0","bottom":"0","left":"0","right":"0"},"margin":{"top":"0","bottom":"0"}}},"className":"banner","layout":{"type":"default"}} -->
<main class="wp-block-cover is-light banner" style="margin-top:0;margin-bottom:0;padding-top:0;padding-right:0;padding-bottom:0;padding-left:0;min-height:650px"><span aria-hidden="true" class="wp-block-cover__background has-background-dim-0 has-background-dim"></span><img class="wp-block-cover__image-background wp-image-4883" alt="" src="<?php echo esc_url( get_stylesheet_directory_uri() );?>/assets/images/banner.png" data-object-fit="cover"/><div class="wp-block-cover__inner-container"><!-- wp:group {"style":{"spacing":{"padding":{"top":"0","bottom":"0","left":"0","right":"0"}}},"className":"animate__animated animate__fadeInUp","layout":{"type":"constrained","contentSize":"780px"}} -->
<div class="wp-block-group animate__animated animate__fadeInUp" style="padding-top:0;padding-right:0;padding-bottom:0;padding-left:0"><!-- wp:heading {"textAlign":"center","level":1,"style":{"elements":{"link":{"color":{"text":"var:preset|color|secondary"}}},"typography":{"fontSize":"4.5rem"}},"textColor":"secondary"} -->
<h1 class="wp-block-heading has-text-align-center has-secondary-color has-text-color has-link-color" style="font-size:4.5rem"><?php echo esc_html__( 'Hi I am Brooklin!', 'caioportfolio' ); ?></h1>
<!-- /wp:heading -->

<!-- wp:group {"style":{"spacing":{"blockGap":"0","margin":{"top":"0"}}},"layout":{"type":"constrained"}} -->
<div class="wp-block-group" style="margin-top:0"><!-- wp:paragraph {"align":"center","style":{"elements":{"link":{"color":{"text":"var:preset|color|primary"}}},"typography":{"fontStyle":"normal","fontWeight":"700"}},"textColor":"primary","fontSize":"x-large"} -->
<p class="has-text-align-center has-primary-color has-text-color has-link-color has-x-large-font-size" style="font-style:normal;font-weight:700"><?php echo esc_html__( 'a UX Designer', 'caioportfolio' ); ?></p>
<!-- /wp:paragraph -->

<!-- wp:paragraph {"align":"center","style":{"elements":{"link":{"color":{"text":"var:preset|color|secondary"}}},"typography":{"lineHeight":"1.4"}},"textColor":"secondary","fontSize":"large"} -->
<p class="has-text-align-center has-secondary-color has-text-color has-link-color has-large-font-size" style="line-height:1.4"><?php echo esc_html__( 'with 10 years experience', 'caioportfolio' ); ?></p>
<!-- /wp:paragraph -->

<!-- wp:paragraph {"align":"center","style":{"elements":{"link":{"color":{"text":"var:preset|color|secondary"}}},"typography":{"lineHeight":"1.4"}},"textColor":"secondary","fontSize":"large"} -->
<p class="has-text-align-center has-secondary-color has-text-color has-link-color has-large-font-size" style="line-height:1.4"><?php echo esc_html__( 'working at caioportfolio', 'caioportfolio' ); ?></p>
<!-- /wp:paragraph --></div>
<!-- /wp:group -->

<!-- wp:buttons {"layout":{"type":"flex","justifyContent":"center"},"style":{"spacing":{"margin":{"top":"var:preset|spacing|30"}}}} -->
<div class="wp-block-buttons" style="margin-top:var(--wp--preset--spacing--30)"><!-- wp:button -->
<div class="wp-block-button"><a class="wp-block-button__link wp-element-button">Hire Me</a></div>
<!-- /wp:button --></div>
<!-- /wp:buttons --></div>
<!-- /wp:group --></div></main>
<!-- /wp:cover -->