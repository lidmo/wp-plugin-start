<?php

namespace LidmoPrefix\Support;

class Mail
{
    public static function getConfig(string $name = '', $default = null)
    {
        return Plugin::getOption($name, $default, 'lidmo-general');
    }
}