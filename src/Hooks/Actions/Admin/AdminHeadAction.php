<?php

namespace LidmoPrefix\Hooks\Actions\Admin;

use Lidmo\WP\Foundation\Hooks\Hook;

class AdminHeadAction extends Hook
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