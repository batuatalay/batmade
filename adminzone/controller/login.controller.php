<?php 
require_once __DIR__ . "/../model/manager.model.php";
spl_autoload_register( function($className) {
    if($className == "SimpleController") {
        $fullPath = "simple.controller.php";
    }else {
        $extension = ".controller.php";
        $fullPath = strtolower($className) . $extension;
    }
    require_once $fullPath;
});

class Login extends SimpleController{

    public static function loginPage() {
        if(self::loginCheck()) {
            header("Location: /main");
        } else {
            self::view('login', 'index', '');
        }
    }

    public function signIn ($data) {
        $manager = new ManagerModel([
            "username" => $data['username']
        ]);
        $result = $manager->get();
        if($result['status'] == "Active") {
            if(($result['password'] == hash('sha256',$data['password']))) {
                setcookie("uzmUsername", $result['username'], time() + 3600*24, "/");
                $result['lastLogin'] = date('Y-m-d H:i:s');
                $loginManager = new ManagerModel($result);
                $response = $loginManager->save();
                if($response['code'] == 200) {
                    echo json_encode(['code' => 200, 'link' => '/main']);
                }
            } else {
                echo json_encode(['code' => 401, 'message' => 'Bilgilerinizi Kontrol ediniz']);
            }
        } else {
            echo json_encode(['code' => 400, 'message' => 'Giriş yapmaya yetkiniz yok lütfen yöneticiniz ile bağlantıya geçiniz']);
        }
    }
    
    public function signOut(){
        setcookie("uzmUsername", "", time() - 3600, "/");
        header("Location: /login");
    }

    public function loginCheck() {
        if($_COOKIE['uzmUsername']) {
            $username = $_COOKIE['uzmUsername'];
            $manager = new ManagerModel([
                "username" => $username
            ]);
            $result = $manager->get();
            $_SESSION['user'] = $result['name'];
            if($result && $result['status'] == "Active") {
                return true;
            } else {
                return false;
            }
        } else {
            return false;
        }
    }
}