<?php

namespace LidmoPrefix\Support;

class Number
{
    public static function onlyDigits(string $number)
    {
        return preg_replace('/\D+/', '', $number);
    }
}