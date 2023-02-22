<?php

namespace WPPluginStart\Hooks;

use WPPluginStart\Hooks\Actions\PluginLoaded;
use WPPluginStart\Hooks\Filters\TheContent;
use Lidmo\WP\Foundation\Hooks\Kernel as HooksKernel;

class Kernel extends HooksKernel
{
    protected $hooks = [
        // Actions
        PluginLoaded::class,

        // Filters
        TheContent::class,
    ];
}