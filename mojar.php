<?php
/**
 * Plugin Name: Mojar
 * Description: Mojar is a complete wordpress plugin starter kit with advenced featurs and mvc petarn.
 * Plugin URI: https://mojar.com
 * Author: Mojahid islam
 * Version: 1.0.0
 * Author URI: https://devmojahid.com
 *
 * Text Domain: mojar
 *
 * @package Mojar
 * 
 * License: GPL2 or later
 * License URI: https://www.gnu.org/licenses/gpl-2.0.html
 */

 if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

require_once __DIR__ . '/vendor/autoload.php';

// const define
define( 'MOJAR_PATH', plugin_dir_path( __FILE__ ) );
define( 'MOJAR_URL', plugin_dir_url( __FILE__ ) );

use Mojar\Providers\PluginServiceProvider;

$plugin = new PluginServiceProvider();
$plugin->boot();