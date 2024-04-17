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
        require_once(__DIR__ . "/../Views/add_genero.php");
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

                $generoDAO = new GeneroDAO(new Conexao());

                if ($generoDAO->inserir($genero)) {
                    return "Gênero inserido com sucesso!";
                } else {
                    return "Erro ao inserir o gênero.";
                }
            } catch (PDOException $e) {
                return "Erro ao inserir gênero: " . $e->getMessage();
            }
        } else {
            return "Dados incompletos para inserir o gênero.";
        }
    }
    public function listarTodos($params)
    {
        try {
            $generoDAO = new GeneroDAO(new Conexao());
            $generos = $generoDAO->listarTodos();

            if (!empty($generos)) {
                // Aqui você pode retornar ou exibir os gêneros encontrados
                return json_encode($generos);
            } else {
                return "Nenhum gênero encontrado.";
            }
        } catch (PDOException $e) {
            return "Erro ao listar gêneros: " . $e->getMessage();
        }
    }
    public function atualizar($params)
    {
        if (isset($params['id']) && isset($_POST['nome_genero']) && isset($_POST['descricao'])) {
            try {
                $id = $params['id'];
                $nomeGenero = $_POST['nome_genero'];
                $descricao = $_POST['descricao'];

                $genero = new Genero(
                    $id,
                    $nomeGenero,
                    $descricao
                );

                $generoDAO = new GeneroDAO(new Conexao());

                if ($generoDAO->atualizar($genero)) {
                    return "Gênero atualizado com sucesso!";
                } else {
                    return "Erro ao atualizar o gênero.";
                }
            } catch (PDOException $e) {
                return "Erro ao atualizar gênero: " . $e->getMessage();
            }
        } else {
            return "ID do gênero, nome ou descrição não foram fornecidos corretamente.";
        }
    }
    public function deletar($params)
    {
        if (isset($params['id'])) {
            try {
                $id = $params['id'];
                $generoDAO = new GeneroDAO(new Conexao());

                if ($generoDAO->deletar($id)) {
                    return "Gênero deletado com sucesso!";
                } else {
                    return "Erro ao deletar o gênero.";
                }
            } catch (PDOException $e) {
                return "Erro ao deletar gênero: " . $e->getMessage();
            }
        } else {
            return "ID do gênero não foi fornecido.";
        }
    }
}
