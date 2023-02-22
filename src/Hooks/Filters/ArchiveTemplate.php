<?php

namespace WPPluginStart\Hooks\Filters;

use Lidmo\WP\Foundation\Hooks\Hook;
use WPPluginStart\Service\PostType\BoilerplatePost;

class ArchiveTemplate extends Hook
{
    public function handle($archive_template)
    {
        $boilerplatePost = new BoilerplatePost();
        return $boilerplatePost->customPostTypeTemplateArchive($archive_template);
    }
}