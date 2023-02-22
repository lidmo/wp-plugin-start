<?php

namespace WPPluginStart\Service\Entities;

use WPPluginStart\Service\PostType\BoilerplatePost;
use WPPluginStart\Traits\PostEntity;

class BoilerplateEntity {

    use PostEntity;

    public $episodes;

    public function __construct( $id ) {

        $this->ID         = $id;
        $this->post       = get_post( $this->ID );
        $this->metaSlugs  = BoilerplatePost::META_FIELDS;
        $this->postMeta   = get_post_meta( $this->ID );
        $this->setProperties();

    }

}
