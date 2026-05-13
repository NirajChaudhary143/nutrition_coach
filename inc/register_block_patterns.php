<?php
/**
 * Register block pattern categories.
 *
 * @package NutritionCoach
 */

defined( 'ABSPATH' ) || exit;

function nutrition_coach_register_block_patterns() {
	$block_pattern_categories = apply_filters(
		'nutrition_coach_block_pattern_categories',
		array(
			'coaching'       => array(
				'label' => __( 'Coaching', 'nutrition-coach' ),
			),
			'hero'           => array(
				'label' => __( 'Hero', 'nutrition-coach' ),
			),
			'features'       => array(
				'label' => __( 'Features', 'nutrition-coach' ),
			),
			'programs'       => array(
				'label' => __( 'Programs', 'nutrition-coach' ),
			),
			'how-it-works'   => array(
				'label' => __( 'How It Works', 'nutrition-coach' ),
			),
			'team'           => array(
				'label' => __( 'Team', 'nutrition-coach' ),
			),
			'testimonials'   => array(
				'label' => __( 'Testimonials', 'nutrition-coach' ),
			),
			'pricing'        => array(
				'label' => __( 'Pricing', 'nutrition-coach' ),
			),
			'faq'            => array(
				'label' => __( 'FAQ', 'nutrition-coach' ),
			),
			'call-to-action' => array(
				'label' => __( 'Call to Action', 'nutrition-coach' ),
			),
			'banner'         => array(
				'label' => __( 'Banner', 'nutrition-coach' ),
			),
			'about'          => array(
				'label' => __( 'About', 'nutrition-coach' ),
			),
			'contact'        => array(
				'label' => __( 'Contact', 'nutrition-coach' ),
			),
		)
	);

	if ( ! empty( $block_pattern_categories ) ) {
		foreach ( $block_pattern_categories as $category_name => $category_properties ) {
			register_block_pattern_category(
				$category_name,
				$category_properties
			);
		}
	}
}
add_action( 'init', 'nutrition_coach_register_block_patterns' );
