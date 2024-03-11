<?php

class Funcionario {
    private $nome;
    private $codigo;
    private $salarioBase;

    public function __construct($nome, $codigo, $salarioBase) {
        $this->nome = $nome;   
        $this->codigo = $codigo;
        $this->salarioBase = $salarioBase;
    }

    public function getNome() {
        return $this->nome;
    }
    public function getCodigo() {
        return $this->codigo;
    }
    public function getSalarioBase() {
        return $this->salarioBase;
    }

    public function getSalarioLiquido() {
        $inss = $this->salarioBase * 0.1;
        $ir = 0.0;
        if ($this->salarioBase > 2000.0) {
            $ir = ($this->salarioBase - 2000.0) * 0.12;
        }
        return $this->salarioBase - $inss - $ir;
    }
    public function __toString() {
        return get_class($this) . "\n  Codigo: " . $this->getCodigo()
            . "\n   Nome: " . $this->getNome() . "\n   Salario Base: " . $this->getSalarioBase()
            . "\n Salario liquido: " . $this->getSalarioLiquido();
    }
}