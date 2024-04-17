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
                    null,
                    $_POST['titulo'],
                    $_POST['autor'],
                    $_POST['id_genero']
                );

                $livroDAO = new LivroDAO(new Conexao());

                if ($livroDAO->inserir($livro)) {
                    return "Livro inserido com sucesso!";
                } else {
                    return "Erro ao inserir o livro.";
                }
            } catch (PDOException $e) {
                return "Erro ao inserir livro: " . $e->getMessage();
            }
        } else {
            return "Dados incompletos para inserir o livro.";
        }
    }

    public function listarTodos($params)
    {
        try {
            $livroDAO = new LivroDAO(new Conexao());
            $livros = $livroDAO->listarTodos();

            if (!empty($livros)) {
                return json_encode($livros);
            } else {
                return "Nenhum livro encontrado.";
            }
        } catch (PDOException $e) {
            return "Erro ao listar livros: " . $e->getMessage();
        }
    }

    public function atualizar($params)
    {
        if (isset($params['titulo']) && isset($_POST['autor']) && isset($_POST['id_genero'])) {
            try {
                $titulo = $params['titulo'];
                $autor = $_POST['autor'];
                $idGenero = $_POST['id_genero'];

                $livro = new Livro(
                    null,
                    $titulo,
                    $autor,
                    $idGenero
                );

                $livroDAO = new LivroDAO(new Conexao());

                if ($livroDAO->atualizar($livro)) {
                    return "Livro atualizado com sucesso!";
                } else {
                    return "Erro ao atualizar o livro.";
                }
            } catch (PDOException $e) {
                return "Erro ao atualizar livro: " . $e->getMessage();
            }
        } else {
            return "Título do livro, autor ou ID do gênero não foram fornecidos corretamente.";
        }
    }

    public function deletar($params)
    {
        if (isset($params['titulo'])) {
            try {
                $titulo = $params['titulo'];
                $livroDAO = new LivroDAO(new Conexao());

                if ($livroDAO->deletarPorTitulo($titulo)) {
                    return "Livro deletado com sucesso!";
                } else {
                    return "Erro ao deletar o livro.";
                }
            } catch (PDOException $e) {
                return "Erro ao deletar livro: " . $e->getMessage();
            }
        } else {
            return "Título do livro não foi fornecido.";
        }
    }
}
