<?php

use function PHPSTORM_META\type;

session_start();
require_once "../action/conecta.php";

?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Painel Cliente</title>
  <link rel="stylesheet" href="../css/painelc.css">
</head>

<body>

  <header>
    <!-- menu retrátil lateral esquerda -->
    <input type="checkbox" id="check">
    <label id="icone" for="check"></label>
    <div class="barra">
      <nav>
        <a href="../index.php">
          <div class="Link">Home</div>
        </a>
        <a href="relatorioCliente.php">
          <div class="Link">Histórico Serviços</div>
        </a>
        <a href="sobrenos.php">
          <div class="Link">Sobre</div>
        </a>
        <a href="../action/logout.php">
          <div class="Link">Sair</div>
        </a>
      </nav>
    </div>
    <!-- barra fixa horizontal -->

    <nav class="menu">
      <a href="index.html">
        <a href="../index.php"><img src="../img/photo.png" id="logo"></a>
      </a>
    </nav>

    <label for="menu-hamburguer">
      <div class="mburg">
        <span class="hamburguer"></span>
      </div>
    </label>
  </header>

  <div id="selecao">
    <h3>Selecione o profissional que você deseja:</h3>
    <form action=" " method="POST">
      <div class="inputBox">

        <select onclick="selected(value)" name="profissao" id="select">
          <option value="Selecionar" selected>Selecionar</option>
          <option value="Eletricista">Eletricista</option>
          <option value="Pedreiro">Pedreiro</option>
          <option value="Pintor">Pintor</option>
        </select>
      </div>
      <div class="pai">
        <div class="Eletricista" style="display:none;">
          <fieldset>

            <legend id="check">Qual serviço de Eletricista você precisa?</legend>
            <div class="checkbox-wrapper">
              <input type="checkbox" id="terms" name="servico[]" value="1E">
              <label id="words" for="scales">Reparos e Manutenção da Rede Elétrica
              </label>
            </div>
            <br>
            <div class="checkbox-wrapper">
              <input type="checkbox" id="terms" name="servico[]" value="2E">
              <label for="horns" id="words">Troca de Fiação Elétrica</label>
            </div>
            <br>
            <div class="checkbox-wrapper">
              <input type="checkbox" id="terms" name="servico[]" value="3E">
              <label for="horns" id="words">Instalação e Conserto de Chuveiro
              </label>
            </div>
            <br>
            <div class="checkbox-wrapper">
              <input type="checkbox" id="terms" name="servico[]" value="4E">
              <label for="horns" id="words">Instalação de Tomadas</label>
            </div>
            <br>
            <div class="checkbox-wrapper">
              <input type="checkbox" id="terms" name="servico[]" value="5E">
              <label for="horns" id="words">Instalação de Lâmpadas e Luminárias</label>
            </div>
            <br>
            <div class="checkbox-wrapper">
              <input type="checkbox" id="terms" name="servico[]" value="6E">
              <label for="horns" id="words">Instalação de Ar Condicionado</label>
            </div>

          </fieldset>
        </div>



        <div class="Pedreiro" style="display:none;">
          <fieldset>

            <legend id="check">Qual serviço de Pedreiro você precisa?</legend>
            <div class="checkbox-wrapper">
              <input type="checkbox" id="terms" name="servico[]" value="1P">
              <label id="words" for="scales">Construção de Parede</label>
            </div>
            <br>
            <div class="checkbox-wrapper">
              <input type="checkbox" id="terms" name="servico[]" value="2P">
              <label for="horns" id="words">Construção de Fundação</label>
            </div>
            <br>
            <div class="checkbox-wrapper">
              <input type="checkbox" id="terms" name="servico[]" value="3P">
              <label for="horns" id="words">Aplicação de Reboco</label>
            </div>
            <br>
            <div class="checkbox-wrapper">
              <input type="checkbox" id="terms" name="servico[]" value="4P">
              <label for="horns" id="words">Aplicação de Massa Corrida</label>
            </div>
            <br>
            <div class="checkbox-wrapper">
              <input type="checkbox" id="terms" name="servico[]" value="5P">
              <label for="horns" id="words">Demolição</label>
            </div>
            <br>
            <div class="checkbox-wrapper">
              <input type="checkbox" id="terms" name="servico[]" value="6P">
              <label for="horns" id="words">Instalação de novo revestimento</label>
            </div>

          </fieldset>
        </div>


        <div class="Pintor" style="display:none;">
          <fieldset>

            <legend id="check">Qual serviço de Pintor você precisa?</legend>
            <div class="checkbox-wrapper">
              <input type="checkbox" id="terms" name="servico[]" value="1PT">
              <label id="words" for="scales">Pintura de Paredes, Tetos e Telhados.
              </label>
            </div>
            <br>
            <div class="checkbox-wrapper">
              <input type="checkbox" id="terms" name="servico[]" value="2PT">
              <label for="horns" id="words">Pintura Externa e Interna</label>
            </div>
            <br>
            <div class="checkbox-wrapper">
              <input type="checkbox" id="terms" name="servico[]" value="3PT">
              <label for="horns" id="words">Pintura de Apartamentos</label>
            </div>
            <br>
            <div class="checkbox-wrapper">
              <input type="checkbox" id="terms" name="servico[]" value="4PT">
              <label for="horns" id="words">Pintura de Prédios</label>
            </div>
            <br>
            <div class="checkbox-wrapper">
              <input type="checkbox" id="terms" name="servico[]" value="5PT">
              <label for="horns" id="words">Pintura de Móveis</label>
            </div>
            <br>
            <div class="checkbox-wrapper">
              <input type="checkbox" id="terms" name="servico[]" value="6PT">
              <label for="horns" id="words">Pintura Decorativa</label>
            </div>
          </fieldset>
        </div>

      </div>
      <button id="btn-selecao" onclick="exibirlista()">Encontrar Profissional</button>
  </div>
  </form>



  <div id="filtros">

    <h3>Exibindo resultados da busca:</h3>
    <div id="quadros">



      <?php
      //$resultado = pg_query($conexao, "SELECT * FROM profissional WHERE id_prof IN ( $profissionalSelecionado)");

      $result = null;
      $listaCheckbox = null;
      $id = null;
      $profissionalSelecionado = " ";
      if (isset($_POST['servico']))
        $listaCheckbox = $_POST['servico'];

      if ($listaCheckbox !== null) {
        $servicosSelecionados = " ";
        for ($i = 0; $i < count($listaCheckbox); $i++) {
          //concatenar os serviços
          if (count($listaCheckbox) == 1) {
            $servicosSelecionados = " '$listaCheckbox[$i]'";
            break;
          } else {
            $servicosSelecionados .= " '$listaCheckbox[$i]' ";
            if ($i < count($listaCheckbox) - 1) {
              $servicosSelecionados .= " ,";
            }
          }
        }
        $_SESSION['idServicos'] = $servicosSelecionados;
        $capturaid = pg_query($conexao, "SELECT distinct especialidade_prof_fk FROM especialidade WHERE especialidade_lista_fk IN ($servicosSelecionados) ");
        if (pg_num_rows($capturaid) == 0) {
          echo ("<br><br><br><br><br><br>");
          echo ("<b>Nenhum profissional cadastrado.</b><br>");
          echo ("<b>Experimente refazer a busca.</b>");
        } else {
          $i = 0;
          while ($capid = pg_fetch_array($capturaid)) {

            $id = $capid['especialidade_prof_fk'];
            if (pg_num_rows($capturaid) == 0) {
              //implementar não encontrou
            } else if (pg_num_rows($capturaid) == 1) {
              $profissionalSelecionado = " '$id[0]'";
              break;
            } else {
              $profissionalSelecionado .= "'$id[0]'";
              if ($i < pg_num_rows($capturaid) - 1) {
                $profissionalSelecionado .= ' ,';
              }
              $i++;
            }
          }
          $result = pg_query($conexao, "SELECT * FROM profissional WHERE id_prof IN ( $profissionalSelecionado)");
        }

        //}

        //$result = pg_query($conexao, "SELECT * FROM profissional WHERE id_prof IN ( '1' ,'2' ,'3')");
        if (!$result) {
        } else {
          $i = 0;
          $j = 0;

          while ($dat = pg_fetch_array($result)) {
            $idprof = $dat["id_prof"];
            $med = pg_query($conexao, "SELECT AVG (nota_avaliacao) from avaliacao INNER JOIN realiza_prof_servico ON avalia_real_fk = id_serv_real WHERE real_prof_fk = '$idprof'");
      ?>
            <div id="divs">

              <div id="avaliacao">
                <h5>Avaliação</h5>
                <?php
                $media = pg_fetch_array($med);
                ?>
                <?php
                if ($media["avg"] <= 1) { ?>
                  <img src="../img/star1.png" id="s1" class="star">
                  <img src="../img/star0.png" id="s2" class="star">
                  <img src="../img/star0.png" id="s3" class="star">
                  <img src="../img/star0.png" id="s4" class="star">
                  <img src="../img/star0.png" id="s5" class="star">

                <?php
                } else if ($media["avg"] >= 2 && $media["avg"] < 3) { ?>
                  <img src="../img/star1.png" id="s1" class="star">
                  <img src="../img/star1.png" id="s2" class="star">
                  <img src="../img/star0.png" id="s3" class="star">
                  <img src="../img/star0.png" id="s4" class="star">
                  <img src="../img/star0.png" id="s5" class="star">
                <?php
                } else if ($media["avg"] >= 3 && $media["avg"] < 4) { ?>
                  <img src="../img/star1.png" id="s1" class="star">
                  <img src="../img/star1.png" id="s2" class="star">
                  <img src="../img/star1.png" id="s3" class="star">
                  <img src="../img/star0.png" id="s4" class="star">
                  <img src="../img/star0.png" id="s5" class="star">
                <?php
                } else if ($media["avg"] >= 4 && $media["avg"] < 5) { ?>
                  <img src="../img/star1.png" id="s1" class="star">
                  <img src="../img/star1.png" id="s2" class="star">
                  <img src="../img/star1.png" id="s3" class="star">
                  <img src="../img/star1.png" id="s4" class="star">
                  <img src="../img/star0.png" id="s5" class="star">
                <?php
                } else if ($media["avg"] >= 5) { ?>
                  <img src="../img/star1.png" id="s1" class="star">
                  <img src="../img/star1.png" id="s2" class="star">
                  <img src="../img/star1.png" id="s3" class="star">
                  <img src="../img/star1.png" id="s4" class="star">
                  <img src="../img/star1.png" id="s5" class="star">
                <?php
                } else { ?>
                  <img src="../img/star0.png" id="s1" class="star">
                  <img src="../img/star0.png" id="s2" class="star">
                  <img src="../img/star0.png" id="s3" class="star">
                  <img src="../img/star0.png" id="s4" class="star">
                  <img src="../img/star0.png" id="s5" class="star">
                <?php
                }

                ?>
              </div>
              <div id="ju">
                <div><img src="<?php echo $dat['foto_prof']; ?> " id="foto"></div><br>
                <p>Nome: <?php echo $dat["nome_prof"]; ?></p>
                <p>Atua como: <?php echo $dat["tipo_prof"]; ?></p>

              </div>

              <!--Enviando dados para cadastrar dados na tabela de serviços a realizar-->



              <button class="btn-quadros1" name="b1" onclick="ConsultaServico()" id="<?php echo $j; ?>" value="<?php echo $dat["id_prof"];
                                                                                                                $id_botao_prof = $dat["id_prof"]; ?>">Ver perfil</button>
              <button class="btn-quadros" name="b2" onclick="NovoServico()" id="<?php echo $i; ?>" value="<?php echo $dat["id_prof"]; ?> ">Contratar Profissional</button>

              <?php $i++; ?>
              <?php $j++; ?>
            </div>


      <?php }
        }
      } ?>
    </div>
  </div>
  <div id="results">
    <h3>Conheça o profissional:</h3>
    <div id="expanda">
      <div id="perfil" style="display:none;">
        <img src="../img/trabalhador-icon.png" id="foto2">

        <ul>
          <h3 id="camponome"></h3>
          <p>Profissão: <p id="profi"></p><br>
          <p>Já atua há: 
          <p id="atua"></p> ano(s) na profissão</p><br>
          <p>Sua(s) especialidades: 
          <p id="service"></p><br>
        </ul>

        <div id=quadrin>
          <p>Fotos de Serviços Efetuados:</p>
          <img  class="imagserv2">
          <img  class="imagserv">
          <img  class="imagserv">
          
        </div>
      </div>
    </div>
  </div>



  <script src="../js/painelcliente.js"></script>
</body>

</html>