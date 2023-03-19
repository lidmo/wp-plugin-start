<?php

namespace LidmoPrefix\Hooks\Admin;

use Lidmo\WP\Foundation\Hooks\Hook;
use LidmoPrefix\Includes\AdminMenuPages;
use LidmoPrefix\Includes\Settings;

class MenuAction extends Hook
{
    public function handle()
    {
        AdminMenuPages::getInstance()->registerAdminPages();
        Settings::getInstance()->addSettingsMenu();
    }
}