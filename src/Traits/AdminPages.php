<?php


namespace LidmoPrefix\Traits;

trait AdminPages
{

    protected $pages;

    public function setAdminPages()
    {

        $this->pages = [
            /*LIDMO_PREFIX_PLUGIN_SLUG => [
                'page_title' => LIDMO_PREFIX_PLUGIN_NAME,
                'menu_title' => LIDMO_PREFIX_PLUGIN_NAME,
                'capability' => 'manage_options',
            ],*/
        ];

    }


    public function getAdminPages()
    {

        return $this->pages;

    }

}
