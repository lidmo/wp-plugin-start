<?php

namespace LidmoPrefix\Support;


class Plugin
{
    public static function instance()
    {
        return \Lidmo\WP\Foundation\Container::getInstance()->make(LIDMO_PREFIX_PLUGIN_SLUG, []);
    }

    public static function getOption(string $name = '', $default = null, string $prefix = LIDMO_PREFIX_PLUGIN_SLUG)
    {
        $settings = get_option($prefix, []);
        if ($name != '') {
            return $settings[$name] ?? $default;
        }
        return $settings;
    }

    public static function updateOption(string $name, $value, string $prefix = LIDMO_PREFIX_PLUGIN_SLUG): bool
    {
        $settings = get_option($prefix, []);
        $settings[$name] = $value;
        return update_option($prefix, $settings);
    }

    public static function deleteOption(string $name, string $prefix = LIDMO_PREFIX_PLUGIN_SLUG): bool
    {
        $settings = get_option($prefix, []);
        unset($settings[$name]);
        return update_option($prefix, $settings);
    }

    public static function getPrefix(string $prefix = LIDMO_PREFIX_PLUGIN_SLUG): string
    {
        return str_replace('-', '_', $prefix);
    }

    public static function getPrefixed(string $name, string $prefix = LIDMO_PREFIX_PLUGIN_SLUG): string
    {
        return self::getPrefix($prefix) . '_' . $name;
    }

    public static function getDBPrefix(string $prefix = LIDMO_PREFIX_PLUGIN_SLUG): string
    {
        global $wpdb;
        return $wpdb->prefix . self::getPrefix() . '_';
    }

    public static function getDatatable()
    {
        if(class_exists('Ozdemir\Datatables\Datatables')) {
            $config = [
                'host' => DB_HOST,
                'port' => '3306',
                'username' => DB_USER,
                'password' => DB_PASSWORD,
                'database' => DB_NAME
            ];
            return new \Ozdemir\Datatables\Datatables(new \Ozdemir\Datatables\DB\MySQL($config));
        }
        return null;
    }
}