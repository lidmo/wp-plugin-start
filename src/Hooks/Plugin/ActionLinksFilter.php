<?php

namespace LidmoPrefix\Hooks\Plugin;

use Lidmo\WP\Foundation\Hooks\Hook;

class ActionLinksFilter extends Hook
{
    protected $acceptedArgs = 4;

    public function handle($links, $plugin_file, $plugin_data, $context)
    {
        if ($plugin_file === str_replace(WP_PLUGIN_DIR . '/', '', LIDMO_PREFIX_PLUGIN_FILE)) {
            $settings_link = array('<a href="admin.php?page=' . LIDMO_PREFIX_PLUGIN_SLUG . '-settings">Configurações</a>');
            $links = array_merge($links, $settings_link);
        }
        return $links;
    }
}