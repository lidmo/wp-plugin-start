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


    public static function getDotNotation($data, $key, $default = '')
    {
        if (isset($data[$key])) {
            return $data[$key];
        }
        foreach (explode('.', $key) as $segment) {
            if (!is_array($data) || !array_key_exists($segment, $data)) {
                return $default;
            }
            $data = $data[$segment];
        }
        return $data;
    }
}