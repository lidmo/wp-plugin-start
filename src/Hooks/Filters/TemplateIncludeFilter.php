<?php

namespace LidmoPrefix\Hooks\Filters;

use Lidmo\WP\Foundation\Hooks\Hook;
use LidmoPrefix\Includes\PageTemplates;

class TemplateIncludeFilter extends Hook
{
    public function handle($template)
    {
        $pageTemplates = new PageTemplates();
        return $pageTemplates->includeTemplates($template);
    }
}