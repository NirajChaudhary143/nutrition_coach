<?php
/**
 * Admin — welcome notice promoting the AllCoach plugin.
 *
 * @package NutritionCoach
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

class NC_Admin {

	const ALLCOACH_PLUGIN_FILE = 'allcoach/allcoach.php';

	public function __construct() {
		$this->setup_admin_hooks();
		$this->add_install_time();
	}

	private function add_install_time() {
		$install = get_option( NC_Constants::PRODUCT_KEY . '_install', 0 );
		if ( 0 === $install ) {
			update_option( NC_Constants::PRODUCT_KEY . '_install', time() );
		}
	}

	public function setup_admin_hooks() {
		add_action( 'admin_notices', array( $this, 'render_welcome_notice' ), 0 );
		add_action( 'activated_plugin', array( $this, 'after_allcoach_activation' ) );
		add_action( 'wp_ajax_nutrition_coach_dismiss_welcome_notice', array( $this, 'remove_welcome_notice' ) );
		add_action( 'admin_enqueue_scripts', array( $this, 'enqueue_admin_assets' ) );
	}

	public function render_welcome_notice() {
		if ( ! $this->should_show_welcome_notice() ) {
			return;
		}

		$allcoach_status = $this->get_allcoach_status();

		Assets_Manager::enqueue_style( Assets_Manager::ASSETS_SLUGS['welcome-notice'], 'welcome-notice' );
		Assets_Manager::enqueue_script(
			Assets_Manager::ASSETS_SLUGS['welcome-notice'],
			'welcome-notice',
			true,
			array(),
			array(
				'nonce'           => wp_create_nonce( 'nutrition-coach-dismiss-welcome-notice' ),
				'ajaxUrl'         => esc_url( admin_url( 'admin-ajax.php' ) ),
				'allcoachStatus'  => $allcoach_status,
				'activationUrl'   => esc_url(
					add_query_arg(
						array(
							'plugin_status' => 'all',
							'paged'         => '1',
							'action'        => 'activate',
							'plugin'        => rawurlencode( self::ALLCOACH_PLUGIN_FILE ),
							'_wpnonce'      => wp_create_nonce( 'activate-plugin_' . self::ALLCOACH_PLUGIN_FILE ),
						),
						admin_url( 'plugins.php' )
					)
				),
				'redirectUrl'     => esc_url( admin_url( 'admin.php?page=allcoach' ) ),
				'activating'      => __( 'Activating', 'nutrition-coach' ) . '&hellip;',
				'installing'      => __( 'Installing', 'nutrition-coach' ) . '&hellip;',
				'done'            => __( 'Done', 'nutrition-coach' ),
			)
		);

		$notice_html  = '<div class="notice notice-info nutrition-coach-welcome-notice">';
		$notice_html .= '<button type="button" class="notice-dismiss"><span class="screen-reader-text">' . esc_html__( 'Dismiss this notice.', 'nutrition-coach' ) . '</span></button>';
		$notice_html .= '<div class="notice-content">';
		$notice_html .= '<div class="notice-copy">';

		$notice_html .= '<h2 class="notice-subtitle"><span class="dashicons dashicons-admin-users"></span>';
		$notice_html .= esc_html__( 'This theme works best with AllCoach', 'nutrition-coach' );
		$notice_html .= '</h2>';

		$notice_html .= '<h1 class="notice-title">';
		/* translators: %s: AllCoach */
		$notice_html .= sprintf( __( 'Manage Your Coaching Practice with %s!', 'nutrition-coach' ), '<span>AllCoach</span>' );
		$notice_html .= '</h1>';

		$notice_html .= '<p class="description">' . esc_html__( 'The all-in-one coaching management plugin for WordPress. Manage programs, clients, appointments, and orders — all from your dashboard.', 'nutrition-coach' ) . '</p>';
		$notice_html .= '<p class="description"><span class="dashicons dashicons-yes"></span><strong>' . esc_html__( 'Program management', 'nutrition-coach' ) . '</strong> - ' . esc_html__( 'Create and sell coaching programs effortlessly', 'nutrition-coach' ) . '</p>';
		$notice_html .= '<p class="description"><span class="dashicons dashicons-yes"></span><strong>' . esc_html__( 'Appointment scheduling', 'nutrition-coach' ) . '</strong> - ' . esc_html__( 'Let clients book sessions directly from your site', 'nutrition-coach' ) . '</p>';
		$notice_html .= '<p class="description"><span class="dashicons dashicons-yes"></span><strong>' . esc_html__( 'Client management', 'nutrition-coach' ) . '</strong> - ' . esc_html__( 'Track client progress, orders, and history in one place', 'nutrition-coach' ) . '</p>';

		$notice_html .= '<div class="actions">';
		$notice_html .= '<button id="nutrition-coach-install-allcoach" class="button button-primary button-hero">';
		$notice_html .= '<span class="dashicons dashicons-update hidden"></span>';
		$notice_html .= '<span class="text">';
		$notice_html .= 'installed' === $allcoach_status
			? sprintf( esc_html__( 'Activate %s', 'nutrition-coach' ), 'AllCoach' )
			: sprintf( esc_html__( 'Install & Activate %s', 'nutrition-coach' ), 'AllCoach' );
		$notice_html .= '</span>';
		$notice_html .= '</button>';

		$notice_html .= '<a href="https://wordpress.org/plugins/allcoach/" target="_blank" class="button button-secondary button-hero">';
		$notice_html .= '<span>' . esc_html__( 'Learn More', 'nutrition-coach' ) . '</span>';
		$notice_html .= '<span class="dashicons dashicons-external"></span>';
		$notice_html .= '</a>';

		$notice_html .= '</div>';
		$notice_html .= '</div>';
		$notice_html .= '</div>';
		$notice_html .= '</div>';

		echo wp_kses_post( $notice_html );
	}

	public function remove_welcome_notice() {
		if ( ! isset( $_POST['nonce'] ) ) {
			return;
		}
		if ( ! wp_verify_nonce( sanitize_text_field( wp_unslash( $_POST['nonce'] ) ), 'nutrition-coach-dismiss-welcome-notice' ) ) {
			return;
		}
		update_option( NC_Constants::CACHE_KEYS['dismissed-welcome-notice'], 'yes' );
		wp_die();
	}

	public function after_allcoach_activation( $plugin ) {
		if ( self::ALLCOACH_PLUGIN_FILE !== $plugin ) {
			return;
		}
		update_option( NC_Constants::CACHE_KEYS['dismissed-welcome-notice'], 'yes' );
	}

	public function enqueue_admin_assets( $hook ) {
		if ( ! in_array( $hook, array( 'index.php', 'themes.php' ), true ) ) {
			return;
		}
	}

	private function should_show_welcome_notice(): bool {
		if ( is_plugin_active( self::ALLCOACH_PLUGIN_FILE ) ) {
			return false;
		}

		if ( get_option( NC_Constants::CACHE_KEYS['dismissed-welcome-notice'], 'no' ) === 'yes' ) {
			return false;
		}

		$screen = get_current_screen();

		if ( ! in_array( $screen->id, array( 'dashboard', 'themes' ), true ) ) {
			return false;
		}

		if ( defined( 'DOING_AJAX' ) && DOING_AJAX ) {
			return false;
		}

		if ( is_network_admin() ) {
			return false;
		}

		if ( ! current_user_can( 'manage_options' ) ) {
			return false;
		}

		if ( ! current_user_can( 'install_plugins' ) ) {
			return false;
		}

		if ( $screen->is_block_editor() ) {
			return false;
		}

		$activated_time = get_option( NC_Constants::PRODUCT_KEY . '_install' );
		if ( ! empty( $activated_time ) && time() - intval( $activated_time ) > WEEK_IN_SECONDS ) {
			update_option( NC_Constants::CACHE_KEYS['dismissed-welcome-notice'], 'yes' );
			return false;
		}

		return true;
	}

	private function get_allcoach_status(): string {
		if ( is_plugin_active( self::ALLCOACH_PLUGIN_FILE ) ) {
			return 'active';
		}

		if ( file_exists( ABSPATH . 'wp-content/plugins/' . self::ALLCOACH_PLUGIN_FILE ) ) {
			return 'installed';
		}

		return 'not-installed';
	}
}

new NC_Admin();
