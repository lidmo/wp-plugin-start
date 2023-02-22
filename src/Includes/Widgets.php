<?php


namespace WPPluginStart\Includes;

use WPPluginStart\Traits\ClassList;

class Widgets {

	use ClassList;

    public function __construct() {

		$this->folderDirPath = PREFIX_PLUGIN_PATH. 'src/Widgets/';
		$this->setClasses();

	}



    /**
     * Loops through the Classes defined in the folder of @see $folderDirPath
     * For every class found it registers the Widget
     */
    public function registerWidgets(){

		if( is_array( $this->classes ) && !empty( $this->classes ) ) {

			foreach ( $this->classes as $widget ) {

				if ( class_exists( $widget ) ) {

					register_widget( $widget );

				}
				else {

                    lidmo_logger('error', "Class: $widget is not defined in the $this->folderDirPath folder" );

				}

			}

		}

	}

}
