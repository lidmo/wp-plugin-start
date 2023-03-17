<?php

namespace LidmoPrefix\Hooks\Filters;

use Lidmo\WP\Foundation\Hooks\Hook;

class TheContentFilter extends Hook
{
    public function handle($content)
    {

        return $content;
    }
}