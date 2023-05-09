<?php

namespace LidmoPrefix\Hooks;

use Lidmo\WP\Foundation\Hooks\Kernel as HooksKernel;

class Kernel extends HooksKernel
{
    protected $hooks = [
        // Actions
        \LidmoPrefix\Hooks\Defaults\InitAction::class,
        \LidmoPrefix\Hooks\Defaults\PHPMailerInitAction::class,
        \LidmoPrefix\Hooks\Plugin\LoadedAction::class,
        \LidmoPrefix\Hooks\Wp\EnqueueScriptsAction::class,
        \LidmoPrefix\Hooks\Admin\InitAction::class,
        \LidmoPrefix\Hooks\Admin\EnqueueScriptsAction::class,
        \LidmoPrefix\Hooks\Admin\HeadAction::class,
        \LidmoPrefix\Hooks\Admin\MenuAction::class,


        // Filters
        \LidmoPrefix\Hooks\Plugin\ActionLinksFilter::class,
        \LidmoPrefix\Hooks\Defaults\BodyClassFilter::class,
        \LidmoPrefix\Hooks\Defaults\ThemePageTemplatesFilter::class,
        \LidmoPrefix\Hooks\Defaults\TheContentFilter::class,
        \LidmoPrefix\Hooks\Wp\InsertPostDataFilter::class,
        \LidmoPrefix\Hooks\Template\IncludeFilter::class,

    ];
}