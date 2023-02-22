<?php

namespace WPPluginStart\Hooks;

use WPPluginStart\Hooks\Actions\AdminEnqueueScripts;
use WPPluginStart\Hooks\Actions\AdminInit;
use WPPluginStart\Hooks\Actions\AdminMenu;
use WPPluginStart\Hooks\Actions\Init;
use WPPluginStart\Hooks\Actions\PluginLoaded;
use WPPluginStart\Hooks\Actions\WidgetsInit;
use WPPluginStart\Hooks\Actions\WpEnqueueScripts;
use WPPluginStart\Hooks\Filters\ArchiveTemplate;
use WPPluginStart\Hooks\Filters\BodyClass;
use WPPluginStart\Hooks\Filters\PluginActionLinks;
use WPPluginStart\Hooks\Filters\RwmbMetaBoxes;
use WPPluginStart\Hooks\Filters\SingleTemplate;
use WPPluginStart\Hooks\Filters\TemplateInclude;
use WPPluginStart\Hooks\Filters\TheContent;
use Lidmo\WP\Foundation\Hooks\Kernel as HooksKernel;
use WPPluginStart\Hooks\Filters\ThemePageTemplates;
use WPPluginStart\Hooks\Filters\WpInsertPostData;

class Kernel extends HooksKernel
{
    protected $hooks = [
        // Actions
        PluginLoaded::class,
        AdminEnqueueScripts::class,
        AdminInit::class,
        AdminMenu::class,
        Init::class,
        WpEnqueueScripts::class,
        // WidgetsInit::class,

        // Filters
        PluginActionLinks::class,
        TheContent::class,
        BodyClass::class,
        ThemePageTemplates::class,
        WpInsertPostData::class,
        TemplateInclude::class,
        // RwmbMetaBoxes::class,
        // SingleTemplate::class,
        // ArchiveTemplate::class,
    ];
}