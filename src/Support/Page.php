<?php

namespace LidmoPrefix\Support;

class Page
{
    public static function select(){
        $pages = get_pages(['sort_column' => 'post_name']);
        $options = [];
        foreach ($pages as $page){
            $options[$page->ID] = $page->post_title;
        }
        return $options;
    }

    public static function findOrCreate($title, $content = '', $page_template = 'default', $parent_id = NULL)
    {
        $page = get_page_by_title($title);
        if (!empty($page)) {
            return $page->ID;
        }

        return wp_insert_post([
            'comment_status' => 'close',
            'ping_status' => 'close',
            'post_author' => 1,
            'post_title' => ucwords($title),
            'post_name' => strtolower(str_replace(' ', '-', trim($title))),
            'post_status' => 'publish',
            'post_content' => $content,
            'post_type' => 'page',
            'post_parent' => $parent_id,
            'page_template' => $page_template,
        ]);
    }
}