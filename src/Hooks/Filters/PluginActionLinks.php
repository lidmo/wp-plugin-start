<?php

namespace WPPluginStart\Hooks\Filters;

use Lidmo\WP\Foundation\Hooks\Hook;
use WPPluginStart\Includes\Settings;

class PluginActionLinks extends Hook
{
    protected $acceptedArgs = 4;

    public function handle($links, $plugin_file, $plugin_data, $context)
    {
        $settings = new Settings();
        return $settings->addSettingsLink($links, $plugin_file, $plugin_data, $context);
    }
}