<?php


namespace LidmoPrefix\Traits;

trait Settings
{

    public function getSettings()
    {
        return apply_filters('lidmo_prefix_settings_fields', [
            'smtp' => [
                'title' => 'SMTP',
                'description' => 'Configurações de SMTP',
                'fields' => [
                    [
                        'id' => 'smtp_enabled',
                        'label' => 'Ativar SMTP',
                        'description' => 'Ativar SMTP',
                        'type' => 'checkbox',
                        'default' => ''
                    ],
                    [
                        'id' 			=> 'smtp_host',
                        'label'			=> 'Servidor',
                        'description'	=> 'Endereço do servidor SMTP',
                        'type'			=> 'text',
                        'default'		=> '',
                    ],
                    [
                        'id' 			=> 'smtp_port',
                        'label'			=> 'Porta',
                        'description'	=> 'Porta do servidor SMTP',
                        'type'			=> 'text',
                        'default'		=> '',
                    ],
                    [
                        'id' 			=> 'smtp_user',
                        'label'			=> 'Usuário',
                        'description'	=> 'Usuário do servidor SMTP',
                        'type'			=> 'text',
                        'default'		=> '',
                    ],
                    [
                        'id' 			=> 'smtp_pass',
                        'label'			=> 'Senha',
                        'description'	=> 'Senha do servidor SMTP',
                        'type'			=> 'password',
                        'default'		=> '',
                    ],
                    [
                        'id' => 'smtp_secure',
                        'label' => 'Segurança',
                        'description' => 'Segurança do servidor SMTP',
                        'type' => 'select',
                        'options' => [
                            '' => 'Nenhuma',
                            'ssl' => 'SSL',
                            'tls' => 'TLS',
                        ],
                        'default' => '',
                    ],
                ]
            ],
        ]);
    }


    public function getSettingsPageTitle(): string
    {

        return 'Configurações do plugin';

    }

    public function getSettingsPageDescription(): string
    {

        return 'Configurações do plugin ' . LIDMO_PREFIX_PLUGIN_NAME;

    }

}
