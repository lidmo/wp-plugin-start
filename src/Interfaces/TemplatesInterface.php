<?php


namespace WPPluginStart\Interfaces;


Interface TemplatesInterface {

    const PUBLIC_TEMPLATES_FOLDER = PREFIX_PLUGIN_TEMPLATE_PATH . 'public/';

    /**
     * Folder with the page templates
     */
    const ARCHIVE_TEMPLATES_FOLDER  = self::PUBLIC_TEMPLATES_FOLDER . 'archive/';
    const SINGLE_TEMPLATES_FOLDER   = self::PUBLIC_TEMPLATES_FOLDER . 'single/';
    const TAXONOMY_TEMPLATES_FOLDER = self::PUBLIC_TEMPLATES_FOLDER . 'taxonomy/';


}
