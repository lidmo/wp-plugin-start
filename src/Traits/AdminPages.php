<?php


namespace WPPluginStart\Traits;

Trait AdminPages {

	protected $pages;

	public function setAdminPages(){

		$this->pages = [
			PREFIX_PLUGIN_NAME => [
				'page_title'    => 'WPPluginStart',
				'menu_title'    => 'WPPluginStart',
				'capability'    => 'manage_options',
				'icon_url'      => 'dashicons-lidmo',
				'position'      => 10,
				'subpages'      => [
                    PREFIX_PLUGIN_NAME . '-sub' => [
						'page_title'    => 'WPPluginStart SubPage',
						'menu_title'    => 'WPPluginStart SubPage',
						'capability'    => 'manage_options',
                    ]
                ]
            ],
        ];

	}


	public function getAdminPages(){

		return $this->pages;

	}

}
