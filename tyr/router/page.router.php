<?php
require_once BASE . "/router.php";
class Router extends BaseRouter {
}
$route = new Router();
$route->get('/page', "Page@getAll");
$route->get('/page/#code', "Page@getPageByCode");
