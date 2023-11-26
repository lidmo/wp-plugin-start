<?php

namespace LidmoPrefix\Hooks\Lidmo\Admin\Menu;

use Lidmo\WP\Foundation\Hooks\Hook;

class CapabilityFilter extends Hook
{
    public function handle($menu_capability)
    {
        return $menu_capability;
    }
}