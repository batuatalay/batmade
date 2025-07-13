<?php 
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'PHPMailer/src/Exception.php';
require 'PHPMailer/src/PHPMailer.php';
require 'PHPMailer/src/SMTP.php';

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
class Contact extends SimpleController{

    public static function index() {
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
        self::view('static','header', ["headerType"=> "services" ,"categories" => $categories, "subCategories" => $subCategories, "settings" => $settings]);
        self::view('contact', 'index',["settings" => $settings, "sss" => $sss]);
        self::view('static', 'footer', ["settings" => $settings]);
    }

    public static function sendMail($params) {
        $settings = Site::getData();
        $message = "
        Ad : " . $params['name'] . "<br/>
        Soyad : " . $params['surname'] . "<br/>
        Telefon : " . $params['phone'] . "<br/>
        Mesaj : " . $params['content'] . "<br/>
        ";
        $mail = new PHPMailer(true);

        try {
            $mail->isSMTP();
            $mail->Host       = SMTPHOST;
            $mail->SMTPAuth   = true;
            $mail->Username   = EMAIL;
            $mail->Password   = EMAILPASSWORD;
            //info@odocdrozge  $RyGl4naV@?-
            $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
            $mail->Port       = 587;
            $mail->CharSet = 'UTF-8';

            $mail->setFrom(EMAIL, 'Artemis');
            $mail->addAddress($settings['email']);

            $mail->isHTML(true);
            $mail->Subject = 'Web sitesi iletişim Formu';
            $mail->Body    = $message;

            $mail->send();
            self::returnData(["code" => "200", "message" => "Mailiniz Başarıyla gönderildi"]);
        } catch (Exception $e) {
            self::returnData(["code" => "400", "message" => "Mail Gönderiminde hata ile karşılaşıldı."]);
        }
    }
}