<?php

require './classes/Telefone.php';
require './classes/Celular.php';
require './classes/Fixo.php';
require './classes/PrePago.php';
require './classes/PosPago.php';


$telefoneFixo = new Fixo(18, 981035346, 0.5);
$celularPrePago = new PrePago(18, 996131316, 'Vivo', 0.8);
$celularPosPago = new PosPago(18, 982345654, 'Tim', 0.6); 


$tempoLigacaoFixo = 10;
$custoLigacaoFixo = $telefoneFixo->calculaCusto($tempoLigacaoFixo);
echo "Custo da ligação para um telefone fixo: R$ " . number_format($custoLigacaoFixo, 2) . "<br>";


$tempoLigacaoPrePago = 15;
$custoLigacaoPrePago = $celularPrePago->calculaCusto($tempoLigacaoPrePago);
echo "Custo da ligação para um celular pré-pago: R$ " . number_format($custoLigacaoPrePago, 2) . "<br>";


$tempoLigacaoPosPago = 20;
$custoLigacaoPosPago = $celularPosPago->calculaCusto($tempoLigacaoPosPago);
echo "Custo da ligação para um celular pós-pago: R$ " . number_format($custoLigacaoPosPago, 2) . "<br>";
