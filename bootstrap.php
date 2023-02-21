<?php
$plugin = new \Lidmo\WP\Foundation\Plugin(str_replace(WP_PLUGIN_DIR . '/', '', dirname(__FILE__)), __FILE__);

$plugin->singleton(\Lidmo\WP\Foundation\Contracts\Kernel::class, \Lidmo\Hooks\Kernel::class);

return $plugin;