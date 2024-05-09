<?php

namespace Php\Projetop1\Models\DAO;

use Php\Projetop1\Models\Domain\Cliente;
use PDO;
use PDOException;

class ClienteDAO
{
    private $conexao;

    public function __construct(Conexao $conexao)
    {
        $this->conexao = $conexao->getConexao();
    }

    public function inserir(Cliente $cliente)
    {
        try {
            $sql = "INSERT INTO Cliente (nome, email) VALUES (:nome, :email)";
            $stmt = $this->conexao->prepare($sql);
            $stmt->bindValue(':nome', $cliente->getNome());
            $stmt->bindValue(':email', $cliente->getEmail());
            $stmt->execute();
            return true;
        } catch (PDOException $e) {
            echo "Erro ao inserir cliente: " . $e->getMessage();
            return false;
        }
    }

    public function listarTodos()
    {
        try {
            $sql = "SELECT * FROM Cliente ORDER BY id";
            $stmt = $this->conexao->query($sql);
            $clientes = $stmt->fetchAll(PDO::FETCH_ASSOC);
            return $clientes;
        } catch (PDOException $e) {
            echo "Erro ao listar todos os clientes: " . $e->getMessage();
            return [];
        }
    }

    public function listarApenasUm($id)
    {
        try {
            $sql = "SELECT * FROM Cliente WHERE id = :id";
            $stmt = $this->conexao->prepare($sql);
            $stmt->bindValue(':id', $id);
            $stmt->execute();
            $cliente = $stmt->fetch(PDO::FETCH_ASSOC);
            return $cliente;
        } catch (PDOException $e) {
            echo "Erro ao listar cliente: " . $e->getMessage();
            return null;
        }
    }


    public function atualizar(Cliente $cliente)
    {
        try {
            $sql = "UPDATE Cliente SET nome = :nome, email = :email WHERE id = :id";
            $stmt = $this->conexao->prepare($sql);
            $stmt->bindValue(':nome', $cliente->getNome());
            $stmt->bindValue(':email', $cliente->getEmail());
            $stmt->bindValue(':id', $cliente->getId());
            $stmt->execute();
            return true;
        } catch (PDOException $e) {
            echo "Erro ao atualizar cliente: " . $e->getMessage();
            return false;
        }
    }

    public function deletar($id)
    {
        try {
            $sql = "DELETE FROM Cliente WHERE id = :id";
            $stmt = $this->conexao->prepare($sql);
            $stmt->bindValue(':id', $id);
            $stmt->execute();
            return true;
        } catch (PDOException $e) {
            echo "Erro ao deletar cliente: " . $e->getMessage();
            return false;
        }
    }
}
