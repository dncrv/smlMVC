<?php


//Auto Loader de Classes
spl_autoload_register(function ($class_name) {
    include $class_name . '.php';
});

//Inicio das Rotas
$route = new Router();
$route->createRoute();
