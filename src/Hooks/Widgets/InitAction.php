<?php

namespace LidmoPrefix\Hooks\Widgets;

use Lidmo\WP\Foundation\Hooks\Hook;
use LidmoPrefix\Traits\ClassList;

class InitAction extends Hook
{
    use ClassList;

    public function handle()
    {
        $this->loadWidgets();
        if (is_array($this->classes) && !empty($this->classes)) {

            foreach ($this->classes as $widget) {

                if (class_exists($widget)) {

                    register_widget($widget);

                } else {
                    if(function_exists('lidmo_logger')) {
                        lidmo_logger('error', "Class: $widget is not defined in the $this->folderDirPath folder");
                    }

                }

            }

        }
    }

    protected function loadWidgets()
    {
        $this->folderDirPath = LIDMO_PREFIX_PLUGIN_PATH . 'src/Widgets/';
        $this->setClasses();
    }
}