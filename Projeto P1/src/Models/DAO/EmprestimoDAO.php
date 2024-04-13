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
            $sql = "SELECT * FROM Empréstimos";
            $stmt = $this->conexao->query($sql);
            $emprestimos = $stmt->fetchAll(PDO::FETCH_ASSOC);
            return $emprestimos; // Retorna todos os empréstimos encontrados
        } catch (PDOException $e) {
            echo "Erro ao listar todos os empréstimos: " . $e->getMessage();
            return []; // Retorna array vazio em caso de erro
        }
    }

    public function atualizarDevolucao($id, $dataDevolucao)
    {
        try {
            $sql = "UPDATE Empréstimos SET data_devolucao = :data_devolucao WHERE id = :id";
            $stmt = $this->conexao->prepare($sql);
            $stmt->bindValue(':data_devolucao', $dataDevolucao);
            $stmt->bindValue(':id', $id);
            $stmt->execute();
            return true;
        } catch (PDOException $e) {
            echo "Erro ao atualizar data de devolução do empréstimo: " . $e->getMessage();
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
            echo "Erro ao deletar empréstimo: " . $e->getMessage();
            return false;
        }
    }
}
