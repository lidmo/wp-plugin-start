<?php


namespace LidmoPrefix\Includes;

use LidmoNumerology\Traits\Singleton;
use LidmoPrefix\Interfaces\AdminInterface;
use LidmoPrefix\Interfaces\TemplatesInterface;
use LidmoPrefix\Traits\AdminPages;

class AdminMenuPages implements AdminInterface
{

    use AdminPages, Singleton;

    protected string $adminTemplatesPath;

    public function __construct()
    {

        $this->adminTemplatesPath = TemplatesInterface::ADMIN_TEMPLATES_FOLDER;
        if(!lidmo_admin_menu_exists('lidmo')) {
            $menuPage = add_menu_page('Lídmo', 'Lídmo', 'lidmo_manage_options', 'lidmo', [$this, 'getTemplate'], 'dashicons-lidmo', 10);
            //add_action('admin_print_styles-' . $menuPage, 'lidmo_css');
        }
        $this->setAdminPages();

    }

    public function registerAdminPages()
    {

        $pages = $this->getAdminPages();
        if (is_array($pages) && !empty($pages)) {
            foreach ($pages as $page_slug => $menuPage) {

                add_submenu_page(
                    'lidmo',
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
