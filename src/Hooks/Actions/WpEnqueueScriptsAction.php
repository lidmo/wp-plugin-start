<?php

namespace LidmoPrefix\Hooks\Actions;

use Lidmo\WP\Foundation\Hooks\Hook;
use LidmoPrefix\Interfaces\AjaxInterface;
use LidmoPrefix\Interfaces\PublicInterface;

class WpEnqueueScriptsAction extends Hook implements PublicInterface, AjaxInterface
{
    public function handle()
    {
        $this->enqueueStyles();
        $this->enqueueScripts();
    }

    protected function enqueueStyles()
    {

        wp_enqueue_style(LIDMO_PREFIX_PLUGIN_SLUG, LIDMO_PREFIX_PLUGIN_URL . self::PUBLIC_CSS_FOLDER . 'public.min.css', [], LIDMO_PREFIX_PLUGIN_VERSION, 'all');

    }

    protected function enqueueScripts()
    {

        wp_enqueue_script(LIDMO_PREFIX_PLUGIN_SLUG, LIDMO_PREFIX_PLUGIN_URL . self::PUBLIC_JS_FOLDER . 'public.min.js', ['jquery'], LIDMO_PREFIX_PLUGIN_VERSION, true);

        wp_localize_script(LIDMO_PREFIX_PLUGIN_SLUG, 'lidmoPrefixOptions', array_merge([
            'ajax_url' => admin_url('admin-ajax.php'),
            'security' => wp_create_nonce(LIDMO_PREFIX_PLUGIN_SLUG),
        ], $this->getJSAjaxActions()));

    }

    protected function getJSAjaxActions()
    {

        $actions = array();
        foreach (self::AJAX_ACTIONS as $ajaxAction => $ajaxData) {
            $actions[$ajaxAction] = $ajaxAction;
        }

        return $actions;

    }
}