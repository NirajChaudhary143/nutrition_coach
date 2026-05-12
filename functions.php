<?php
/**
 * Nutrition Coach Theme
 *
 * @package NutritionCoach
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

! defined( 'NUTRITION_COACH_THEME_FILE' ) && define( 'NUTRITION_COACH_THEME_FILE', __FILE__ );

require_once get_theme_file_path( 'inc/constants.php' );
require_once get_theme_file_path( 'inc/assets-manager.php' );
require_once get_theme_file_path( 'inc/admin.php' );
require_once get_theme_file_path( 'inc/register_block_patterns.php' );

/**
 * Theme setup.
 */
function nutrition_coach_setup() {
	add_theme_support( 'editor-styles' );
}
add_action( 'after_setup_theme', 'nutrition_coach_setup' );

/**
 * Enqueue theme stylesheet.
 */
function nutrition_coach_enqueue_styles() {
	wp_enqueue_style(
		'nutrition-coach-style',
		get_stylesheet_uri(),
		array(),
		wp_get_theme()->get( 'Version' )
	);
}
add_action( 'wp_enqueue_scripts', 'nutrition_coach_enqueue_styles' );

/**
 * Provide default logo when none is set.
 */
function nutrition_coach_get_custom_logo( $html ) {
	if ( ! empty( $html ) ) {
		return $html;
	}

	$default_logo_url = Assets_Manager::get_image_url( 'nutrition-coach-logo.png' );

	if ( file_exists( get_template_directory() . '/assets/images/nutrition-coach-logo.png' ) ) {
		$html = sprintf(
			'<a href="%1$s" class="custom-logo-link" rel="home" aria-label="%3$s">
				<img src="%2$s" class="custom-logo" alt="%3$s" width="160" height="40" />
			</a>',
			esc_url( home_url( '/' ) ),
			esc_url( $default_logo_url ),
			esc_attr( get_bloginfo( 'name' ) )
		);
	} else {
		$html = sprintf(
			'<a href="%1$s" class="custom-logo-link site-title-fallback" rel="home">%2$s</a>',
			esc_url( home_url( '/' ) ),
			esc_html( get_bloginfo( 'name' ) )
		);
	}

	return $html;
}
add_filter( 'get_custom_logo', 'nutrition_coach_get_custom_logo' );

/**
 * Provide a default fallback tagline if the site tagline is empty.
 */
function nutrition_coach_default_tagline( $blogdescription ) {
	if ( empty( trim( $blogdescription ) ) ) {
		return 'Your trusted partner for evidence-based nutrition coaching and lasting wellness.';
	}
	return $blogdescription;
}
add_filter( 'option_blogdescription', 'nutrition_coach_default_tagline' );
