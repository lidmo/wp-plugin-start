<?php

namespace LidmoPrefix\Hooks\Template;

use Lidmo\WP\Foundation\Hooks\Hook;
use LidmoPrefix\Includes\PageTemplates;

class IncludeFilter extends Hook
{
    public function handle($template)
    {
        $pageTemplates = new PageTemplates();
        return $pageTemplates->includeTemplates($template);
    }
}