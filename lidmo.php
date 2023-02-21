<?php

/*
 * Plugin Name: Lídmo
 * Description: WP plugin start
 * Version: 1.0.0
 * Author: Lídmo
 * Author URI: https://lidmo.com.br
 */

if (!defined('WPINC')) {
    die;
}

require 'vendor/autoload.php';

$plugin = require_once 'bootstrap.php';

$kernel = $plugin->make(\Lidmo\Hooks\Kernel::class);

$kernel->run();

function activate_lidmo()
{
    \Lidmo\Includes\Activator::run();
}

function deactivate_lidmo()
{
    \Lidmo\Includes\Deactivator::run();
}

register_activation_hook(__FILE__, 'activate_lidmo');
register_deactivation_hook(__FILE__, 'deactivate_lidmo');