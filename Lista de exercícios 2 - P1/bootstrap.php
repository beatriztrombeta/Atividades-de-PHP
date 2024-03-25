<?php

require __DIR__."/vendor/autoload.php";

$metodo = $_SERVER['REQUEST_METHOD'];
$caminho = $_SERVER['PATH_INFO'] ?? '/';

$r = new Php\Listadeexercicios2\Router($metodo, $caminho);

#ROTAS

$r->get('/teste', function (){
    return "teste";
} );

$r->get('/exercicio1', function(){
    include"../public/exercises/exercicio1/exer1.php";
});

$r->get('/exercicio2', function(){
    include"../public/exercises/exercicio2/exer2.php";
});

$r->get('/exercicio3', function(){
    include"../public/exercises/exercicio3/exer3.php";
});

$r->get('/exercicio4', function(){
    include"../public/exercises/exercicio4/exer4.php";
});

$r->get('/exercicio5', function(){
    include"../public/exercises/exercicio5/exer5.php";
});

$r->get('/exercicio6', function(){
    include"../public/exercises/exercicio6/exer6.php";
});

$r->get('/exercicio7', function(){
    include"../public/exercises/exercicio7/exer7.php";
});

$r->get('/exercicio8', function(){
    include"../public/exercises/exercicio8/exer8.php";
});

$r->get('/exercicio9', function(){
    include"../public/exercises/exercicio9/exer9.php";
});

$r->get('/exercicio10', function(){
    include"../public/exercises/exercicio10/exer10.php";
});


#ROTAS

$resultado = $r->handler();

if(!$resultado){
    http_response_code(404);
    echo "Página não encontrada!";
    die();
}

echo $resultado($r->getParams());


