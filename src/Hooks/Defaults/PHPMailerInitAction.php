<?php

namespace LidmoPrefix\Hooks\Defaults;



use LidmoPrefix\Support\Mail;

class PHPMailerInitAction extends \Lidmo\WP\Foundation\Hooks\Hook
{
    protected $name = 'phpmailer_init';

    public function handle($phpmailer)
    {
        if(Mail::getConfig('smtp_enabled') === 'on') {
            $user = Mail::getConfig('smtp_user', '');
            $pass = Mail::getConfig('smtp_pass', '');
            $secure = Mail::getConfig('smtp_secure', '');
            $phpmailer->IsSMTP();
            $phpmailer->Host = Mail::getConfig('smtp_host');
            $phpmailer->Port = Mail::getConfig('smtp_port');

            if($user !== '' && $pass !== '') {
                $phpmailer->SMTPAuth = true;
                $phpmailer->Username = Mail::getConfig('smtp_user');
                $phpmailer->Password = Mail::getConfig('smtp_pass');
            }

            if($secure !== '') {
                $phpmailer->SMTPSecure = $secure;
            }

        }
    }
}