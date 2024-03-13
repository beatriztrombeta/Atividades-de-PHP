<?php

abstract class Telefone {
    protected $ddd;
    protected $numero;

    public function __construct($ddd, $numero) {
        $this->ddd = $ddd;
        $this->numero = $numero;
    }

    abstract public function calculaCusto($tempoDaLigacao);
}
