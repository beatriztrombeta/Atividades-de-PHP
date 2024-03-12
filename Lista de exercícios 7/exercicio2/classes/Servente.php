<?php 

class Servente extends Funcionario {
    public function __construct($nome, $codigo, $salarioBase) {
        parent::__construct($nome, $codigo, $salarioBase);
    }

    public function getSalarioLiquido() {
        $salarioLiquido = parent::getSalarioLiquido();
        $adicionarInsalubridade = $this->getSalarioBase() * 0.05;
        $salarioLiquido += $adicionarInsalubridade;

        return $salarioLiquido;
    }

    public function setFuncionariosSobSupervisao($funcionariosSobSupervisao) {}
}