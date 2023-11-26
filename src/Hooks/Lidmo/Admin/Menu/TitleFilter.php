<?php

namespace LidmoPrefix\Hooks\Lidmo\Admin\Menu;

use Lidmo\WP\Foundation\Hooks\Hook;

class TitleFilter extends Hook
{
    public function handle($menu_title)
    {
        return $menu_title;
    }
}