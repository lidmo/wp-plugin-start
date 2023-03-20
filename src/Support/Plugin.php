<?php

namespace LidmoPrefix\Support;

use Lidmo\WP\Foundation\Container;

class Plugin
{
    public static function instance()
    {
        return Container::getInstance()->make(LIDMO_PREFIX_PLUGIN_SLUG, []);
    }

    public static function setting(string $key = '', $default = null)
    {
        $settings = get_option(LIDMO_PREFIX_PLUGIN_SLUG, []);
        if ($key != '') {
            return $settings[$key] ?? $default;
        }
        return $settings;
    }
}