<?php


namespace LidmoPrefix\Traits;

trait Settings
{

    public function getSettings()
    {
        return apply_filters('lidmo_prefix_settings_fields', []);
    }


    public function getSettingsPageTitle()
    {

        return 'Plugin Settings Page';

    }

    public function getSettingsPageDescription()
    {

        return 'Some infos about my plugin.';

    }

}
