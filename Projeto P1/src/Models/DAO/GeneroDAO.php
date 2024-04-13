<?php

namespace Php\Projetop1\Models\DAO;

use Php\Projetop1\Models\Domain\Genero;
use PDO;
use PDOException;

class GeneroDAO
{
    private $conexao;

    public function __construct(Conexao $conexao)
    {
        $this->conexao = $conexao->getConexao();
    }

    public function inserir(Genero $genero)
    {
        try {
            $sql = "INSERT INTO Gênero (nome_genero, descricao) VALUES (:nome_genero, :descricao)";
            $stmt = $this->conexao->prepare($sql);
            $stmt->bindValue(':nome_genero', $genero->getNome());
            $stmt->bindValue(':descricao', $genero->getDescricao());
            $stmt->execute();
            return true;
        } catch (PDOException $e) {
            echo "Erro ao inserir gênero: " . $e->getMessage();
            return false;
        }
    }

    public function listarTodos()
    {
        try {
            $sql = "SELECT * FROM Gênero";
            $stmt = $this->conexao->query($sql);
            $generos = $stmt->fetchAll(PDO::FETCH_ASSOC);
            return $generos; // Retorna todos os gêneros encontrados
        } catch (PDOException $e) {
            echo "Erro ao listar todos os gêneros: " . $e->getMessage();
            return []; // Retorna array vazio em caso de erro
        }
    }

    public function atualizar(Genero $genero)
    {
        try {
            $sql = "UPDATE Gênero SET nome_genero = :nome_genero, descricao = :descricao WHERE id = :id";
            $stmt = $this->conexao->prepare($sql);
            $stmt->bindValue(':nome_genero', $genero->getNome());
            $stmt->bindValue(':descricao', $genero->getDescricao());
            $stmt->bindValue(':id', $genero->getId());
            $stmt->execute();
            return true;
        } catch (PDOException $e) {
            echo "Erro ao atualizar gênero: " . $e->getMessage();
            return false;
        }
    }

    public function deletar($id)
    {
        try {
            $sql = "DELETE FROM Gênero WHERE id = :id";
            $stmt = $this->conexao->prepare($sql);
            $stmt->bindValue(':id', $id);
            $stmt->execute();
            return true; // Retorna true se exclusão for bem-sucedida
        } catch (PDOException $e) {
            echo "Erro ao deletar gênero: " . $e->getMessage();
            return false;
        }
    }
}
