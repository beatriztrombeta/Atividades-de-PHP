<?php

class Fixo extends Telefone {
    private $custoPorMinuto;

    public function __construct($ddd, $numero, $custoPorMinuto) {
        parent::__construct($ddd, $numero);
        $this->custoPorMinuto = $custoPorMinuto;
    }

    public function calculaCusto($tempoDaLigacao){
        return $tempoDaLigacao * $this->custoPorMinuto;
    }
}