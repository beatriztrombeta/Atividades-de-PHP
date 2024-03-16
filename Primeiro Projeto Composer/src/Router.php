<?php

namespace Php\Primeirpprojeto;

class Router {

    private $routes = [];
    private $method;
    private $path;
    private $params;

    public function __construct($method, $path) {
        $this->setMethod($method);
        $this->setPath($path);
    }

    public function setMethod($method) {
        $this->method = $method;
    }

    public function setPath($path) {
        $this->path = $path;
    }
}