<?php

namespace LidmoPrefix\Hooks\Defaults;

use Lidmo\WP\Foundation\Hooks\Hook;

class BodyClassFilter extends Hook
{
    protected $name = 'body_class';

    public function handle($classes)
    {
        $classes[] = LIDMO_PREFIX_PLUGIN_SLUG;

        return $classes;
    }
}