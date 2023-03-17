<?php

namespace LidmoPrefix\Hooks\Filters;

use Lidmo\WP\Foundation\Hooks\Hook;
use LidmoPrefix\Includes\PageTemplates;

class ThemePageTemplatesFilter extends Hook
{
    public function handle($posts_templates)
    {
        $pageTemplates = new PageTemplates();
        return $pageTemplates->addNewTemplate($posts_templates);
    }
}