<?php

namespace LidmoPrefix\Hooks\Lidmo\Settings\Page;

use Lidmo\WP\Foundation\Hooks\Hook;

class TitleFilter extends Hook
{
    public function handle($page_title)
    {
        return $page_title;
    }
}