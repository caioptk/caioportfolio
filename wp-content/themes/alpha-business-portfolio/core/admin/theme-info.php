<?php
$alpha_business_portfolio_pro_purchase_url = "https://www.thealphablocks.com/themes/portfolio-wordpress-theme/";
$alpha_business_portfolio_doc_url = "https://www.thealphablocks.com/docs/alpha-business-portfolio-pro/";
$alpha_business_portfolio_live_demo_url = "https://www.thealphablocks.com/demos/alpha-business-portfolio/";
$alpha_business_portfolio_support_url = "https://wordpress.org/support/theme/alpha-business-portfolio/";
$alpha_business_portfolio_review_url = "https://wordpress.org/support/theme/alpha-business-portfolio/reviews/";

$alpha_business_portfolio_theme_name = esc_html( $theme->Name );
$alpha_business_portfolio_free_theme_name = str_replace( ' Pro', '',$alpha_business_portfolio_theme_name );
?>
<div class="alpha-business-portfolio--about-page--wrapper">
    <div id="alpha-business-portfolio-admin-about-page">
        <div class="alpha-business-portfolio-admin-card-header">
            <div class="alpha-business-portfolio-header-left">
                <h2><?php echo esc_html( $theme->Name ); ?></h2>
                <p><?php esc_html_e( 'Alpha Business Portfolio is a multifunctional WordPress full site editing theme that is compatible with all browsers and devices.', 'alpha-business-portfolio' ); ?></p>
            </div>
            <div class="alpha-business-portfolio-header-right">
                <div class="alpha-business-portfolio-card-header-button-group">
                    <a href="<?php echo $alpha_business_portfolio_pro_purchase_url; ?>" class="alpha-business-portfolio-admin-button premium-button" target="_blank"
                        rel="noreferrer"><span class="dashicons dashicons-arrow-right-alt"></span>
                        <?php esc_html_e( 'Get Premium Version', 'alpha-business-portfolio' ); ?>
                    </a>
                    <a href="<?php echo $alpha_business_portfolio_live_demo_url; ?>" class="alpha-business-portfolio-admin-button premium-button" target="_blank"
                        rel="noreferrer"><span class="dashicons dashicons-arrow-right-alt"></span>
                        <?php esc_html_e( 'Pro Live Demo', 'alpha-business-portfolio' ); ?>
                    </a>
                    <a href="<?php echo $alpha_business_portfolio_doc_url; ?>" class="alpha-business-portfolio-admin-button premium-button" target="_blank"
                        rel="noreferrer"><span class="dashicons dashicons-arrow-right-alt"></span>
                        <?php esc_html_e( 'Pro Theme Documentation', 'alpha-business-portfolio' ); ?>
                    </a>
                </div>
                <div class="alpha-business-portfolio-card-header-button-group bundle-card">
                    <a href="https://www.thealphablocks.com/themes/wordpress-theme-bundle/" class="alpha-business-portfolio-admin-button premium-button" target="_blank" rel="noreferrer"><span class="dashicons dashicons-arrow-right-alt"></span>
                        <?php esc_html_e( 'Get 20+ Block Themes @59', 'alpha-business-portfolio' ); ?>
                    </a>
                </div>
            </div>
        </div>

        <div class="feature-list">
            <div class="alpha-business-portfolio-about-container">
                <div class="alpha-business-portfolio-admin-card features">
                    <div class="alpha-business-portfolio-about-container alpha-business-portfolio-compare-table">
                        <div class="admin-grid-1">
                            <h3>
                                <?php echo esc_html( $alpha_business_portfolio_free_theme_name ); ?>
                                <?php esc_html_e( 'Free Vs Pro', 'alpha-business-portfolio' ); ?>
                            </h3>                            
                            <table>
                                <thead>
                                    <tr>
                                        <th>
                                            <?php echo esc_html( $theme->Name ); ?>
                                            <?php esc_html_e( 'Free', 'alpha-business-portfolio' ); ?>
                                            <p><?php esc_html_e( '( Limited blocks available )', 'alpha-business-portfolio' ); ?></p>
                                            
                                        </th>
                                        <th>
                                            <?php esc_html_e( 'Features', 'alpha-business-portfolio' ); ?>
                                        </th>
                                        <th>
                                            <?php esc_html_e( 'Alpha Business Portfolio Pro ', 'alpha-business-portfolio' ); ?>
                                            <p><?php esc_html_e( '( More Blocks & Settings available )', 'alpha-business-portfolio' ); ?></p>
                                        </th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td><span class="dashicons dashicons-yes"></span>
                                        </td>
                                        <td>
                                            <?php esc_html_e( 'Easy Setup', 'alpha-business-portfolio' ); ?>
                                        </td>
                                        <td><span class="dashicons dashicons-yes"></span>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td><span class="dashicons dashicons-yes"></span>
                                        </td>
                                        <td>
                                            <?php esc_html_e( 'Responsive Desgin', 'alpha-business-portfolio' ); ?>
                                        </td>
                                        <td><span class="dashicons dashicons-yes"></span>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td><span class="dashicons dashicons-yes"></span>
                                        </td>
                                        <td>
                                            <?php esc_html_e( 'SEO Friendly', 'alpha-business-portfolio' ); ?>
                                        </td>
                                        <td><span class="dashicons dashicons-yes"></span>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td><span class="dashicons dashicons-no"></span>
                                        </td>
                                        <td>
                                            <?php esc_html_e( '24/7 premium support', 'alpha-business-portfolio' ); ?>
                                        </td>
                                        <td><?php esc_html_e( 'High-Priority Dedicated Support', 'alpha-business-portfolio' ); ?>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td><span class="dashicons dashicons-no"></span>
                                        </td>
                                        <td>
                                            <?php esc_html_e( 'Different niches starter sites', 'alpha-business-portfolio' ); ?>
                                        </td>
                                        <td><span class="dashicons dashicons-yes"></span>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td><span class="dashicons dashicons-yes"></span>
                                        </td>
                                        <td>
                                            <?php esc_html_e( 'Secure transaction', 'alpha-business-portfolio' ); ?>
                                        </td>
                                        <td><span class="dashicons dashicons-yes"></span>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td><span class="dashicons dashicons-no"></span>
                                        </td>
                                        <td>
                                            <?php esc_html_e( 'Lifetime Updates', 'alpha-business-portfolio' ); ?>
                                        </td>
                                        <td><span class="dashicons dashicons-yes"></span>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td><span class="dashicons dashicons-yes"></span>
                                        </td>
                                        <td>
                                            <?php esc_html_e( 'No coding required', 'alpha-business-portfolio' ); ?>
                                        </td>
                                        <td><span class="dashicons dashicons-yes"></span>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                        </td>
                                        <td>
                                            <?php esc_html_e( 'WooCommerce', 'alpha-business-portfolio' ); ?>
                                        </td>
                                        <td>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td><span class="dashicons dashicons-yes"></span>
                                        </td>
                                        <td>
                                            <?php esc_html_e( 'Mini Cart', 'alpha-business-portfolio' ); ?>
                                        </td>
                                        <td><span class="dashicons dashicons-yes"></span>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td><span class="dashicons dashicons-no"></span>
                                        </td>
                                        <td>
                                            <?php esc_html_e( 'Upsells', 'alpha-business-portfolio' ); ?>
                                        </td>
                                        <td><span class="dashicons dashicons-yes"></span>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td><span class="dashicons dashicons-no"></span>
                                        </td>
                                        <td>
                                            <?php esc_html_e( 'Multi Steps', 'alpha-business-portfolio' ); ?>
                                        </td>
                                        <td><span class="dashicons dashicons-yes"></span>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td><span class="dashicons dashicons-yes"></span>
                                        </td>
                                        <td>
                                            <?php esc_html_e( 'Sticky cart', 'alpha-business-portfolio' ); ?>
                                        </td>
                                        <td><span class="dashicons dashicons-yes"></span>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td><span class="dashicons dashicons-no"></span>
                                        </td>
                                        <td>
                                            <?php esc_html_e( 'Bulk Variation', 'alpha-business-portfolio' ); ?>
                                        </td>
                                        <td><span class="dashicons dashicons-yes"></span>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td><span class="dashicons dashicons-yes"></span>
                                        </td>
                                        <td>
                                            <?php esc_html_e( 'Quick View', 'alpha-business-portfolio' ); ?>
                                        </td>
                                        <td><span class="dashicons dashicons-yes"></span>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                        </td>
                                        <td>
                                            <?php esc_html_e( 'Elementor', 'alpha-business-portfolio' ); ?>
                                        </td>
                                        <td>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td><span class="dashicons dashicons-yes"></span>
                                        </td>
                                        <td>
                                            <?php esc_html_e( 'Drag and Drop functionality', 'alpha-business-portfolio' ); ?>
                                        </td>
                                        <td><span class="dashicons dashicons-yes"></span>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td><span class="dashicons dashicons-yes"></span>
                                        </td>
                                        <td>
                                            <?php esc_html_e( 'One Click Demo Import', 'alpha-business-portfolio' ); ?>
                                        </td>
                                        <td><span class="dashicons dashicons-yes"></span>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td><span class="dashicons dashicons-no"></span>
                                        </td>
                                        <td>
                                            <?php esc_html_e( ' Featured Slider', 'alpha-business-portfolio' ); ?>
                                        </td>
                                        <td><span class="dashicons dashicons-yes"></span>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td><?php esc_html_e( 'Limited', 'alpha-business-portfolio' ); ?>
                                        </td>
                                        <td>
                                            <?php esc_html_e( 'Typography and color options', 'alpha-business-portfolio' ); ?>
                                        </td>
                                        <td><?php esc_html_e( 'Unlimited', 'alpha-business-portfolio' ); ?>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td><?php esc_html_e( 'Limited', 'alpha-business-portfolio' ); ?>
                                        </td>
                                        <td>
                                            <?php esc_html_e( 'Import components/ templates', 'alpha-business-portfolio' ); ?>
                                        </td>
                                        <td><span class="dashicons dashicons-yes"></span>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td><span class="dashicons dashicons-no"></span>
                                        </td>
                                        <td>
                                            <?php esc_html_e( 'One Click Demo Import', 'alpha-business-portfolio' ); ?>
                                        </td>
                                        <td><span class="dashicons dashicons-yes"></span>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                        </td>
                                        <td>
                                            <?php esc_html_e( 'Gutenberg block editor', 'alpha-business-portfolio' ); ?>
                                        </td>
                                        <td>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td><span class="dashicons dashicons-no"></span>
                                        </td>
                                        <td>
                                            <?php esc_html_e( 'Profile card (Block)', 'alpha-business-portfolio' ); ?>
                                        </td>
                                        <td><span class="dashicons dashicons-yes"></span>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td><?php esc_html_e( 'Limited', 'alpha-business-portfolio' ); ?>
                                        </td>
                                        <td>
                                            <?php esc_html_e( 'Blog (block)', 'alpha-business-portfolio' ); ?>
                                        </td>
                                        <td><span class="dashicons dashicons-yes"></span><?php esc_html_e( 'Unlimited', 'alpha-business-portfolio' ); ?>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td><?php esc_html_e( 'Limited', 'alpha-business-portfolio' ); ?>
                                        </td>
                                        <td>
                                            <?php esc_html_e( 'Carousel Post (Block)', 'alpha-business-portfolio' ); ?>
                                        </td>
                                        <td><span class="dashicons dashicons-yes"></span><?php esc_html_e( 'Unlimited', 'alpha-business-portfolio' ); ?>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td><span class="dashicons dashicons-yes"></span>
                                        </td>
                                        <td>
                                            <?php esc_html_e( 'Testimonials(block)', 'alpha-business-portfolio' ); ?>
                                        </td>
                                        <td><span class="dashicons dashicons-yes"></span>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td><span class="dashicons dashicons-no"></span>
                                        </td>
                                        <td>
                                            <?php esc_html_e( 'News Block', 'alpha-business-portfolio' ); ?>
                                        </td>
                                        <td><span class="dashicons dashicons-yes"></span>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td><?php esc_html_e( 'Limited', 'alpha-business-portfolio' ); ?>
                                        </td>
                                        <td>
                                            <?php esc_html_e( 'Templates and block patterns', 'alpha-business-portfolio' ); ?>
                                        </td>
                                        <td><span class="dashicons dashicons-yes"></span>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td><?php esc_html_e( 'Limited', 'alpha-business-portfolio' ); ?>
                                        </td>
                                        <td>
                                            <?php esc_html_e( 'Advanced Color Options', 'alpha-business-portfolio' ); ?>
                                        </td>
                                        <td><?php esc_html_e( 'Unlimited', 'alpha-business-portfolio' ); ?>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                        </td>
                                        <td>
                                            <?php esc_html_e( 'Theme Options', 'alpha-business-portfolio' ); ?>
                                        </td>
                                        <td>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td><span class="dashicons dashicons-no"></span>
                                        </td>
                                        <td>
                                            <?php esc_html_e( 'Enable Mini Cart On Header', 'alpha-business-portfolio' ); ?>
                                        </td>
                                        <td><span class="dashicons dashicons-yes"></span>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td><span class="dashicons dashicons-no"></span>
                                        </td>
                                        <td>
                                            <?php esc_html_e( 'Enable Testimonial Slider', 'alpha-business-portfolio' ); ?>
                                        </td>
                                        <td><span class="dashicons dashicons-yes"></span>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td><span class="dashicons dashicons-no"></span>
                                        </td>
                                        <td>
                                            <?php esc_html_e( 'Enable Sponsor Slider', 'alpha-business-portfolio' ); ?>
                                        </td>
                                        <td><span class="dashicons dashicons-yes"></span>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td><span class="dashicons dashicons-no"></span>
                                        </td>
                                        <td>
                                            <?php esc_html_e( 'Enable Sticky Header', 'alpha-business-portfolio' ); ?>
                                        </td>
                                        <td><span class="dashicons dashicons-yes"></span>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                        </td>
                                        <td>
                                            <?php esc_html_e( 'WP Travel Plugin', 'alpha-business-portfolio' ); ?>
                                        </td>
                                        <td>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td><span class="dashicons dashicons-yes"></span>
                                        </td>
                                        <td>
                                            <?php esc_html_e( 'Booking system', 'alpha-business-portfolio' ); ?>
                                        </td>
                                        <td><span class="dashicons dashicons-yes"></span>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td><span class="dashicons dashicons-yes"></span>
                                        </td>
                                        <td>
                                            <?php esc_html_e( 'Google Maps zoom level settings', 'alpha-business-portfolio' ); ?>
                                        </td>
                                        <td><span class="dashicons dashicons-yes"></span>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td><span class="dashicons dashicons-no"></span>
                                        </td>
                                        <td>
                                            <?php esc_html_e( 'Group discount', 'alpha-business-portfolio' ); ?>
                                        </td>
                                        <td><span class="dashicons dashicons-yes"></span>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td><span class="dashicons dashicons-no"></span>
                                        </td>
                                        <td>
                                            <?php esc_html_e( 'Wishlist', 'alpha-business-portfolio' ); ?>
                                        </td>
                                        <td><span class="dashicons dashicons-yes"></span>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td><?php esc_html_e( 'Limited', 'alpha-business-portfolio' ); ?>
                                        </td>
                                        <td>
                                            <?php esc_html_e( 'Tour extras', 'alpha-business-portfolio' ); ?>
                                        </td>
                                        <td><span class="dashicons dashicons-yes"></span>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td><span class="dashicons dashicons-yes"></span>
                                        </td>
                                        <td>
                                            <?php esc_html_e( 'Multiple prices and multiple dates', 'alpha-business-portfolio' ); ?>
                                        </td>
                                        <td><span class="dashicons dashicons-yes"></span>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td><span class="dashicons dashicons-yes"></span>
                                        </td>
                                        <td>
                                            <?php esc_html_e( 'Coupon', 'alpha-business-portfolio' ); ?>
                                        </td>
                                        <td><span class="dashicons dashicons-yes"></span>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                        </td>
                                        <td>
                                            <?php esc_html_e( 'Full Site Editing/Site Editor', 'alpha-business-portfolio' ); ?>
                                        </td>
                                        <td>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td><span class="dashicons dashicons-yes"></span><?php esc_html_e( 'Limited Features', 'alpha-business-portfolio' ); ?>
                                        </td>
                                        <td>
                                            <?php esc_html_e( 'Block themes', 'alpha-business-portfolio' ); ?>
                                        </td>
                                        <td><span class="dashicons dashicons-yes"></span>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td><span class="dashicons dashicons-no"></span>
                                        </td>
                                        <td>
                                            <?php esc_html_e( 'Style variations', 'alpha-business-portfolio' ); ?>
                                        </td>
                                        <td><span class="dashicons dashicons-yes"></span>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td><?php esc_html_e( 'Limited', 'alpha-business-portfolio' ); ?>
                                        </td>
                                        <td>
                                            <?php esc_html_e( 'Block patterns and template parts', 'alpha-business-portfolio' ); ?>
                                        </td>
                                        <td><span class="dashicons dashicons-yes"></span>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td><span class="dashicons dashicons-yes"></span>
                                        </td>
                                        <td>
                                            <?php esc_html_e( 'Global style Interface', 'alpha-business-portfolio' ); ?>
                                        </td>
                                        <td><span class="dashicons dashicons-yes"></span>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td><span class="dashicons dashicons-yes"></span>
                                        </td>
                                        <td>
                                            <?php esc_html_e( 'Edit each areas of website(header, footer, sidebar)', 'alpha-business-portfolio' ); ?>
                                        </td>
                                        <td><span class="dashicons dashicons-yes"></span>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
            <div class="alpha-business-portfolio-about-side">
                <div class="alpha-business-portfolio-admin-card cart-two">
                    <h3 class="alpha-business-portfolio-admin-card-title is-small">
                        <?php esc_html_e( 'Queries Greetings! We are here to assist.', 'alpha-business-portfolio' ); ?>
                    </h3>
                    <p><?php esc_html_e( '"Simple Setup - Our Committed Team will quickly set up your website."', 'alpha-business-portfolio' ); ?></p>
                    <div class="alpha-business-portfolio-card-header-button-group">
                        <a href="<?php echo $alpha_business_portfolio_support_url; ?>" class="alpha-business-portfolio-admin-button premium-button" target="_blank"
                            rel="noreferrer"><span class="dashicons dashicons-arrow-right-alt"></span>
                            <?php esc_html_e( 'Get Support', 'alpha-business-portfolio' ); ?>
                        </a>
                        <a href="<?php echo $alpha_business_portfolio_review_url; ?>" class="alpha-business-portfolio-admin-button premium-button" target="_blank"
                            rel="noreferrer"><span class="dashicons dashicons-arrow-right-alt"></span>
                            <?php esc_html_e( 'Add Reviews', 'alpha-business-portfolio' ); ?>
                        </a>
                        <a href="<?php echo $alpha_business_portfolio_pro_purchase_url; ?>" class="alpha-business-portfolio-admin-button premium-button" target="_blank"
                            rel="noreferrer"><span class="dashicons dashicons-arrow-right-alt"></span>
                            <?php esc_html_e( 'Get Premium Version', 'alpha-business-portfolio' ); ?>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>