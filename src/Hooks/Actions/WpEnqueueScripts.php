<?php

namespace WPPluginStart\Hooks\Actions;

use Lidmo\WP\Foundation\Hooks\Hook;
use WPPluginStart\Controller\Front\PublicController;

class WpEnqueueScripts extends Hook
{
    public function handle()
    {
        $publicController = new PublicController();
        $publicController->enqueueStyles();
        $publicController->enqueueScripts();
    }
}