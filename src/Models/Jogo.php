<?php
namespace App\Models;

class Jogo
{
    private $conn;

    public function __construct($db)
    {
        $this->conn = $db;
    }

    public function cadastrar($modalidade_id, $equipe1_id, $equipe2_id, $horario)
    {
        $sql = "INSERT INTO jogos (modalidade_id, equipe1_id, equipe2_id, horario) VALUES (:modalidade_id, :equipe1_id, :equipe2_id, :horario)";
        $stmt = $this->conn->prepare($sql);
        $stmt->bindParam(':modalidade_id', $modalidade_id);
        $stmt->bindParam(':equipe1_id', $equipe1_id);
        $stmt->bindParam(':equipe2_id', $equipe2_id);
        $stmt->bindParam(':horario', $horario);
        return $stmt->execute();
    }

    public function listar()
    {
        $sql = "SELECT * FROM jogos";
        $stmt = $this->conn->query($sql);
        return $stmt->fetchAll();
    }
}