<?php

if (!function_exists('lidmo_admin_menu_exists')) {
    function lidmo_admin_menu_exists($handle, $sub = false)
    {
        if (!is_admin() || (defined('DOING_AJAX') && DOING_AJAX)) return false;
        global $menu, $submenu;
        $check_menu = $sub ? $submenu : $menu;
        if (empty($check_menu)) return false;
        foreach ($check_menu as $item) {
            if ($sub) {
                foreach ($item as $sm) {
                    if ($handle == $sm[2]) return true;
                }
            } else {
                if ($handle == $item[2]) return true;
            }
        }
        return false;
    }
}

if (!function_exists('lidmo_logger')) {
    function lidmo_logger($level, $message, $context = [])
    {
        lidmo_plugin(LIDMO_PREFIX_PLUGIN_SLUG)->log->log($level, $message, $context);
    }
}

if(!function_exists('lidmo_filter_data')) {
    function lidmo_filter_data($element)
    {
        if (is_array($element)) {
            if ($key = key($element)) {
                $element[$key] = array_filter($element);
            }

            if (count($element) != count($element, COUNT_RECURSIVE)) {
                $element = array_filter(current($element), __FUNCTION__);
            }

            return $element;
        } else {
            return empty($element) ? false : $element;
        }
    }
}