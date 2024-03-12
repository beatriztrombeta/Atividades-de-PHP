<?php

class MestreDeObras extends Servente {
    private $funcionariosSobSupervisao;

    public function __construct($nome, $codigo, $salarioBase, $funcionariosSobSupervisao) {
        parent::__construct($nome, $codigo, $salarioBase);
        $this->funcionariosSobSupervisao = $funcionariosSobSupervisao;
    }

    public function getFuncionariosSobSupervisao() {
        return $this->funcionariosSobSupervisao;
    }

    public function setFuncionariosSobSupervisao($funcionariosSobSupervisao) {
        $this->funcionariosSobSupervisao = $funcionariosSobSupervisao;
    }

    public function getSalarioLiquido() {
        $salarioLiquido = parent::getSalarioLiquido();
        $adicionalSupervisao = floor($this->funcionariosSobSupervisao / 10) * ($this->getSalarioBase() * 0.1);
        $salarioLiquido += $adicionalSupervisao;
        
        return $salarioLiquido;
    }
}

