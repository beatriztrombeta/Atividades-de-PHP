<?php

class Ponto {
    private $x;
    private $y;
    private static $contador = 0;

    public function __construct($x, $y) {
        $this->x = $x;
        $this->y = $y;
        self::$contador++;
    }

    public function setX($x) {
        $this->x = $x;
    }

    public function getX() {
        return $this->x;
    }

    public function setY($y) {
        $this->y = $y;
    }

    public function getY() {
        return $this->y;
    }

    public function deslocar($dx, $dy) {
        $this->x += $dx;
        $this->y += $dy;
    }

    public function toString() {
        return "($this->x, $this->y)";
    }

    public static function getContador() {
        return self::$contador;
    }

    public function calcularDistancia(Ponto $outroPonto) {
        $dx = $this->x - $outroPonto->getX();
        $dy = $this->y - $outroPonto->getY();
        $distancia = sqrt($dx * $dx + $dy * $dy);
        return number_format($distancia, 2, '.', '');
    }

    public function calcularDistanciaPontoXY($x, $y) {
        $dx = $this->x - $x;
        $dy = $this->y - $y;
        $distancia = sqrt($dx * $dx + $dy * $dy);
        return number_format($distancia, 2, '.', '');
    }

    public static function calcularDistanciaEntrePontos($x1, $y1, $x2, $y2) {
        $dx = $x2 - $x1;
        $dy = $y2 - $y1;
        $distancia = sqrt($dx * $dx + $dy * $dy);
        return number_format($distancia, 2, '.', '');
    }
}
