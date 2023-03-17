<?php

namespace LidmoPrefix\Hooks\Actions\Admin;

use Lidmo\WP\Foundation\Hooks\Hook;
use LidmoPrefix\Includes\Settings;

class AdminInitAction extends Hook
{
    public function handle()
    {
        $settings = new Settings();
        $settings->init();
    }
}