<?php
require_once BASE . "/router.php";
class Router extends BaseRouter {
}
$route = new Router();
$route->get('/category', "Category@getAll");
$route->get('/category/add', "Category@add");
$route->get('/category/#code', "Category@getByCode");

$route->post('/category/update', "Category@categoryUpdate");
$route->post('/category/add', "Category@add");
$route->post('/category/delete', "Category@delete");
