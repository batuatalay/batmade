<?php 
require_once __DIR__ . "/../model/category.model.php";
spl_autoload_register( function($className) {
	if($className == "SimpleController") {
		$fullPath = "simple.controller.php";
	}else {
		$extension = ".controller.php";
		$fullPath = strtolower($className) . $extension;
	}
	require_once $fullPath;
});

class Category extends SimpleController{
	public function __construct($arr = []) {
        if(!Login::loginCheck()) {
            header("Location: /login");
        }
    }

	public static function getAll() {
		$categoryObj = new CategoryModel();
		$allCategories = $categoryObj->get();
		$css = '<link rel="stylesheet" href="assets/vendor/select2/css/select2.css" />
        <link rel="stylesheet" href="assets/vendor/select2-bootstrap-theme/select2-bootstrap.min.css" />
        <link rel="stylesheet" href="assets/vendor/datatables/media/css/dataTables.bootstrap5.css" />';

        $js = '
        <script src="assets/vendor/datatables/media/js/jquery.dataTables.min.js"></script>
        <script src="assets/vendor/datatables/media/js/dataTables.bootstrap5.min.js"></script>
        <script src="assets/js/examples/examples.datatables.default.js"></script>
        <script src="assets/js/examples/examples.datatables.row.with.details.js"></script>
        <script src="assets/js/examples/examples.datatables.tabletools.js"></script>';
        foreach ($allCategories as $category) {
        	$categories[$category['id']] = $category;
        }
        self::view('static','header', ['header' => "Anasayfa", 'active' => "categories", "css" => $css]);
        self::view('category', 'index', $categories);
        self::view('static', 'footer',['js' => $js]);
	}

	public static function getAll4Use($active = null) {
		$categoryObj = new CategoryModel(["isMain" => "0", "active" => $active]);
		$categories = $categoryObj->get("ORDER BY ID DESC");
		foreach ($categories as $category) {
			$result[$category['id']] = $category;
		}
		return $result;
	}
	public static function getAllMain4Use($order = ""){
		$categoryObj = new CategoryModel(["isMain" => "1"]);
		$categories = $categoryObj->get($order);
		foreach ($categories as $category) {
			$result[$category['id']] = $category;
		}
		return $result;
	}

	public static function getByCode($code) {
		$categoryObj = new CategoryModel([
			"code" => $code
		]);
		$category = $categoryObj->get();

		$categoryObj = new CategoryModel(["isMain" => "1"]);
		$categories = $categoryObj->get();

		$js = '
		    <script src="assets/vendor/ios7-switch/ios7-switch.js"></script>
		    <script src="assets/js/theme.init.js"></script>';
		self::view('static','header', ['header' => "Anasayfa", 'active' => "categories", "css" => $css]);
        self::view('category', 'update', [$category, $categories]);
        self::view('static', 'footer',['js' => $js]);
	}

	public static function categoryUpdate($params) {
		if(!empty($params)) {
			$categoryObj = new CategoryModel($params);
			$response = $categoryObj->save();
			self::returnData($response);
		}
	}
	public static function add($params) {
		if(!empty($params)) {
			$params['process'] = "New";
			$categoryObj = new CategoryModel($params);
			$response = $categoryObj->save();
			self::returnData($response);
		} else {
			$categoryObj = new CategoryModel(["isMain" => "1"]);
			$categories = $categoryObj->get();
			 $js = '
		        <script src="assets/vendor/ios7-switch/ios7-switch.js"></script>
		        <script src="assets/js/theme.init.js"></script>';
			self::view('static','header', ['header' => "Anasayfa", 'active' => "categories", "css" => $css]);
	        self::view('category', 'add', $categories);
	        self::view('static', 'footer',['js' => $js]);
		}
	}
	public static function delete($params) {
		if(!empty($params)) {
			$categoryObj = new CategoryModel(['id' => $params['id']]);
			$response = $categoryObj->delete();
			self::returnData($response);
		}
	}
}