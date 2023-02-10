<?php

use CoffeeCode\Router\Router;

require __DIR__ . "/vendor/autoload.php";

$router = new Router(URL_BASE);
$router->namespace("Source\Controllers");


$router->group(null);
$router->get("/", "Form:home");
$router->post("/create", "Form:create", "form.create");
$router->put("/update", "Form:update", "form.update");
$router->delete("/delete", "Form:delete", "form.delete");


$router->dispatch();

if($router->error()) {
    $router->redirect($router->error());
}