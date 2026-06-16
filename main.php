<?php
/**
 * Plugin Name: WooCommerce Filtered Archives Noindex
 * Plugin URI: https://github.com/yourusername/woocommerce-filtered-archives-noindex
 * Description: Adds noindex,follow to WooCommerce shop, product category, and product tag archive pages when filter-related query parameters are present.
 * Version: 1.0.0
 * Author: Amirreza Shayesteh Far
 * Author URI: https://amirrezaa.ir/
 * License: GPL v2 or later
 * Text Domain: woocommerce-filtered-archives-noindex
 * Requires Plugins: woocommerce
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

/**
 * Add noindex,follow to filtered WooCommerce archive pages.
 */
add_action( 'wp', 'wfan_maybe_noindex_filtered_woocommerce_archives', 20 );

function wfan_maybe_noindex_filtered_woocommerce_archives() {
	if ( ! function_exists( 'is_woocommerce' ) ) {
		return;
	}

	if ( ! is_shop() && ! is_product_category() && ! is_product_tag() ) {
		return;
	}

	if ( empty( $_GET ) ) {
		return;
	}

	if ( ! wfan_has_filter_query_parameter() ) {
		return;
	}

	add_filter( 'wp_robots', 'wfan_set_noindex_follow_robots', 100 );

	add_filter( 'wpseo_robots', 'wfan_set_yoast_noindex_follow', 100 );

	add_filter( 'rank_math/frontend/robots', 'wfan_set_rank_math_noindex_follow', 100 );

	add_filter( 'aioseo_robots', 'wfan_set_aioseo_noindex_follow', 100 );
}

/**
 * Detect WooCommerce / Woodmart filter-related query parameters.
 */
function wfan_has_filter_query_parameter() {
	$exact_params = array(
		'min_price',
		'max_price',
		'orderby',
		'rating_filter',
	);

	foreach ( $_GET as $key => $value ) {
		$key = is_string( $key ) ? sanitize_key( wp_unslash( $key ) ) : '';

		if ( '' === $key ) {
			continue;
		}

		if ( in_array( $key, $exact_params, true ) ) {
			return true;
		}

		if ( 0 === strpos( $key, 'filter_' ) ) {
			return true;
		}

		if ( 0 === strpos( $key, 'query_type_' ) ) {
			return true;
		}
	}

	return false;
}

/**
 * WordPress core robots output.
 */
function wfan_set_noindex_follow_robots( $robots ) {
	$robots = is_array( $robots ) ? $robots : array();

	unset( $robots['index'] );
	unset( $robots['nofollow'] );

	$robots['noindex'] = true;
	$robots['follow']  = true;

	return $robots;
}

/**
 * Yoast SEO compatibility.
 */
function wfan_set_yoast_noindex_follow() {
	return 'noindex,follow';
}

/**
 * Rank Math compatibility.
 */
function wfan_set_rank_math_noindex_follow( $robots ) {
	if ( ! is_array( $robots ) ) {
		$robots = array();
	}

	$robots['index']    = 'noindex';
	$robots['follow']   = 'follow';
	$robots['noindex']  = 'noindex';
	$robots['nofollow'] = '';

	return array_filter( $robots );
}

/**
 * All in One SEO compatibility.
 */
function wfan_set_aioseo_noindex_follow() {
	return array(
		'noindex'  => true,
		'nofollow' => false,
	);
}
