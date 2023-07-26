<?php

namespace LidmoPrefix\Support;


class Plugin
{
    public static function instance()
    {
        return \Lidmo\WP\Foundation\Container::getInstance()->make(LIDMO_PREFIX_PLUGIN_SLUG, []);
    }

    public static function getOption(string $name = '', $default = null)
    {
        $settings = get_option(LIDMO_PREFIX_PLUGIN_SLUG, []);
        if ($name != '') {
            return $settings[$name] ?? $default;
        }
        return $settings;
    }

    public static function updateOption(string $name, $value): bool
    {
        $settings = get_option(LIDMO_PREFIX_PLUGIN_SLUG, []);
        $settings[$name] = $value;
        return update_option(LIDMO_PREFIX_PLUGIN_SLUG, $settings);
    }

    public static function deleteOption(string $name): bool
    {
        $settings = get_option(LIDMO_PREFIX_PLUGIN_SLUG, []);
        unset($settings[$name]);
        return update_option(LIDMO_PREFIX_PLUGIN_SLUG, $settings);
    }

    public static function getPrefix(): string
    {
        return str_replace('-', '_', LIDMO_PREFIX_PLUGIN_SLUG);
    }

    public static function getPrefixed(string $name): string
    {
        return self::getPrefix() . '_' . $name;
    }
}