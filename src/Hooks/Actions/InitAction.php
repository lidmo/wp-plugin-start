<?php

namespace LidmoPrefix\Hooks\Actions;

use Lidmo\WP\Foundation\Hooks\Hook;
use LidmoPrefix\Includes\Shortcodes;
use LidmoPrefix\Includes\UserCapabilities;
use LidmoPrefix\Includes\UserRoles;

class InitAction extends Hook
{
    public function handle()
    {
        //$this->registerUserRoles();
        $this->registerUserCapabilities();
        $this->registerShortcodes();
        $this->registerPostTypes();
    }

    private function registerUserRoles(){
        $userRoles = new UserRoles();
        $userRoles->registerUserRoles();
    }

    private function registerUserCapabilities()
    {
        $userCapabilities = new UserCapabilities();
        $userCapabilities->registerUserCapabilities();
    }

    private function registerShortcodes()
    {
        $shortcodes = new Shortcodes();
        $shortcodes->registerShortcodes();
    }

    private function registerPostTypes()
    {
    }
}