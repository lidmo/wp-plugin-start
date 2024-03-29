<?php

namespace LidmoPrefix\Hooks\Defaults;

use Lidmo\WP\Foundation\Hooks\Hook;
use LidmoPrefix\Includes\PageTemplates;

class ThemePageTemplatesFilter extends Hook
{
    protected $name = 'theme_page_templates';

    public function handle($posts_templates)
    {
        return PageTemplates::getInstance()->addNewTemplate($posts_templates);
    }
}