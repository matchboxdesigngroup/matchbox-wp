<?php
/**
 * Plugin Name:       Core Features
 * Plugin URI:        https://github.com/matchboxdesigngroup/matchbox-wp
 * Description:       Features and functionality for the {{project_name}} website.
 * Version:           1.0.0
 * Requires at least: 6.6
 * Requires PHP:      8.2
 * Author:            Matchbox
 * Author URI:        https://matchboxdesigngroup.com
 * License:           GPL v2 or later
 * License URI:       https://www.gnu.org/licenses/gpl-2.0.html
 * Text Domain:       matchbox-core-features
 * Domain Path:       /languages
 * Update URI:        https://github.com/matchboxdesigngroup/matchbox-wp
 *
 * @package           matchbox/core-features
 */

declare(strict_types=1);

namespace Matchbox\CoreFeatures;

// Useful global constants.
define( 'MATCHBOX_CORE_FEATURES_VERSION', '1.0.0' );
define( 'MATCHBOX_CORE_FEATURES_URL', plugin_dir_url( __FILE__ ) );
define( 'MATCHBOX_CORE_FEATURES_PATH', plugin_dir_path( __FILE__ ) );
define( 'MATCHBOX_CORE_FEATURES_INC', MATCHBOX_CORE_FEATURES_PATH . 'src/' );
define( 'MATCHBOX_CORE_FEATURES_DIST_URL', MATCHBOX_CORE_FEATURES_URL . 'dist/' );
define( 'MATCHBOX_CORE_FEATURES_DIST_PATH', MATCHBOX_CORE_FEATURES_PATH . 'dist/' );

// Development environment detection.
$is_local_env = in_array( wp_get_environment_type(), array( 'local', 'development' ), true );
$is_local_url = strpos( home_url(), '.test' ) || strpos( home_url(), '.local' );
$is_local     = $is_local_env || $is_local_url;

if ( $is_local && file_exists( __DIR__ . '/dist/fast-refresh.php' ) ) {
	require_once __DIR__ . '/dist/fast-refresh.php';
}

// Bail if Composer autoloader is not found.
if ( ! file_exists( MATCHBOX_CORE_FEATURES_PATH . 'vendor/autoload.php' ) ) {
	throw new \Exception(
		'Vendor autoload file not found. Please run `composer install`.'
	);
}

require_once MATCHBOX_CORE_FEATURES_PATH . 'vendor/autoload.php';

// Initialize the plugin.
$core_features = new Core_Features();

// Activation/Deactivation.
register_activation_hook( __FILE__, array( $core_features, 'activate' ) );
register_deactivation_hook( __FILE__, array( $core_features, 'deactivate' ) );

// Bootstrap.
$core_features->setup();
