<?php

namespace LidmoPrefix\Hooks\Defaults;

use Lidmo\WP\Foundation\Hooks\Hook;
use LidmoPrefix\Includes\Shortcodes;
use LidmoPrefix\Includes\UserCapabilities;
use LidmoPrefix\Includes\UserRoles;

class InitAction extends Hook
{
    protected $name = 'init';

    public function handle()
    {
        $this->registerUserRoles();
        $this->registerUserCapabilities();
        $this->registerShortcodes();
        $this->registerPostTypes();
    }

    private function registerUserRoles(){
        UserRoles::getInstance()->registerUserRoles();
    }

    private function registerUserCapabilities()
    {
        UserCapabilities::getInstance()->registerUserCapabilities();
    }

    private function registerShortcodes()
    {
       Shortcodes::getInstance()->registerShortcodes();
    }

    private function registerPostTypes()
    {
    }
}