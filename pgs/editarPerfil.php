<?php
session_start();
require_once "../action/conecta.php";

$id = $_SESSION["idProf"];


$result = pg_query($conexao, "SELECT * FROM profissional WHERE id_prof= '$id'");

?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>YourService</title>
  <link rel="stylesheet" href="../css/editar.css">
</head>

<body>
  <div id="cabecalho">
  <a href="perfilProfi.php"><button id="voltar">Voltar</button></a>
    <header>
    
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
  </div>

  <h2>Editar Perfil</h2>
  <div class="box">




    <form method="POST" action="../action/update.php" id="formularioprincipal" enctype="multipart/form-data">
      <br><br>
      <div id="perfil">
        <?php
        $data = pg_fetch_array($result); ?>

        <img id="fotoCapa" src="../img/perfil.jpg">
        <div class="uploading">
          <input type="file" name="upload" onchange="showThumbnail(this);" />
        </div>

        <div class="inputBox">
          <input type="hidden" name="id" class="inputUsuario" value="<?php echo $data["id_prof"]; ?>">
        </div>
        <div class="inputBox">
          <input type="text" name="nome" class="inputUsuario" value="<?php echo $data['nome_prof']; ?>">
          <label for="nome" class="labelInput">Nome: </label>
        </div>
        <br><br>
        <div class="inputBox">
          <input type="text" name="cpf" class="inputUsuario" value="<?php echo $data['cpf_prof']; ?>">
          <label for="cpf" class="labelInput">CPF:</label>
        </div>
        <br><br>
        <div class="inputBox">
          <input type="text" name="endereco" class="inputUsuario" value="<?php echo $data['endereco_prof']; ?>">
          <label for="endereco" class="labelInput">Endereço: </label>
        </div>
        <br><br>
        <div class="inputBox">
          <input type="date" name="datanasc" class="inputUsuario" value="<?php echo $data['datanasc_prof']; ?>">
          <label for="datanasc" class="labelInput">Data de Nascimento:</label>
        </div>
        <br><br>
        <div class="inputBox">
          <input type="text" name="email" class="inputUsuario" value="<?php echo $data['email_prof']; ?>">
          <label for="email" class="labelInput">Email:</label>
        </div>
        <br><br>
        <div class="inputBox">
          <input type="text" name="telefone" class="inputUsuario" value="<?php echo $data['telefone_prof']; ?>">
          <label for="telefone" class="labelInput">Telefone: </label>
        </div>
        <br><br>
        <div class="inputBox">
          <input type="text" name="tempo" class="inputUsuario" value="<?php echo $data['temposervico_prof']; ?>">
          <label for="tempo" class="labelInput">Tempo de Serviço: </label>
        </div>
        <br><br>

        <div class="uploading2">
          <a href="addFoto.php"><input type="button" /></a>
        </div>
        <br><br>

        <input type="submit" id="botao" name="SalvarFoto" />
      </div>
    </form>


    <!-- <form action="fotos.php" method="post" enctype="multipart/form-data">
                    <img id="fotoCapa" src="../img/perfil.jpg">
                    <div class="upload">
                    <input type="file" name="upload" onchange="showThumbnail2(this);"/> -->


    <!--<form action="processa_imagem_perfil.php" method="post" enctype="multipart/form-data">
                  <label>Imagem de perfil: <input type="file" name="image[]" multiple="multiple"></label>
                  <input type="submit" value="Submit">
                  </form>-->



    <script src="../js/editarPerfil.js"></script>
</body>

</html>