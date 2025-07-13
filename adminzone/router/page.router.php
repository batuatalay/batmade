<?php
require_once BASE . "/router.php";
class Router extends BaseRouter {
}
$route = new Router();
$route->get('/page', "Page@get");
$route->get('/page/add', "Page@add");
$route->get('/page/#id', "Page@getBlog");

$route->post('/page/update', "Page@categoryUpdate");
$route->post('/page/add', "Page@add");
$route->post('/page/delete', "Page@delete");
$route->post('/page/edit', "Page@edit");
