<?php

namespace LidmoPrefix\Hooks\Lidmo\Admin\Menu;

use Lidmo\WP\Foundation\Hooks\Hook;

class IconFilter extends Hook
{
    public function handle($menu_icon)
    {
        return $menu_icon;
    }
}