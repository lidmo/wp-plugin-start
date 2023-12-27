<?php

namespace LidmoPrefix\Support;

class Request
{
    public static function checkNonce($action)
    {
        if (!wp_verify_nonce($_REQUEST['_wpnonce'], $action)) {
            throw new \Exception('Requisição inválida', 400);
        }
    }
}