<?php

namespace LidmoPrefix\Hooks\Defaults;

use Lidmo\WP\Foundation\Hooks\Hook;

class TheContentFilter extends Hook
{
    protected $name = 'the_content';

    public function handle($content)
    {

        return $content;
    }
}