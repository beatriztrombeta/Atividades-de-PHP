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

}
