<?php

require_once './Ponto.php';

$ponto1 = new Ponto(3, 5);
echo "Ponto 1: " . $ponto1->toString() . "<br>";

$ponto2 = new Ponto(8, 12);
echo "Ponto 2: " . $ponto2->toString() . "<br>";

echo "Número total de pontos criados: " . Ponto::getContador() . "<br>";

echo "Distância entre Ponto 1 e Ponto 2: " . $ponto1->calcularDistancia($ponto2) . "<br>";

$ponto1 = new Ponto(3, 5);
$x = 5;
$y = 10;

echo "Distância entre Ponto 1 e ($x, $y): " . $ponto1->calcularDistanciaPontoXY($x, $y) . "<br>";

$x1 = 3;
$y1 = 8;
$x2 = 4;
$y2 = 17;

echo "Distância entre ($x1, $y1) e ($x2, $y2): " . Ponto::calcularDistanciaEntrePontos($x1, $y1, $x2, $y2) . "<br>";