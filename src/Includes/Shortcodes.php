<?php

namespace WPPluginStart\Includes;

use WPPluginStart\Traits\ClassList;

class Shortcodes
{

    use ClassList;

    public function __construct()
    {

        $this->folderDirPath = PREFIX_PLUGIN_PATH . 'src/Shortcodes/';
        $this->setClasses();

    }

    public function registerShortcodes()
    {

        if (is_array($this->classes) && !empty($this->classes)) {

            foreach ($this->classes as $shortcode) {

                if (class_exists($shortcode)) {

                    $interfaces = class_implements($shortcode);

                    if (isset($interfaces['WPPluginStart\Interfaces\ShortcodesInterface'])) {

                        $shortcodeObj = new $shortcode();
                        add_shortcode($shortcodeObj->getShortcodeName(), array($shortcodeObj, 'display'));

                    } else {

                        lidmo_logger('error', "The $shortcode class needs to implement the Shortcodes Interface.");

                    }

                } else {

                    lidmo_logger('error', "Class: $shortcode is not defined in the $this->folderDirPath folder");

                }

            }

        }

    }

}
