<?php

namespace WPPluginStart\Hooks\Filters;

use Lidmo\WP\Foundation\Hooks\Hook;
use WPPluginStart\Controller\Front\PublicController;

class BodyClass extends Hook
{
    public function handle($classes)
    {
        $publicController = new PublicController();
        return $publicController->pluginNameBodyClass($classes);
    }
}