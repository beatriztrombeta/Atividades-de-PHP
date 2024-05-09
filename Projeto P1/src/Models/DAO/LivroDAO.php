<?php

namespace Php\Projetop1\Models\DAO;

use Php\Projetop1\Models\Domain\Livro;
use PDO;
use PDOException;

class LivroDAO
{
    private $conexao;

    public function __construct(Conexao $conexao)
    {
        $this->conexao = $conexao->getConexao();
    }

    public function inserir(Livro $livro)
    {
        try{
            $sql = "INSERT INTO Livro (titulo, autor, id_genero) VALUES (:titulo, :autor, :id_genero)";
            $stmt = $this->conexao->prepare($sql);
            $stmt->bindValue(':titulo', $livro->getTitulo());
            $stmt->bindValue(':autor', $livro->getAutor());
            $stmt->bindValue(':id_genero', $livro->getIdGenero());
            return $stmt->execute();
        } catch(PDOException $e){
            throw new PDOException("Erro ao inserir livro: " . $e->getMessage());
        }
    }

    public function listarTodos()
    {
        try {
            $sql = "SELECT * FROM Livro ORDER BY id";
            $stmt = $this->conexao->query($sql);
            $livros = $stmt->fetchAll(PDO::FETCH_ASSOC);
            return $livros;
        } catch (PDOException $e) {
            echo "Erro ao listar todos os livros: " . $e->getMessage();
            return [];
        }
    }

    public function listarApenasUm($id)
    {
        try {
            $sql = "SELECT * FROM Livro WHERE id = :id";
            $stmt = $this->conexao->prepare($sql);
            $stmt->bindValue(':id', $id);
            $stmt->execute();
            $livro = $stmt->fetch(PDO::FETCH_ASSOC);
            return $livro;
        } catch (PDOException $e) {
            echo "Erro ao listar livro: " . $e->getMessage();
            return null;
        }
    }

    public function atualizar(Livro $livro)
    {
        try {
            $sql = "UPDATE Livro SET titulo = :titulo, autor = :autor, id_genero = :id_genero WHERE id = :id";
            $stmt = $this->conexao->prepare($sql);
            $stmt->bindValue(':titulo', $livro->getTitulo());
            $stmt->bindValue(':autor', $livro->getAutor());
            $stmt->bindValue(':id_genero', $livro->getIdGenero());
            $stmt->bindValue(':id', $livro->getId());
            $stmt->execute();
            return true;
        } catch (PDOException $e) {
            echo "Erro ao atualizar livro: " . $e->getMessage();
            return false;
        }
    }

    public function deletar($id)
    {
        try {
            $sql = "DELETE FROM Livro WHERE id = :id";
            $stmt = $this->conexao->prepare($sql);
            $stmt->bindValue(':id', $id);
            $stmt->execute();
            return true;
        } catch (PDOException $e) {
            echo "Erro ao deletar livro: " . $e->getMessage();
            return false;
        }
    }

}
