<?php

class PosPago extends Celular {
    public function calculaCusto($tempoDaLigacao) {
        $custoPorMinutoBase = $this->getCustoPorMinuto();
        $custoPorMinuto = $custoPorMinutoBase * 0.9;
        return $tempoDaLigacao * $custoPorMinuto;
    }
}
