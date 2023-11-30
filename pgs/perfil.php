<?php
session_start();
require_once "../action/conecta.php";

$capturaid = pg_query($conexao, "SELECT * FROM profissional");

while($capid = pg_fetch_array($capturaid)){
$id = $capid['id_prof'];

}
     $result = pg_query($conexao, "SELECT * FROM profissional WHERE id_prof= '$id'")
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Your Service</title>
    <link rel="stylesheet" href="../css/perfil.css">
</head>

<body>
    <div id="login">
       <button type="button" class="btn first">Cadastre-se</button> 
       <button type="button" class="btn">Faça seu Login</button>    
    </div>
    <div id="cabecalho">
        <div class="container">
            <input type="checkbox" id="checkbox-menu">
            <label for="checkbox-menu">
                <span></span>
                <span></span>
                <span></span>
            </label>
            <a href="../index.php"><img src="../img/photo.png" id="logo"></a>
        </div>
        <?php
            while($data = pg_fetch_array($result)){ ?>
        <div id="perfil">
            <div id = "foto"><img src="../img/ft1.jfif" class="perf"></div>
            <div id ="descricao">
                <h2><?php echo $data['nome_prof']; ?></h2>
                <ul>
                    <li>Profissão: <?php echo $data['tipo_prof']; ?></li>
                    <li>Atua: Há mais de <?php echo $data['temposevico_prof']; ?> anos</li>
                    <li>Serviçõs: Reboco, Fundação, Levantar parede e etc...</li>
                </ul>
            </div>
            
            <div id ="avaliacao">
            <h2>Avaliação</h2>
            <img src="../img/estrela.png" class="star">
            <img src="../img/estrela.png" class="star">
            <img src="../img/estrela.png" class="star">
            <img src="../img/estrela.png" class="star">
            <img src="../img/estrela-cheia.png" class="star">
            </div>
            <div id ="servicos">
                <h2>Fotos</h2>
                
            </div>
            <div id ="comentarios">
                <h2>Comentários</h2>
            </div>
            <button id ="chame">Chame</button>

        </div>
        <?php  }?>
        
</body>

</html>