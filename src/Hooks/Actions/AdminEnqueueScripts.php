<?php

namespace WPPluginStart\Hooks\Actions;

use Lidmo\WP\Foundation\Hooks\Hook;
use WPPluginStart\Controller\Admin\AdminController;

class AdminEnqueueScripts extends Hook
{

    public function handle()
    {
        $adminController = new AdminController();
        $adminController->enqueueStyles();
        $adminController->enqueueScripts();
    }
}