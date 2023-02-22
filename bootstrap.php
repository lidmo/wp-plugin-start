<?php

$plugin = new \Lidmo\WP\Foundation\Plugin(PREFIX_PLUGIN_FILE);
$plugin->singleton(\Lidmo\WP\Foundation\Contracts\Kernel::class, \WPPluginStart\Hooks\Kernel::class);

return $plugin;