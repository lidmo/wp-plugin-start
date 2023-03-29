<?php

namespace LidmoPrefix\Hooks\Admin;

use Lidmo\WP\Foundation\Hooks\Hook;
use LidmoPrefix\Interfaces\AdminInterface;

class EnqueueScriptsAction extends Hook implements AdminInterface
{

    public function handle()
    {
        $this->enqueueStyles();
        $this->enqueueScripts();
    }

    protected function enqueueStyles()
    {

        wp_enqueue_style(LIDMO_PREFIX_PLUGIN_SLUG, LIDMO_PREFIX_PLUGIN_URL . self::ADMIN_CSS_FOLDER . 'admin.min.css', [], LIDMO_PREFIX_PLUGIN_VERSION, 'all');

    }

    protected function enqueueScripts()
    {

        wp_enqueue_script(LIDMO_PREFIX_PLUGIN_SLUG, LIDMO_PREFIX_PLUGIN_URL . self::ADMIN_JS_FOLDER . 'admin.min.js', ['jquery'], LIDMO_PREFIX_PLUGIN_VERSION, true);

    }
}