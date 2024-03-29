<?php

/**
 * GroundCTRL Framework
 * Custom global functions.
 */

// Enable SVG support
function grnd_svg_upload( $mimes ) {
	$mimes['svg']  = 'image/svg+xml';
	$mimes['svgz'] = 'image/svg+xml';

	return $mimes;
}
add_filter( 'upload_mimes', 'grnd_svg_upload' );

function grnd_svg_mimetype( $data = null, $file = null, $filename = null, $mimes = null ) {
	$ext = isset( $data['ext'] ) ? $data['ext'] : '';
	if ( strlen( $ext ) < 1 ) {
		$exploded = explode( '.', $filename );
		$ext      = strtolower( end( $exploded ) );
	}
	if ( 'svg' === $ext ) {
		$data['type'] = 'image/svg+xml';
		$data['ext']  = 'svg';
	} elseif ( 'svgz' === $ext ) {
		$data['type'] = 'image/svg+xml';
		$data['ext']  = 'svgz';
	}

	return $data;
}
add_filter( 'wp_check_filetype_and_ext', 'grnd_svg_mimetype', 10, 4 );


// Excerpt length
function grnd_excerpt_length( $length ) {
	return 40;
}
// add_filter( 'excerpt_length', 'grnd_excerpt_length', 999 );


// Thumbnail alt
// Echoes the "alt" value of a post thumbnail as inserted in the media gallery
function grnd_thumbnail_alt() {
	$grnd_thumbnail_alt = get_post_meta( get_post_thumbnail_id(), '_wp_attachment_image_alt', true );
	echo esc_attr( $grnd_thumbnail_alt );
}


// Breadcrumbs

function grnd_breadcrumbs() {

	if ( function_exists( 'yoast_breadcrumb' ) ) {

		// http://yoa.st/breadcrumbs
		yoast_breadcrumb( '<nav class="breadcrumb mt-3">', '</nav>' );

	} elseif ( function_exists( 'rank_math_the_breadcrumbs' ) ) {

		// https://s.rankmath.com/breadcrumbs
		add_filter(
			'rank_math/frontend/breadcrumb/args',
			function( $args ) {
				$args = array(
					'delimiter'   => '&nbsp;&#47;&nbsp;',
					'wrap_before' => '<nav class="breadcrumb mt-3"><span>',
					'wrap_after'  => '</span></nav>',
					'before'      => '',
					'after'       => '',
				);
				return $args;
			}
		);

		rank_math_the_breadcrumbs();
	}

}