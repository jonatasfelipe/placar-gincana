<?php

namespace App\Controllers;

use App\Models\Jogo;

class JogoController
{
    private $conn;
    private $Jogo;

    public function __construct($db)
    {
        $this->conn = $db;
        $this->Jogo = new Jogo($db);
    }

    public function listar()
    {
        return $this->Jogo->listar();
    }

    public function listarJogosDetalhados()
    {
        return $this->Jogo->listarJogosDetalhados();
    }
}
