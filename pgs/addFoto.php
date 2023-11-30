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
    <title>Your Service</title>
    <!--Font Awesome Icons-->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Rubik&display=swap" rel="stylesheet">
    <!-- Stylesheet -->
    <link rel="stylesheet" href="../css/fotografias.css" />
</head>

<body>

    <div id="cabecalho">
        <a href="../index.php"><img src="../img/photo.png" id="logo"></a>
    </div>
    <div id="areaPrincipal">
        <form action="../action/fotos.php" method="POST" enctype="multipart/form-data">
            <?php $data = pg_fetch_array($result); ?>
            <p id="desc">Adicione fotos dos seus serviços</p>
            <div class="inputBox">
                <input type="hidden" name="id" class="inputUsuario" value="<?php echo $data["id_prof"]; ?>">
            </div>
            
            <div class="container">
                <input type="file" id="file-input" name="uploade[]" accept="image/png, image/jpeg" onchange="preview()" multiple="multiple">
                <label for="file-input">
                    <i class="fas fa-upload"></i> &nbsp; Escolha até 3 fotos
                </label>
                <p id="num-of-files">Nenhuma foto escolhida</p>
                <div id="images"></div>
            </div>
            <br><br>
            <input type="submit" id="botao" name="SalvarFoto" />
        </form>
    </div>
    <script src="../js/addFoto.js"></script>
</body>

</html>