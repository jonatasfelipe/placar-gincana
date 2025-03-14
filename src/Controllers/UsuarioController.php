<?php
namespace App\Controllers;

use App\Models\Usuario;

class UsuarioController
{
    private $conn;
    private $Usuario;

    public function __construct($db)
    {
        $this->conn = $db;
        $this->Usuario = new Usuario($db);
    }

    public function listar()
    {
        return $this->Usuario->listar();
    }
}
?>