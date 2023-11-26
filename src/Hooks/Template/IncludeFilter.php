<?php

namespace LidmoPrefix\Hooks\Template;

use Lidmo\WP\Foundation\Hooks\Hook;
use LidmoPrefix\Includes\PageTemplates;

class IncludeFilter extends Hook
{
    public function handle($template)
    {
        return PageTemplates::getInstance()->includeTemplates($template);
    }
}