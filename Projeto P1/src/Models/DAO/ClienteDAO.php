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
            $sql = "SELECT * FROM Cliente";
            $stmt = $this->conexao->query($sql);
            $clientes = $stmt->fetchAll(PDO::FETCH_ASSOC);
            return $clientes; // Retorna todos os clientes encontrados
        } catch (PDOException $e) {
            echo "Erro ao listar todos os clientes: " . $e->getMessage();
            return [];
        }
    }

    public function atualizar(Cliente $cliente)
    {
        try {
            $sql = "UPDATE Cliente SET email = :email WHERE nome = :nome";
            $stmt = $this->conexao->prepare($sql);
            $stmt->bindValue(':email', $cliente->getEmail());
            $stmt->bindValue(':nome', $cliente->getNome());
            $stmt->execute();
            return true;
        } catch (PDOException $e) {
            echo "Erro ao atualizar cliente: " . $e->getMessage();
            return false;
        }
    }

    public function deletarPorNome($nome)
    {
        try {
            $sql = "DELETE FROM Cliente WHERE nome = :nome";
            $stmt = $this->conexao->prepare($sql);
            $stmt->bindValue(':nome', $nome);
            $stmt->execute();
            return true;
        } catch (PDOException $e) {
            echo "Erro ao deletar cliente por nome: " . $e->getMessage();
            return false;
        }
    }
}
