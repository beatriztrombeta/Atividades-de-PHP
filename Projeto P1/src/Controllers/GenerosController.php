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
}
