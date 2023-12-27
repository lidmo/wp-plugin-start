<?php

namespace LidmoPrefix\Includes;

use Lidmo\WP\Foundation\Support\Str;
use LidmoPrefix\Support\Arr;
use LidmoPrefix\Support\Plugin;

class Activator
{
    public static function run()
    {
        Migrator::run();
    }
}