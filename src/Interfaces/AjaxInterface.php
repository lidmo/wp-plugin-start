<?php


namespace WPPluginStart\Interfaces;


Interface AjaxInterface {

    const AJAX_ACTIONS = array(
        'ajaxCustomAction' => array(
            'callback' => 'ajaxCustomAction',
            'nopriv'   => false,
        ),
    );

}
