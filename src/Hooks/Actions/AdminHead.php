<?php

namespace WPPluginStart\Hooks\Actions;

class AdminHead extends \Lidmo\WP\Foundation\Hooks\Hook
{
    public function handle()
    {
        echo '<style>
    .dashicons-lidmo {
        background-image: url("' . PREFIX_PLUGIN_URL . '/assets/images/dashicon.png");
        background-repeat: no-repeat;
        background-position: center; 
    }
    </style>';
    }
}