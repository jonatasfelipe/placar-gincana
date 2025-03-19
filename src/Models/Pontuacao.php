<?php

namespace App\Models;

class Pontuacao
{
    private $conn;

    public function __construct($db)
    {
        $this->conn = $db;
    }

    public function cadastrar($id_jogo, $equipe_1, $equipe_2, $pontuacao_equipe_1, $pontuacao_equipe_2)
    {
        $sql = "INSERT INTO jogos (id_jogo, equipe_1, equipe_2, pontuacao_equipe_1, pontuacao_equipe_2) VALUES (:id_jogo, :equipe_1, :equipe_2, pontuacao_equipe_1, pontuacao_equipe_2)";
        $stmt = $this->conn->prepare($sql);
        $stmt->bindParam(':id_jogo', $id_jogo);
        $stmt->bindParam(':equipe_1', $equipe_1);
        $stmt->bindParam(':equipe_2', $equipe_2);
        $stmt->bindParam(':pontuacao_equipe_1', $pontuacao_equipe_1);
        $stmt->bindParam(':pontuacao_equipe_2', $pontuacao_equipe_2);
        return $stmt->execute();
    }

    public function listar()
    {
        $sql = "SELECT 
    e.id_equipe,
    e.nome_equipe,
    SUM(
        CASE 
            WHEN j.equipe_1 = e.id_equipe THEN j.pontuacao_equipe_1
            WHEN j.equipe_2 = e.id_equipe THEN j.pontuacao_equipe_2
            ELSE 0
        END
    ) AS total_pontuacao
FROM jogos j
INNER JOIN equipes e 
    ON j.equipe_1 = e.id_equipe OR j.equipe_2 = e.id_equipe
GROUP BY e.id_equipe, e.nome_equipe
ORDER BY total_pontuacao DESC;";
        $stmt = $this->conn->query($sql);
        return $stmt->fetchAll();
    }
}
