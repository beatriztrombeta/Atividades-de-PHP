<?php

namespace Php\Projetop1\Controllers;

class WelcomeController {
    public function bemVindo($params){
        require_once(__DIR__ . "/../Views/bem_vindo.php");
    }
}
