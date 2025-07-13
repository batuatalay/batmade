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
class File extends SimpleController{

    public function __construct($arr = []) {
        if(!Login::loginCheck()) {
            header("Location: /login");
        }
    }

    public static function convertBase64($base64) {
        $data = base64_decode(preg_replace('#^data:image/\w+;base64,#i', '', $base64));
        $path = "assets/uploads/" . uniqid() . ".jpg";
        $file = BASE . $path; // Örnek olarak JPEG dosya kaydediliyor
        
        if (file_put_contents($file, $data)) {
           return (['code' => 200, 'message' => $path]);
        } else {
            return (['code' => 400, 'message' => "Dosya Yüklenemedi."]);
        }
    }

    public static function getIndex() {
        echo 'index Page' . PHP_EOL;
        Test::testFunction2();
        self::view('main', 'index', '');

    }
}