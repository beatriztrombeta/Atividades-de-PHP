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
        require_once(__DIR__ . "/../Views/emprestimo/add_emprestimo.php");
    }
    public function irParaAtualizar($params)
    {
        require_once(__DIR__ . "/../Views/emprestimo/atualizar_emprestimo.php");
    }
    public function irParaDeletar($params)
    {
        require_once(__DIR__ . "/../Views/emprestimo/deletar_emprestimo.php");
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

    public function atualizar($params)
    {
        if (isset($_POST['id']) && isset($_POST['data_emprestimo']) && isset($_POST['data_devolucao']) && isset($_POST['id_livro']) && isset($_POST['id_cliente'])) {
            try {
                $id = $_POST['id'];
                $dataEmprestimo = $_POST['data_emprestimo'];
                $dataDevolucao = $_POST['data_devolucao'];
                $idLivro = $_POST['id_livro'];
                $idCliente = $_POST['id_cliente'];

                $emprestimo = new Emprestimo($id, $dataEmprestimo, $dataDevolucao, $idLivro, $idCliente);
                $emprestimoDAO = new EmprestimoDAO(new Conexao());

                if ($emprestimoDAO->atualizar($emprestimo)) {
                    header("Location: /emprestimos");
                    exit;
                }
            } catch (PDOException $e) {
                return "Erro ao atualizar cliente: " . $e->getMessage();
            }
        } else {
            return "Dados não foram fornecidos corretamente.";
        }
    }

    public function deletar($params)
    {
        if (isset($_POST['id'])) {
            try {
                $id = $_POST['id'];
                $emprestimoDAO = new EmprestimoDAO(new Conexao());

                if ($emprestimoDAO->deletar($id)) {
                    header("Location: /emprestimos");
                    exit;
                }
            } catch (PDOException $e) {
                return "Erro ao deletar emprestimo: " . $e->getMessage();
            }
        } else {
            return "ID do emprestimo não foi fornecido corretamente.";
        }
    }
}
