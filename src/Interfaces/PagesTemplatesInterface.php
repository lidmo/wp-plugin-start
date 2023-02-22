<?php

namespace WPPluginStart\Interfaces;

interface PagesTemplatesInterface
{
    const TEMPLATES_FOLDER = PREFIX_PLUGIN_TEMPLATE_PATH . 'public/pages/';

    const PAGE_TEMPLATES = [
        PREFIX_PLUGIN_NAME . '-custom.php' => 'WPPluginStart Custom Template',
    ];


}
