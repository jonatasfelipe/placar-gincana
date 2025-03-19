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

    public function listarEquipeDetalhada()
    {
        $sql = "SELECT 
        e.nome_equipe,
        m.*,
        s.ano_letivo
        FROM equipes e 
        INNER JOIN modalidades m
        ON m.id_modalidade = e.modalidade_id
        INNER JOIN series s
        ON s.id_serie = e.serie_id
        GROUP BY e.nome_equipe, e.modalidade_id";
        $stmt = $this->conn->query($sql);
        return $stmt->fetchAll();
    }
}
