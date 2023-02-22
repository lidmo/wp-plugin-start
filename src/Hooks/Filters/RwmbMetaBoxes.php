<?php

namespace WPPluginStart\Hooks\Filters;

use Lidmo\WP\Foundation\Hooks\Hook;
use WPPluginStart\Service\PostType\BoilerplatePost;

class RwmbMetaBoxes extends Hook
{
    protected $priority = 33;

    public function handle($meta_boxes)
    {
        return $this->registerMetaBoxes($meta_boxes);
    }

    private function registerMetaBoxes($meta_boxes)
    {
        $boilerplatePost = new BoilerplatePost();
        return $boilerplatePost->addMetaBoxes($meta_boxes);
    }
}