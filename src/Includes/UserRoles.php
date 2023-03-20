<?php

namespace LidmoPrefix\Includes;


use LidmoPrefix\Traits\Singleton;

class UserRoles {

    use Singleton;

    const CUSTOM_USER_ROLES = [
        /*'example_role' => [
            'display_name'          => 'example Role',
            'default_capabilities'  => [
                'read'         => true,
                'edit_posts'   => true,
                'upload_files' => true,
            ]
        ]*/
    ];

    public function registerUserRoles(){

        foreach( self::CUSTOM_USER_ROLES as $userRoleSlug => $userRole ){

            add_role(
                $userRoleSlug,
                $userRole['display_name'],
                $userRole['default_capabilities']
            );

        }

    }

}
