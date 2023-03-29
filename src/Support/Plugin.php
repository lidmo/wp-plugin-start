<?php

namespace LidmoPrefix\Support;

use Lidmo\WP\Foundation\Container;

class Plugin
{
    public static function instance()
    {
        return Container::getInstance()->make(LIDMO_PREFIX_PLUGIN_SLUG, []);
    }

    public static function getOption(string $key = '', $default = null)
    {
        $settings = get_option(LIDMO_PREFIX_PLUGIN_SLUG, []);
        if ($key != '') {
            return $settings[$key] ?? $default;
        }
        return $settings;
    }

    public static function getPostMeta(int $id, string $name, string $container_id = '')
    {
        if (!function_exists('carbon_get_post_meta')) {
            return '';
        }
        return carbon_get_post_meta($id, self::getPrefix() . $name, $container_id);
    }

    public static function getThePostMeta(string $name, string $container_id = '')
    {
        if (!function_exists('carbon_get_the_post_meta')) {
            return '';
        }
        return carbon_get_the_post_meta(self::getPrefix() . $name, $container_id);
    }

    public static function getPrefix(): string
    {
        return str_replace('-', '_', LIDMO_PREFIX_PLUGIN_SLUG) . '_';
    }
}