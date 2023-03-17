<?php

namespace LidmoPrefix\Interfaces;

interface PagesTemplatesInterface
{
    const TEMPLATES_FOLDER = LIDMO_PREFIX_PLUGIN_TEMPLATE_PATH . 'public/pages/';

    const PAGE_TEMPLATES = [
        LIDMO_PREFIX_PLUGIN_SLUG . '-custom.php' => 'LidmoPrefix Custom Template',
    ];


}
