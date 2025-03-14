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

        <aside class="ranking">
            <table border="1" class="classificacao">
                <thead>
                    <tr>
                        <td colspan="3">
                            <h3>Pontuação</h3>
                        </td>
                    </tr>
                    <td>COLOCAÇÃO</td>
                    <td>NOME</td>
                    <td>PONTUAÇÃO</td>
                </thead>
                <tbody>
                    <?php
                    $posicao = 1; // Inicializa a posição

                    foreach ($pontuacoes as $pontuacao) {
                        echo "<tr>";
                        echo "<td>" . $posicao . "º</td>"; // Exibe a colocação
                        echo "<td>" . $pontuacao['nome_equipe'] . "</td>";
                        echo "<td>" . $pontuacao['total_pontuacao'] . "</td>";
                        echo "</tr>";

                        $posicao++; // Incrementa a posição para a próxima equipe
                    }
                    ?>
                </tbody>
            </table>
        </aside>
    </main>

    </body>

    <script src="public/assets/js/regressiva.js"></script>

    <script>
        const toggleBtn = document.querySelector('.hamburguer_btn');
        const toggleBtnIcon = document.querySelector('.hamburguer_btn i')
        const dropDownMenu = document.querySelector('.dropdown_menu')

        toggleBtn.onclick = function() {
            dropDownMenu.classList.toggle('open')
            const isOpen = dropDownMenu.classList.contains('open')

            toggleBtnIcon.classList = isOpen ?
                'fa-solid fa-xmark' :
                'fa-solid fa-bars'
        }
    </script>
<?php
} else {
    echo 'Erro na conexão com banco de dados!';
}
