<?php

namespace Lidmo\Hooks\Actions;

use Lidmo\WP\Foundation\Hooks\Hook;

class PluginLoaded extends Hook
{
    protected $name = 'plugin_loaded';
    protected $type = 'action';

    public function handle($plugin)
    {
        $currentPath = dirname($plugin);
        $pluginPath = realpath(dirname(__FILE__) . '/../../../');
        if($currentPath === $pluginPath){
            $name = str_replace(WP_PLUGIN_DIR . '/', '', $pluginPath);
            $plugin = lidmo_plugin($name);
            $plugin->log->info("Plugin {$name} iniciado com sucesso", [$name => $plugin]);
        }
    }
}