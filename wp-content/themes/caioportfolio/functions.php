<?php


/**
 * PortfolioGrove functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @subpackage PortfolioGrove
 * @since PortfolioGrove 1.0
 */

 function portfoliogrove_block_assets(){
    // Enqueue theme stylesheet for the front-end.
    wp_enqueue_style( 'portfoliogrove-style', get_stylesheet_directory_uri() . '/style.css', array(), wp_get_theme()->get( 'Version' ) );
	wp_enqueue_style( 'portfoliogrove-fontawesome', get_stylesheet_directory_uri() . '/assets/font-awesome/css/all.css', array(), '5.15.3' );
	wp_enqueue_style( 'portfoliogrove-animatecss', get_stylesheet_directory_uri() . '/assets/css/animate.css');
	wp_enqueue_script('portfoliogrove-wow-script', get_stylesheet_directory_uri() . '/assets/js/wow.js', array('jquery'));
	wp_enqueue_script('portfoliogrove-main-script', get_stylesheet_directory_uri() . '/assets/js/script.js', array('jquery'), '1.0.0', true);
	wp_enqueue_script('portfoliogrove-jquery-sticky', get_stylesheet_directory_uri() . '/assets/js/jquery-sticky.js', array('jquery') );    
}

add_action('enqueue_block_assets', 'portfoliogrove_block_assets');

// register own theme pattern

function portfoliogrove_register_pattern_category() {

	$patterns = array();

	$block_pattern_categories = array(
		'portfoliogrove' => array( 'label' => __( 'PortfolioGrove', 'portfoliogrove' ) )
	);

	$block_pattern_categories = apply_filters( 'portfoliogrove_block_pattern_categories', $block_pattern_categories );

	foreach ( $block_pattern_categories as $name => $properties ) {
		if ( ! WP_Block_Pattern_Categories_Registry::get_instance()->is_registered( $name ) ) {
			register_block_pattern_category( $name, $properties );
		}
	}
}

add_action( 'init', 'portfoliogrove_register_pattern_category');