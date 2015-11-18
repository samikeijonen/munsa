<?php
/**
 * Easy Digital Downloads Theme Updater
 *
 * @package Sonsa
 */

// Includes the files needed for the theme updater
if ( !class_exists( 'EDD_Theme_Updater_Admin' ) ) {
	include( dirname( __FILE__ ) . '/theme-updater-admin.php' );
}

// Loads the updater classes
$updater = new EDD_Theme_Updater_Admin(

	// Config settings
	$config = array(
		'remote_api_url' => 'https://foxland.fi',     // Site where EDD is hosted
		'item_name'      => 'Munsa',                  // Name of theme
		'theme_slug'     => 'munsa',                  // Theme slug
		'version'        => MUNSA_VERSION,            // The current version of this theme
		'author'         => 'Sami Keijonen',          // The author of this theme
		'download_id'    => '4476',                   // Optional, used for generating a license renewal link
		'renew_url'      => ''                        // Optional, allows for a custom license renewal link
	),

	// Strings
	$strings = array(
		'theme-license'             => __( 'Theme License', 'munsa' ),
		'enter-key'                 => __( 'Enter your theme license key.', 'munsa' ),
		'license-key'               => __( 'License Key', 'munsa' ),
		'license-action'            => __( 'License Action', 'munsa' ),
		'deactivate-license'        => __( 'Deactivate License', 'munsa' ),
		'activate-license'          => __( 'Activate License', 'munsa' ),
		'status-unknown'            => __( 'License status is unknown.', 'munsa' ),
		'renew'                     => __( 'Renew?', 'munsa' ),
		'unlimited'                 => __( 'unlimited', 'munsa' ),
		'license-key-is-active'     => __( 'License key is active.', 'munsa' ),
		'expires%s'                 => __( 'Expires %s.', 'munsa' ),
		'lifetime'                  => __( 'Lifetime License.', 'munsa' ),
		'%1$s/%2$-sites'            => __( 'You have %1$s / %2$s sites activated.', 'munsa' ),
		'license-key-expired-%s'    => __( 'License key expired %s.', 'munsa' ),
		'license-key-expired'       => __( 'License key has expired.', 'munsa' ),
		'license-keys-do-not-match' => __( 'License keys do not match.', 'munsa' ),
		'license-is-inactive'       => __( 'License is inactive.', 'munsa' ),
		'license-key-is-disabled'   => __( 'License key is disabled.', 'munsa' ),
		'site-is-inactive'          => __( 'Site is inactive.', 'munsa' ),
		'license-status-unknown'    => __( 'License status is unknown.', 'munsa' ),
		'update-notice'             => __( "Updating this theme will lose any customizations you have made. 'Cancel' to stop, 'OK' to update.", 'munsa' ),
		'update-available'          => __( '<strong>%1$s %2$s</strong> is available. <a href="%3$s" class="thickbox" title="%4s">Check out what\'s new</a> or <a href="%5$s"%6$s>update now</a>.', 'munsa' )
	)

);