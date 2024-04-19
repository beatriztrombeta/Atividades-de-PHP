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
}
