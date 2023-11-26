<?php


namespace LidmoPrefix\Traits;

trait Settings
{
    public function getSettingsTabTitle($tab)
    {
        $titles = [
            'lidmo-general' => 'Geral',
        ];
        return $titles[$tab] ?? apply_filters("lidmo_settings_{$tab}_tab_title", LIDMO_PREFIX_PLUGIN_NAME);
    }

    public function getSettingsSections()
    {
        $settings = [
            'lidmo-general' => [
                'default' => [
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
                            'id' => 'smtp_host',
                            'label' => 'Servidor',
                            'description' => 'Endereço do servidor SMTP',
                            'type' => 'text',
                            'default' => '',
                        ],
                        [
                            'id' => 'smtp_port',
                            'label' => 'Porta',
                            'description' => 'Porta do servidor SMTP',
                            'type' => 'text',
                            'default' => '',
                        ],
                        [
                            'id' => 'smtp_user',
                            'label' => 'Usuário',
                            'description' => 'Usuário do servidor SMTP',
                            'type' => 'text',
                            'default' => '',
                        ],
                        [
                            'id' => 'smtp_pass',
                            'label' => 'Senha',
                            'description' => 'Senha do servidor SMTP',
                            'type' => 'password',
                            'default' => '',
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
                    ],
                ],
            ],
            $this->plugin_slug => apply_filters("lidmo_settings_{$this->plugin_slug}_section", []),
        ];

        return $settings;
    }


    public function getSettingsPageTitle(): string
    {

        return apply_filters('lidmo_settings_page_title', 'Configurações do plugin');

    }

    public function getSettingsPageDescription(): string
    {

        return apply_filters('lidmo_settings_page_description', 'Configurações do plugin Lídmo');

    }

}
