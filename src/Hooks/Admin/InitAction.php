<?php

namespace LidmoPrefix\Hooks\Admin;

use Lidmo\WP\Foundation\Hooks\Hook;
use LidmoPrefix\Includes\Settings;

class InitAction extends Hook
{
    public function handle()
    {
        Settings::getInstance()->init();
    }
}