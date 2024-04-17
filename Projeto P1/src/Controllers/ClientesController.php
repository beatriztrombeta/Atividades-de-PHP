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
                $cliente = new Cliente(0, $_POST['nome'], $_POST['email']);
                $clienteDAO = new ClienteDAO(new Conexao());

                if ($clienteDAO->inserir($cliente)) {
                    return "Cliente inserido com sucesso!";
                } else {
                    return "Erro ao inserir o cliente.";
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
        if (isset($params['id']) && isset($_POST['nome']) && isset($_POST['email'])) {
            try {
                $id = $params['id'];
                $nome = $_POST['nome'];
                $email = $_POST['email'];

                $clienteDAO = new ClienteDAO(new Conexao());
                $cliente = $clienteDAO->buscarPorId($id);

                if ($cliente) {
                    $cliente->setNome($nome);
                    $cliente->setEmail($email);

                    if ($clienteDAO->atualizar($cliente)) {
                        return "Cliente atualizado com sucesso!";
                    } else {
                        return "Erro ao atualizar o cliente.";
                    }
                } else {
                    return "Cliente não encontrado.";
                }
            } catch (PDOException $e) {
                return "Erro ao atualizar cliente: " . $e->getMessage();
            }
        } else {
            return "ID do cliente, nome ou email não foram fornecidos corretamente.";
        }
    }

    public function deletar($params)
    {
        if (isset($params['nome'])) {
            try {
                $nome = $params['nome'];
                $clienteDAO = new ClienteDAO(new Conexao());

                if ($clienteDAO->deletarPorNome($nome)) {
                    return "Cliente deletado com sucesso!";
                } else {
                    return "Erro ao deletar o cliente.";
                }
            } catch (PDOException $e) {
                return "Erro ao deletar cliente: " . $e->getMessage();
            }
        } else {
            return "Nome do cliente não foi fornecido.";
        }
    }
}
