<?php

require './classes/Funcionario.php';
require './classes/Servente.php';
require './classes/MestreDeObras.php';
require './classes/Motorista.php';

$funcionario = new Funcionario("João", 1, 2000.0);

$servente = new Servente("Maria", 2, 1500.0);
$servente->setFuncionariosSobSupervisao(12);

$mestreDeObras = new MestreDeObras("Carlos", 3, 2500.0, 25);

echo "Nome do Funcionário: " . $funcionario->getNome() . "<br>";
echo "Código do Funcionário: " . $funcionario->getCodigo() . "<br>";
echo "Salário Base do Funcionário: " . $funcionario->getSalarioBase() . "<br>";

echo "Nome do Servente: " . $servente->getNome() . "<br>";
echo "Código do Servente: " . $servente->getCodigo() . "<br>";
echo "Salário Base do Servente: " . $servente->getSalarioBase() . "<br>";
echo "Salário Líquido do Servente: " . $servente->getSalarioLiquido() . "<br>";

echo "Nome do Mestre de Obras: " . $mestreDeObras->getNome() . "<br>";
echo "Código do Mestre de Obras: " . $mestreDeObras->getCodigo() . "<br>";
echo "Salário Base do Mestre de Obras: " . $mestreDeObras->getSalarioBase() . "<br>";
echo "Funcionários sob Supervisão do Mestre de Obras: " . $mestreDeObras->getFuncionariosSobSupervisao() . "<br>";
echo "Salário Líquido do Mestre de Obras: " . $mestreDeObras->getSalarioLiquido() . "<br>";
