<?php

namespace WPPluginStart\Service\User;

class UserCapabilities {

    const CUSTOM_USER_CAPABILITIES = [
        'example_capability' => ['example_role']
    ];

    public function registerUserCapabilities(){

        foreach( self::CUSTOM_USER_CAPABILITIES as $capability => $userRoles ){

            foreach( $userRoles as $userRoleSlug ){

                // gets the user role object based on the $userRoleSlug
                $role = get_role( $userRoleSlug );

                // add the custom capability to the user role
                $role->add_cap( $capability, true);

            }

        }

    }

}
