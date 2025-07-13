<?php
require_once BASE . "/router.php";
class Router extends BaseRouter {
}
$route = new Router();
$route->get('/manager', "manager@index");
$route->get('/manager/add', "manager@addManager");
$route->get('/manager/#username', "manager@getManager");


$route->post('/manager/add', "manager@addManager");
$route->post('/manager/update', "manager@updateManager");
