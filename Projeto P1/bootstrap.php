<?php

require __DIR__ . "/vendor/autoload.php";

$metodo = $_SERVER['REQUEST_METHOD'];
$caminho = $_SERVER['PATH_INFO'] ?? '/';

$router = new Php\Projetop1\Router($metodo, $caminho);

// Rotas GET
$router->get('/bemvindo', 'Php\Projetop1\Controllers\WelcomeController@bemVindo');
$router->get('/clientes', 'Php\Projetop1\Controllers\ClientesController@clientes');
$router->get('/generos', 'Php\Projetop1\Controllers\GenerosController@generos');
$router->get('/livros', 'Php\Projetop1\Controllers\LivrosController@livros');
$router->get('/emprestimos', 'Php\Projetop1\Controllers\EmprestimosController@emprestimos');

// Rotas POST para Clientes
$router->post('/clientes/inserir', 'Php\Projetop1\Controllers\ClientesController@inserir');
$router->post('/clientes/consultar', 'Php\Projetop1\Controllers\ClientesController@consultar');
$router->post('/clientes/atualizar', 'Php\Projetop1\Controllers\ClientesController@atualizar');
$router->post('/clientes/deletar', 'Php\Projetop1\Controllers\ClientesController@deletar');

// Rotas POST para Gêneros
$router->post('/generos/inserir', 'Php\Projetop1\Controllers\GenerosController@inserir');
$router->post('/generos/consultar', 'Php\Projetop1\Controllers\GenerosController@consultar');
$router->post('/generos/atualizar', 'Php\Projetop1\Controllers\GenerosController@atualizar');
$router->post('/generos/deletar', 'Php\Projetop1\Controllers\GenerosController@deletar');

// Rotas POST para Livros
$router->post('/livros/inserir', 'Php\Projetop1\Controllers\LivrosController@inserir');
$router->post('/livros/consultar', 'Php\Projetop1\Controllers\LivrosController@consultar');
$router->post('/livros/atualizar', 'Php\Projetop1\Controllers\LivrosController@atualizar');
$router->post('/livros/deletar', 'Php\Projetop1\Controllers\LivrosController@deletar');

// Rotas POST para Empréstimos
$router->post('/emprestimos/inserir', 'Php\Projetop1\Controllers\EmprestimosController@inserir');
$router->post('/emprestimos/consultar', 'Php\Projetop1\Controllers\EmprestimosController@consultar');
$router->post('/emprestimos/atualizar', 'Php\Projetop1\Controllers\EmprestimosController@atualizar');
$router->post('/emprestimos/deletar', 'Php\Projetop1\Controllers\EmprestimosController@deletar');

//HANDLER

$resultado = $router->handler();

if(!$resultado){
    http_response_code(404);
    echo "Página não encontrada!";
    die();
}

if ($resultado instanceof Closure){
    echo $resultado($router->getParams());
} elseif (is_string($resultado)){
    $resultado = explode("@", $resultado);
    $controller = new $resultado[0];
    $resultado = $resultado[1];
    echo $controller->$resultado($router->getParams());
}
