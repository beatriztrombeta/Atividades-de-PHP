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
        try {
            $sql = "INSERT INTO Livro (titulo, autor, id_genero) VALUES (:titulo, :autor, :id_genero)";
            $stmt = $this->conexao->prepare($sql);
            $stmt->bindValue(':titulo', $livro->getTitulo());
            $stmt->bindValue(':autor', $livro->getAutor());
            $stmt->bindValue(':id_genero', $livro->getIdGenero());
            $stmt->execute();
            return true;
        } catch (PDOException $e) {
            echo "Erro ao inserir livro: " . $e->getMessage();
            return false;
        }
    }

    public function listarTodos()
    {
        try {
            $sql = "SELECT * FROM Livro";
            $stmt = $this->conexao->query($sql);
            $livros = $stmt->fetchAll(PDO::FETCH_ASSOC);
            return $livros; // Retorna todos os livros encontrados
        } catch (PDOException $e) {
            echo "Erro ao listar todos os livros: " . $e->getMessage();
            return [];
        }
    }

    public function atualizar(Livro $livro)
    {
        try {
            $sql = "UPDATE Livro SET autor = :autor, id_genero = :id_genero WHERE titulo = :titulo";
            $stmt = $this->conexao->prepare($sql);
            $stmt->bindValue(':autor', $livro->getAutor());
            $stmt->bindValue(':id_genero', $livro->getIdGenero());
            $stmt->bindValue(':titulo', $livro->getTitulo());
            $stmt->execute();
            return true;
        } catch (PDOException $e) {
            echo "Erro ao atualizar livro: " . $e->getMessage();
            return false;
        }
    }

    public function deletarPorTitulo($titulo)
    {
        try {
            $sql = "DELETE FROM Livro WHERE titulo = :titulo";
            $stmt = $this->conexao->prepare($sql);
            $stmt->bindValue(':titulo', $titulo);
            $stmt->execute();
            return true;
        } catch (PDOException $e) {
            echo "Erro ao deletar livro por título: " . $e->getMessage();
            return false;
        }
    }
}
