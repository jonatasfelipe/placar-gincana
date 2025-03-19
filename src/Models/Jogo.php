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

    public function listarJogosDetalhados()
    {
        $sql = "SELECT 
    j.id_jogo,
    j.equipe_1,
    e1.nome_equipe AS nome_equipe_1,
    j.equipe_2,
    e2.nome_equipe AS nome_equipe_2,
    DATE_FORMAT(j.inicio, '%d/%m/%Y %H:%i:%s') AS inicio,
    DATE_FORMAT(j.fim, '%d/%m/%Y %H:%i:%s') AS fim,
    j.pontuacao_equipe_1,
    j.pontuacao_equipe_2,
    m.nome_modalidade
FROM jogos j
INNER JOIN equipes e1 ON j.equipe_1 = e1.id_equipe
INNER JOIN equipes e2 ON j.equipe_2 = e2.id_equipe
INNER JOIN modalidades m ON m.id_modalidade = e1.modalidade_id 
ORDER BY j.inicio ASC;
";
        $stmt = $this->conn->query($sql);
        return $stmt->fetchAll();
    }
}
