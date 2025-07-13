<?php
require_once BASE . "/router.php";
class Router extends BaseRouter {
}
$route = new Router();
$route->get('/contact', "Contact@index");

$route->post('/contact/send', "Contact@sendMail");
