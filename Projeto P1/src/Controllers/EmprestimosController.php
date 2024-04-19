<?php

namespace Php\Projetop1\Controllers;

use Php\Projetop1\Models\DAO\EmprestimoDAO;
use Php\Projetop1\Models\Domain\Emprestimo;
use Php\Projetop1\Models\DAO\Conexao;
use PDOException;

class EmprestimosController
{
    public function emprestimos($params)
    {
        require_once(__DIR__ . "/../Views/add_emprestimo.php");
    }

    public function inserir($params)
    {
        if (isset($_POST['data_emprestimo']) && isset($_POST['data_devolucao']) && isset($_POST['id_livro']) && isset($_POST['id_cliente'])) {
            try {
                $emprestimo = new Emprestimo(
                    null,
                    $_POST['data_emprestimo'],
                    $_POST['data_devolucao'],
                    $_POST['id_livro'],
                    $_POST['id_cliente']
                );

                $emprestimoDAO = new EmprestimoDAO(new Conexao()); // Passa a conexão para o DAO

                if ($emprestimoDAO->realizarEmprestimo($emprestimo)) {
                    header("Location: /emprestimos");
                    exit;
                }
            } catch (PDOException $e) {
                return "Erro ao inserir empréstimo: " . $e->getMessage();
            }
        } else {
            return "Dados incompletos para realizar o empréstimo.";
        }
    }
}
