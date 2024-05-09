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
        require_once(__DIR__ . "/../Views/cliente/add_cliente.php");
    }
    public function irParaAtualizar($params)
    {
        require_once(__DIR__ . "/../Views/cliente/atualizar_cliente.php");
    }
    public function irParaDeletar($params)
    {
        require_once(__DIR__ . "/../Views/cliente/deletar_cliente.php");
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

    public function atualizar($params)
    {
        if (isset($_POST['id']) && isset($_POST['nome']) && isset($_POST['email'])) {
            try {
                $id = $_POST['id'];
                $nome = $_POST['nome'];
                $email = $_POST['email'];

                $cliente = new Cliente($id, $nome, $email);
                $clienteDAO = new ClienteDAO(new Conexao());

                if ($clienteDAO->atualizar($cliente)) {
                    header("Location: /clientes");
                    exit;
                }
            } catch (PDOException $e) {
                return "Erro ao atualizar cliente: " . $e->getMessage();
            }
        } else {
            return "Dados de ID, nome e email não foram fornecidos corretamente.";
        }
    }

    public function deletar($params)
    {
        if (isset($_POST['id'])) {
            try {
                $id = $_POST['id'];
                $clienteDAO = new ClienteDAO(new Conexao());

                if ($clienteDAO->deletar($id)) {
                    header("Location: /clientes");
                    exit;
                }
            } catch (PDOException $e) {
                return "Erro ao deletar cliente: " . $e->getMessage();
            }
        } else {
            return "ID do cliente não foi fornecido corretamente.";
        }
    }
}
