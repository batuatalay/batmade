<?php 
require_once __DIR__ . "/../model/site.model.php";
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
class Site extends SimpleController{
	public static function getData () {
		$siteObj = new SiteModel();
		$site_settings = $siteObj->get();
		$data = [];
		foreach ($site_settings as $value) {
			if($value['attr'] == "type_target") {
				$data[$value['attr']] = json_decode($value['value'], true);
			} else {
				$data[$value['attr']] = $value['value'];
			}
		}
		return $data;
	}

	public static function getSettings() {
		$siteSettings = self::getData();
		self::view('static','header', ['header' => "Site Ayarları", 'active' => "siteSettings"]);
        self::view('site', 'index', $siteSettings);
        self::view('static', 'footer');
	}

	public static function update($params) {
		if(!empty($params)) {
			$params['type_target'] = json_encode($params['type_target']);
			$siteObj = new SiteModel();
			$siteObj->delete();
			foreach($params as $key => $value) {
				$siteObj = new SiteModel(['attr' => $key, 'value' => $value]);
				$siteObj->save();
			}
			self::returnData(['code' => 200, 'message' => "Güncelleme işlemi başarılı"]);
		}
	}
}