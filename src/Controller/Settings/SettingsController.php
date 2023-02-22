<?php

namespace WPPluginStart\Controller\Settings;

use WPPluginStart\Includes\Settings;

class SettingsController
{

    public $options;

    public function __construct()
    {

        $settings = new \WPPluginStart\Includes\Settings();
        $this->options = $settings->getOptions();

    }

}
