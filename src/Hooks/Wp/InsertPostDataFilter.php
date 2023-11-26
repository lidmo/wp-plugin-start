<?php

namespace LidmoPrefix\Hooks\Wp;

use Lidmo\WP\Foundation\Hooks\Hook;
use LidmoPrefix\Includes\PageTemplates;

class InsertPostDataFilter extends Hook
{
    public function handle($attributes)
    {
        return PageTemplates::getInstance()->registerTemplates($attributes);
    }
}