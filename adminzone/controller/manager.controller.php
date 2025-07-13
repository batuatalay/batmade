<?php 
require_once __DIR__ . "/../model/manager.model.php";

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
 * 
 */
class Manager extends SimpleController{
    public function __construct($arr = []) {
        if(!Login::loginCheck()) {
            header("Location: /login");
        }
    }

    public static function index() {
        $managerModel = new ManagerModel();
        $managers = $managerModel->get();
        $managers = array_map(function ($item) {
                unset($item['password']);
                return $item;
            }, $managers);
        $css = '<link rel="stylesheet" href="assets/vendor/select2/css/select2.css" />
        <link rel="stylesheet" href="assets/vendor/select2-bootstrap-theme/select2-bootstrap.min.css" />
        <link rel="stylesheet" href="assets/vendor/datatables/media/css/dataTables.bootstrap5.css" />';
        $js = '
        <!-- Specific Page Vendor -->
        <script src="assets/vendor/select2/js/select2.js"></script>
        <script src="assets/vendor/datatables/media/js/jquery.dataTables.min.js"></script>
        <script src="assets/vendor/datatables/media/js/dataTables.bootstrap5.min.js"></script>

        <!-- Theme Base, Components and Settings -->
        <script src="assets/js/theme.js"></script>

        <!-- Theme Custom -->
        <script src="assets/js/custom.js"></script>

        <!-- Theme Initialization Files -->
        <script src="assets/js/theme.init.js"></script>

        <!-- Examples -->
        <script src="assets/js/examples/examples.datatables.default.js"></script>
        <script src="assets/js/examples/examples.datatables.row.with.details.js"></script>
        <script src="assets/js/examples/examples.datatables.tabletools.js"></script>';

        self::view('static','header', ['header' => "Yoneticiler", 'active' => "managers", "css" => $css]);
        self::view('manager', 'index', $managers);
        self::view('static', 'footer',['js' => $js]);
    }

    public static function addManager ($params) {
        if(!empty($params)) {
            $params['status'] = "Waiting";
            $params['lastLogin'] = date('Y-m-d H:i:s');
            $params['password'] = hash('sha256',$params['password']);
            $managerModel = new ManagerModel($params);
            $manager = $managerModel->save();
            echo json_encode(['status' => $manager['code'], 'message' => $manager['message']]);
        } else{
            self::view('static','header', ['header' => "Proje Yoneticileri", 'active' => "managers"]);
            self::view('manager','add');
            self::view('static','footer');
        }
    
    }

    public static function getManager($username) {
        $js = '
        <script src="assets/vendor/ios7-switch/ios7-switch.js"></script>
        <script src="assets/js/theme.init.js"></script>';
        $managerModel = new ManagerModel(['username' => $username]);
        $manager = $managerModel->get();
        self::view('static','header', ['header' => $username, 'active' => "managers"]);
        self::view('manager','update', $manager);
        self::view('static','footer',['js'=> $js]);
    }

    public static function updateManager($params) {
        $managerModel = new ManagerModel(['id' => $params['id']]);
        $manager = $managerModel->get();
        foreach ($params as $key => $value) {
            if($key == "password") {
                if(empty($value))
                    $value = $manager['password'];
                else 
                    $value = hash('sha256',$value);
            }
            $manager[$key] = $value; 
        }
        $managerModel = new ManagerModel($manager);
        $result = $managerModel->save();
        echo json_encode(['status' => $result['code'], 'message' => $result['message']]);
    }
}