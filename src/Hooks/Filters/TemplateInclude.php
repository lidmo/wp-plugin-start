<?php

namespace WPPluginStart\Hooks\Filters;

use Lidmo\WP\Foundation\Hooks\Hook;
use WPPluginStart\Includes\PageTemplates;

class TemplateInclude extends Hook
{
    public function handle($template)
    {
        $pageTemplates = new PageTemplates();
        return $pageTemplates->includeTemplates($template);
    }
}