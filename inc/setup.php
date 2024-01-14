<?php
/**
 * GroundCTRL Framework 
 * https://developer.wordpress.org/reference/functions/add_theme_support/
 */

if ( ! function_exists( 'grnd_setup_theme' ) ) {

	function grnd_setup_theme() {

		// Enable featured images
		add_theme_support( 'post-thumbnails' );

		// Enable theme logo
		add_theme_support(
			'custom-logo',
			array(
				'height'      => 100,
				'width'       => 400,
				'flex-height' => true,
				'flex-width'  => true,
				'header-text' => array( 'site-title', 'site-description' ),
			)
		);

		// Enable RSS feeds
		add_theme_support( 'automatic-feed-links' );

		// Enable HTML5 markup
		add_theme_support( 'html5', array( 'comment-list', 'comment-form', 'search-form', 'gallery', 'caption' ) );

		// Enable title meta tag to <head>
		add_theme_support( 'title-tag' );

		// Enable Widgets refresh from Customizer
		add_theme_support( 'customize-selective-refresh-widgets' );

		// Define custom image sizes
		require_once get_template_directory() . '/inc/imagesizes.php';

		// Set max content width (embedded)
		if ( ! isset( $content_width ) ) {
			$content_width = 1400;}

		// Load translations
		load_theme_textdomain( 'groundctrl', get_template_directory() . '/languages' );

		// Add excerpt to pages
		// add_post_type_support( 'page', 'excerpt' );
	}
}

add_action( 'after_setup_theme', 'grnd_setup_theme' );
/**
 * Add block style variations.
 */
function register_block_styles() {

	$block_styles = array(
		'core/button'                    => array(
			'secondary-button' => __( 'Secondary', 'forest' ),
		),
		'core/list'                      => array(
			'list-check'        => __( 'Check', 'forest' ),
			'list-check-circle' => __( 'Check Circle', 'forest' ),
			'list-boxed'        => __( 'Boxed', 'forest' ),
		),
		'core/query-pagination-next'     => array(
			'wp-block-button__link' => __( 'Button', 'forest' ),
		),
		'core/query-pagination-previous' => array(
			'wp-block-button__link' => __( 'Button', 'forest' ),
		),
		'core/code'                      => array(
			'dark-code' => __( 'Dark', 'forest' ),
		),
		'core/cover'                     => array(
			'blur-image-less' => __( 'Blur Image Less', 'forest' ),
			'blur-image-more' => __( 'Blur Image More', 'forest' ),
			'rounded-cover'   => __( 'Rounded', 'forest' ),
		),
		'core/column'                    => array(
			'column-box-shadow' => __( 'Box Shadow', 'forest' ),
		),
		'core/post-excerpt'              => array(
			'excerpt-truncate-2' => __( 'Truncate 2 Lines', 'forest' ),
			'excerpt-truncate-3' => __( 'Truncate 3 Lines', 'forest' ),
			'excerpt-truncate-4' => __( 'Truncate 4 Lines', 'forest' ),
		),
		'core/group'                     => array(
			'column-box-shadow' => __( 'Box Shadow', 'forest' ),
		),
		'core/separator'                 => array(
			'separator-dotted' => __( 'Dotted', 'forest' ),
			'separator-thin'   => __( 'Thin', 'forest' ),
		),
		'core/image'                     => array(
			'rounded-full' => __( 'Rounded Full', 'forest' ),
			'media-boxed'  => __( 'Boxed', 'forest' ),
		),
		'core/preformatted'              => array(
			'preformatted-dark' => __( 'Dark Style', 'forest' ),
		),
		'core/post-terms'                => array(
			'term-button' => __( 'Button Style', 'forest' ),
		),
		'core/video'                     => array(
			'media-boxed' => __( 'Boxed', 'forest' ),
		),
	);

	foreach ( $block_styles as $block => $styles ) {
		foreach ( $styles as $style_name => $style_label ) {
			register_block_style(
				$block,
				array(
					'name'  => $style_name,
					'label' => $style_label,
				)
			);
		}
	}
}
add_action( 'init', __NAMESPACE__ . '\register_block_styles' );


