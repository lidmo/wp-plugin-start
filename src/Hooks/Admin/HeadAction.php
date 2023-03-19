<?php

namespace LidmoPrefix\Hooks\Admin;

use Lidmo\WP\Foundation\Hooks\Hook;

class HeadAction extends Hook
{

    public function handle()
    {
        echo '<style>
    .dashicons-lidmo {
        background-image: url("' . LIDMO_PREFIX_PLUGIN_URL . '/assets/images/dashicon.png");
        background-repeat: no-repeat;
        background-position: center; 
    }
    </style>';
    }
}