<?php

namespace LidmoPrefix\Hooks\Lidmo\Settings\Page;

use Lidmo\WP\Foundation\Hooks\Hook;

class SlugFilter extends Hook
{
    public function handle($page_slug)
    {
        return $page_slug;
    }
}