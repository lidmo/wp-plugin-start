<?php

namespace WPPluginStart\Hooks\Filters;

use Lidmo\WP\Foundation\Hooks\Hook;

class TheContent extends Hook
{
    protected $name = 'the_content';
    protected $type = 'filter';

    public function handle($content)
    {
        $content .= '<p>Estou só testando</p>';
        return $content;
    }
}