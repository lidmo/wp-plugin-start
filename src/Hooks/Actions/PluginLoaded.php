<?php

namespace WPPluginStart\Hooks\Actions;

use Illuminate\Support\Str;
use Lidmo\WP\Foundation\Hooks\Hook;

class PluginLoaded extends Hook
{
    public function handle($plugin)
    {
        if($plugin === PREFIX_PLUGIN_FILE){
            $name = str_replace(WP_PLUGIN_DIR . '/', '', dirname($plugin));
            lidmo_logger('info', "Plugin {$name} iniciado com sucesso", [$name => $plugin]);
        }
    }
}