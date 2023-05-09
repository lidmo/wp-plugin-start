<?php

namespace LidmoPrefix\Hooks\Defaults;



use LidmoPrefix\Support\Plugin;

class PHPMailerInitAction extends \Lidmo\WP\Foundation\Hooks\Hook
{
    protected $name = 'phpmailer_init';

    public function handle($phpmailer)
    {
        if(Plugin::getOption('smtp_enabled') === 'on'){
            $user = Plugin::getOption('smtp_user', '');
            $pass = Plugin::getOption('smtp_pass', '');
            $secure = Plugin::getOption('smtp_secure', '');
            $phpmailer->IsSMTP();
            $phpmailer->Host = Plugin::getOption('smtp_host');
            $phpmailer->Port = Plugin::getOption('smtp_port');

            if($user !== '' && $pass !== '') {
                $phpmailer->SMTPAuth = true;
                $phpmailer->Username = Plugin::getOption('smtp_user');
                $phpmailer->Password = Plugin::getOption('smtp_pass');
            }

            if($secure !== '') {
                $phpmailer->SMTPSecure = $secure;
            }

        }
    }
}