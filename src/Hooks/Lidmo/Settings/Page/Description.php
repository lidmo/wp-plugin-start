<?php

namespace LidmoPrefix\Hooks\Lidmo\Settings\Page;

use Lidmo\WP\Foundation\Hooks\Hook;

class Description extends Hook
{
    public function handle($page_description)
    {
        return $page_description;
    }
}