<?php

namespace WPPluginStart\Hooks\Actions;

use Lidmo\WP\Foundation\Hooks\Hook;
use WPPluginStart\Includes\Widgets;

class WidgetsInit extends Hook
{
   public function handle()
   {
       $widgets = new Widgets();
       $widgets->registerWidgets();
   }
}