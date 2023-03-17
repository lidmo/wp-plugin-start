<?php

$plugin = new \Lidmo\WP\Foundation\Plugin(LIDMO_PREFIX_PLUGIN_FILE);
$plugin->singleton(\Lidmo\WP\Foundation\Contracts\Kernel::class, \LidmoPrefix\Hooks\Kernel::class);

return $plugin;