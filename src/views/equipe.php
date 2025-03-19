<?php

namespace App\Views;

require_once "C:/xampp/htdocs/placar-gincana/vendor/autoload.php";

use App\Config\Database;
use App\Controllers\{EquipeController};

$databaseConnection = new Database();
$pdo = $databaseConnection->getConnection();

$equipeController = new EquipeController($pdo);
$equipes = $equipeController->listarEquipeDetalhada();
$equipesPorSerie = [];
for ($i = 0; $i < count($equipes); $i++) {
  $equipesPorSerie[$equipes[$i]['nome_equipe']][] = $equipes;
}

?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Equipes</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body>
  <div class="container mt-5">
    <h2 class="text-center">Lista de Equipes</h2>

    <?php foreach ($equipesPorSerie as $serie => $equipes) { ?>
      <div class="mt-4">
        <h4 class="text-center bg-primary text-white p-2">Série: <?= htmlspecialchars($serie); ?></h4>
        <table class="table table-bordered table-striped text-center">
          <thead class="table-dark">
            <tr>
              <th>Nome da Equipe</th>
              <th>Ano Letivo</th>
              <th>Modalidade</th>
            </tr>
          </thead>
          <tbody>
            <?php
            $contador = 0;
            foreach ($equipes as $equipe) { ?>
              <tr>
                <td><?= $equipe[$contador]['nome_equipe']; ?></td>
                <td><?= $equipe[$contador]['ano_letivo']; ?></td>
                <td><?= $equipe[$contador]['nome_modalidade']; ?></td>
              </tr>
            <?php $contador++;
            } ?>
          </tbody>
        </table>
      </div>
    <?php } ?>

    <div class="text-center mt-4">
      <a href="index.php" class="btn btn-primary">Voltar</a>
    </div>
  </div>
</body>

</html>