<?php 
require_once __DIR__ . "/../model/page.model.php";
spl_autoload_register( function($className) {
    if($className == "SimpleController") {
        $fullPath = "simple.controller.php";
    } else {
        $extension = ".controller.php";
        $fullPath = strtolower($className) . $extension;
    }
    require_once $fullPath;
});
/**
 * for API usege only you can add only echo
 * 
 */
class Main extends SimpleController{

    public function __construct($arr = []) {
        if(!Login::loginCheck()) {
            header("Location: /login");
        }
    }

    public static function getMainPage() {
        $pages = Page::getAll4Use("ORDER BY ID DESC");
        $subCategories = Category::getAll4Use();
        $mainCategories = Category::getAllMain4Use("ORDER BY ID DESC");
        $activeSubCategories = Category::getAll4Use("1");
        $css = '<link rel="stylesheet" href="assets/vendor/select2/css/select2.css" />
        <link rel="stylesheet" href="assets/vendor/select2-bootstrap-theme/select2-bootstrap.min.css" />
        <link rel="stylesheet" href="assets/vendor/datatables/media/css/dataTables.bootstrap5.css" />';

        $js = '
        <script src="assets/vendor/datatables/media/js/jquery.dataTables.min.js"></script>
        <script src="assets/vendor/datatables/media/js/dataTables.bootstrap5.min.js"></script>
        <script src="assets/js/examples/examples.datatables.default.js"></script>
        <script src="assets/js/examples/examples.datatables.row.with.details.js"></script>
        <script src="assets/js/examples/examples.datatables.tabletools.js"></script>';

        self::view('static','header', ['header' => "Anasayfa", 'active' => "home", "css" => $css]);
        self::view('main', 'index', [$pages, $mainCategories, $subCategories, $activeSubCategories]);
        self::view('static', 'footer',['js' => $js]);
    }

    public static function getDashboard() {
        $site_settings = Site::getData();
        $response = Project::returnProjects();
        $blogObj = new BlogModel(['process' => "Last"]);
        $blog = $blogObj->get();
        $response['blog'] = $blog;
        $response['siteSettings'] = $site_settings;
        self::view('main', 'dashboard', $response);

    }
}