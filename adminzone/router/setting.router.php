<?php
require_once BASE . "/router.php";
class Router extends BaseRouter {
}
$route = new Router();
$route->get('/setting', "site@getSettings");

$route->post('/setting/update', "site@update");
