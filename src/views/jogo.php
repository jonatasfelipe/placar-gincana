<?php

namespace App\Views;

require_once "C:/xampp/htdocs/placar-gincana/vendor/autoload.php";

use App\Config\Database;
use App\Controllers\{JogoController};

$databaseConnection = new Database();
$pdo = $databaseConnection->getConnection();

$jogoController = new JogoController($pdo);
$jogos = $jogoController->listarJogosDetalhados();

$idEquipeAtual = null;
?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Jogos</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body>
  <div class="container mt-5">
    <h2 class="text-center">Lista de Jogos</h2>
    <table class="table table-bordered table-striped text-center mt-3">
      <thead class="table-dark">
        <tr>
          <th>Modalidade</th>
          <th>Equipe 1</th>
          <th>Pontuação</th>
          <th>Equipe 2</th>
          <th>Pontuação</th>
          <th>Início</th>
          <th>Fim</th>
        </tr>
      </thead>
      <tbody>
        <?php for ($i = 0; $i < count($jogos); $i++) { ?>
          <tr>
            <td><?= $jogos[$i]['nome_modalidade']; ?></td>
            <td><?= $jogos[$i]['nome_equipe_1']; ?></td>
            <td><?= $jogos[$i]['pontuacao_equipe_1']; ?></td>
            <td><?= $jogos[$i]['nome_equipe_2']; ?></td>
            <td><?= $jogos[$i]['pontuacao_equipe_2']; ?></td>
            <td><?= $jogos[$i]['inicio']; ?></td>
            <td><?= $jogos[$i]['fim']; ?></td>
          </tr>
        <?php } ?>
      </tbody>
    </table>
    <a href="index.php" class="btn btn-primary">Voltar</a>
  </div>
</body>

</html>