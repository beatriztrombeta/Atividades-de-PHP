<?php

namespace Php\Projetop1\Models\DAO;

use Php\Projetop1\Models\Domain\Emprestimo;
use PDO;
use PDOException;

class EmprestimoDAO
{
    private $conexao;

    public function __construct(Conexao $conexao)
    {
        $this->conexao = $conexao->getConexao();
    }

    public function realizarEmprestimo(Emprestimo $emprestimo)
    {
        try {
            $sql = "INSERT INTO Empréstimos (data_emprestimo, data_devolucao, id_livro, id_cliente) 
                    VALUES (:data_emprestimo, :data_devolucao, :id_livro, :id_cliente)";
            $stmt = $this->conexao->prepare($sql);
            $stmt->bindValue(':data_emprestimo', $emprestimo->getDataEmprestimo());
            $stmt->bindValue(':data_devolucao', $emprestimo->getDataDevolucao());
            $stmt->bindValue(':id_livro', $emprestimo->getIdLivro());
            $stmt->bindValue(':id_cliente', $emprestimo->getIdCliente());
            $stmt->execute();
            return true;
        } catch (PDOException $e) {
            echo "Erro ao realizar empréstimo: " . $e->getMessage();
            return false;
        }
    }

    public function listarTodos()
    {
        try {
            $sql = "SELECT * FROM Empréstimos ORDER BY id";
            $stmt = $this->conexao->query($sql);
            $emprestimos = $stmt->fetchAll(PDO::FETCH_ASSOC);
            return $emprestimos;
        } catch (PDOException $e) {
            echo "Erro ao listar todos os emprestimos: " . $e->getMessage();
            return [];
        }
    }

    public function listarApenasUm($id)
    {
        try {
            $sql = "SELECT * FROM Empréstimos WHERE id = :id";
            $stmt = $this->conexao->prepare($sql);
            $stmt->bindValue(':id', $id);
            $stmt->execute();
            $emprestimo = $stmt->fetch(PDO::FETCH_ASSOC);
            return $emprestimo;
        } catch (PDOException $e) {
            echo "Erro ao listar emprestimo: " . $e->getMessage();
            return null;
        }
    }

    public function atualizar(Emprestimo $emprestimo)
    {
        try {
            $sql = "UPDATE Empréstimos SET data_emprestimo = :data_emprestimo, data_devolucao = :data_devolucao, id_livro = :id_livro, id_cliente = :id_cliente WHERE id = :id";
            $stmt = $this->conexao->prepare($sql);
            $stmt->bindValue(':id', $emprestimo->getId());
            $stmt->bindValue(':data_emprestimo', $emprestimo->getDataEmprestimo());
            $stmt->bindValue(':data_devolucao', $emprestimo->getDataDevolucao());
            $stmt->bindValue(':id_livro', $emprestimo->getIdLivro());
            $stmt->bindValue(':id_cliente', $emprestimo->getIdCliente());
            $stmt->execute();
            return true;
        } catch (PDOException $e) {
            echo "Erro ao atualizar emprestimo: " . $e->getMessage();
            return false;
        }
    }

    public function deletar($id)
    {
        try {
            $sql = "DELETE FROM Empréstimos WHERE id = :id";
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
