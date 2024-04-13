<?php

namespace Php\Projetop1\Models\Domain;

class Emprestimo
{
    private $id;
    private $dataEmprestimo;
    private $dataDevolucao;
    private $idLivro;
    private $idCliente;

    public function __construct($id, $dataEmprestimo, $dataDevolucao, $idLivro, $idCliente)
    {
        $this->setId($id);
        $this->setDataEmprestimo($dataEmprestimo);
        $this->setDataDevolucao($dataDevolucao);
        $this->setIdLivro($idLivro);
        $this->setIdCliente($idCliente);
    }
    public function getId()
    {
        return $this->id;
    }
    public function setId($id)
    {
        $this->id = $id;
    }

    public function getDataEmprestimo()
    {
        return $this->dataEmprestimo;
    }
    public function setDataEmprestimo($dataEmprestimo)
    {
        $this->dataEmprestimo = $dataEmprestimo;
    }

    public function getDataDevolucao()
    {
        return $this->dataDevolucao;
    }
    public function setDataDevolucao($dataDevolucao)
    {
        $this->dataDevolucao = $dataDevolucao;
    }

    public function getIdLivro()
    {
        return $this->idLivro;
    }
    public function setIdLivro($idLivro)
    {
        $this->idLivro = $idLivro;
    }

    public function getIdCliente()
    {
        return $this->idCliente;
    }
    public function setIdCliente($idCliente)
    {
        $this->idCliente = $idCliente;
    }
}
