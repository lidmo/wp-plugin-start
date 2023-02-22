<?php

namespace WPPluginStart\Controller\Front;

use WPPluginStart\Controller\Ajax\AjaxController;
use WPPluginStart\Interfaces\PublicInterface;

class PublicController implements PublicInterface {

	public function enqueueStyles() {

		wp_enqueue_style( PREFIX_PLUGIN_NAME, PREFIX_PLUGIN_URL . self::PUBLIC_CSS_FOLDER . 'public.min.css', [], null, 'all' );

	}
	public function enqueueScripts() {

		wp_enqueue_script( PREFIX_PLUGIN_NAME, PREFIX_PLUGIN_URL . self::PUBLIC_JS_FOLDER . 'public.min.js', ['jquery'], null, true );

        $ajaxController = new AjaxController();
        wp_localize_script(
            PREFIX_PLUGIN_NAME,
            'prefixPluginOptions',
            array_merge( [
                'ajax_url'   => admin_url( 'admin-ajax.php' ),
                'security'   => wp_create_nonce( PREFIX_PLUGIN_NAME ),
            ],
                $ajaxController->getJSAjaxActions()
            )
        );

	}

	public function pluginNameBodyClass( $classes ){

		$classes[] = PREFIX_PLUGIN_NAME;

		return $classes;

	}

}
