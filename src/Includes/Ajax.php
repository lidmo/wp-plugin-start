<?php

namespace LidmoPrefix\Includes;

use LidmoPrefix\Interfaces\AjaxInterface;

class Ajax implements AjaxInterface
{

    public static function registerHooks()
    {
        foreach (self::ACTIONS as $ajaxAction => $ajaxData) {
            if (isset($ajaxData['controller'], $ajaxData['method']) && method_exists($ajaxData['controller'], $ajaxData['method'])) {
                $controller = new $ajaxData['controller'];
                add_action("wp_ajax_{$ajaxAction}", [$controller, $ajaxData['method']]);
                if ($ajaxData['nopriv'] === true) {
                    add_action("wp_ajax_nopriv_{$ajaxAction}", [$controller, $ajaxData['method']]);
                }
            }
        }
    }

    public static function getJSAjaxActions()
    {
        $actions = array();
        foreach (self::ACTIONS as $ajaxAction => $ajaxData) {
            $actions[$ajaxAction] = $ajaxAction;
        }
        return $actions;
    }

}
