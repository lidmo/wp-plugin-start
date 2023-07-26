<?php

namespace LidmoPrefix\Support;

class Post
{
    public static function getPostMeta(int $id, string $name)
    {
        return get_post_meta($id, Plugin::getPrefixed($name));
    }

    public static function updatePostMeta(int $id, string $name, $value)
    {
        return update_post_meta($id, Plugin::getPrefixed($name), $value);
    }

    public static function deletePostMeta(int $id, string $name): bool
    {
        return delete_post_meta($id, Plugin::getPrefixed($name));
    }
}