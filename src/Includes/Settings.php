<?php

namespace LidmoPrefix\Includes;

use LidmoPrefix\Traits\Settings as SettingsFields;
use LidmoPrefix\Traits\Singleton;

class Settings
{

    use SettingsFields, Singleton;

    private $page_slug;
    private $options;
    private $settings;
    private $titles;
    private $currentTab = 'lidmo-general';

    public function __construct()
    {
        $this->plugin_slug = LIDMO_PREFIX_PLUGIN_SLUG;
        $this->page_slug = apply_filters('lidmo_settings_page_slug', 'lidmo-settings');
    }

    public function init()
    {
        foreach ($this->getSettingsSections() as $tab => $data) {
            if(is_array($data) && count($data) > 0) {
                $this->settings[$tab] = $data;
                register_setting($tab, $tab, array($this, 'validateFields'));
            }
        }
        $this->titles = $this->getSettingsTitles();
    }

    public function initSection($currentTab)
    {
        $this->currentTab = $currentTab;
        $this->options = $this->getOptions();
        foreach ($this->settings[$this->currentTab] as $section => $data) {

            // Add section to page
            add_settings_section($section, $data['title'], array($this, 'settingsSection'), $this->currentTab);

            foreach ($data['fields'] as $field) {

                // Add field to page
                add_settings_field($field['id'], $field['label'], array($this, 'displayField'), $this->currentTab, $section, array('field' => $field));
            }
        }
    }


    public function addSettingsMenu()
    {
        if(!lidmo_admin_menu_exists($this->page_slug, true)) {
            add_submenu_page(AdminMenuPages::getInstance()->getPageSlug(), 'Configurações', 'Configurações', 'lidmo_manage_options', $this->page_slug, array($this, 'settingsPage'));
        }
    }

    public function addSettingsLink()
    {
        if (isset($this->settings[$this->plugin_slug])) {
            return "<a href='admin.php?page={$this->page_slug}&tab={$this->plugin_slug}'>Configurações</a>";
        }
        return "<a href='admin.php?page={$this->page_slug}'>Configurações</a>";
    }

    public function getOptions()
    {
        $options = get_option($this->currentTab);

        if (!$options && is_array($this->settings[$this->currentTab])) {
            $options = [];
            foreach ($this->settings[$this->currentTab] as $section => $data) {
                foreach ($data['fields'] as $field) {
                    $options[$field['id']] = $field['default'];
                }
            }

            add_option($this->currentTab, $options);
        }

        return $options;
    }

    public function settingsSection($section)
    {
        $html = '<p class="settings-container--description"> ' . $this->settings[$this->currentTab][$section['id']]['description'] . '</p>' . "\n";
        echo $html;
    }

    public function displayField($args)
    {

        $field = $args['field'];
        $type = $field['type'];
        $html = '';
        $option_name = $this->currentTab . "[" . $field['id'] . "]";
        $data = (isset($this->options[$field['id']])) ? $this->options[$field['id']] : '';
        $field['placeholder'] = $field['placeholder'] ?? '';

        switch ($type) {

            case 'text':
            case 'password':
            case 'number':
                $html .= '<input id="' . esc_attr($field['id']) . '" type="' . $field['type'] . '" name="' . esc_attr($option_name) . '" placeholder="' . esc_attr($field['placeholder']) . '" value="' . $data . '"/>' . "\n";
                break;

            case 'text_secret':
                $html .= '<input id="' . esc_attr($field['id']) . '" type="text" name="' . esc_attr($option_name) . '" placeholder="' . esc_attr($field['placeholder']) . '" value=""/>' . "\n";
                break;

            case 'textarea':
                $html .= '<textarea id="' . esc_attr($field['id']) . '" rows="5" cols="50" name="' . esc_attr($option_name) . '" placeholder="' . esc_attr($field['placeholder']) . '">' . $data . '</textarea><br/>' . "\n";
                break;

            case 'checkbox':
                $checked = '';
                if ($data && 'on' == $data) {
                    $checked = 'checked="checked"';
                }
                $html .= '<input id="' . esc_attr($field['id']) . '" type="' . $field['type'] . '" name="' . esc_attr($option_name) . '" ' . $checked . '/>' . "\n";
                break;

            case 'checkbox_multi':
                foreach ($field['options'] as $k => $v) {
                    $checked = false;
                    if (is_array($data) && in_array($k, $data)) {
                        $checked = true;
                    }
                    $html .= '<label for="' . esc_attr($field['id'] . '_' . $k) . '"><input type="checkbox" ' . checked($checked, true, false) . ' name="' . esc_attr($option_name) . '[]" value="' . esc_attr($k) . '" id="' . esc_attr($field['id'] . '_' . $k) . '" /> ' . $v . '</label> ';
                }
                break;

            case 'radio':
                foreach ($field['options'] as $k => $v) {
                    $checked = false;
                    if ($k == $data) {
                        $checked = true;
                    }
                    $html .= '<label for="' . esc_attr($field['id'] . '_' . $k) . '"><input type="radio" ' . checked($checked, true, false) . ' name="' . esc_attr($option_name) . '" value="' . esc_attr($k) . '" id="' . esc_attr($field['id'] . '_' . $k) . '" /> ' . $v . '</label> ';
                }
                break;

            case 'select':
                $html .= '<select name="' . esc_attr($option_name) . '" id="' . esc_attr($field['id']) . '">';
                foreach ($field['options'] as $k => $v) {
                    $selected = false;
                    if ($k == $data) {
                        $selected = true;
                    }
                    $html .= '<option ' . selected($selected, true, false) . ' value="' . esc_attr($k) . '">' . $v . '</option>';
                }
                $html .= '</select> ';
                break;

            case 'select_multi':
                $html .= '<select name="' . esc_attr($option_name) . '[]" id="' . esc_attr($field['id']) . '" multiple="multiple">';
                foreach ($field['options'] as $k => $v) {
                    $selected = false;
                    if (in_array($k, $data)) {
                        $selected = true;
                    }
                    $html .= '<option ' . selected($selected, true, false) . ' value="' . esc_attr($k) . '" />' . $v . '</label> ';
                }
                $html .= '</select> ';
                break;

            default:
                $html = apply_filters("lidmo_settings_prepare_{$type}_field", $html, $field, $data, $option_name);
                break;

        }

        switch ($type) {

            case 'checkbox_multi':
            case 'radio':
            case 'select_multi':
                $html .= '<br/><span class="description">' . $field['description'] . '</span>';
                break;

            case 'text':
            case 'text_secret':
            case 'password':
            case 'number':
            case 'select':
            case 'textarea':
            case 'checkbox':
                $html .= '<label for="' . esc_attr($field['id']) . '"><span class="description">' . $field['description'] . '</span></label>' . "\n";
                break;
            default:
                $html = apply_filters("lidmo_settings_prepare_{$type}_label", $html, $field);
                break;
        }

        echo $html;
    }

