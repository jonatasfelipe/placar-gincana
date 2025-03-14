<?php
namespace App\Models;

class Equipe
{
    private $conn;

    public function __construct($db)
    {
        $this->conn = $db;
    }

    public function cadastrar($nome)
    {
        $sql = "INSERT INTO equipes (nome) VALUES (:nome)";
        $stmt = $this->conn->prepare($sql);
        $stmt->bindParam(':nome', $nome);
        return $stmt->execute();
    }

    public function listar()
    {
        $sql = "SELECT * FROM equipes";
        $stmt = $this->conn->query($sql);
        return $stmt->fetchAll();
    }
}