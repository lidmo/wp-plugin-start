<?php

namespace WPPluginStart\Hooks\Actions;

use Lidmo\WP\Foundation\Hooks\Hook;
use WPPluginStart\Includes\Shortcodes;
use WPPluginStart\Service\PostType\BoilerplatePost;
use WPPluginStart\Service\User\UserCapabilities;
use WPPluginStart\Service\User\UserRoles;

class Init extends Hook
{
    public function handle()
    {
        // $this->registerUserRoles();
        // $this->registerUserCapabilities();
        // $this->registerShortcodes();
        // $this->registerPostTypes();
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
        $boilerplatePost = new BoilerplatePost();
        $boilerplatePost->registerPostType();
    }
}