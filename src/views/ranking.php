<?php

namespace App\Views;

require_once "C:/xampp/htdocs/placar-gincana/vendor/autoload.php";

use App\Config\Database;
use App\Controllers\{EquipeController, ModalidadeController, UsuarioController, JogoController, PontuacaoController};

$databaseConnection = new Database();
$pdo = $databaseConnection->getConnection();

$pontuacaoController = new PontuacaoController($pdo);
$pontuacoes = $pontuacaoController->listar();
?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Ranking</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body>
  <div class="container mt-5">
    <h2 class="text-center">Ranking das Equipes</h2>
    <table class="table table-bordered table-striped text-center mt-3">
      <thead class="table-dark">
        <tr>
          <th>Posição</th>
          <th>Nome da Equipe</th>
          <th>Pontuação</th>
        </tr>
      </thead>
      <tbody>
        <?php
        $posicao = 1;
        for ($i = 0; $i < count($pontuacoes); $i++) { ?>
          <tr>
            <td><?= $posicao++; ?>º</td>
            <td><?= $pontuacoes[$i]['nome_equipe']; ?></td>
            <td><?= $pontuacoes[$i]['total_pontuacao']; ?></td>
          </tr>
        <?php } ?>
      </tbody>
    </table>
    <a href="index.php" class="btn btn-primary">Voltar</a>
  </div>
</body>

</html>