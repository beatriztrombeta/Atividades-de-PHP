<?php

namespace Php\Projetop1\Models\Domain;

class Livro {
    private $id;
    private $titulo;
    private $autor;
    private $idGenero;

    public function __construct($id, $titulo, $autor, $idGenero) {
        $this->setId($id);
        $this->setTitulo($titulo);
        $this->setAutor($autor);
        $this->setIdGenero($idGenero);
    }

    public function getId() {
        return $this->id;
    }
    public function setId($id) {
        $this->id = $id;
    }

    public function getTitulo() {
        return $this->titulo;
    }
    public function setTitulo($titulo) {
        $this->titulo = $titulo;
    }

    public function getAutor() {
        return $this->autor;
    }
    public function setAutor($autor) {
        $this->autor = $autor;
    }

    public function getIdGenero() {
        return $this->idGenero;
    }
    public function setIdGenero($idGenero) {
        $this->idGenero = $idGenero;
    }
}