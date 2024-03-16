<?php

require __DIR__."/vendor/autoload.php";

$method = $_SERVER['REQUEST_METHOD'];
$path = $_SERVER['PATH_INFO'];

$r = new Php\Primeiroprojeto\Router;

$r->get('/olamundo', function () {
    return "Olá Mundo!";
});