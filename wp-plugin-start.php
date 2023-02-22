<?php

/*
 * Plugin Name: WP plugin start
 * Description: WP plugin start
 * Version: 1.0.0
 * Author: Lídmo
 * Author URI: https://lidmo.com.br
 */

if (!defined('WPINC')) {
    die;
}

require 'vendor/autoload.php';

define('PREFIX_PLUGIN_FILE', __FILE__);

$plugin = require_once 'bootstrap.php';

define('PREFIX_PLUGIN_PATH', $plugin->path());
define('PREFIX_PLUGIN_URL', $plugin->url());
define('PREFIX_PLUGIN_NAME', $plugin->name());
define('PREFIX_PLUGIN_VERSION', $plugin->version());
define('PREFIX_PLUGIN_TEMPLATE_PATH', $plugin->templatePath());
define('PREFIX_PLUGIN_DATABASE_PATH', $plugin->databasePath());

$kernel = $plugin->make(\WPPluginStart\Hooks\Kernel::class);

$kernel->run();

function activate_lidmo()
{
    \WPPluginStart\Includes\Activator::run();
}

function deactivate_lidmo()
{
    \WPPluginStart\Includes\Deactivator::run();
}

register_activation_hook(PREFIX_PLUGIN_FILE, 'activate_lidmo');
register_deactivation_hook(PREFIX_PLUGIN_FILE, 'deactivate_lidmo');