<?php

namespace WPPluginStart\Includes;

class I18n {

	public function loadTextDomain() {

		load_plugin_textdomain(
			PREFIX_PLUGIN_NAME,
			false,
			PREFIX_PLUGIN_PATH . 'languages/'
		);

	}



}
