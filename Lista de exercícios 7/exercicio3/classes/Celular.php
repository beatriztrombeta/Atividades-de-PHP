<?php

abstract class Celular extends Telefone {
    private $custoPorMinuto;
    private $operadora;

    public function __construct($ddd, $numero, $custoPorMinuto, $operadora) {
        parent::__construct($ddd, $numero);
    }

    public function getCustoPorMinuto() {
        return $this->custoPorMinuto;
    }
}