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

	public static function getMainCategories(){
		$categoryObj = new CategoryModel(["isMain" => "1", "active" => "1"]);
		$categories = $categoryObj->get();
		foreach ($categories as $category) {
			$result[$category['code']] = $category;
		}
		return $result;
	}
	public static function getSubCategory() {
		$categoryObj = new CategoryModel(["isMain" => "0", "active" => "1"]);
		$categories = $categoryObj->get();
		foreach ($categories as $category) {
			$result[$category['code']] = $category;
		}
		return $result;
	}

	public static function getSubCategoryByMain($mainID) {
		$categoryObj = new CategoryModel(["isMain" => "0", "active" => "1", "parent_id" => $mainID]);
		$categories = $categoryObj->get();
		foreach ($categories as $category) {
			$result[$category['code']] = $category;
		}
		return $result;
	}

	public static function getPagesByCode($code) {
		$categoryObj = new CategoryModel(['code' => $code]);
		$category = $categoryObj->get();
		$pages = Page::getByCategory($category['id']);
		return $pages;
	}

	public static function getByCode($code) {
		$settings = Site::getData();
		$categoryObj = new CategoryModel(['code' => $code]);
		$category = $categoryObj->get();

		$mainCategoryObj = new CategoryModel(['id' => $category['parent_id']]);
		$mainCategory = $mainCategoryObj->get();

        $categories = Category::getMainCategories();
        $subCategories = array();
        $sss = Category::getPagesByCode('blog');
        foreach ($categories as $cat) {
            $sub = Category::getSubCategoryByMain($cat['id']);
            $sub = array_map(function ($item) {
                unset($item['isMain']);
                unset($item['active']);
                unset($item['parent_id']);
                return $item;
            }, $sub);
            $subCategories[$cat['code']] = $sub;
        }
        if($category['code'] == "blog") {
        	self::view('static','header', ["header" =>$category['title'] ,"headerType" => "services", "categories" => $categories, "subCategories" => $subCategories, "settings" => $settings]);
	        self::view('sss', 'index',["category" => $category, "sss" => $sss]);
	        self::view('static', 'footer', ["settings" => $settings]);
	        exit;
        }

        if($category['isMain'] == 1) {
			$page = Page::getByCode($code);
			self::view('static','header', ["header" =>$category['title'] ,"headerType" => "services", "categories" => $categories, "subCategories" => $subCategories, "settings" => $settings]);
	        self::view('page', 'index',["page" => $page, "sss" => $sss]);
	        self::view('static', 'footer', ["settings" => $settings]);
	        exit;
		}

		$page = current(Page::getByCategory($category['id']));
		self::view('static','header', ["header" =>$category['title'] ,"headerType" => "services", "categories" => $categories, "subCategories" => $subCategories, "settings" => $settings]);
        self::view('category', 'index',["category" => $category, "page" => $page, "mainCategory" => $mainCategory, "subCategories" => $subCategories, "sss" => $sss]);
        self::view('static', 'footer', ["settings" => $settings]);
	}

}