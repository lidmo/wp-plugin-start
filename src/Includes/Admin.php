<?php

namespace LidmoPrefix\Includes;

use LidmoPrefix\Interfaces\AdminInterface;

class Admin implements AdminInterface
{

    public static function registerHooks()
    {
        foreach (self::ACTIONS as $adminAction => $adminData) {
            if (isset($adminData['controller'], $adminData['method']) && method_exists($adminData['controller'], $adminData['method'])) {
                $controller = new $adminData['controller'];
                add_action("admin_post_{$adminAction}", [$controller, $adminData['method']]);
                if (isset($adminData['nopriv'])) {
                    add_action("admin_post_nopriv_{$adminAction}", [$controller, $adminData['method']]);
                }
            }
        }
    }

}
