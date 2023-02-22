<?php

namespace WPPluginStart\Hooks\Actions;

use Lidmo\WP\Foundation\Hooks\Hook;
use WPPluginStart\Includes\AdminMenuPages;
use WPPluginStart\Includes\Settings;

class AdminMenu extends Hook
{
    public function handle()
    {
        $adminPages = new AdminMenuPages();
        $adminPages->registerAdminPages();
        $settingsPage = new Settings();
        $settingsPage->addSettingsMenu();
    }
}