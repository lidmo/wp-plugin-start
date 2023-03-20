<?php

namespace LidmoPrefix\Traits;

trait Singleton
{
    private static $instance = null;

    public static function getInstance()
    {
        if (null === static::$instance) {
            static::$instance = new self();
        }
        return static::$instance;
    }
}