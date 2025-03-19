<?php

namespace App\Views;

require_once "C:/xampp/htdocs/placar-gincana/vendor/autoload.php";

use App\Config\Database;
use App\Controllers\{EquipeController, ModalidadeController, UsuarioController, JogoController, PontuacaoController};

$databaseConnection = new Database();
$pdo = $databaseConnection->getConnection();

$equipeController = new EquipeController($pdo);
$equipes = $equipeController->listar();
?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css" integrity="sha512-z3gLpd7yknf1YoNbCzqRKc4qyor8gaKU1qmn+CShxbuBusANI9QpRohGBreCFkKxLhei6S9CQXFEbbKuqLg0DA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
  <link rel="stylesheet" href="../public/assets/css/style.css">
  <link rel="stylesheet" href="../public/assets/css/cadastro.css">
  <title>Cadastros</title>
</head>

<body>

  <header>
    <div class="navbar">
      <div class="logo"><a href="#">Interclasse SESI - CE380</a></div>
      <ul class="links">
        <li><a href="../../index.php">Início</a></li>
        <li><a href="equipe.php">Equipes</a></li>
        <li><a href="jogo.php">Jogos</a></li>
        <li><a href="ranking.php">Ranking</a></li>
      </ul>
      <a href="#" class="botao_acao">Comece Aqui</a>
      <div class="hamburguer_btn">
        <i class="fa-solid fa-bars"></i>
      </div>
    </div>
  </header>

  <div class="dropdown_menu">
    <li><a href="#">Início</a></li>
    <li><a href="#">Sobre</a></li>
    <li><a href="#">Serviços</a></li>
    <li><a href="#">Contato</a></li>
    <li><a href="#" class="botao_acao">Comece Aqui</a></li>
  </div>

  <div class="titulo_opcoes">
    <h1>Escolha qual cadastro deseja realizar!</h1>
    <select onchange="MudarEstado(this.value)" name="opcoes-cadastro" id="opcoes-cadastro">
      <option value="-1">Selecione para exibir</option>
      <option value="usuario">Usuário</option>
      <option value="serie">Série</option>
      <option value="modalidade">Modalidade</option>
      <option value="torneio">Torneio</option>
      <option value="equipe">Equipe</option>
      <option value="partida">Partida</option>
    </select>
  </div>

  <!-- FORMULÁRIO USUÁRIO -->
  <div id="usuario" class="hidden">
    <form method="POST">
      <input type="hidden" name="formulario_enviado" value="usuario">

      <div class="form_campos">
        <label for="nome_usuario">Nome:</label>
        <input type="text" id="nome_usuario" name="nome_usuario" required>
      </div>

      <div class="form_campos">
        <label for="cpf">CPF:</label>
        <input type="text" id="cpf" name="cpf" required>
      </div>

      <div class="form_campos">
        <label for="senha">Senha:</label>
        <div class="campo_senha">
          <input type="password" id="senha" name="senha" required>
          <img id="icone" src="../../public/images/eye.svg">
        </div>
      </div>

      <div class="form_campos">
        <label for="data_nascimento">Data Nascimento:</label>
        <input type="date" id="data_nascimento" name="data_nascimento" required>
      </div>

      <div class="form_campos">
        <label for="celular">Celular:</label>
        <input type="text" id="celular" name="celular" maxlength="15" placeholder="(00) 00000-0000" required>
      </div>

      <div>
        <div>
          <label>Você é aluno SESI?</label>
        </div>

        <label>
          <input type="radio" id="aluno_sesi_sim" name="aluno_sesi" value="SIM" required>SIM</input>
        </label>

        <label>
          <input type="radio" id="aluno_sesi_nao" name="aluno_sesi" value="NAO" required>NÃO</input>
        </label>
      </div>

      <div id="competidor_sesi">
        <div>
          <label>Você vai competir?</label>
        </div>

        <label>
          <input type="radio" id="competidor_sesi_sim" name="competidor_sesi" value="SIM">SIM</input>
        </label>

        <label>
          <input type="radio" id="competidor_sesi_nao" name="competidor_sesi" value="NAO">NÃO</input>
        </label>
      </div>

      <div id="equipe_competidor_sesi">
        <div>
          <label>Selecione sua equipe!</label>
        </div>

        <select id="equipe_competidor" name="equipe_competidor">
          <option value="" selected>Selecionar Equipe</option>
          <?php foreach ($equipes as $equipe) {
            echo "<option value='" . $equipe['id_equipe'] . "'>" . $equipe['nome_equipe'] . "</option>";
          }
          ?>
        </select>
      </div>

      <input type="submit" value="Cadastrar Usuário">
    </form>
  </div>

  <div id="serie" class="hidden">
    <form method="POST">
      <input type="hidden" name="formulario_enviado" value="serie">
      <div class="form_campos">
        <label>Nome da série:</label>
        <input type="text" id="serie" name="serie" placeholder="3º Ensino Médio" required>
        <input type="number" id="ano_letivo" name="ano_letivo" min="2000" max="2099" step="1" placeholder="2023" required>
      </div>
      <input type="submit" value="Cadastrar Série">
    </form>
  </div>

  <div id="modalidade" class="hidden">
    <form method="POST">
      <input type="hidden" name="formulario_enviado" value="modalidade">
      <div class="form_campos">
        <label>Nome da modalidade:</label>
        <input type="text" id="modalidade" name="modalidade" required>
      </div>
      <input type="submit" value="Cadastrar Modalidade">
    </form>
  </div>

  <div id="torneio" class="hidden">
    <form method="POST">
      <input type="hidden" name="formulario_enviado" value="torneio">
      <div class="form_campos">
        <label>Nome do torneio:</label>
        <input type="text" id="torneio" name="torneio" required>
      </div>
      <input type="submit" value="Cadastrar Torneio">
    </form>
  </div>

  <div id="equipe" class="hidden">
    <form method="POST">
      <input type="hidden" name="formulario_enviado" value="equipe">
      <label>Equipe:</label>
      <input type="text" id="equipe" name="equipe" required>
      <input type="submit" value="Cadastrar Equipe">
    </form>
  </div>

  <div id="partida" class="hidden">
    <form method="POST">
      <input type="hidden" name="formulario_enviado" value="partida">
      <label>Partida:</label>
      <input type="text" id="partida" name="partida" required>
      <input type="submit" value="Cadastrar Partida">
    </form>
  </div>


  <?php

  $usuarioController = new UsuarioController($pdo);

  if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $formulario_enviado = $_POST["formulario_enviado"];

    if ($formulario_enviado == "usuario") {
      if (
        isset($_POST['nome_usuario']) &&
        isset($_POST['cpf']) &&
        isset($_POST['senha']) &&
        isset($_POST['data_nascimento']) &&
        isset($_POST['celular']) &&
        isset($_POST['aluno_sesi']) ||
        isset($_POST['competidor_sesi']) ||
        isset($_POST['equipe_competidor'])
      ) {

        if ($_POST['aluno_sesi'] == 'NAO') {
          $_POST['competidor_sesi'] = 'NAO';
          $_POST['equipe_competidor'] = null;
        } elseif ($_POST['aluno_sesi'] == 'SIM' && $_POST['competidor_sesi'] == 'NAO') {
          $_POST['equipe_competidor'] = null;
        }

        $usuarioController->criarUsuario($_POST['nome_usuario'], $_POST['cpf'], $_POST['senha'], $_POST['data_nascimento'], $_POST['celular'], $_POST['aluno_sesi'], $_POST['competidor_sesi'], $_POST['equipe_competidor']); ?>

        <script>
          alert("Usuário cadastrado com sucesso!");
          location.href = '#';
        </script>
  <?php
      }
    }
  }


  $usuarios = $usuarioController->listar();
  ?>

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


    function MudarEstado(value) {
      var divs = document.querySelectorAll('.hidden'); // Seleciona todas as divs com a classe 'hidden'

      for (var i = 0; i < divs.length; i++) {
        divs[i].style.display = 'none'; // Oculta todas as divs
      }

      if (value !== '-1') {
        var elemento = document.getElementById(value);
        if (elemento) {
          elemento.style.cssText = 'display: flex;' + 'justify-content: center;' + 'widht:100vw;' + 'align-items: center;'; // Exibe apenas a div selecionada
        } else {
          console.error('Não foi possível encontrar a opção');
        }
      }
    }

    /*INSERINDO MASCARA NO TELEFONE*/
    const tel = document.getElementById('celular') // Seletor do campo de telefone

    tel.addEventListener('keypress', (e) => mascaraTelefone(e.target.value)) // Dispara quando digitado no campo
    tel.addEventListener('change', (e) => mascaraTelefone(e.target.value)) // Dispara quando autocompletado o campo

    const mascaraTelefone = (valor) => {
      valor = valor.replace(/\D/g, "")
      valor = valor.replace(/^(\d{2})(\d)/g, "($1) $2")
      valor = valor.replace(/(\d)(\d{3})$/, "$1-$2")
      tel.value = valor // Insere o(s) valor(es) no campo
    }

    /*MOSTRANDO CAMPO COMPETIDOR*/
    const alunoSim = document.getElementById('aluno_sesi_sim');
    const alunoNao = document.getElementById('aluno_sesi_nao');
    const divCompetidor = document.getElementById('competidor_sesi');
    const competidorSim = document.getElementById('competidor_sesi_sim');
    const competidorNao = document.getElementById('competidor_sesi_nao');
    const divEquipe = document.getElementById('equipe_competidor_sesi');

    alunoSim.addEventListener('change', function() {
      if (this.checked) {
        divCompetidor.style.display = 'block';
      }
    });
    alunoNao.addEventListener('change', function() {
      if (this.checked) {
        divCompetidor.style.display = 'none';
        competidorSim.forEach(radio => {
          radio.checked = false;
        });
      }
    });

    competidorSim.addEventListener('change', function() {
      if (this.checked) {
        divEquipe.style.display = 'block';
      }
    });
    competidorNao.addEventListener('change', function() {
      if (this.checked) {
        divEquipe.style.display = 'none';
        divEquipe.value = '';

      }
    });

    /*MOSTRANDO/OCULTANDO SENHA*/
    let icon = document.querySelector('#icone');

    icon.addEventListener('click', function() {

      let input = document.querySelector('#senha');

      if (input.getAttribute('type') == 'password') {
        input.setAttribute('type', 'text');
        icon.src = "../../public/images/eye-off.svg";
      } else {
        input.setAttribute('type', 'password');
        icon.src = "../../public/images/eye.svg";
      }
    });
  </script>

</body>

</html>