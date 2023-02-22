<?php

namespace WPPluginStart\Support;

use WPPluginStart\Interfaces\TemplatesInterface;

class Template implements TemplatesInterface
{
    public static function locale($template_name, $template_path = '', $default_path = '')
    {
        if (!$template_path) {
            $template_path = PREFIX_PLUGIN_NAME . '/';
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
        return apply_filters(PREFIX_PLUGIN_NAME . '_locate_template', $template, $template_name, $template_path);
    }

    public static function getPart($template, $args)
    {
        ob_start();
        extract($args);
        include Template::locale('parts/'.$template);
        return ob_get_clean();
    }
}