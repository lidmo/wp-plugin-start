<?php


namespace LidmoPrefix\Includes;

use LidmoPrefix\Traits\Singleton;
use LidmoPrefix\Interfaces\AdminInterface;
use LidmoPrefix\Interfaces\TemplatesInterface;
use LidmoPrefix\Traits\AdminPages;

class AdminMenuPages implements AdminInterface
{

    use AdminPages, Singleton;

    protected string $adminTemplatesPath;

    private $page_slug;

    public function __construct()
    {

        $this->adminTemplatesPath = TemplatesInterface::ADMIN_TEMPLATES_FOLDER;
        $this->page_slug = apply_filters('lidmo_admin_menu_slug', 'lidmo');
        if(!lidmo_admin_menu_exists($this->page_slug)) {
            add_menu_page(
                apply_filters('lidmo_admin_menu_page_title', 'Lídmo'),
                apply_filters('lidmo_admin_menu_title', 'Lídmo'),
                apply_filters('lidmo_admin_menu_capability', 'lidmo_manage_options'),
                $this->page_slug,
                [$this, 'getTemplate'],
                apply_filters('lidmo_admin_menu_icon', "dashicons-{$this->page_slug}"),
                10);
        }
        $this->setAdminPages();

    }

    public function getPageSlug()
    {
        return $this->page_slug;
    }

    public function generateDashicon()
    {
        echo '<style>
    .dashicons-'. $this->page_slug .' {
        background-image: url("' . LIDMO_PREFIX_PLUGIN_URL . '/assets/images/dashicon.png");
        background-repeat: no-repeat;
        background-position: center; 
    }
    </style>';
    }

    public function registerAdminPages()
    {

        $pages = $this->getAdminPages();
        if (is_array($pages) && !empty($pages)) {
            foreach ($pages as $page_slug => $menuPage) {

                add_submenu_page(
                    $this->page_slug,
                    $menuPage['page_title'],
                    $menuPage['menu_title'],
                    $menuPage['capability'],
                    $page_slug,
                    [$this, 'getTemplate']
                );

            }

        }


    }


    public function getTemplate()
    {

        if (isset($_GET['page'])) {

            $pageSlug = $_GET['page'];
            $adminPageTemplate = $this->adminTemplatesPath . $pageSlug . '.php';

            if (file_exists($adminPageTemplate)) {

                if (!empty($adminPageTemplate)) {

                    require_once("$adminPageTemplate");

                }

            } else {

                echo "<div class='update-nag'>Template does not exist: <strong>$adminPageTemplate</strong>. You should create a <strong>$pageSlug.php</strong> file under the <strong>$this->adminTemplatesPath</strong> folder</div> ";
            }

        }


    }

}
