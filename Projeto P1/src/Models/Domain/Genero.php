<?php

namespace Php\Projetop1\Models\Domain;

class Genero {
    private $id;
    private $nomeGenero;
    private $descricao;

    public function __construct($id, $nomeGenero, $descricao){
        $this->setId($id);
        $this->setNome($nomeGenero);
        $this->setDescricao($descricao);
    }

    public function getId() {
        return $this->id;
    }
    public function setId($id) {
        $this->id = $id;
    }
    public function getNome() {
        return $this->nomeGenero;
    }
    public function setNome($nomeGenero) {
        $this->nomeGenero = $nomeGenero;
    }
    public function getDescricao() {
        return $this->descricao;
    }
    public function setDescricao($descricao) {
        $this->descricao = $descricao;
    }
}