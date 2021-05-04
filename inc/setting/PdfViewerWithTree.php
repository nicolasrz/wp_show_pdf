<?php


class PdfViewerWithTree
{

    private $plugin;

    private function __construct()
    {
        $this->plugin = "PdfViewerWithTree";
    }

    private function initPlugin()
    {
        add_action('admin_menu', array($this, 'add_admin_menu'));
        add_action('wp_enqueue_scripts', array($this, 'enqueue_public'));
        add_action('admin_enqueue_scripts', array($this, 'enqueue_private'));
        add_shortcode("nr_pdf_viewer_with_tree", array($this, 'add_pdf_viewer'));
    }

    public function add_pdf_viewer()
    {
        include "wp-admin/includes/file.php";

        $folder = "wp-content/pdf_files";
        $getFiles = list_files($folder);
        $listPdf = [];
        foreach ($getFiles as $file) {
            $name = wp_basename($file);
            $listPdf[] = [
                "name" => $name,
                "url" => content_url() . '/pdf_files/' . $name
            ];
        }
        require_once plugin_dir_path(__FILE__) . '../template/pdfViewer.php';
    }

    public function add_admin_menu()
    {
        add_menu_page("$this->plugin  plugin", $this->plugin, 'manage_options',
            "$this->plugin _plugin",
            array($this, 'admin_index'),
            'dashicons-media-spreadsheet', 110
        );
    }

    public function admin_index()
    {
        require_once plugin_dir_path(__FILE__) . '../template/adminPage.php';
    }

    public function enqueue_public()
    {
        wp_enqueue_script('script', plugins_url('../js/script.js', __FILE__));
        wp_enqueue_style('style', plugins_url('../css/style.css', __FILE__));
    }

    public function enqueue_private()
    {
        wp_enqueue_style('style', plugins_url('../css/style.css', __FILE__));
    }

    public static function make()
    {
        (new self())->initPlugin();
    }
}