<?php

namespace LidmoPrefix\Hooks\Filters;

use Lidmo\WP\Foundation\Hooks\Hook;
use LidmoPrefix\Includes\PageTemplates;

class WpInsertPostDataFilter extends Hook
{
    public function handle($attributes)
    {
        $pageTemplates = new PageTemplates();
        return $pageTemplates->registerTemplates($attributes);
    }
}