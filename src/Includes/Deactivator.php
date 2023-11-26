<?php

namespace LidmoPrefix\Includes;

class Deactivator
{
    public static function run()
    {
        Settings::getInstance()->deleteSettingsSection();
    }
}