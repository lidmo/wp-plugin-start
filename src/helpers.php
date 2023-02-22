<?php

if(!function_exists('lidmo_logger')){
    function lidmo_logger($level, $message, $context = []){
        lidmo_plugin(PREFIX_PLUGIN_NAME)->log->log($level, $message, $context);
    }
}