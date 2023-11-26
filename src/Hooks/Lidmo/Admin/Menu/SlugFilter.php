<?php

namespace LidmoPrefix\Hooks\Lidmo\Admin\Menu;

use Lidmo\WP\Foundation\Hooks\Hook;

class SlugFilter extends Hook
{
    public function handle($menu_slug)
    {
        return $menu_slug;
    }
}