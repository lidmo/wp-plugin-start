<?php
$plugin = new \Lidmo\WP\Foundation\Plugin('lidmo', __FILE__);

$plugin->singleton(\Lidmo\WP\Foundation\Contracts\Kernel::class, \Lidmo\Hooks\Kernel::class);

return $plugin;