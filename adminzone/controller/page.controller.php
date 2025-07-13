<?php 
require_once __DIR__ . "/../model/page.model.php";
spl_autoload_register( function($className) {
	if($className == "SimpleController") {
		$fullPath = "simple.controller.php";
	}else {
		$extension = ".controller.php";
		$fullPath = strtolower($className) . $extension;
	}
	require_once $fullPath;
});

class Page extends SimpleController{
	public function __construct($arr = []) {
        if(!Login::loginCheck()) {
            header("Location: /login");
        }
    }

	public static function get() {
		$pageObj = new PageModel();
		$pages = $pageObj->get();
		$allCategories = Category::getAll4Use();
		foreach ($allCategories as $category) {
			$categories[$category['id']] = $category;
		}
		$css = '<link rel="stylesheet" href="assets/vendor/select2/css/select2.css" />
        <link rel="stylesheet" href="assets/vendor/select2-bootstrap-theme/select2-bootstrap.min.css" />
        <link rel="stylesheet" href="assets/vendor/datatables/media/css/dataTables.bootstrap5.css" />';

        $js = '
        <script src="assets/vendor/datatables/media/js/jquery.dataTables.min.js"></script>
        <script src="assets/vendor/datatables/media/js/dataTables.bootstrap5.min.js"></script>
        <script src="assets/js/examples/examples.datatables.default.js"></script>
        <script src="assets/js/examples/examples.datatables.row.with.details.js"></script>
        <script src="assets/js/examples/examples.datatables.tabletools.js"></script>';

        self::view('static','header', ['header' => "Yazılar", 'active' => "pages", "css" => $css]);
        self::view('page', 'index', [$pages, $categories]);
        self::view('static', 'footer',['js' => $js]);
	}

	public static function getAll4Use($order = "") {
		$pageObj = new PageModel();
		$pages = $pageObj->get($order);
		return $pages;
	}

	public static function getBlog($id) {
		$pageObj = new PageModel([
			"id" => $id
		]);
		$page = $pageObj->get();
		$allCategories = Category::getAll4Use();
		foreach ($allCategories as $category) {
			$categories[$category['id']] = $category;
		}
		$css = '<link rel="stylesheet" href="assets/vendor/summernote/summernote-bs4.css" />';
		$js = '<script src="assets/vendor/summernote/summernote-bs4.js"></script>';
		self::view('static','header', ['header' => $page['title'], 'active' => "pages", "css" => $css]);
        self::view('page', 'update', [$page, $categories]);
        self::view('static', 'footer',['js' => $js]);
	}

	public static function add($params) {
		if(!empty($params)) {
			$params['content'] = addslashes($params['content']);
			$params['process'] = "New";
			$response = File::convertBase64($params['file']);
			if($response['code'] == 200) {
				$params['file'] = $response['message'];
			}
			$pageObj = new PageModel($params);
			$response = $pageObj->save();
			self::returnData($response);
		} else {
			$categories = Category::getAll4Use();
			$css = '<link rel="stylesheet" href="assets/vendor/summernote/summernote-bs4.css" />';
			$js = '<script src="assets/vendor/summernote/summernote-bs4.js"></script>';

			self::view('static','header', ['header' => "Anasayfa", 'active' => "pages", "css" => $css]);
	        self::view('page', 'add', $categories);
	        self::view('static', 'footer',['js' => $js]);
		}
	}
	public static function delete($params) {
		if(!empty($params)) {
			$pageObj = new PageModel(['id' => $params['id']]);
			$response = $pageObj->delete();
			self::returnData($response);
		}
	}

	public static function edit($params) {
		if (strpos($params['file'], "data:image") !== false) {
			$response = File::convertBase64($params['file']);
			if($response['code'] == 200) {
				$params['file'] = $response['message'];
			}
		}
		$pageObj = new PageModel($params);
		$response = $pageObj->save();
		self::returnData($response);
	}
}