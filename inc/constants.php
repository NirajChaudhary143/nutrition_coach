<?php
/**
 * Constants class.
 *
 * @package NutritionCoach
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

class NC_Constants {

	const PRODUCT_KEY = 'nutrition_coach';

	const PRODUCT_SLUG = 'nutrition-coach';

	const CACHE_KEYS = array(
		'dismissed-welcome-notice' => 'nutrition_coach_dismissed_welcome_notice',
	);

	const TEXT_DOMAIN = 'nutrition-coach';
}
