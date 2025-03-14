<?php
namespace App\Models;

class Usuario
{
    private $conn;

    public function __construct($db)
    {
        $this->conn = $db;
    }

    public function cadastrar($nome, $equipe_id)
    {
        $sql = "INSERT INTO usuarios (nome, equipe_id) VALUES (:nome, :equipe_id)";
        $stmt = $this->conn->prepare($sql);
        $stmt->bindParam(':nome', $nome);
        $stmt->bindParam(':equipe_id', $equipe_id);
        return $stmt->execute();
    }

    public function listar()
    {
        $sql = "SELECT * FROM usuarios";
        $stmt = $this->conn->query($sql);
        return $stmt->fetchAll();
    }
}
