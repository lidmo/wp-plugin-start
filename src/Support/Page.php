<?php

namespace LidmoPrefix\Support;

class Page
{
    public static function select()
    {
        $pages = get_pages(['sort_column' => 'post_name']);
        $options = [];
        foreach ($pages as $page) {
            $options[$page->ID] = $page->post_title;
        }
        return $options;
    }

    public static function findOrCreate($title, $content = '', $page_template = 'default', $parent_id = NULL)
    {
        $pageID = self::getIDBySlug(sanitize_title($title));
        if ($pageID > 0) {
            return $pageID;
        }

        return wp_insert_post([
            'comment_status' => 'close',
            'ping_status' => 'close',
            'post_author' => 1,
            'post_title' => ucwords($title),
            'post_name' => sanitize_title($title),
            'post_status' => 'publish',
            'post_content' => $content,
            'post_type' => 'page',
            'post_parent' => $parent_id,
            'page_template' => $page_template,
        ]);
    }

    public static function getIDBySlug($slug)
    {
        global $wpdb;

        $sql = $wpdb->prepare("SELECT ID FROM {$wpdb->posts} WHERE post_name = %s AND post_type = 'page'", $slug);

        return (int) $wpdb->get_var($sql);
    }
}