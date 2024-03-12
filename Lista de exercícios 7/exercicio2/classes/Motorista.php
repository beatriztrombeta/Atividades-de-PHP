<?php

class Motorista extends Funcionario {
    private $cnh;

    public function __construct($nome, $codigo, $salarioBase, $cnh) {
        parent::__construct($nome, $codigo, $salarioBase);
        $this->cnh = $cnh;
    }

    public function getCnh() {
        return $this->cnh;
    }

    public function setCnh($cnh) {
        $this->cnh = $cnh;
    }
}