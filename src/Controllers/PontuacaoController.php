<?php
namespace App\Controllers;

use App\Models\Pontuacao;

class PontuacaoController
{
    private $conn;
    private $Pontuacao;

    public function __construct($db)
    {
        $this->conn = $db;
        $this->Pontuacao = new Pontuacao($db);
    }

    public function listar()
    {
        return $this->Pontuacao->listar();
    }
}
?>