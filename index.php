<?php
require 'vendor/autoload.php';

use App\Config\Database;
use App\Controllers\{EquipeController, ModalidadeController, UsuarioController, JogoController, PontuacaoController};

$db = (new Database())->getConnection();

if ($db) {
    $equipeController = new EquipeController($db);
    $jogoController = new JogoController($db);
    $modalidadeController = new ModalidadeController($db);
    $usuarioController = new UsuarioController($db);
    $pontuacaoController = new PontuacaoController($db);


    $equipes = $equipeController->listar();
    $jogos = $jogoController->listar();
    $modalidades = $modalidadeController->listar();
    $participantes = $usuarioController->listar();
    $pontuacoes = $pontuacaoController->listar();

    include_once "src/views/layout/cabecalho.php";
?>


    <main style="display: flex;">
        <section class="secaoprincipal">

            <div class="regressiva">
                <h1>O EVENTO COMEÇA EM:</h1>
                <ul>
                    <li><span id="dias"></span> DIAS</li>
                    <li><span id="horas"></span> HORAS</li>
                    <li><span id="minutos"></span> MINUTOS</li>
                    <li><span id="segundos"></span> SEGUNDOS</li>
                </ul>
            </div>

        </section>

    </main>

<?php
    include_once "src/Views/layout/rodape.php";
} else {
    echo 'Erro na conexão com banco de dados!';
}
