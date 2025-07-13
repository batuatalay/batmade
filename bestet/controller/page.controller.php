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

class Page extends SimpleController { 

	public static function getByCategory($categoryID) {
		$pageObj = new PageModel(['category_id' => $categoryID]);
		$pages = $pageObj->get();
		return $pages;
	}

	public static function getByCode($code) {
		$pageObj = new PageModel(['code' => $code]);
		$page = $pageObj->get();
		return $page;
	}

	public static function getPageByCode($code) {
		$pageObj = new PageModel(['code' => $code]);
		$page = $pageObj->get();

		$settings = Site::getData();
        $categories = Category::getMainCategories();
        $subCategories = array();
        $sss = Category::getPagesByCode('blog');
        foreach ($categories as $category) {
            $sub = Category::getSubCategoryByMain($category['id']);
            $sub = array_map(function ($item) {
                unset($item['isMain']);
                unset($item['active']);
                unset($item['parent_id']);
                return $item;
            }, $sub);
            $subCategories[$category['code']] = $sub;
        }

		self::view('static','header', ["header" =>$page['title'], "headerType" => "services", "categories" => $categories, "subCategories" => $subCategories, "settings" => $settings]);
	    self::view('page', 'index',["page" => $page, "sss" => $sss]);
	    self::view('static', 'footer', ["settings" => $settings]);
	}



}