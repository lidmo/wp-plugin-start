<?php

namespace LidmoPrefix\Hooks\Admin;

use Lidmo\WP\Foundation\Hooks\Hook;
use LidmoPrefix\Includes\AdminMenuPages;

class HeadAction extends Hook
{

    public function handle()
    {
        AdminMenuPages::getInstance()->generateDashicon();
    }
}