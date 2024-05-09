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
        require_once(__DIR__ . "/../Views/livro/add_livro.php");
    }
    public function irParaAtualizar($params)
    {
        require_once(__DIR__ . "/../Views/livro/atualizar_livro.php");
    }
    public function irParaDeletar($params)
    {
        require_once(__DIR__ . "/../Views/livro/deletar_livro.php");
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

    public function atualizar($params)
    {
        if (isset($_POST['id']) && isset($_POST['titulo']) && isset($_POST['autor']) && isset($_POST['id_genero'])) {
            try {
                $id = $_POST['id'];
                $titulo = $_POST['titulo'];
                $autor = $_POST['autor'];
                $idGenero = $_POST['id_genero'];

                $livro = new Livro($id, $titulo, $autor, $idGenero);
                $livroDAO = new LivroDAO(new Conexao());

                if ($livroDAO->atualizar($livro)) {
                    header("Location: /livros");
                    exit;
                }
            } catch (PDOException $e) {
                return "Erro ao atualizar livro: " . $e->getMessage();
            }
        } else {
            return "Dados de ID, titulo e autor não foram fornecidos corretamente.";
        }
    }

    public function deletar($params)
    {
        if (isset($_POST['id'])) {
            try {
                $id = $_POST['id'];
                $livroDAO = new LivroDAO(new Conexao());

                if ($livroDAO->deletar($id)) {
                    header("Location: /livros");
                    exit;
                }
            } catch (PDOException $e) {
                return "Erro ao deletar livro: " . $e->getMessage();
            }
        } else {
            return "ID do livro não foi fornecido corretamente.";
        }
    }
}
