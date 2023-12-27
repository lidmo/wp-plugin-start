<?php

namespace LidmoPrefix\Support;

class Date
{
    public static function convert(string $date, string $from = 'd/m/Y', string $to = 'Y-m-d'): string
    {
        try {
            if (empty($date)) {
                return '';
            }
            $dateFormat = $from != '' ? \DateTime::createFromFormat($from, $date) : new \DateTime($date);
            return $dateFormat->format($to);
        }catch (\Throwable $e){
            return $date;
        }
    }
}