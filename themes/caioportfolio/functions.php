<?php


/**
 * caioportfolio functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @subpackage caioportfolio
 * @since caioportfolio 1.0
 */

 function caioportfolio_block_assets(){
    // Enqueue theme stylesheet for the front-end.
    wp_enqueue_style( 'caioportfolio-style', get_stylesheet_directory_uri() . '/style.css', array(), wp_get_theme()->get( 'Version' ) );
	wp_enqueue_style( 'caioportfolio-fontawesome', get_stylesheet_directory_uri() . '/assets/font-awesome/css/all.css', array(), '5.15.3' );
	wp_enqueue_style( 'caioportfolio-animatecss', get_stylesheet_directory_uri() . '/assets/css/animate.css');
	wp_enqueue_script('caioportfolio-wow-script', get_stylesheet_directory_uri() . '/assets/js/wow.js', array('jquery'));
	wp_enqueue_script('caioportfolio-main-script', get_stylesheet_directory_uri() . '/assets/js/script.js', array('jquery'), '1.0.0', true);
	wp_enqueue_script('caioportfolio-jquery-sticky', get_stylesheet_directory_uri() . '/assets/js/jquery-sticky.js', array('jquery') );    
}

add_action('enqueue_block_assets', 'caioportfolio_block_assets');

// register own theme pattern

function caioportfolio_register_pattern_category() {

	$patterns = array();

	$block_pattern_categories = array(
		'caioportfolio' => array( 'label' => __( 'caioportfolio', 'caioportfolio' ) )
	);

	$block_pattern_categories = apply_filters( 'caioportfolio_block_pattern_categories', $block_pattern_categories );

	foreach ( $block_pattern_categories as $name => $properties ) {
		if ( ! WP_Block_Pattern_Categories_Registry::get_instance()->is_registered( $name ) ) {
			register_block_pattern_category( $name, $properties );
		}
	}
}

add_action( 'init', 'caioportfolio_register_pattern_category');

function add_google_analytics_tag() {
  if (strpos($_SERVER['HTTP_HOST'], 'localhost') === false && strpos($_SERVER['HTTP_HOST'], '.local') === false) {
    ?>
    <!-- Google tag (gtag.js) -->
    <script async src="https://www.googletagmanager.com/gtag/js?id=G-E6Z24TYVFF"></script>
    <script>
      window.dataLayer = window.dataLayer || [];
      function gtag(){dataLayer.push(arguments);}
      gtag('js', new Date());

      gtag('config', 'G-E6Z24TYVFF');
    </script>
    <?php
  }
}
add_action('wp_head', 'add_google_analytics_tag');

function caioportfolio_add_favicons() {
    $theme_dir = esc_url( get_stylesheet_directory_uri() );
    echo '<link rel="icon" href="' . $theme_dir . '/assets/images/favicon.ico" type="image/x-icon">' . "\n";
    echo '<link rel="apple-touch-icon" sizes="180x180" href="' . $theme_dir . '/assets/images/apple-touch-icon.png">' . "\n";
    echo '<link rel="icon" type="image/png" sizes="32x32" href="' . $theme_dir . '/assets/images/favicon-32x32.png">' . "\n";
    echo '<link rel="icon" type="image/png" sizes="16x16" href="' . $theme_dir . '/assets/images/favicon-16x16.png">' . "\n";
    echo '<link rel="icon" type="image/png" sizes="192x192" href="' . $theme_dir . '/assets/images/android-chrome-192x192.png">' . "\n";
    echo '<link rel="icon" type="image/png" sizes="512x512" href="' . $theme_dir . '/assets/images/android-chrome-512x512.png">' . "\n";
    echo '<link rel="manifest" href="' . $theme_dir . '/assets/images/site.webmanifest">' . "\n";
}
add_action( 'wp_head', 'caioportfolio_add_favicons' );
