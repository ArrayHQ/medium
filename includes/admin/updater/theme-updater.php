<?php
/**
 * Easy Digital Downloads Theme Updater
 *
 * @package EDD Sample Theme
 */

// Includes the files needed for the theme updater
if ( !class_exists( 'Array_Theme_Updater_Admin' ) ) {
	include( get_template_directory() . '/includes/admin/updater/theme-updater-admin.php' );
}

// The theme version to use in the updater
define( 'MEDIUM_SL_THEME_VERSION', wp_get_theme( 'medium' )->get( 'Version' ) );

// Loads the updater classes
$updater = new Array_Theme_Updater_Admin(

	// Config settings
	$config = array(
		'remote_api_url' => esc_url( 'https://arraythemes.com' ),
		'item_name'      => __( 'Medium WordPress Theme', 'medium' ),
		'theme_slug'     => 'medium',
		'version'        => MEDIUM_SL_THEME_VERSION,
		'author'         => __( 'Array', 'medium' ),
		'download_id'    => '2003',
		'renew_url'      => ''
	),

	// Strings
	$strings = array(
		'theme-license'             => __( 'Getting Started', 'medium' ),
		'enter-key'                 => __( 'Enter your theme license key.', 'medium' ),
		'license-key'               => __( 'Enter your license key', 'medium' ),
		'license-action'            => __( 'License Action', 'medium' ),
		'deactivate-license'        => __( 'Deactivate License', 'medium' ),
		'activate-license'          => __( 'Activate License', 'medium' ),
		'save-license'              => __( 'Save License', 'medium' ),
		'status-unknown'            => __( 'License status is unknown.', 'medium' ),
		'renew'                     => __( 'Renew?', 'medium' ),
		'unlimited'                 => __( 'unlimited', 'medium' ),
		'license-key-is-active'     => __( 'Theme updates have been enabled. You will receive a notice on your Themes page when a theme update is available.', 'medium' ),
		'expires%s'                 => __( 'Your license for Medium expires %s.', 'medium' ),
		'%1$s/%2$-sites'            => __( 'You have %1$s / %2$s sites activated.', 'medium' ),
		'license-key-expired-%s'    => __( 'License key expired %s.', 'medium' ),
		'license-key-expired'       => __( 'License key has expired.', 'medium' ),
		'license-keys-do-not-match' => __( 'License keys do not match.', 'medium' ),
		'license-is-inactive'       => __( 'License is inactive.', 'medium' ),
		'license-key-is-disabled'   => __( 'License key is disabled.', 'medium' ),
		'site-is-inactive'          => __( 'Site is inactive.', 'medium' ),
		'license-status-unknown'    => __( 'License status is unknown.', 'medium' ),
		'update-notice'             => __( "Updating this theme will lose any customizations you have made. 'Cancel' to stop, 'OK' to update.", 'medium' ),
		'update-available'          => __('<strong>%1$s %2$s</strong> is available. <a href="%3$s" class="thickbox" title="%4s">Check out what\'s new</a> or <a href="%5$s"%6$s>update now</a>.', 'medium' )
	)

);
