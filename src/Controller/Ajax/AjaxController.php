<?php

namespace WPPluginStart\Controller\Ajax;

use WPPluginStart\Interfaces\AjaxInterface;

class AjaxController implements AjaxInterface {

    public function getJSAjaxActions(){

        $actions = array();
        foreach( self::AJAX_ACTIONS as $ajaxAction => $ajaxData ){
            $actions[ $ajaxAction ] = $ajaxAction;
        }

        return $actions;

    }


    public function ajaxCustomAction(){

        $params = array();
        parse_str( $_POST['data'], $params );

        $result = array(
            'html' => 'test',
            'form' => $params,
        );

        wp_send_json( $result );
        wp_die();

    }

}
