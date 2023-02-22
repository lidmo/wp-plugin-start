<?php

namespace WPPluginStart\Hooks\Filters;

use Lidmo\WP\Foundation\Hooks\Hook;
use WPPluginStart\Includes\PageTemplates;

class ThemePageTemplates extends Hook
{
    public function handle($posts_templates)
    {
        $pageTemplates = new PageTemplates();
        return $pageTemplates->addNewTemplate($posts_templates);
    }
}