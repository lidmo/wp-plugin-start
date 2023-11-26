<?php

namespace LidmoPrefix\Support;

class Arr
{
    public static function removeKeyPrefix($array, $prefix): array
    {
        $new_array = [];
        foreach ($array as $key => $value) {
            $new_array[ltrim($key, $prefix)] = $value;
        }
        return $new_array;
    }
}