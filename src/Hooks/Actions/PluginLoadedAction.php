<?php

namespace LidmoPrefix\Hooks\Actions;

use Lidmo\WP\Foundation\Hooks\Hook;

class PluginLoadedAction extends Hook
{
    public function handle($plugin)
    {
        if($plugin === LIDMO_PREFIX_PLUGIN_FILE){
            $this->loadTextDomain();
        }
    }

    public function loadTextDomain() {

        load_plugin_textdomain(
            LIDMO_PREFIX_PLUGIN_SLUG,
            false,
            LIDMO_PREFIX_PLUGIN_PATH . 'languages/'
        );

    }
}