<?php

namespace LidmoPrefix\Hooks\Actions\Admin;

use Lidmo\WP\Foundation\Hooks\Hook;
use LidmoPrefix\Includes\AdminMenuPages;
use LidmoPrefix\Includes\Settings;

class AdminMenuAction extends Hook
{
    public function handle()
    {
        $adminPages = new AdminMenuPages();
        $adminPages->registerAdminPages();
        $settingsPage = new Settings();
        $settingsPage->addSettingsMenu();
    }
}