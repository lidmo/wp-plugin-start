<?php


namespace LidmoPrefix\Interfaces;


Interface TemplatesInterface {

    const PUBLIC_TEMPLATES_FOLDER = LIDMO_PREFIX_PLUGIN_TEMPLATE_PATH . 'public/';
    const ADMIN_TEMPLATES_FOLDER = LIDMO_PREFIX_PLUGIN_TEMPLATE_PATH . 'admin/';

    /**
     * Folder with the page templates
     */
    const ARCHIVE_TEMPLATES_FOLDER  = self::PUBLIC_TEMPLATES_FOLDER . 'archive/';
    const SINGLE_TEMPLATES_FOLDER   = self::PUBLIC_TEMPLATES_FOLDER . 'single/';
    const TAXONOMY_TEMPLATES_FOLDER = self::PUBLIC_TEMPLATES_FOLDER . 'taxonomy/';


}
