<?php

namespace LidmoPrefix\Includes;

use LidmoPrefix\Traits\Singleton;
use LidmoPrefix\Traits\ClassList;

class Shortcodes
{

    use ClassList, Singleton;

    public function __construct()
    {

        $this->folderDirPath = LIDMO_PREFIX_PLUGIN_PATH . 'src/Shortcodes/';
        $this->setClasses();

    }

    public function registerShortcodes()
    {

        if (is_array($this->classes) && !empty($this->classes)) {

            foreach ($this->classes as $shortcode) {

                if (class_exists($shortcode)) {

                    $interfaces = class_implements($shortcode);

                    if (isset($interfaces['LidmoPrefix\Interfaces\ShortcodesInterface'])) {

                        $shortcodeObj = new $shortcode();
                        add_shortcode($shortcodeObj->getShortcodeName(), array($shortcodeObj, 'display'));

                    } else {
                        if(function_exists('lidmo_logger')) {
                            lidmo_logger('error', "The $shortcode class needs to implement the Shortcodes Interface.");
                        }

                    }

                } else {
                    if(function_exists('lidmo_logger')) {
                        lidmo_logger('error', "Class: $shortcode is not defined in the $this->folderDirPath folder");
                    }

                }

            }

        }

    }

}
