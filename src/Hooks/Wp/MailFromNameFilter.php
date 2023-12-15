<?php

namespace LidmoPrefix\Hooks\Wp;

use Lidmo\WP\Foundation\Hooks\Hook;
use LidmoPrefix\Support\Mail;

class MailFromNameFilter extends Hook
{
    public function handle($from_name)
    {
        return Mail::getConfig('smtp_from_name', $from_name);
    }
}