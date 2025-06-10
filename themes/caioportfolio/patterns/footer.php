<?php
/**
 * Title: Footer
 * Slug: caioportfolio/footer
 * Categories: footer,caioportfolio
 * Keywords: footer
 * Block Types: core/template-part/footer
 */
?>

<div class="wp-block-group">
    <!-- wp:group {"style":{"spacing":{"padding":{"top":"var:preset|spacing|40","bottom":"var:preset|spacing|40"}}},"layout":{"type":"constrained"}} -->

    <!-- /wp:group -->

    <!-- wp:group {"style":{"spacing":{"blockGap":"0","margin":{"top":"0","bottom":"0"},"padding":{"top":"var:preset|spacing|40","bottom":"var:preset|spacing|40","left":"var:preset|spacing|20","right":"var:preset|spacing|20"}},"border":{"top":{"color":"#d092ba","width":"1px"}}},"className":"pg-footer-center-row","layout":{"type":"constrained"}} -->
    <div class="wp-block-group pg-footer-center-row"
        style="border-top-color:#d092ba;border-top-width:1px;margin-top:0;margin-bottom:0;padding-top:1.5rem;padding-right:var(--wp--preset--spacing--20);padding-bottom:1.5rem;padding-left:var(--wp--preset--spacing--20)">
        <!-- wp:columns {"style":{"spacing":{"blockGap":{"top":"var:preset|spacing|40","left":"var:preset|spacing|40"}}}} -->
        <div class="wp-block-columns">
            <!-- wp:column {"width":"","layout":{"type":"default"}} -->
            <div class="wp-block-column">
                <!-- wp:group {"layout":{"type":"constrained","justifyContent":"center"}} -->
                <div class="wp-block-group">
                    <!-- wp:paragraph {"fontSize":"mdm-large","fontFamily":"header-font"} -->
                    <div class="footer-logo" style="text-align: center; margin-bottom: 1rem;">
                        <a href="<?php echo esc_url(home_url('/')); ?>">
                            <img src="<?php echo esc_url(get_stylesheet_directory_uri()); ?>/assets/images/android-chrome-192x192.png"
                                alt="Caio Portfolio" width="120" height="auto" />
                        </a>
                    </div>
                </div>
                <!-- /wp:group -->
            </div>
            <!-- /wp:column -->
            <!-- wp:column {"width":""} -->
            <div class="wp-block-column">
                <!-- wp:group {"layout":{"type":"constrained"}} -->
                <div class="wp-block-group">
                    <div class="wp-block-group" style="text-align: center; padding: 2rem 0;">
                        <span class="inline-flex justify-center space-x-5">
                            <a href="https://www.linkedin.com/in/petelinkar" target="_blank" class="social-icon">
                                <span class="sr-only">LinkedIn</span>
                                <img src="<?php echo esc_url(get_stylesheet_directory_uri()); ?>/assets/images/linkedin.svg"
                                    alt="LinkedIn" width="24" height="24" />
                            </a>
                            <a href="https://www.youtube.com/@CaioPetelinkar" target="_blank" class="social-icon">
                                <span class="sr-only">YouTube</span>
                                <img src="<?php echo esc_url(get_stylesheet_directory_uri()); ?>/assets/images/youtube.svg"
                                    alt="YouTube" width="24" height="24" />
                            </a>
                            <a href="https://github.com/caioptk" target="_blank" class="social-icon">
                                <span class="sr-only">GitHub</span>
                                <img src="<?php echo esc_url(get_stylesheet_directory_uri()); ?>/assets/images/github.svg"
                                    alt="GitHub" width="24" height="24" />
                            </a>
                        </span>
                    </div>
                </div>
                <!-- /wp:group -->
            </div>
            <!-- /wp:column -->

            <!-- wp:column {"verticalAlignment":"center","width":"40%"} -->
            <div class="wp-block-column is-vertically-aligned-center" style="flex-basis:40%">
                <!-- wp:group {"style":{"border":{"radius":"10px"},"spacing":{"blockGap":"12px","padding":{"top":"0","bottom":"0","left":"0","right":"0"}}},"layout":{"type":"flex","flexWrap":"nowrap","justifyContent":"left"}} -->
                <div class="wp-block-group"
                    style="border-radius:10px;padding-top:0;padding-right:0;padding-bottom:0;padding-left:0">
                    <!-- wp:group {"layout":{"type":"flex","orientation":"vertical"}} -->
                    <div class="wp-block-group">
                        <!-- Heading -->
                        <p class="has-header-font-font-family has-mdm-large-font-size">
                            <?php echo esc_html__("Let's connect:", 'caioportfolio'); ?>
                        </p>

                        <!-- Email -->
                        <p>
                            <a href="mailto:caioptk@gmail.com">caioptk@gmail.com</a>
                        </p>

                        <!-- CV Download -->
                        <p>
                            <a href="/uploads/2025/06/Caio_Petelinkar_CV_2025_JUNE.pdf" target="_blank" rel="noopener">
                                📄 Download my CV
                            </a>
                        </p>
                    </div>
                    <!-- /wp:group -->
                </div>
                <!-- /wp:group -->
            </div>
            <!-- /wp:column -->
        </div>
        <!-- /wp:columns -->
    </div>
    <!-- /wp:group -->

    <!-- wp:group {"style":{"spacing":{"padding":{"top":"var:preset|spacing|20","bottom":"var:preset|spacing|20","left":"var:preset|spacing|20","right":"var:preset|spacing|20"},"margin":{"top":"0","bottom":"0"}},"border":{"top":{"color":"#d092ba","width":"1px"}}},"layout":{"type":"constrained"}} -->

    <!-- /wp:group -->

    <!-- wp:paragraph {"className":"caioportfolio-scrool-top"} -->
    <p class="caioportfolio-scrool-top"></p>
    <!-- /wp:paragraph -->
</div>
<!-- /wp:group -->