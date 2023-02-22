<?php

namespace WPPluginStart\Service\PostType;

use WPPluginStart\Interfaces\TemplatesInterface;

class BoilerplatePost implements TemplatesInterface
{

    const POST_TYPE = 'boilerplate_post';

    const META_FIELDS = [
        'podcast' => self::POST_TYPE . '_podcast',
    ];

    public function registerPostType()
    {

        $labels = [
            'name' => __('Episodes', PREFIX_PLUGIN_NAME),
            'singular_name' => __('Episode', PREFIX_PLUGIN_NAME),
            'menu_name' => _x('Episodes', 'admin menu', PREFIX_PLUGIN_NAME),
            'name_admin_bar' => _x('Episode', 'add new on admin bar', PREFIX_PLUGIN_NAME),
            'add_new' => _x('Add New Episode', PREFIX_PLUGIN_NAME),
            'add_new_item' => __('Add New Episode', PREFIX_PLUGIN_NAME),
            'new_item' => __('New Episode', PREFIX_PLUGIN_NAME),
            'edit_item' => __('Edit Episode', PREFIX_PLUGIN_NAME),
            'view_item' => __('View Episode', PREFIX_PLUGIN_NAME),
            'all_items' => __('All Episodes', PREFIX_PLUGIN_NAME),
            'search_items' => __('Search Episodes', PREFIX_PLUGIN_NAME),
            'parent_item_colon' => __('Parent Episodes:', PREFIX_PLUGIN_NAME),
            'not_found' => __('No Episodes found.', PREFIX_PLUGIN_NAME),
            'not_found_in_trash' => __('No Episodes found in Trash.', PREFIX_PLUGIN_NAME)
        ];

        $args = [
            'label' => __('Episodes', PREFIX_PLUGIN_NAME),
            'labels' => $labels,
            'description' => '',
            'public' => true,
            'publicly_queryable' => true,
            'show_ui' => true,
            'delete_with_user' => false,
            'show_in_rest' => true,
            'rest_base' => '',
            'rest_controller_class' => 'WP_REST_Posts_Controller',
            'rewrite' => ['slug' => 'episodes', 'with_front' => false],
            'has_archive' => true,
            'show_in_menu' => true,
            'show_in_nav_menus' => true,
            'exclude_from_search' => true,
            'capability_type' => 'post',
            'map_meta_cap' => true,
            'hierarchical' => false,
            'query_var' => true,
            'supports' => ['title', 'thumbnail', 'editor', 'excerpt', 'author'],
        ];

        register_post_type(self::POST_TYPE, $args);

//        add_rewrite_tag('%episodes%', '([^/]+)', 'castify_episode=');
//        add_permastruct('episodes', '/podcasts/%podcast%/%episode%', false);
//        add_rewrite_rule('^podcasts/([^/]+)/([^/]+)/?$','index.php?castify_episode=$matches[2]','top');

    }

    public function addMetaBoxes($meta_boxes)
    {

        $meta_boxes[] = array(
            'id' => self::POST_TYPE . '_information',
            'title' => esc_html__('Information', PREFIX_PLUGIN_NAME),
            'post_types' => [self::POST_TYPE],
            'context' => 'normal',
            'priority' => 'default',
            'autosave' => 'false',
            'fields' => [
                [
                    'id' => self::META_FIELDS['episodeNumber'],
                    'name' => esc_html__('Episode Number', PREFIX_PLUGIN_NAME),
                    'type' => 'text',
                ],
            ],
        );

        return $meta_boxes;

    }

    public function customPostTypeTemplateSingle($single_template)
    {

        global $post;

        $template = self::SINGLE_TEMPLATES_FOLDER . "boilerplate-post.php";
        return ($post->post_type === self::POST_TYPE && file_exists($template) ? $template : $single_template);

    }

    public function customPostTypeTemplateArchive($archive_template)
    {

        $template = self::ARCHIVE_TEMPLATES_FOLDER . "boilerplate-post.php";
        return (is_post_type_archive(self::POST_TYPE) && file_exists($template) ? $template : $archive_template);

    }

}
