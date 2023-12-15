<?php

namespace LidmoPrefix\Hooks\Wp;

use Lidmo\WP\Foundation\Hooks\Hook;
use LidmoPrefix\Support\Mail;

class MailFromFilter extends Hook
{
    public function handle($from_email)
    {
        return Mail::getConfig('smtp_from_email', $from_email);
    }
}