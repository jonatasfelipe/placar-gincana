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

    public function criarUsuario($nome_usuario, $cpf, $senha, $data_nascimento, $celular, $aluno_sesi, $competidor_sesi, $equipe_competidor)
    {
        return $this->Usuario->criarUsuario($nome_usuario, $cpf, $senha, $data_nascimento, $celular, $aluno_sesi, $competidor_sesi, $equipe_competidor);
    }

    public function listar()
    {
        return $this->Usuario->listar();
    }
}
