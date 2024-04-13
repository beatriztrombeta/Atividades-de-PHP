<?php

namespace Php\Projetop1\Models\DAO;

use PDO;
use PDOException;

class Conexao
{
    private $conexao;

    public function __construct()
    {
        try {

            $this->conexao =
                new PDO("mysql:host=localhost;dbname=mydb", "root", "");

            $this->conexao->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        } catch (PDOException $e) {
            echo "Erro de conexão: " . $e->getMessage();
        }
    }

    public function getConexao()
    {
        return $this->conexao;
    }
}
