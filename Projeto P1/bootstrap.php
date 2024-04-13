<?php

require __DIR__ . "/vendor/autoload.php";

$metodo = $_SERVER['REQUEST_METHOD'];
$caminho = $_SERVER['PATH_INFO'] ?? '/';

$r = new Php\Projetop1\Router($metodo, $caminho);

// Rotas GET
$router->get('/bemvindo', 'Php\Projeto1\Controllers\WelcomeController@bemVindo');
$router->get('/clientes', 'Php\Projeto1\Controllers\ClientesController@clientes');
$router->get('/generos', 'Php\Projeto1\Controllers\GenerosController@generos');
$router->get('/livros', 'Php\Projeto1\Controllers\LivrosController@livros');
$router->get('/emprestimos', 'Php\Projeto1\Controllers\EmprestimosController@emprestimos');

// Rotas POST para Clientes
$router->post('/cliente/inserir', 'Php\Projeto1\Controllers\ClientesController@inserir');
$router->post('/clientes/consultar', 'Php\Projeto1\Controllers\ClientesController@consultar');
$router->post('/clientes/atualizar', 'Php\Projeto1\Controllers\ClientesController@atualizar');
$router->post('/clientes/deletar', 'Php\Projeto1\Controllers\ClientesController@deletar');

// Rotas POST para Gêneros
$router->post('/generos/inserir', 'Php\Projeto1\Controllers\GenerosController@inserir');
$router->post('/generos/consultar', 'Php\Projeto1\Controllers\GenerosController@consultar');
$router->post('/generos/atualizar', 'Php\Projeto1\Controllers\GenerosController@atualizar');
$router->post('/generos/deletar', 'Php\Projeto1\Controllers\GenerosController@deletar');

// Rotas POST para Livros
$router->post('/livros/inserir', 'Php\Projeto1\Controllers\LivrosController@inserir');
$router->post('/livros/consultar', 'Php\Projeto1\Controllers\LivrosController@consultar');
$router->post('/livros/atualizar', 'Php\Projeto1\Controllers\LivrosController@atualizar');
$router->post('/livros/deletar', 'Php\Projeto1\Controllers\LivrosController@deletar');

// Rotas POST para Empréstimos
$router->post('/emprestimos/inserir', 'Php\Projeto1\Controllers\EmprestimosController@inserir');
$router->post('/emprestimos/consultar', 'Php\Projeto1\Controllers\EmprestimosController@consultar');
$router->post('/emprestimos/atualizar', 'Php\Projeto1\Controllers\EmprestimosController@atualizar');
$router->post('/emprestimos/deletar', 'Php\Projeto1\Controllers\EmprestimosController@deletar');

//HANDLER

$resultado = $r->handler();

if(!$resultado){
    http_response_code(404);
    echo "Página não encontrada!";
    die();
}

if ($resultado instanceof Closure){
    echo $resultado($r->getParams());
} elseif (is_string($resultado)){
    $resultado = explode("@", $resultado);
    $controller = new $resultado[0];
    $resultado = $resultado[1];
    echo $controller->$resultado($r->getParams());
}
