<?php
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
    public static function getMainPage() {
        $settings = Site::getData();
        $categories = Category::getMainCategories();
        $subCategories = array();
        $sss = Category::getPagesByCode('sss');
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
        self::view('static','header', ["headerType"=> "index" ,"categories" => $categories, "subCategories" => $subCategories]);
        self::view('main', 'index',["settings" => $settings, "sss" => $sss]);
        self::view('static', 'footer', ["settings" => $settings]);
    }
}