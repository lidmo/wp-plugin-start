<?php

namespace LidmoPrefix\Support;

class User
{
    public static function getUserMeta(int $id, string $name)
    {
        return get_user_meta($id, Plugin::getPrefixed($name), true);
    }

    public static function updateUserMeta(int $id, string $name, $value)
    {
        return update_user_meta($id, Plugin::getPrefixed($name), $value);
    }

    public static function deleteUserMeta(int $id, string $name): bool
    {
        return delete_user_meta($id, Plugin::getPrefixed($name));
    }
}