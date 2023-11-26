<?php

namespace LidmoPrefix\Hooks\Plugin;

use Lidmo\WP\Foundation\Hooks\Hook;
use LidmoPrefix\Includes\Settings;

class ActionLinksFilter extends Hook
{
    protected $acceptedArgs = 4;

    public function handle($links, $plugin_file, $plugin_data, $context)
    {
        if ($plugin_file === str_replace(WP_PLUGIN_DIR . '/', '', LIDMO_PREFIX_PLUGIN_FILE)) {
            $links[] = Settings::getInstance()->addSettingsLink();
        }
        return $links;
    }
}