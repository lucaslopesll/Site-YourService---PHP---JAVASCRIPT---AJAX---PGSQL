<?php
session_start();
require_once "../action/conecta.php";


$idServico = $_GET["id"];
$copiaid = $idServico;

$result = pg_query($conexao, "SELECT * FROM realiza_prof_servico inner join cliente ON cliente.id_cliente = realiza_prof_servico.real_cliente_fk inner join lista_servicos ON real_lista_fk = id_lista inner join profissional ON id_prof=real_prof_fk WHERE id_serv_real= '$idServico'");
?>


<!DOCTYPE html>
<html lang="pt">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Avaliação</title>
     <!--Font Awesome Icons-->
     <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
    <link rel="stylesheet" href="//maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="../css/avaliarProfissional.css">
</head>

<body>
    
        <div class="cabecalho">
            
        <a href="relatorioCliente.php"><button id="voltar">Voltar</button></a>
            <a href="../index.php"><img src="../img/photo.png" id="logo"></a>
        </div>
        <div class="box">
        <h3>AVALIE O PROFISSIONAL</h3>
        <fieldset>
            <h5>Como você avalia o serviço do profissional?</h5>
            <div class="avaliacaoCliente">
                <a href="javascript:void(0)" onclick="Avaliar(1)">
                    <img src="../img/star0.png" id="s1"></a>

                <a href="javascript:void(0)" onclick="Avaliar(2)">
                    <img src="../img/star0.png" id="s2"></a>

                <a href="javascript:void(0)" onclick="Avaliar(3)">
                    <img src="../img/star0.png" id="s3"></a>

                <a href="javascript:void(0)" onclick="Avaliar(4)">
                    <img src="../img/star0.png" id="s4"></a>

                <a href="javascript:void(0)" onclick="Avaliar(5)">
                    <img src="../img/star0.png" id="s5"></a>
                <p id="rating">0</p>

            </div>
            <br>
            <br>
            <br>
            <h5>Deixe o seu comentário</h5>
            <div id="box2">
                <input id="caixa" type="text">
            </div>
            <div id="idserv"></div>
            

            <form action="../action/avaliaFoto.php" method="POST" enctype="multipart/form-data">
            <?php $data = pg_fetch_array($result); ?>
                <h5>Adicione fotos do  Serviço finalizado</h5>
                <div class="inputBox">
                    <input type="hidden" name="id" class="inputUsuario" value="<?php echo $data["id_serv_real"]; ?>">
                </div>

                <div class="container">
                    <input type="file" id="file-input" name="uploade[]" accept="image/png, image/jpeg" onchange="preview()" multiple="multiple">
                    <label for="file-input">
                        <i class="fas fa-upload"></i> &nbsp; Escolha até 3 fotos
                    </label>
                    <p id="num-of-files">Nenhuma foto escolhida</p>
                    <div id="images"></div>
                </div>
                <!--Font Awesome Icons<input type="submit" id="botao" name="SalvarFoto" />-->
                <a href="../action/avaliaFoto.php?id=<?php echo $data['id_serv_real'];?>"><button id="botao" onclick="Avaliacao()" value="<?php echo $copiaid ?>"> Avaliar </button></a>
            </form>

       </fieldset>
        <script src="../js/avaliar.js"></script>
</body>

</html>