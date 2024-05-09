<?php

namespace Php\Projetop1\Controllers;

use Php\Projetop1\Models\DAO\GeneroDAO;
use Php\Projetop1\Models\Domain\Genero;
use Php\Projetop1\Models\DAO\Conexao;
use PDOException;

class GenerosController
{
    public function generos($params)
    {
        require_once(__DIR__ . "/../Views/genero/add_genero.php");
    }
    public function irParaAtualizar($params)
    {
        require_once(__DIR__ . "/../Views/genero/atualizar_genero.php");
    }
    public function irParaDeletar($params)
    {
        require_once(__DIR__ . "/../Views/genero/deletar_genero.php");
    }

    public function inserir($params)
    {
        if (isset($_POST['nome_genero']) && isset($_POST['descricao'])) {
            try {
                $genero = new Genero(
                    null,
                    $_POST['nome_genero'],
                    $_POST['descricao']
                );

                $generoDAO = new GeneroDAO(new Conexao()); // Passa a conexão para o GeneroDAO

                if ($generoDAO->inserir($genero)) {
                    header("Location: /generos");
                    exit;
                }
            } catch (PDOException $e) {
                return "Erro ao inserir gênero: " . $e->getMessage();
            }
        } else {
            return "Dados incompletos para inserir o gênero.";
        }
    }

    public function atualizar($params)
    {
        if (isset($_POST['id']) && isset($_POST['nome_genero']) && isset($_POST['descricao'])) {
            try {
                $id = $_POST['id'];
                $nome = $_POST['nome_genero'];
                $email = $_POST['descricao'];

                $genero = new Genero($id, $nome, $email);
                $generoDAO = new GeneroDAO(new Conexao());

                if ($generoDAO->atualizar($genero)) {
                    header("Location: /generos");
                    exit;
                }
            } catch (PDOException $e) {
                return "Erro ao atualizar cliente: " . $e->getMessage();
            }
        } else {
            return "Dados não foram fornecidos corretamente.";
        }
    }

    public function deletar($params)
    {
        if (isset($_POST['id'])) {
            try {
                $id = $_POST['id'];
                $generoDAO = new GeneroDAO(new Conexao());

                if ($generoDAO->deletar($id)) {
                    header("Location: /generos");
                    exit;
                }
            } catch (PDOException $e) {
                return "Erro ao deletar genero: " . $e->getMessage();
            }
        } else {
            return "ID do genero não foi fornecido corretamente.";
        }
    }
}
