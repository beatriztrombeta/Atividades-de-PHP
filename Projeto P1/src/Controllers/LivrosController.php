<?php

namespace Php\Projetop1\Controllers;

use Php\Projetop1\Models\DAO\LivroDAO;
use Php\Projetop1\Models\Domain\Livro;
use Php\Projetop1\Models\DAO\Conexao;
use PDOException;

class LivrosController
{
    public function livros($params)
    {
        require_once(__DIR__ . "/../Views/add_livro.php");
    }

    public function inserir($params)
    {
        if (isset($_POST['titulo']) && isset($_POST['autor']) && isset($_POST['id_genero'])) {
            try {
                $livro = new Livro(
                    3,
                    $_POST['titulo'],
                    $_POST['autor'],
                    $_POST['id_genero']
                );

                $conexao = new Conexao();
                $livroDAO = new LivroDAO($conexao); // Passa a conexão para o LivroDAO

                if ($livroDAO->inserir($livro)) {
                    header("Location: /livros");
                    exit;
                }
            } catch (PDOException $e) {
                return "Erro ao inserir livro: " . $e->getMessage();
            }
        } else {
            return "Dados incompletos para inserir o livro.";
        }
    }
}
