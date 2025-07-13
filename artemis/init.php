<?php
define("DEVELOPMENT", true);
if(DEVELOPMENT) {
	define("ENV", "http://localhost:81/");
	define("BASE", "/var/www/html/");
	define("DBHOST", "panel_db");
	define("DBNAME", "web-app");
	define("PANEL", "https://adminzone.newmore.com.tr/");

} else {
	define("ENV", "https://artemis.newmore.com.tr/");
	define("PANEL", "https://adminzone.newmore.com.tr/");
	define("BASE", "/home/newmorec/artemis.newmore.com.tr/");
	define("DBHOST", "localhost");
	define("DBNAME", "newmorec_zone");
}

if(DEVELOPMENT) {
	define("DBUSERNAME", "ironman");
	define("DBPASSWORD", "1q2w3e4r");
} else {
	define("DBUSERNAME", "newmorec_adminZone");
	define("DBPASSWORD", "f4ff7bc5d5783457231e5260c8c7ac98b52d99aba817b7cf3267d1ee3f22afc1");
}