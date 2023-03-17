<?php

namespace LidmoPrefix\Hooks\Filters;

use Lidmo\WP\Foundation\Hooks\Hook;

class BodyClassFilter extends Hook
{
    public function handle($classes)
    {
        $classes[] = LIDMO_PREFIX_PLUGIN_SLUG;

        return $classes;
    }
}