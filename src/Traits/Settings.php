<?php


namespace LidmoPrefix\Traits;

use LidmoPrefix\Support\Plugin;

trait Settings
{
    public function getSettingsTitles()
    {
        $titles = (array)Plugin::getOption('', [], $this->page_slug . '-titles');

        if (!array_key_exists('lidmo-general', $titles)) {
            $titles['lidmo-general'] = 'Geral';
        }
        $titles[$this->plugin_slug] = LIDMO_PREFIX_PLUGIN_NAME;

        update_option($this->page_slug . '-titles', $titles);

        return $titles;
    }

    public function getSettingsSections()
    {
        $settings = (array)Plugin::getOption('', [], $this->page_slug);

        if (!array_key_exists('lidmo-general', $settings)) {
            $settings['lidmo-general'] = [
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
            ];
        }

        $settings[$this->plugin_slug] = apply_filters("lidmo_settings_{$this->plugin_slug}_section", ['default' => [
            'title' => 'Teste',
            'description' => 'Configurações de teste',
            'fields' => [
                [
                    'id' => 'smtp_enabled',
                    'label' => 'Ativar teste',
                    'description' => 'Ativar teste',
                    'type' => 'checkbox',
                    'default' => ''
                ],
            ]
        ]]);

        update_option($this->page_slug, $settings);

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
