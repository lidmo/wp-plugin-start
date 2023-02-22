<?php

namespace WPPluginStart\Hooks\Filters;

use Lidmo\WP\Foundation\Hooks\Hook;
use WPPluginStart\Includes\PageTemplates;

class WpInsertPostData extends Hook
{
    public function handle($attributes)
    {
        $pageTemplates = new PageTemplates();
        return $pageTemplates->registerTemplates($attributes);
    }
}