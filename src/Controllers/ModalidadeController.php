<?php
namespace App\Controllers;

use App\Models\Modalidade;

class ModalidadeController
{
    private $conn;
    private $Modalidade;

    public function __construct($db)
    {
        $this->conn = $db;
        $this->Modalidade = new Modalidade($db);
    }

    public function listar()
    {
        return $this->Modalidade->listar();
    }
}
?>