<?php

namespace WPPluginStart\Controller\Admin;

use WPPluginStart\Interfaces\AdminInterface;

class AdminController implements AdminInterface {

	public function enqueueStyles() {

		wp_enqueue_style( PREFIX_PLUGIN_NAME, self::ADMIN_CSS_FOLDER . 'admin.min.css', [], null, 'all' );

	}
	public function enqueueScripts() {

		wp_enqueue_script( PREFIX_PLUGIN_NAME, self::ADMIN_JS_FOLDER . 'admin.min.js', ['jquery'], null, true );

	}

}
