<?php

namespace Lidmo\Hooks;

use Lidmo\Hooks\Actions\PluginLoaded;
use Lidmo\Hooks\Filters\TheContent;
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