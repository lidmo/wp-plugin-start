<?php

namespace LidmoPrefix\Support;

use LidmoPrefix\Interfaces\TemplatesInterface;

class Template implements TemplatesInterface
{
    public static function locale($template_name, $template_path = '', $default_path = '')
    {
        if (!$template_path) {
            $template_path = LIDMO_PREFIX_PLUGIN_SLUG . '/';
        }

        if (!$default_path) {
            $default_path = TemplatesInterface::PUBLIC_TEMPLATES_FOLDER;
        }

        if (empty($template)) {
            $template = locate_template(
                array(
                    trailingslashit($template_path) . $template_name,
                    $template_name,
                )
            );
        }

        // Get default template/.
        if (!$template) {
            $template = $default_path . $template_name;
        }

        // Return what we found.
        return apply_filters(LIDMO_PREFIX_PLUGIN_SLUG . '_locate_template', $template, $template_name, $template_path);
    }

    public static function get($template, $args = [], $template_path = '', $default_path = '')
    {
        ob_start();
        extract($args);
        include self::locale($template, $template_path, $default_path);
        return ob_get_clean();
    }

    public static function public($template, $args = [])
    {
        return self::get($template, $args, '', self::PUBLIC_TEMPLATES_FOLDER);
    }

    public static function admin($template, $args = [])
    {
        return self::get($template, $args, '', self::ADMIN_TEMPLATES_FOLDER);
    }
}