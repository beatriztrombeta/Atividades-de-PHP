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

                $emprestimoDAO = new EmprestimoDAO(new Conexao());

                if ($emprestimoDAO->realizarEmprestimo($emprestimo)) {
                    return "Empréstimo realizado com sucesso!";
                } else {
                    return "Erro ao realizar o empréstimo.";
                }
            } catch (PDOException $e) {
                return "Erro ao inserir empréstimo: " . $e->getMessage();
            }
        } else {
            return "Dados incompletos para realizar o empréstimo.";
        }
    }

    public function listarTodos($params)
    {
        try {
            $emprestimoDAO = new EmprestimoDAO(new Conexao());
            $emprestimos = $emprestimoDAO->listarTodos();

            if (!empty($emprestimos)) {
                // Aqui você pode retornar ou exibir os empréstimos encontrados
                return json_encode($emprestimos);
            } else {
                return "Nenhum empréstimo encontrado.";
            }
        } catch (PDOException $e) {
            return "Erro ao listar empréstimos: " . $e->getMessage();
        }
    }

    public function atualizarDevolucao($params)
    {
        if (isset($params['id']) && isset($_POST['data_devolucao'])) {
            try {
                $id = $params['id'];
                $dataDevolucao = $_POST['data_devolucao'];

                $emprestimoDAO = new EmprestimoDAO(new Conexao());

                if ($emprestimoDAO->atualizarDevolucao($id, $dataDevolucao)) {
                    return "Data de devolução atualizada com sucesso!";
                } else {
                    return "Erro ao atualizar a data de devolução do empréstimo.";
                }
            } catch (PDOException $e) {
                return "Erro ao atualizar data de devolução do empréstimo: " . $e->getMessage();
            }
        } else {
            return "ID do empréstimo ou data de devolução não fornecidos corretamente.";
        }
    }

    public function deletar($params)
    {
        if (isset($params['id'])) {
            try {
                $id = $params['id'];
                $emprestimoDAO = new EmprestimoDAO(new Conexao());

                if ($emprestimoDAO->deletar($id)) {
                    return "Empréstimo deletado com sucesso!";
                } else {
                    return "Erro ao deletar o empréstimo.";
                }
            } catch (PDOException $e) {
                return "Erro ao deletar empréstimo: " . $e->getMessage();
            }
        } else {
            return "ID do empréstimo não foi fornecido.";
        }
    }
}
