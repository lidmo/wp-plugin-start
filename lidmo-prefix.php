<?php

/*
 * Plugin Name: Lidmo Prefix
 * Description: WP plugin start based on laravel features
 * Version: 1.0.0
 * Author: Lídmo
 * Author URI: https://lidmo.com.br
 */

if (!defined('WPINC')) {
    die;
}

require 'vendor/autoload.php';

define('LIDMO_PREFIX_PLUGIN_FILE', __FILE__);

$plugin = require_once 'bootstrap.php';

define('LIDMO_PREFIX_PLUGIN_PATH', $plugin->path());
define('LIDMO_PREFIX_PLUGIN_URL', $plugin->url());
define('LIDMO_PREFIX_PLUGIN_SLUG', $plugin->slug());
define('LIDMO_PREFIX_PLUGIN_NAME', $plugin->getPluginData('Name'));
define('LIDMO_PREFIX_PLUGIN_VERSION', $plugin->getPluginData('Version'));
define('LIDMO_PREFIX_PLUGIN_TEXTDOMAIN', $plugin->getPluginData('TextDomain'));
define('LIDMO_PREFIX_PLUGIN_TEMPLATE_PATH', $plugin->templatePath());
define('LIDMO_PREFIX_PLUGIN_DATABASE_PATH', $plugin->databasePath());

\LidmoPrefix\Includes\Ajax::registerHooks();
\LidmoPrefix\Includes\CronJobs::registerHooks();

$kernel = $plugin->make(\LidmoPrefix\Hooks\Kernel::class);

$kernel->run();


function activate_lidmo_prefix()
{
    \LidmoPrefix\Includes\Activator::run();
}

function deactivate_lidmo_prefix()
{
    \LidmoPrefix\Includes\Deactivator::run();
}

register_activation_hook(LIDMO_PREFIX_PLUGIN_FILE, 'activate_lidmo_prefix');
register_deactivation_hook(LIDMO_PREFIX_PLUGIN_FILE, 'deactivate_lidmo_prefix');