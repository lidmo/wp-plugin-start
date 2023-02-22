<?php

namespace WPPluginStart\Hooks\Filters;

use Lidmo\WP\Foundation\Hooks\Hook;
use WPPluginStart\Service\PostType\BoilerplatePost;

class SingleTemplate extends Hook
{
    protected $priority = 10;

    public function handle($single_template)
    {
        $boilerplatePost = new BoilerplatePost();
        return $boilerplatePost->customPostTypeTemplateSingle($single_template);
    }
}