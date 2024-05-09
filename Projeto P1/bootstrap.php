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
$router->post('/clientes/atualizar', 'Php\Projetop1\Controllers\ClientesController@atualizar');
$router->post('/clientes/deletar', 'Php\Projetop1\Controllers\ClientesController@deletar');

// Rotas GET auxiliares para Clientes
$router->get('/clientes/alterar?{id}', 'Php\Projetop1\Controllers\ClientesController@irParaAtualizar');
$router->get('/clientes/excluir?{id}', 'Php\Projetop1\Controllers\ClientesController@irParaDeletar');

// Rotas POST para Gêneros
$router->post('/generos/inserir', 'Php\Projetop1\Controllers\GenerosController@inserir');
$router->post('/generos/atualizar', 'Php\Projetop1\Controllers\GenerosController@atualizar');
$router->post('/generos/deletar', 'Php\Projetop1\Controllers\GenerosController@deletar');

// Rotas GET auxiliares para Gêneros
$router->get('/generos/alterar?{id}', 'Php\Projetop1\Controllers\GenerosController@irParaAtualizar');
$router->get('/generos/excluir?{id}', 'Php\Projetop1\Controllers\GenerosController@irParaDeletar');

// Rotas POST para Livros
$router->post('/livros/inserir', 'Php\Projetop1\Controllers\LivrosController@inserir');
$router->post('/livros/atualizar', 'Php\Projetop1\Controllers\LivrosController@atualizar');
$router->post('/livros/deletar', 'Php\Projetop1\Controllers\LivrosController@deletar');

// Rotas GET auxiliares para Livros
$router->get('/livros/alterar?{id}', 'Php\Projetop1\Controllers\LivrosController@irParaAtualizar');
$router->get('/livros/excluir?{id}', 'Php\Projetop1\Controllers\LivrosController@irParaDeletar');

// Rotas POST para Empréstimos
$router->post('/emprestimos/inserir', 'Php\Projetop1\Controllers\EmprestimosController@inserir');
$router->post('/emprestimos/atualizar', 'Php\Projetop1\Controllers\EmprestimosController@atualizar');
$router->post('/emprestimos/deletar', 'Php\Projetop1\Controllers\EmprestimosController@deletar');

// Rotas GET auxiliares para Empréstimos
$router->get('/emprestimos/alterar?{id}', 'Php\Projetop1\Controllers\EmprestimosController@irParaAtualizar');
$router->get('/emprestimos/excluir?{id}', 'Php\Projetop1\Controllers\EmprestimosController@irParaDeletar');


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
