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
            $sql = "SELECT * FROM Gênero ORDER BY id";
            $stmt = $this->conexao->query($sql);
            $generos = $stmt->fetchAll(PDO::FETCH_ASSOC);
            return $generos;
        } catch (PDOException $e) {
            echo "Erro ao listar todos os generos: " . $e->getMessage();
            return [];
        }
    }
}
