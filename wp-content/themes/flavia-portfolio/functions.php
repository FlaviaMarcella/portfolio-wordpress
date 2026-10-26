<?php
/**
 * Flávia Gonçalves Portfolio functions and definitions
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

function flavia_portfolio_setup() {
	add_theme_support( 'title-tag' );
	add_theme_support( 'post-thumbnails' );
	add_theme_support( 'html5', array(
		'search-form',
		'comment-form',
		'comment-list',
		'gallery',
		'caption',
		'style',
		'script',
	) );
	add_theme_support( 'wp-block-styles' );
	add_theme_support( 'responsive-embeds' );

	register_nav_menus( array(
		'primary' => __( 'Menu Principal', 'flavia-portfolio' ),
	) );
}
add_action( 'after_setup_theme', 'flavia_portfolio_setup' );

function flavia_portfolio_scripts() {
	wp_enqueue_style(
		'flavia-google-fonts',
		'https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700;800&family=JetBrains+Mono:wght@500;700&display=swap',
		array(),
		null
	);
	wp_enqueue_style(
		'flavia-portfolio-style',
		get_stylesheet_uri(),
		array( 'flavia-google-fonts' ),
		'1.1.0'
	);
}
add_action( 'wp_enqueue_scripts', 'flavia_portfolio_scripts' );

/**
 * Elevate LCP priority on the profile photo and avoid lazy loading on it.
 */
function flavia_portfolio_optimize_lcp_image( $content ) {
	if ( strpos( $content, 'SquareProfissional.jpg' ) !== false ) {
		$content = str_replace( 'loading="lazy"', '', $content );
		$content = str_replace(
			'src="https://flaviamarcella.github.io/SquareProfissional.jpg"',
			'src="https://flaviamarcella.github.io/SquareProfissional.jpg" fetchpriority="high" width="400" height="400"',
			$content
		);
	}
	return $content;
}
add_filter( 'the_content', 'flavia_portfolio_optimize_lcp_image', 20 );
