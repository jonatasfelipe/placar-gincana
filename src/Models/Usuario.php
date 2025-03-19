<?php

namespace App\Models;

class Usuario
{
    private $conn;

    public function __construct($db)
    {
        $this->conn = $db;
    }

    public function criarUsuario($nome_usuario, $cpf, $senha, $data_nascimento, $celular, $aluno_sesi, $competidor_sesi, $equipe_competidor)
    {
        $sql = "INSERT INTO usuarios (nome_usuario, cpf, senha, data_nascimento, celular, aluno_sesi, competidor_sesi, equipe_competidor_sesi_id) VALUES (:nome_usuario, :cpf, :senha, :data_nascimento, :celular, :aluno_sesi, :competidor_sesi, :equipe_competidor_sesi_id)";
        $stmt = $this->conn->prepare($sql);
        $stmt->bindParam(':nome_usuario', $nome_usuario);
        $stmt->bindParam(':cpf', $cpf);
        $stmt->bindParam(':senha', $senha);
        $stmt->bindParam(':data_nascimento', $data_nascimento);
        $stmt->bindParam(':celular', $celular);
        $stmt->bindParam(':aluno_sesi', $aluno_sesi);
        $stmt->bindParam(':competidor_sesi', $competidor_sesi);
        $stmt->bindParam(':equipe_competidor_sesi_id', $equipe_competidor);
        return $stmt->execute();
    }

    public function listar()
    {
        $sql = "SELECT * FROM usuarios";
        $stmt = $this->conn->query($sql);
        return $stmt->fetchAll();
    }
}
