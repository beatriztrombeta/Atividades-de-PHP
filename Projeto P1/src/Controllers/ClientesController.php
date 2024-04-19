<?php

namespace Php\Projetop1\Controllers;

use Php\Projetop1\Models\DAO\ClienteDAO;
use Php\Projetop1\Models\Domain\Cliente;
use Php\Projetop1\Models\DAO\Conexao;
use PDOException;

class ClientesController
{
    public function clientes($params)
    {
        require_once(__DIR__ . "/../Views/add_cliente.php");
    }

    public function inserir($params)
{
    if (isset($_POST['nome']) && isset($_POST['email'])) {
        try {
            $cliente = new Cliente(0, $_POST['nome'], $_POST['email']); //0 por tratamento de ID pelo Banco de Dados
            $clienteDAO = new ClienteDAO(new Conexao()); // Passa a conexão para o DAO

            if ($clienteDAO->inserir($cliente)) {
                header("Location: /clientes");
                exit;
            }
        } catch (PDOException $e) {
            return "Erro ao inserir cliente: " . $e->getMessage();
        }
    } else {
        return "Dados de nome e email não foram fornecidos corretamente.";
    }
}

}
