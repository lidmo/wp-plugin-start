<?php

namespace LidmoPrefix\Hooks;

use Lidmo\WP\Foundation\Hooks\Kernel as HooksKernel;
use LidmoPrefix\Hooks\Actions\Admin\AdminEnqueueScriptsAction;
use LidmoPrefix\Hooks\Actions\Admin\AdminHeadAction;
use LidmoPrefix\Hooks\Actions\Admin\AdminInitAction;
use LidmoPrefix\Hooks\Actions\Admin\AdminMenuAction;
use LidmoPrefix\Hooks\Actions\InitAction;
use LidmoPrefix\Hooks\Actions\PluginLoadedAction;
use LidmoPrefix\Hooks\Actions\WpEnqueueScriptsAction;
use LidmoPrefix\Hooks\Filters\BodyClassFilter;
use LidmoPrefix\Hooks\Filters\PluginActionLinksFilter;
use LidmoPrefix\Hooks\Filters\TemplateIncludeFilter;
use LidmoPrefix\Hooks\Filters\TheContentFilter;
use LidmoPrefix\Hooks\Filters\ThemePageTemplatesFilter;
use LidmoPrefix\Hooks\Filters\WpInsertPostDataFilter;

class Kernel extends HooksKernel
{
    protected $hooks = [
        // Actions
        PluginLoadedAction::class,
        AdminHeadAction::class,
        AdminEnqueueScriptsAction::class,
        AdminInitAction::class,
        AdminMenuAction::class,
        InitAction::class,
        WpEnqueueScriptsAction::class,
        // WidgetsInit::class,

        // Filters
        PluginActionLinksFilter::class,
        TheContentFilter::class,
        BodyClassFilter::class,
        ThemePageTemplatesFilter::class,
        WpInsertPostDataFilter::class,
        TemplateIncludeFilter::class,
    ];
}