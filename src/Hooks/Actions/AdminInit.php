<?php

namespace WPPluginStart\Hooks\Actions;

use Lidmo\WP\Foundation\Hooks\Hook;
use WPPluginStart\Includes\Settings;

class AdminInit extends Hook
{
    public function handle()
    {
        $settings = new Settings();
        $settings->init();
    }
}