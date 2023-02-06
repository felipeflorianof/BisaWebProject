<?php

require __DIR__ . "/vendor/autoload.php";

use CoffeeCode\Router\Router;

$router = new Router(URL_BASE);

$router->namespace("Source\Controllers"); // Importando os Controllers

/*
 * Rotas
 */

// home
    $router->group(null);
    $router->get("/", "Web:home");
    $router->get("/contato", "Web:contact");

// Erros
    $router->group("ooops");
    $router->get("/{errcode}", "Web:error");


    $router->dispatch(); // Método responsável por disparar as rotas

    if($router->error()) 
    {
        $router->redirect("/ooops/{$router->error()}");
    }