    public function validateFields($data)
    {
        // $data array contains values to be saved:
        // either sanitize/modify $data or return false
        // to prevent the new options to be saved

        // Sanitize fields, eg. cast number field to integer
        // $data['number_field'] = (int) $data['number_field'];

        // Validate fields, eg. don't save options if the password field is empty
        // if ( $data['password_field'] == '' ) {
        // 	add_settings_error( $this->plugin_slug, 'no-password', __('A password is required.', $this->textdomain), 'error' );
        // 	return false;
        // }

        return apply_filters("lidmo_settings_{$this->currentTab}_validate_fields", $data);
    }

    public function settingsPage()
    {
        $currentTab = wp_slash($_GET['tab'] ?? 'lidmo-general');
        $this->initSection(wp_slash($currentTab));
        ?>
        <div class="wrap" id="<?php echo $this->currentTab; ?>">

            <div class="settings-header">
                <h1><?php echo $this->getSettingsPageTitle(); ?></h1>
                <p><?php echo $this->getSettingsPageDescription(); ?></p>
            </div>

            <div class="nav-tab-wrapper settings-tabs hide-if-no-js">
                <?php
                $menuSections = [];
                foreach ($this->settings as $tab => $data) {
                    $activeTab = $tab === $currentTab ? ' nav-tab-active' : '';
                    $menuSections[$this->currentTab] = [];
                    foreach ($data as $section => $d){
                        $menuSections[$tab][] = '<li><a href="#'.$section.'" class="">' . $d['title'] . '</a></li>';
                    }
                    echo '<a href="admin.php?page=' . $this->page_slug . '&tab=' . $tab . '" class="nav-tab' . $activeTab . '">' . apply_filters("lidmo_settings_{$tab}_tab_title", $this->titles[$tab] ?? 'Indefinido') . '</a>';
                }
                ?>
            </div>
            <?php $this->addScript(); ?>

            <form action="options.php" method="POST">
                <?php if (count($menuSections[$this->currentTab]) > 0) {
                    echo '<ul class="subsubsub settings-sublinks">' . implode('|', $menuSections[$this->currentTab]) . '</ul><br class="clear">';
                } ?>
                <?php settings_fields($this->currentTab); ?>
                <div class="settings-container">
                    <?php do_settings_sections($this->currentTab); ?>
                </div>
                <?php submit_button(); ?>
            </form>
        </div>
        <?php
    }

    private function addScript()
    {
        // Very simple jQuery logic for the tabbed navigation.
        // Delete this function if you don't need it.
        // If you have other JS assets you may merge this there.
        ?>
        <script>
            jQuery(document).ready(function (e) {
                var headings = jQuery('.settings-container > h2, .settings-container > h3');
                var paragraphs = jQuery('.settings-container > p');
                var tables = jQuery('.settings-container > table');
                var triggers = jQuery('.settings-sublinks a');

                triggers.each(function (i) {
                    triggers.eq(i).on('click', function (e) {
                        e.preventDefault();
                        triggers.removeClass('current');
                        headings.hide();
                        paragraphs.hide();
                        tables.hide();

                        triggers.eq(i).addClass('current');
                        headings.eq(i).show();
                        paragraphs.eq(i).show();
                        tables.eq(i).show();
                    });
                })

                triggers.eq(0).click();
            });
        </script>
        <?php
    }
}

