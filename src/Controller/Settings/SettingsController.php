<?php

namespace WPPluginStart\Controller\Settings;

use WPPluginStart\Includes\Settings;

class SettingsController
{

    public $options;

    public function __construct()
    {

        $settings = new Settings();
        $this->options = $settings->getOptions();

    }

}
