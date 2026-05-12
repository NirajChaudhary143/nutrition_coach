<?php
/**
 * Assets Manager.
 *
 * @package NutritionCoach
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

class Assets_Manager {

	const ASSETS_SLUGS = array(
		'welcome-notice' => 'nutrition-coach-welcome-notice',
	);

	public static function get_image_url( string $file ): string {
		return trailingslashit( get_template_directory_uri() ) . 'assets/images/' . $file;
	}

	public static function enqueue_style( $handle, $file, $deps = array() ) {
		$file_path = get_template_directory() . '/assets/css/' . $file . '.css';
		$file_uri  = get_template_directory_uri() . '/assets/css/' . $file . '.css';

		if ( file_exists( $file_path ) ) {
			wp_enqueue_style(
				$handle,
				$file_uri,
				$deps,
				filemtime( $file_path )
			);
		}
	}

	public static function enqueue_script( $handle, $file, $in_footer = true, $deps = array(), $localize_data = array() ) {
		$file_path = get_template_directory() . '/assets/js/' . $file . '.js';
		$file_uri  = get_template_directory_uri() . '/assets/js/' . $file . '.js';

		if ( file_exists( $file_path ) ) {
			wp_enqueue_script(
				$handle,
				$file_uri,
				array_merge( array( 'jquery' ), $deps ),
				filemtime( $file_path ),
				$in_footer
			);

			if ( ! empty( $localize_data ) ) {
				wp_localize_script( $handle, str_replace( '-', '_', $handle ) . '_params', $localize_data );
			}
		}
	}
}
