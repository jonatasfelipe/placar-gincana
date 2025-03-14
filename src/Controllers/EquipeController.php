<?php
namespace App\Controllers;

use App\Models\Equipe;

class EquipeController
{
    private $conn;
    private $Equipe;

    public function __construct($db)
    {
        $this->conn = $db;
        $this->Equipe = new Equipe($db);
    }

    public function listar()
    {
        return $this->Equipe->listar();
    }
}
?>