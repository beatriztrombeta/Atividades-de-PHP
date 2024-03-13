<?php

class PrePago extends Celular {
    public function calculaCusto($tempoDaLigacao) {
        $custoPorMinutoBase = $this->getCustoPorMinuto();
        $custoPorMinuto = $custoPorMinutoBase * 1.4;
        return $tempoDaLigacao * $custoPorMinuto;
    }
}